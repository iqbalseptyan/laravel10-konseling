<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Konseling extends Model
{
    use HasFactory;

    protected $table = 'tbl_konseling';

    protected $guarded = ['id'];

    public function konseling_siswas(): HasMany
    {
        return $this->hasMany(KonselingSiswa::class, 'id_konseling');
    }

    public function konselor(): BelongsTo
    {
        return $this->belongsTo(Konselor::class, 'id_konselor');
    }
}
