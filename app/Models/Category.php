<?php

namespace App\Models;

class Category
{

    public function getCategories()
    {
        return static::query()
            //->where('category_id', $categoryId)
            ->get();
    }
}
