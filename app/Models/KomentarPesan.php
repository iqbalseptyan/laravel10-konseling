<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomentarPesan extends Model
{
    use HasFactory;

    protected $table = 'tbl_komentar_pesan';

    protected $guarded = ['id'];

    public function pesan(): BelongsTo
    {
        return $this->belongsTo(Pesan::class, 'id_pesan');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
