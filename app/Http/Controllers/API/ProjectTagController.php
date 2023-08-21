<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectTagController extends Controller
{
    public function __invoke()
    {
        $project = new Project();
        return $project->tags();
    }
}
