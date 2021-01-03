<?php

namespace App\Models;

class News
{
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

    public function getNewsByIdCategory (int $categoryId) {
        $category_news = [];
        foreach ($this->news as $keys => $item) {
            if ($item['id_category'] == $categoryId) {
                array_push($category_news, $item);
            }
        }
        return $category_news;
    }

    public function getNewsById(int $id) {

        foreach ($this->news as $news) {
            //$routeName = route('newsOne', $news['id']);
            //dump($routeName);
            if ($news['id'] == $id) { 
                return $news;
            }
        }
        return [];
    }
}
