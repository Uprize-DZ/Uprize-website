<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\TrustedBy;
use Illuminate\Http\Request;


class TrustedByController extends Controller
{
    public function index()
    {
        $clients = TrustedBy::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($clients);
    }
}
