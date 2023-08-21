<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('admin.pages.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        $request->validate([
            'content' => 'required|string',
            'cv_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $about->content = $request->content;

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            if ($about->generated_cv_filename && Storage::exists('cv/' . $about->generated_cv_filename)) {
                Storage::delete('cv/' . $about->generated_cv_filename);
            }
            $file->storeAs('cv', $filename, 'public');
            $about->cv_file = $file->getClientOriginalName();
            $about->generated_cv_filename = $filename;
        }

        $about->save();

        return redirect()->route('dashboard')->with('success', 'Data updated successfully.');
    }

    public function downloadCV()
    {
        $about = About::first();
        if ($about && $about->generated_cv_filename && Storage::exists('public/cv/' . $about->generated_cv_filename)) {
            return Storage::download('public/cv/' . $about->generated_cv_filename, $about->cv_file);
        }
        return back()->with('error', 'CV file not found.');
    }

    /**
     * Show the form for editing or creating a new resource.
     */
    public function show()
    {
        $about = About::first();
        if ($about) {
            return redirect()->route('about.edit', compact('about'));
        }
        return view('admin.pages.about.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $about = new About();
        return view('admin.pages.about.create', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'cv_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $about = new About();
        $about->content = $request->content;

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->storeAs('cv', $filename, 'public');
            $about->generated_cv_filename = $filename;
            $about->cv_file = $file->getClientOriginalName();
            $about->generated_cv_filename = $filename;
        }

        $about->save();

        return redirect()->route('dashboard')->with('success', 'Data created successfully.');
    }
}
