<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DbController;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{ 

    
    public function index(Categories $categories) { 
        //$categories = (new DbController())->getCategories();
        return view('categories', [
            'html' => "Категории",
            'categories' => $categories::all(),
            ]);
    }
    public function list($categoryId) {
        
        $newsOne = News::query()
            ->where('id_category', $categoryId)
            ->get();
        
        return view('news', 
            [
                'news' => $newsOne
            ]);
        
    }

    public function getOneNews($id) {
        $newsOne = News::find($id);
        return view('news_one', 
            [
                'one' => $newsOne
            ]); 
    }
        
    private function getNewsById($id) {

        foreach ($this->news as $news) {
            //$routeName = route('newsOne', $news['id']);
            //dump($routeName);
            if ($news['id'] == $id) { 
                return $news;
            }
        }
        return [];
    }

    

    public function showCategories()
    {
        return view('categories', [
            'html' => "Категории",
            'categoriesOfNews' => $this->categoriesOfNews
            ]);
    }

    public function getNewsFromCategory($id) {
        $html = "Категории";
        return view('categoryOfNews', [
            'html' => $html,
            'category_news' => $this->getNewsByIdCategory($id)
            ]);
    }

    private function getNewsByIdCategory($id) {
        $category_news = [];
        foreach ($this->news as $keys => $item) {
            if ($item['id_category'] == $id) {
                array_push($category_news, $item);
            }
        }
        return $category_news;
    }


}
