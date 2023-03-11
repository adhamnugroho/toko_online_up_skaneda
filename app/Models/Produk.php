<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';


    public function kategori_produk()
    {

        return $this->belongsTo(kategoriProduk::class, 'kategori_produk_id');
    }


    // public function transaksi_detail()
    // {

    //     return $this->belongsTo(kategoriProduk::class, 'kategori_produk_id');
    // }
}
