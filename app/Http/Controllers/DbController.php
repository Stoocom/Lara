<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function getCategories() {

        return DB::select("SELECT * FROM categories");

    }
    public function getNews() {

        return DB::select("SELECT * FROM news");

    }
}