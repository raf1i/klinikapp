<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Daftar extends Model
{
    use HasFactory;

    // Atur atribut yang boleh diisi secara massal
    protected $fillable = [
        'pasien_id',
        'poli_id',
        'tanggal_daftar',
        'keluhan',
        'diagnosis',
        'tindakan'
    ];

    // Cast tanggal_daftar sebagai tanggal
    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    // Relasi ke model Pasien
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke model Poli
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class);
    }
}
