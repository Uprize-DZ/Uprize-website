<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeHero;
use Illuminate\Support\Facades\Storage;
class AdminHomeHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = HomeHero::orderBy('id', 'desc')->get();
        return view('admin.home-hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'hero_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);
        //handle image upload
        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('heroes', 'public');
        }
        HomeHero::create($validated);
        return redirect()->route('admin.home-hero.index')->with('success', 'Home Hero created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.home-hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);
        //handle image upload
        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('heroes', 'public');
        }
        HomeHero::where('id', $id)->update($validated);
        return redirect()->route('admin.home-hero.index')->with('success', 'Home Hero updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeHero $homeHero)
    {
        //delete image
        if ($homeHero->hero_image) {
            Storage::delete($homeHero->hero_image);
        }
        $homeHero->delete();
        return redirect()->route('admin.home-hero.index')->with('success', 'Home Hero deleted successfully');
    }
}
