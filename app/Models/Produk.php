<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    public $incrementing = true;
    protected $fillable = ['kode_produk', 'nama_produk', 'harga_produk'];
    protected $hidden = ['created_at', 'updated_at'];
}
 