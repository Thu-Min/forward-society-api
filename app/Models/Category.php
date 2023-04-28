<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    public function blog(){
        return $this->hasMany(Blog::class);
    }

    public function scopeSearch($query)
    {   
        $query->when(request('search'), function($query,$search){
            $query->where('title','like',"%$search%");
        });
    }
}
