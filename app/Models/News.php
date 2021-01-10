<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class News extends Model
{
    //use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_category',
        'title',
        'description'
    ];

    public function category() {
        return $this->belongsTo(Categories::class, 'id_category')->first();
    }
}
