<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produk';
    protected $primaryKey = 'id_kategori_produk';


    public function product()
    {
        return $this->hasMany(Produk::class, 'kategori_produk_id');
    }
}
