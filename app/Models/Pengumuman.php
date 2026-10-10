<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumans';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'start_date',
        'location',
        'content',
        'contact',
        'file',
        'status',
    ];
}
