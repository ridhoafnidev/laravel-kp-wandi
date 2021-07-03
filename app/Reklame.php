<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reklame extends Model
{
    protected $fillable = [
        'jenis_reklame','user_id', 'lokasi_id', 'alamat', 'jenis', 'qty', 'tinggi', 
        'qty', 'jangka_waktu', 'nsr', 'lebar','panjang', 'status', 'des_jenis'
    ];
    public function lokasi()
    {
        return $this->belongsTo(JenisLokasi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function total()
    {
        return $this->hasMany('App\User');
    }
    public function semua($id){
        $semua= Reklame::all();

        return $semua;
    }
}