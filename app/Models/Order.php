<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $primaryKey = 'id';

    protected $table = 'orders';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'tanggal',
        'provinsi',
        'kota',
        'alamat',
        'ekspedisi',
        'kode_pos',
        'berat',
        'total_harga',
        'status',
        'user_id'
    ];
}
