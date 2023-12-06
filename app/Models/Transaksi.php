<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = true;
    protected $fillable = ['kode_transaksi',  'id_produk', 'metode_pembayaran','tanggal_pengajuan'];
    protected $hidden = ['created_at', 'updated_at'];


public function dataproduk()
{
    return $this->belongsTo(Produk::class, 'id_produk')->withDefault([
        'id_produk' => 'tidak ada',
    ]);
}
}