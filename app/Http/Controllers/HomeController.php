<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->user_role == "1") {
            return view('Dashbord');
        } else {
            return view('user_dashboard');
        }
    }
    public function user()
    {
        return view('users_list');
    }

    public function event()
    {

        return view('event.list');
    }

    public function event_add()
    {

        return view('event.add');
    }

    public function event_edit()
    {

        return view('event.edit');
    }


    public function past_event()
    {

        return view('past_event.list');
    }

    public function past_event_add()
    {


        return view('past_event.add');
    }

    public function past_event_edit()
    {

        return view('past_event.edit');
    }

    public function manage_about_us()
    {

        return view('manage_about_us');
    }

    public function manage_about_us_add()
    {

        return view('manage_about_us_add');
    }

    public function manage_about_us_edit()
    {

        return view('manage_about_us_edit');
    }




    public function organisation_setting_add()
    {

        return view('org_setting.add');
    }

    public function organisation_setting_edit()
    {

        return view('org_setting.edit');
    }


    public function user_dashboard()
    {

        return view('user_dashboard');
    }


    public function committee()
    {

        return view('committee.list');
    }

    public function committee_add()
    {

        return view('committee.add');
    }

    public function committee_edit()
    {

        return view('committee.edit');
    }

    public function sponsor_category()
    {

        return view('sponsor_category');
    }

    public function send_notification()
    {
        return view('notificaions.list');
    }

    public function e_committee()
    {
        return view('e_committee.list');
    }

    public function e_committee_add()
    {
        return view('e_committee.add');
    }

    public function e_committee_edit()
    {
        return view('e_committee.edit');
    }

    public function by_law()
    {
        return view('by_law.list');
    }

    public function by_law_add()
    {
        return view('by_law.add');
    }

    public function by_law_edit()
    {
        return view('by_law.edit');
    }


    public function news()
    {
        return view('news.list');
    }

    public function news_add()
    {
        return view('news.add');
    }

    public function news_edit()
    {
        return view('news.edit');
    }


    public function history()
    {
        return view('history');
    }

    public function native_language()
    {
        return view('native_language');
    }


    public function banner()
    {

        return view('master_banner');
    }

    public function whatapp()
    {

        return view('whatapp');
    }


    public function commonFunction()
    {

        // dd(encrypt("123456"));



        // echo view('mail.web_login_details', $data);
        // exit;
        $data = ['user_name' => "742250", "password" => "123654", "org_code" => "ORG1234", "org_name" => "ADC Org"];

        Mail::send('mail.web_login_details', $data, function ($message) {
            $message->subject('Welcome to iOrg - Your Digital Hub for Organizational Success!');
            $message->to("akshaikumar568@gmail.com");
            $message->bcc('akshai2537@gmail.com');
        });
    }
}
