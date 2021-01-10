<?php

namespace App\Models;

class Menu
{
    private $menu = [
        [
            'title' => 'Главная',
            'alias' => 'about',
        ],
        [
            'title' => 'Новости',
            'alias' => 'news::categories',
        ],
        [
            'title' => 'О компании',
            'alias' => 'about',
        ],
        [
            'title' => 'Админка',
            'alias' => 'admin111',
        ],
    ];

    private $admin_menu = [
        [
            'title' => 'Все категории',
            'alias' => 'admin111',
        ],
        [
            'title' => 'Все новости',
            'alias' => 'admin_news',
        ],
        [
            'title' => 'Добавить новость',
            'alias' => 'news_create',
        ],
        [
            'title' => 'Добавить категорию',
            'alias' => 'category_create',
        ],
    ];



    public function getAdminMenu() {
        return $this->admin_menu;
    }

    public function getMenu() {
        return $this->menu;
    }
}
