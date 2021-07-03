<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NSR_Produk extends Model
{
   protected $fillable = [
       'lokasi_id', 'ukuran', 'jangka_waktu', 'ketinggian', 'nsr'
   ];

   public function lokasi()
   {
       return $this->belongsTo(JenisLokasi::class);
   }
}
