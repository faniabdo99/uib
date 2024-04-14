<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class ContactRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getShortMessageAttribute(){
        return Str::limit($this->message,15);
    }
}
