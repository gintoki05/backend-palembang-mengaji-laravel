<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public $timestamps = false;
	protected $fillable = 
        ['masjid', 'waktu', 'pengisi', 'tema', 'hari', 'tanggal', 'kategori'];
}
