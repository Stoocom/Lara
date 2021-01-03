<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{ 
    private $categories = [
        1 => [
            'title' => 'sport',
        ],
        2 => [
            'title' => 'political',
        ],
        3 => [
            'title' => 'stock_market',
        ],
    ];

    private $menu = [
        [
            'title' => 'Главная',
            'alias' => 'home',
        ],
        [
            'title' => 'Новости',
            'alias' => 'news::categories',
        ],
        [
            'title' => 'О компании',
            'alias' => 'about',
        ],
    ];
    
    public function index() { 
        return view('categories', [
            'html' => "Категории",
            'categoriesOfNews' => $this->categories,
            ]);
    }
    public function list($categoryId) {
        $newsOne = (new News())->getNewsByIdCategory($categoryId);
        return view('news', 
            [
                'newsOne' => $newsOne
            ]);
        
    }

    public function getOneNews($id) {
        $newsOne = (new News())->getNewsById($id);
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
