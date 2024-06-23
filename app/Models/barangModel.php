<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
    use HasFactory;
    protected $table = "tbl_barang";
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'id_jenisbarang',
        'id_merk',
        'id_satuan',
        'jumlah',
    ];
}
