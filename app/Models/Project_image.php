<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Project_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagename',
        'project'
    ];

    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
