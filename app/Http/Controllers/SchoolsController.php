<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    //
    public function all()
    {
        return view('schools/school-list');
    }
}
