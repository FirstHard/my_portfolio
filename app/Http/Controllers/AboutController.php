<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        // We only have one "About" entry
        $about = About::first();
        return view('about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        // We only have one "About" entry
        $about = About::first();

        $request->validate([
            'content' => 'required|string',
            'cv_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $about->content = $request->input('content');

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $originalName = $file->getClientOriginalName();
            $newPath = $file->storeAs('cv', $originalName, 'public');

            if ($about->cv_file) {
                $currentPath = $about->cv_file;
                if (Storage::exists($currentPath)) {
                    Storage::delete($currentPath);
                }
            }

            $about->cv_file = $newPath;
        }

        $about->save();

        return redirect()->route('about.edit')->with('success', 'Data updated successfully.');
    }

    public function downloadCV()
    {
        // We only have one "About" entry
        $about = About::first();

        if ($about && $about->cv_file && Storage::exists($about->cv_file)) {
            return Storage::download($about->cv_file);
        } else {
            return redirect()->route('about.edit')->with('error', 'Файл CV не найден.');
        }
    }
}
