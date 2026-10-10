<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'yt_id',
        'ourteam_id',
        'title1',
        'description1',
        'statistik1',
        'statistik2',
        'statistik3',
        'statistik4',
        'tt',
        'ig',
        'fb',
        'yt',
        'linkedin',
        'email',
        'phone',
        'address',
        'map',
        'title2',
        'description2',
        'title3',
        'description3',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'link_fakultas',
        'linkedin',
        'map',
        'color',
    ];

    /**
     * ourteam
     *
     * @return void
     */
    public function ourteam()
    {
        return $this->belongsTo(Ourteam::class);
    }
    /**
     * programs
     *
     * @return void
     */
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
