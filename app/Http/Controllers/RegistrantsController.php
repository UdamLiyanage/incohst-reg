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

    public function confirm($school)
    {
        $competitors = new Competitor();
        $registrants = new Registrant();
        $competitors->where('school', $school)->update(['confirmed' => true]);
        $registrants->where('school', $school)->update(['confirmed' => true]);
        echo "Done";
    }

    public static function countRelevantCompetitors($school)
    {
        $competitors = new Competitor();
        echo $competitors->where('school', $school)->get()->count();
    }

    public static function countRelevantParticipants($school)
    {
        $participants  = new Registrant();
        echo $participants->where('school', $school)->get()->count();
    }

    public static function countCompetitors()
    {
        $competitors = new Competitor();
        echo $competitors->all()->count();
    }

    public static function countParticipants()
    {
        $participants = new Registrant();
        echo $participants->all()->count();
    }
}
