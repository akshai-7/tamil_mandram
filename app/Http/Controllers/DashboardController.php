<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard(Request $request)
    {

        if(Auth::user()->super_admin) {
            
            return redirect('organization');
//            $data = $this->commonDashboard($request);
//            $data['search_open'] = false;
//            return view('Dashbord', $data);
        } else{
            return redirect('event');
        }

    }


    public function searchDashboard(Request $request)
    {


        if(Auth::user()->super_admin) {
            $data = $this->commonDashboard($request);
            $data['search_open'] = true;
            return view('Dashbord', $data);
        } else{
            $data = $this->commonDashboard($request);
            $data['search_open'] = true;
            return view('user_dashboard',$data);
        }
    }



    private function commonDashboard($request)
    {



        $user = Auth::user();
        $orgs = Organization::where("status","1")->get();
        $orgAll = Organization::where("status","1")->get();

        $org_id = @$request->org_id;
        $from_date = @$request->from_date;
        $to_date = @$request->to_date;


        if ($org_id) {
            $orgs = $orgs->where('user_id', $org_id);
        }


        $orgs = count(@$orgs) ? $orgs->pluck("org_name", "user_id")->toArray() : [];
        $totalOrgCount = count($orgs);


        $orgSubscriptionMonthly = $orgAll;
        $orgSubscriptionYearly = $orgAll;

        /** subscription chart */
        if ($org_id) {
            $orgSubscriptionMonthly = $orgSubscriptionMonthly->where("org_id", $org_id);
            $orgSubscriptionYearly  = $orgSubscriptionYearly->where("org_id", $org_id);
        }


        $orgSubscriptionMonthlyCount = $orgSubscriptionMonthly->where("subscription_type", 1)->count();
        $orgSubscriptionYearCount = $orgSubscriptionYearly->where("subscription_type", 2)->count();

        /** subscription chart */

        /** upcoming, past event Count and chart */

        $upcomingEventCount = Event::whereDate("event_date", ">", date('Y-m-d'))->where("status","1");
        $pastEventCount = Event::whereDate("event_date", "<", date('Y-m-d'))->where("status","1");


        if ($org_id) {
            $upcomingEventCount->where("org_id", $org_id);
            $pastEventCount->where("org_id", $org_id);
        }

        if (!$user->super_admin) {
            $upcomingEventCount = $upcomingEventCount->where("org_id", $user->id);
            $pastEventCount = $pastEventCount->where("org_id", $user->id);
        }


        if($from_date) {
            $upcomingEventCount = $upcomingEventCount->whereDate("event_date", ">=", date('Y-m-d',strtotime($from_date)));
            $pastEventCount = $pastEventCount->whereDate("event_date", ">=", date('Y-m-d',strtotime($from_date)));
        }

        if($to_date) {
            $upcomingEventCount = $upcomingEventCount->whereDate("event_date", "<=", date('Y-m-d',strtotime($to_date)));
            $pastEventCount = $pastEventCount->whereDate("event_date", "<=", date('Y-m-d',strtotime($to_date)));
        }

        $upcomingEventCount = $upcomingEventCount->count();
        $pastEventCount = $pastEventCount->count();



        /** upcoming, past event Count and chart */

        /** Total event Count */

        $totalEvent = Event::where("status","1")->get();
        if ($org_id) {
            $totalEvent = $totalEvent->where("org_id", $org_id)->where();
        }

        if($from_date) {
            $totalEvent = $totalEvent->where("event_date", ">=", date('Y-m-d',strtotime($from_date)));
        }

        if($to_date) {
            $totalEvent = $totalEvent->where("event_date", "<=", date('Y-m-d',strtotime($to_date)));
        }

        $totalEvent = $totalEvent->count();

        if (!$user->super_admin) {
            $totalEvent = Event::where("org_id", $user->id)->where("status","1")->count();
        }

        /** Total event Count */

        $data['orgs'] = $orgAll->pluck('org_name', "user_id")->toArray();

        $data['org_count'] = $totalOrgCount;
        $data['total_event_count'] = $totalEvent;
        $data['total_upcoming_event_count'] = $upcomingEventCount;
        $data['total_past_event_count'] = $pastEventCount;

        $data['event_percent'][] = $pastEventCount && $totalEvent ? ($pastEventCount / $totalEvent) * 100 : 0;
        $data['event_percent'][] = $upcomingEventCount && $totalEvent ? ($upcomingEventCount / $totalEvent) * 100 : 0;


        $data['event_count'][] = $upcomingEventCount ? $upcomingEventCount : 0;
        $data['event_count'][] = $pastEventCount ? $pastEventCount : 0;


        $data['event_subscription'][] = $orgSubscriptionMonthlyCount && $totalOrgCount ? ($orgSubscriptionMonthlyCount / $totalOrgCount) * 100 : 0;
        $data['event_subscription'][] = $orgSubscriptionYearCount && $totalOrgCount ?  ($orgSubscriptionYearCount / $totalOrgCount) * 100 : 0;

        $data['org_id'] = @$request->org_id;
        $data['from_date'] = @$request->from_date;
        $data['to_date'] = @$request->to_date;
        return $data;
    }
}
