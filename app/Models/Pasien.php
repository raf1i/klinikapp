<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory;

    // Menggunakan guarded agar tidak ada atribut yang bisa diisi secara massal
    protected $guarded = [];

    // Relasi ke model Daftar
    public function daftar(): HasMany
    {
        return $this->hasMany(Daftar::class);
    }
}
