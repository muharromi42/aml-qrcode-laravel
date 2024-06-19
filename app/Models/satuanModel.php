<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuanModel extends Model
{
    use HasFactory;
    protected $table = "tbl_satuan";
    protected $fillable = [
        'satuan',
        'catatan',
    ];
}
