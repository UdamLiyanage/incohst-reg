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
        return redirect('home');
    }

    public function addParticipants(Request $request)
    {
        $participant = new Registrant();
        $name = $request->input('name');
        $school = $request->input('school');
        $participant->insert(
            ['name' => $name, 'school' => $school, 'confirmed' => true, 'created_at' => now(), 'updated_at' => now()]
        );
        return redirect('home');
    }

    public function addCompetitors(Request $request)
    {
        $competitor = new Competitor();
        $name = $request->input('name');
        $school = $request->input('school');
        $email = $request->input('email');
        $telephone = $request->input('telephone');
        $tshirt = $request->input('tshirt');
        $competitor->insert(
          ['name' => $name, 'email' => $email, 'telephone' => $telephone, 'school' => $school, 't-shirt' => $tshirt, 'confirmed' => true, 'created_at' => now(), 'updated_at' => now()]
        );
        return redirect('home');
    }

    public function addRegistered($school)
    {
        $competitors = new Competitor();
        $participants = new Registrant();
        $competitors->where('school', $school)->update(['registered' => true]);
        $participants->where('school', $school)->update(['registered' => true]);
    }

    public static function countRegistered()
    {
        $competitors = new Competitor();
        $participants = new Registrant();
        $total = $competitors->where('registered', true)->get()->count() + $participants->where('registered', true)->get()->count();
        echo $total;
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
    
    public static function countConfirmations()
    {
        $competitors = new Competitor();
        $participants = new Registrant();
        echo $competitors->where('confirmed', true)->get()->count() + $participants->where('confirmed', true)->get()->count();
        
    }
}
