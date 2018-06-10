<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrant as Registrant;

class RegistrantsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all(Registrant $registrants)
    {
        $data['students'] = $registrants::all();
        return view('registrants/registrants', $data);
    }

    public function school(Registrant $registrants, $school)
    {
        $data['school'] = $school;
        $data['students'] = $registrants->where('school', $school)->get();
        $data['extras'] = $registrants->where('school', $school)->where()->get();
        return view('registrants/school', $data);
    }
}
