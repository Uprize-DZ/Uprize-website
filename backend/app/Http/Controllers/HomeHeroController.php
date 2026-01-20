<?php

namespace App\Http\Controllers;
use App\Models\HomeHero;
use Illuminate\Http\Request;

class HomeHeroController extends Controller
{
    public function index()
    {

        $heroes = HomeHero::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($heroes);
    }
}
