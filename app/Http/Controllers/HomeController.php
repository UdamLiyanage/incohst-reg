<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competitor as Competitor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competitor $competitor)
    {
        $data['schools'] = $competitor->distinct()->get(['school']);
        return view('home', $data);
    }

    public function count(School $school, Competitor $competitor, Registrant $registrant)
    {
        $data['school'] = $competitor->distinct()->get(['school']);
        foreach ($data['school'] as $school)
            echo $school;
    }
}
