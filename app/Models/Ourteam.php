<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ourteam extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'ot_id', 'title', 'program_id', 'name', 'fb', 'ig', 'tt', 'phone', 'email', 'image'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!empty($model->image)) {
                $img = trim($model->image);
                if (str_starts_with($img, 'https://stikesbudiluhurcimahi.ac.id/dataimage/dosen/')) {
                    $model->image = str_replace('https://stikesbudiluhurcimahi.ac.id/dataimage/dosen/', 'ourteam-image/', $img);
                } elseif (!str_starts_with($img, 'http') && !str_starts_with($img, 'ourteam-image/')) {
                    $model->image = 'ourteam-image/' . ltrim($img, '/');
                }
            }
        });
    }

    /**
     * program
     *
     * @return void
     */
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
