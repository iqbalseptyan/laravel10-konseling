<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pesan';

    protected $guarded = ['id'];

    public function tujuan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_tujuan');
    }
}
