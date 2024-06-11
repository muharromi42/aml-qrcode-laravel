<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisBarangModel extends Model
{
    use HasFactory;

    protected $table = "tbl_jenisbarang";
    protected $fillable = [
        'kategori',
        'catatan',
    ];
}
