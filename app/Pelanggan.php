<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'jk', 'perusahaan', 'tgl_pemesanan', 'alamat_usaha',
    ];
}
