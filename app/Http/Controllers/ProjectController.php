<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tag;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('admin.pages.projects.index', compact('projects'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.pages.projects.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'creation_year' => 'required|integer|min:1900',
            'description' => 'required|string',
            'domain' => 'nullable|string|max:64',
            'cost_from' => 'nullable|numeric|min:0',
            'cost_to' => 'nullable|numeric|min:' . ($request->cost_from ?: 0),
            'archived' => 'boolean',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload for main image
        $projectData = $request->only(['title', 'creation_year', 'description', 'domain', 'cost_from', 'cost_to', 'archived']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storePubliclyAs('public/projects', $fileName);
            $projectData['image_path'] = $fileName;
        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->storePubliclyAs('public/projects', $fileName);
            $projectData['logo_path'] = $fileName;
        }

        // Create the project
        $project = Project::create($projectData);

        // Handle file upload for gallery images
        if ($request->hasFile('gallery')) {
            $galleryImages = $request->file('gallery');
            $project->addGalleryMedia($galleryImages);
        }

        // Сохранение связи тегов
        $project->tags()->sync($request->input('tags', []));

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $tags = Tag::all();
        return view('admin.pages.projects.edit', compact('project', 'tags'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'creation_year' => 'required|integer|min:1900',
            'description' => 'required|string',
            'domain' => 'nullable|string|max:64',
            'cost_from' => 'nullable|numeric|min:0',
            'cost_to' => 'nullable|numeric|min:' . ($request->cost_from ?: 0),
            'archived' => 'boolean',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload for main image
        $projectData = $request->only(['title', 'creation_year', 'description', 'domain', 'cost_from', 'cost_to', 'archived']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storePubliclyAs('public/projects', $fileName);
            $projectData['image_path'] = $fileName;
        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->storePubliclyAs('public/projects', $fileName);
            $projectData['logo_path'] = $fileName;
        }

        // Update the project
        $project->update($projectData);

        // Handle file upload for gallery images
        if ($request->hasFile('gallery')) {
            $galleryImages = $request->file('gallery');
            $project->removeGalleryMedia($project->getMedia()->pluck('id')->toArray());
            $project->addGalleryMedia($galleryImages);
        }

        // Сохранение связи тегов
        $project->tags()->sync($request->input('tags', []));

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
