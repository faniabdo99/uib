<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Category extends Model {
    use HasFactory;

    protected $guarded = [];

    public function scopeLanguage(Builder $builder) {
        $builder->where('lang' , app()->getLocale());
    }
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
