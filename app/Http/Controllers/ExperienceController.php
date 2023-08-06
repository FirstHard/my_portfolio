<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.pages.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.pages.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);

        $experience = new Experience();
        $experience->title = $request->input('title');
        $experience->description = $request->input('description');
        $experience->start_date = $request->input('start_date');
        $experience->end_date = $request->input('end_date');
        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Experience record created successfully.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.pages.experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);

        $experience = Experience::findOrFail($experience->id);
        $experience->title = $request->input('title');
        $experience->description = $request->input('description');
        $experience->start_date = $request->input('start_date');
        $experience->end_date = $request->input('end_date');
        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Experience record updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('experience.index')->with('success', 'Experience record deleted successfully.');
    }
}
