<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'program_id',
        'title',
        'slug',
        'subtitle',
        'description',
        'image',
        'image1',
        'image2',
        'image3',
        'image4',
        'svg_icon',
        'home',
        'fakultas_display',
    ];

    /**
     * programs
     *
     * @return void
     */
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    /**
     * benefit
     *
     * @return void
     */
    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }
}
