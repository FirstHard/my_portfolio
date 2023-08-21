<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkillTechnology;

class SkillsTechnologyController extends Controller
{
    public function index()
    {
        $skillsTechnologies = SkillTechnology::all();
        return view('admin.pages.skills_technology.index', compact('skillsTechnologies'));
    }

    public function create()
    {
        return view('admin.pages.skills_technology.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:skills_technology',
            'content' => 'required',
        ]);

        SkillTechnology::create($request->all());

        return redirect()->route('skills-technology.index')
            ->with('success', 'Skill & Technology record created successfully.');
    }

    public function edit(SkillTechnology $skillsTechnology)
    {
        return view('admin.pages.skills_technology.edit', compact('skillsTechnology'));
    }

    public function update(Request $request, SkillTechnology $skillsTechnology)
    {
        $request->validate([
            'title' => 'required|unique:skills_technology,title,' . $skillsTechnology->id,
            'content' => 'required',
        ]);

        $skillsTechnology->update($request->all());

        return redirect()->route('skills-technology.index')
            ->with('success', 'Skill & Technology record updated successfully.');
    }

    public function destroy(SkillTechnology $skillsTechnology)
    {
        $skillsTechnology->delete();

        return redirect()->route('skills-technology.index')
            ->with('success', 'Skill & Technology record deleted successfully.');
    }
}
