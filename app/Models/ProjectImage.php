<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model {
    use HasFactory;

    protected $guarded = [];

    public function getImagePathAttribute() {
        return asset('projects_gallery/' . $this->image);
    }
}
