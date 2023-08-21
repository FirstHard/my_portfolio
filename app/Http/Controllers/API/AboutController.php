<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function __invoke()
    {
        return About::first();
    }
}
