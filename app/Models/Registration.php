<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'description',
        'content',
        'title1',
        'title2',
        'title3',
        'description1',
        'description2',
        'description3',
        'image1',
        'image2',
        'image3',
        'image',
        'cta',
        'pricing',
        'link',
        'status',
    ];
    public function programs()
    {
        return $this->belongsToMany(Program::class, 'registration_programs');
    }

}
