<?php

namespace App\Models;

use App\Models\Siswa\PesertaBimbingan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalBimbingan extends Model
{
    use HasFactory;

    protected $table = 'tbl_jadwal_bimbingan';

    protected $guarded = ['id'];

    public function peserta_bimbingan(): HasMany
    {
        return $this->hasMany(PesertaBimbingan::class, 'id_jadwal_bimbingan');
    }
}
