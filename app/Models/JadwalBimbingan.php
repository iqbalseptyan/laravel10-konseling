<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    use HasFactory;

    protected $table = 'tbl_jadwal_bimbingan';

    protected $guarded = ['id'];
}
