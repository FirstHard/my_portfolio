<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'creation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'required|string',
            'domain' => 'nullable|string|max:64',
            'gallery' => 'nullable|string',
            'cost_from' => 'nullable|integer',
            'cost_to' => 'nullable|integer|gte:cost_from',
            'archived' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        // Проверяем наличие файла image в запросе
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Генерируем уникальное имя файла, сохраняем оригинальное имя для отображения в представлении
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Проверяем наличие файла с таким именем на сервере
            if (Storage::exists('images/projects/' . $imageName)) {
                // Если файл с таким именем уже существует, удаляем его
                Storage::delete('images/projects/' . $imageName);
            }

            // Сохраняем файл с уникальным именем
            $image->storeAs('images/projects', $imageName, 'public');

            // Сохраняем имя файла изображения в поле image_path модели Project
            $request->merge(['image_path' => $imageName]);
        }

        // Create the project and associate tags if provided
        $project = Project::create($request->all());
        $project->tags()->sync($request->tags);

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
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'creation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'required|string',
            'domain' => 'nullable|string|max:64',
            'gallery' => 'nullable|string',
            'cost_from' => 'nullable|integer',
            'cost_to' => 'nullable|integer|gte:cost_from',
            'archived' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        // Проверяем наличие файла image в запросе
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Генерируем уникальное имя файла, сохраняем оригинальное имя для отображения в представлении
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Проверяем наличие файла с таким именем на сервере и удаляем его
            if (Storage::exists('images/projects/' . $project->image_path)) {
                Storage::delete('images/projects/' . $project->image_path);
            }

            // Сохраняем файл с уникальным именем
            $image->storeAs('images/projects', $imageName, 'public');

            // Сохраняем имя файла изображения в поле image_path модели Project
            $request->merge(['image_path' => $imageName]);
        }

        // Update the project and associate tags if provided
        $project->update($request->all());
        $project->tags()->sync($request->tags);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
