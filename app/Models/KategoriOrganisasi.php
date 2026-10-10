<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriOrganisasi extends Model
{
    use HasFactory;
    protected $table = 'kategori_organisasi';
    protected $fillable = [
        'title',
        'description',
    ];

    // Relasi ke Organisasi
    public function organisasis()
    {
        return $this->hasMany(Organisasi::class, 'kategori_id', 'id');
    }

}
