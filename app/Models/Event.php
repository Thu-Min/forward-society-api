<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'experct',
        'description',
        'instructor',
        'thumbnail',
        'status',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'start_time' => 'datetime:H-i',
        'end_time' => 'datetime:H-i',
    ];

    public function scopeSearch($query)
    {   
        $query->when(request('keyword'), function($query,$keyword){
            $query->where('title','like',"%$keyword%")
                ->orWhere("description","like","%$keyword%");
        });
    }

    public function event_category()
    {
        return $this->belongsTo(EventCategory::class);
    }
}
