<?php

namespace App\Models;
use App\Http\Controllers\DbController;
class News
{
    
    public function getNewsByIdCategory (int $categoryId) {
        $category_news = [];
        $news = (new DbController())->getNews();
        foreach ($news as $keys => $item) {
            if ($item->id_category == $categoryId) {
                array_push($category_news, $item);
            }
        }
        return $category_news;
    }

    public function getNewsById(int $id) {
        $news = (new DbController())->getNews();
        foreach ($news as $item) {
            //$routeName = route('newsOne', $news['id']);
            //dump($routeName);
            if ($item->id == $id) { 
                return $item;
            }
        }
        return [];
    }
}
