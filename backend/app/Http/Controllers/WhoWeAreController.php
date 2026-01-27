<?php

namespace App\Http\Controllers;

use App\Models\WhoWeAre;
use App\Http\Controllers\Controller;

class WhoWeAreController extends Controller
{
    public function index()
    {
        $whoWeAre = WhoWeAre::all();
        return response()->json($whoWeAre);
    } 
}