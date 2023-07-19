<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cluster extends Model
{
    use HasFactory;
    protected $table = 'tbl_cluster';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'qty',
        'stock'
    ];
}
