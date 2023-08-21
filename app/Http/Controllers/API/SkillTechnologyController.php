<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SkillTechnology;

class SkillTechnologyController extends Controller
{
    public function __invoke()
    {
        return SkillTechnology::all();
    }
}
