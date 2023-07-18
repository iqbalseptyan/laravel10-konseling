<?php

namespace App\Models\Siswa;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaBimbingan extends Model
{
    use HasFactory;

    protected $table = 'tbl_peserta_bimbingan';

    protected $guarded = ['id'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
