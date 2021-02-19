<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    public $primaryKey = 'id';

    protected $table = 'webs';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'nama_web',
        'tentang',
        'gambar_tentang',
        'instagram',
        'whatsapp',
        'twitter',
        'youtube',
        'facebook',
        'logo',
        'user_id'
    ];
}
