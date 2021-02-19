<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumboSlider extends Model
{
    public $primaryKey = 'id';

    protected $table = 'jumbo_sliders';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'judul',
        'isi',
        'tulisan_link',
        'link',
        'gambar'
    ];
}
