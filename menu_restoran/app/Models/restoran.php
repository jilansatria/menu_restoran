<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restoran extends Model
{
    use HasFactory;

    protected $table = "restoran";
    protected $fillable = [
        'kode_menu', 'jenis_menu', 'nama_menu', 'stok_menu', 'harga' 
    ];
}
