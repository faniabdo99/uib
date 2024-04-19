<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getImagePathAttribute() {
        return asset('blogs/'. $this->image);
    }
}
