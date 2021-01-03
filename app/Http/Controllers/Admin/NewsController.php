<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryOfNewsController;


class NewsController extends Controller
{ 
    public function index() { 
        echo 'Начало'; exit;
    }

    public function createView() {
        $categories = (new CategoryOfNewsController())->getCategories();
        return view('admin.news.create', ['categories' => $categories]);
    }

    public function create(Request $request) {
        //if ($request->isMethod('POST')) {
        //    dd($request->input('news'));
        //}
        //return view('admin.news.create');
        //return response(view('admin.news.create'))
        //    ->header('test', 'newtest');
        //echo "Сохраняем данные";
        return redirect('admin/news/create');
    }
    
    public function update() {
         
    }
}
