<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($q){
        $search = request('search');
        $q->orWhere("title","like","%$search%")
            ->orWhere("description","like","%$search%");
        return $q;
    }
}
