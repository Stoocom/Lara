<?php

namespace App\Models;

class Menu
{
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

    public function getMenu() {
        return $this->menu;
    }
}
