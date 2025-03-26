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
