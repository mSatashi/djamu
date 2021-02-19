<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $primaryKey = 'id';

    protected $table = 'products';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'komposisi',
        'manfaat',
        'isi',
        'harga',
        'penjual'
    ];

    public function getRouteKeyName() {
        return 'nama_produk';
    }
}
