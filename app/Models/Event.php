<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'tm_events';


    protected $fillable = [
        'org_id', 'event_name', 'event_date', 'event_description', "event_img_path",
        'event_photo_gallery_link', 'event_by_ticket_link', "status", 'created_by',
        'updated_by', 'created_at',  'updated_at'
    ];

    public function getEventType()
    {

        $currentDate = Carbon::parse(date('d-m-Y'));
        $event_date = $this->event_date;

        if ($currentDate->gt($event_date) && $event_date) {
            return "Past";
        } else {
            return "Upcoming";
        }
    }

    public static function checkStatus($org_id)
    {
        $count = self::where("org_id", $org_id)->where("status","1")->count();

        $result = false;
        if ($count) {
            $result = true;
        }
        return $result;
    }


    public static function eventCount($type, $org_id)
    {

        if ($type == 1) {
            $count = self::where("event_date", ">", date('Y-m-d'))->where("org_id", $org_id)->count();
        } else {
            $count = self::where("event_date", "<", date('Y-m-d'))->where("org_id", $org_id)->count();
        }

        $result = false;
        if ($count) {
            $result = true;
        }
        return $result;
    }
}
