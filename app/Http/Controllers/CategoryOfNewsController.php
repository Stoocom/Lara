<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryOfNewsController extends Controller
{ 

    private $categoriesOfNews = [
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

    private $news = [
        [
            'id' => '1',
            'id_category' => '3',
            'title' => "Apple's stock grows up",
            'description' => "Apple company taked 2 trillion dollars value on stock market in USA. 
            Because giving on market very popular and strong new version of mobile device - iphone 12. 
            Many analitics sais that this phone is change of all iphone's circle"
        ],
        [
            'id' => '2',
            'id_category' => '3',
            'title' => "NASDAQ takes record",
            'description' => "NASDAQ is taking new record early every week. 
            Because Federal Reserval Center (FRC) give much cash dollars to world economical. 
            The common opinion of many alalitics is after growing always goes down lock"
        ],
        [
            'id' => '3',
            'id_category' => '1',
            'title' => "Russian club Krasnodar goes to next round of UEFA",
            'description' => "Just only russian football club Krasnodar from city with similar name goes to group part of UEFA"
        ],
    ];
    
    public function getCategories()
    {
        $array = [];
        foreach ($this->categoriesOfNews as $key => $item) {
            $array[] = $item['title'];
        }
        return $array;
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