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

    public function jenis_barang()
    {
        return $this->belongsTo(jenisBarangModel::class, 'id_jenisbarang');
    }

    public function merk()
    {
        return $this->belongsTo(merkModel::class, 'id_merk');
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanModel::class, 'id_satuan');
    }
}
