<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project_image;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'projectname',
        'description'
    ];
    //Primarykey är inte en int
    protected $primaryKey = 'projectname';
    protected $keyType = 'string';
    
    public function images(){
        return $this->hasMany(Project_image::class, 'project', 'projectname');
    }
    
}
