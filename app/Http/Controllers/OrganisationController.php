<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function organisation()
    {
        return view('organisation');
    }
    public function Organisationadd()
    {
        return view('Organisation_add');
    }

    public function organisationeditview()
    {
        return view('organisationeditview');
    }
    public function OrganisationEdit()
    {
        return view('Organisation_Edit');
    }
    public function organisationAdmin()
    {
        return view('organisationAdmin');
    }
    public function organisationUserGroup()
    {
        return view('organisationUserGroup');
    }
    public function organisationadminadd()
    {
        return view('organisationadminadd');
    }
    public function Courseassignlist()
    {
        return view('Courseassignlist');
    }



}
