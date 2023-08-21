<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function __invoke()
    {
        $projects = Project::with(['tags', 'media'])->get();

        $projectsData = $projects->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'image_path' => $project->image_path,
                'logo_path' => $project->logo_path,
                'creation_year' => $project->creation_year,
                'description' => $project->description,
                'domain' => $project->domain,
                'cost_from' => $project->cost_from,
                'cost_to' => $project->cost_to,
                'archived' => $project->archived,
                'tags' => $project->tags->pluck('name'),
                'galleryMedia' => $project->getMediaUrls('gallery'),
            ];
        });

        return $projectsData;
        // return Project::all();
    }
}
