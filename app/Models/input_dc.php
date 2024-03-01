<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class input_dc extends Model
{
    protected $table = 'cust_order_dc';

    protected $fillable = ['nama_pel', 'layanan', 'alamat'];
}
