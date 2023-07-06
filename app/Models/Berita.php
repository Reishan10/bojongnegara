<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'kategori_id',
        'tag',
        'slug',
        'status',
        'views',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
