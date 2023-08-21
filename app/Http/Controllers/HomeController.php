<?php

namespace App\Http\Controllers;

/* use App\Models\Profile;
use App\Models\About;
use App\Models\SkillTechnology;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Tag; */

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* $profile = Profile::first();
        $about = About::first();
        $skills = SkillTechnology::all();
        $experiences = Experience::orderBy('created_at', 'desc')->get();
        $projects = Project::all();
        $tags = Tag::all();
        $tagsString = $tags->pluck('name')->join(',');
        return view('index', compact('profile', 'about', 'skills', 'experiences', 'projects', 'tags', 'tagsString')); */
        return view('site.app');
    }
}
