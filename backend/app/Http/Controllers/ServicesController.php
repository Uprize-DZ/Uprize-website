<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($services);
    }
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return response()->json($service);
    }
}
