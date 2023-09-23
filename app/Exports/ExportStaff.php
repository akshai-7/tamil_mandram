<?php

namespace App\Exports;

use App\StaffImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\withHeadings;

class ExportStaff implements FromCollection, WithHeadingRow, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return ["id","user_id","company_id","property_id", "user_name", "email","first_name","mobile_no","gender","nric","password","usergroup","usergroup_id","user_status","created_at","updated_at","created_by","updated_by"];
    }
    public function collection()
    {
        return StaffImport::all();
    }
}
