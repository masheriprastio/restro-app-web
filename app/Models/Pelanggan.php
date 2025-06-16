<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'idpelanggan';
    public $timestamps = false;

    protected $fillable = [
        'Namapelanggan',
        'Jeniskelamin',
        'Nohp',
        'Alamat',
    ];
}
