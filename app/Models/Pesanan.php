<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
     protected $table = 'pesanan';
    protected $primaryKey = 'idpesanan';
    public $timestamps = false;

    protected $fillable = ['idmenu', 'idpelanggan', 'jumlah', 'iduser'];

    public function menu() {
        return $this->belongsTo(Menu::class, 'idmenu');
    }

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'idpelanggan');
    }

    public function user() {
        return $this->belongsTo(UserModel::class, 'iduser');
    }
}
