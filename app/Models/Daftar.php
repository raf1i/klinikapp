<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Daftar extends Model
{
    use HasFactory, SearchableTrait;

    // Atur atribut yang boleh diisi secara massal
    protected $guarded = [];

    // Atur cast atribut untuk tipe data
    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    // Konfigurasi pencarian dengan SearchableTrait
    protected $searchable = [
        'columns' => [
            'pasiens.no_pasien' => 2,
            'pasiens.nama' => 2,
            'polis.nama' => 3,
        ],
        'joins' => [
            'pasiens' => ['daftars.pasien_id', 'pasiens.id'],
            'polis' => ['daftars.poli_id', 'polis.id'],
        ],
    ];

    // Relasi ke model Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke model Poli
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
