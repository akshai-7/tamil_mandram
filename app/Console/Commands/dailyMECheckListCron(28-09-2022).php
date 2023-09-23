<?php

namespace App\Console\Commands;

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


        try {

            $get_checklist = MeCheckList::where('status', 1)->get();

            $current_Date = date('Y-m-d');

            if (count($get_checklist) > 0) {
                foreach ($get_checklist as $checklist) {

                    $existsRecord =   MeCheckListReport::where("checklist_date", $current_Date)
                        ->where('company_id', $checklist->company_id)
                        ->where('checklist_id', $checklist->id)
                        ->where('property_id', $checklist->property_id)->exists();

                    if ($existsRecord==false) {

                        $insertData = [
                            "checklist_id" => $checklist->id,
                            "company_id" => $checklist->company_id,
                            "property_id" => $checklist->property_id,
                            "description" => $checklist->question,
                            "checklist_date" => $current_Date,
                            "status" => 1,
                        ];

                        MeCheckListReport::create($insertData);
                    }
                }
            }
        } catch (\Exception $e) {

            dd($e->getMessage());
            Log::info("Someting went to wrong on Me checkList Creation.".$e->getMessage());
        }



        $this->info('checklist:cron Cummand Run successfully!');
    }
}
