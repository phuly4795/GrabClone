<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'icon',
    ];

    public function categoryDeail() {
        return $this->HasMany(CategoryDetail::class);
    }

}
