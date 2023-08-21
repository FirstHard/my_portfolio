<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillTechnology extends Model
{
    use HasFactory;

    protected $table = 'skills_technology';

    protected $fillable = ['title', 'content'];
}
