<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'category_id'
    ];

    public function cateogry() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
