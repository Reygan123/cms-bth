<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id', 'title','description', 'image', 'program_id', 'home', 'fakultas_display'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriOrganisasi::class, 'kategori_id', 'id');
    }

}
