<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'email',
        'alamat'
    ];

    public function mataKuliahs()
    {
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_mata_kuliah');
    }
}
