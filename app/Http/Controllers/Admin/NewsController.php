<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryOfNewsController;
use App\Models\Menu;
use App\Models\Categories;
use App\Models\News;

class NewsController extends Controller
{ 
    public function index(Categories $categories) { 
        return view('admin111', [
            'categories' => $categories::all(),
            'admin_menu' => (new Menu())->getAdminMenu(),
            ]);
    }

    public function indexNews(News $news) { 
        return view('admin_news', [
            'news' => $news::all(),
            'admin_menu' => (new Menu())->getAdminMenu(),
            ]);
    }

    public function updateView($id) { 
        $newsOne = News::find($id);
        //var_dump($categoryOne);
        return view('admin.news.update', [
            'html' => "Изменение новости",
            'admin_menu' => (new Menu())->getAdminMenu(),
            'newsOne' => $newsOne,
        ]);
    }

    public function update(Request $request, $id) { 
        if ($request->isMethod('POST')) {
            $category = News::find($id);
            //dd($category);
            $category->title = $request->input('news')['title'];
            $category->description = $request->input('news')['content'];
            $category->save();
        }
        return redirect('admin');
    }



    public function createView() {
        $categories = Categories::all();
        return view('admin.news.create', [
            'html' => "Добавление новости",
            'admin_menu' => (new Menu())->getAdminMenu(),
            'categories' => $categories,
        ]);
    }

    public function create(Request $request) {
        
        if ($request->isMethod('POST')) {
            $newsOne = new News();
            $newsOne->id_category = $request->input('news')['category'];
            $newsOne->title = $request->input('news')['title'];
            $newsOne->description = $request->input('news')['content'];
            $newsOne->fill($request->all());
            //dd($newsOne);
            $newsOne->save();
        }
        //return view('admin.news.create');
        //return response(view('admin.news.create'))
        //    ->header('test', 'newtest');
        //echo "Сохраняем данные";
        return redirect('admin');
    }
    
}
