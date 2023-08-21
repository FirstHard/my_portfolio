<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function __invoke()
    {
        return Experience::orderBy('created_at', 'desc')->get();
    }
}
