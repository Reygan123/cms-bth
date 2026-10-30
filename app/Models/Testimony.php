<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'slug',
        'program_id',
        'description',
        'content',
        'yt_link',
        'home',
        'fakultas_display',
        'image',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Menjaga sinkronisasi dua arah antara content dan description
            if (empty($model->content) && !empty($model->description)) {
                $model->content = $model->description;
            } elseif (empty($model->description) && !empty($model->content)) {
                $model->description = $model->content;
            }

            if (empty($model->user_id)) {
                $model->user_id = auth()->id() ?? 1;
            }

            if (!empty($model->image)) {
                $img = trim($model->image);
                if (str_starts_with($img, 'https://stikesbudiluhurcimahi.ac.id/dataimage/testimonial/')) {
                    $model->image = str_replace('https://stikesbudiluhurcimahi.ac.id/dataimage/testimonial/', 'testimonials/', $img);
                } elseif (!str_starts_with($img, 'http') && !str_starts_with($img, 'testimonials/')) {
                    $model->image = 'testimonials/' . ltrim($img, '/');
                }
            }
        });
    }

    /**
     * program
     *
     * @return void
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
