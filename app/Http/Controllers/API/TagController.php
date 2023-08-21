<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke()
    {
        return Tag::all();
    }
}
