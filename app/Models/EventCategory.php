<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function scopeSearch($query)
    {   
        $query->when(request('search'), function($query,$search){
            $query->where('title','like',"%$search%");
        });
    }
}
