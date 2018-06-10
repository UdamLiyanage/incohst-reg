<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrant as Registrant;
use App\Competitor as Competitor;

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

    public function school(Registrant $registrants, Competitor $competitors, $school)
    {
        $data['school'] = $school;
        $data['image'] = preg_replace('/\s+/', '', $school);
        $data['image'] = $data['image'].'.png';
        $data['students'] = $competitors->where('school', $school)->get();
        $data['extras'] = $registrants->where('school', $school)->get();
        return view('registrants/school', $data);
    }
}
