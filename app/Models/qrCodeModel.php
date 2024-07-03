<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qrCodeModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_qr_code';

    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(barangModel::class, 'id_barang');
    }
}
