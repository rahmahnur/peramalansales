<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id_sales';
    public $incrementing = true;
    protected $fillable = ['kode_sales', 'nama_sales', 'umur', 'alamat'];
    protected $hidden = ['created_at', 'updated_at'];
}
