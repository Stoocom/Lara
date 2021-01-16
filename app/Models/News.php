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

    public static function rules() {
        return [
            'news.title' => 'required|min:5|max:255|unique:news',
            'news.content' => 'required',
            'news.id_category' => 'required|exists:categories,id|integer',
        ];
    }
    
    public function category() {
        return $this->belongsTo(Categories::class, 'id_category')->first();
    }
    
}
