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
        $keyword = request('keyword');
        $q->orWhere("title","like","%$keyword%")
            ->orWhere("description","like","%$keyword%");
        return $q;
    }
}
