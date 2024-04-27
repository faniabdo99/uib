<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Project extends Model {
    use HasFactory;

    protected $guarded = [];
    public function scopeLanguage(Builder $builder) {
        $builder->where('lang' , app()->getLocale());
    }

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Gallery() {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }

    public function getImagePathAttribute() {
        return asset('projects/' . $this->image);
    }

    protected function casts() {
        return [
            'date' => 'datetime:Y-m-d',
        ];
    }
}
