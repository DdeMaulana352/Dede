<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class input_cs extends Model
{
    protected $table = 'cust_order_cs';

    protected $fillable = ['nama_pel', 'pakaian', 'layanan', 'alamat', 'keterangan'];
}
