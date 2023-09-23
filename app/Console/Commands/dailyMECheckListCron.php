<?php

namespace App\Console\Commands;

use App\CompanySetting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\MeCheckList;
use App\MeCheckListReport;
use App\Users;
use Illuminate\Support\Facades\Log;

class dailyMECheckListCron extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'me-checklist:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily M.E Checklists for Property';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $companySettings = CompanySetting::all();

        try {
            if (count($companySettings) > 0) {

                foreach ($companySettings as $companySetting) {

                    if ($companySetting->checklist_submit_type == 2) {
                        $this->createChecklistQuestions();
                    } else {
                        $this->createChecklistLocation($companySetting);
                    }
                }
            }
        } catch (\Exception $e) {

            // dd($e->getMessage());
            Log::info("Someting went to wrong on Me checkList Creation." . $e->getMessage());
        }

        $this->info('checklist:cron Cummand Run successfully!');
    }


    public function createChecklistQuestions()
    {

        $get_checklist = MeCheckList::all();

            $current_Date = date('Y-m-d');

        if (count($get_checklist) > 0) {
            foreach ($get_checklist as $checklist) {

                $existsRecord =   MeCheckListReport::where("checklist_date", $current_Date)
                    ->where('company_id', $checklist->company_id)
                    ->where('checklist_id', $checklist->id)
                    ->where('property_id', $checklist->property_id)
                    ->where('submission_type',1)->exists();
                if ($existsRecord == false) {

                    $insertData = [
                        "checklist_id" => $checklist->id,
                        "company_id" => $checklist->company_id,
                        "property_id" => $checklist->property_id,
                        "description" => $checklist->question,
                        "checklist_date" => $current_Date,
                        "status" => 1,
                        "submission_type" => 1,
                    ];


                    $this->saveCheckList($insertData);
                }
            }
        }
    }

    public function createChecklistLocation($companySetting)
    {

        $company_id = $companySetting->company_id;
        $getCompanyproperty = Users::where('usergroup', 'UG1003')
            ->where('company_id', $company_id)->ActiveStatus()->get();


        $current_Date = date('Y-m-d');
        foreach ($getCompanyproperty as $property) {
            $existsRecord =   MeCheckListReport::where("checklist_date", $current_Date)
                ->where('company_id', $property->company_id)
                ->where('property_id', $property->id)
                ->where('submission_type',2)->exists();

            if ($existsRecord == false) {
                $insertData = [
                    "company_id" => $property->company_id,
                    "property_id" => $property->id,
                    "checklist_date" => $current_Date,
                    "submission_type" => 2,
                    "status" => 1,
                ];

                $this->saveCheckList($insertData);
            }
        }
    }


    public function saveCheckList($data)
    {
        MeCheckListReport::create($data);
    }

}
