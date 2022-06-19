<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'active', 'description', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
