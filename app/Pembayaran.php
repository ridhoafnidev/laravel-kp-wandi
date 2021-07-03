<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['reklame_id', 'bukti_pembayaran','deskripsi'];

    // public function user()
    // {
    //     $reklame = DB::table('reklames')
    //     ->join('users', 'reklames.user_id', '=', 'users.id')
    //     ->join('pembayarans', 'reklames.id', '=', 'pembayarans.reklame_id')
    //     ->select('users.name', 'pembayarans.*')
    //     ->get();      
        
    //     return $reklame;
    // }
    public function reklame() {
        return $this->belongsTo('App\Reklame');
    }
}
