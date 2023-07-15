<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cluster extends Model
{
    use HasFactory;
    protected $table = 'cluster_contoh';

    protected $fillable = [
        'tanggal',
        'id_alternatif',
        'qty',
        'stock'
    ];
}
