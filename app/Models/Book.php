<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'category_id',
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',
        'cover_image',
        'sinopsis',
        'penerbit',
        'pengarang'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // 1 Book milik 1 Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}