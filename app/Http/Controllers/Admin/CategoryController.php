<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Controllers\Admin\Request;
use App\Models\Menu;
use App\Models\Categories;

class CategoryController extends Controller
{ 
    public function index() { 
        echo 'Начало'; exit;
    }

    public function createView() {
        return view('admin.category.create');
    }

    public function create(Request $request) {
        
        if ($request->isMethod('POST')) {
            //dd($request->input('news')['title']);
            $category = new Categories();
            $category->title = $request->input('news')['title'];
            $category->fill($request->all());
            //dd($category);
            $category->save();
        }
        return redirect('admin');
    }
    
    public function updateView($id) {
        $categoryOne = Categories::find($id);
        //var_dump($categoryOne);
        return view('admin.category.update', [
            'html' => "Изменение категории",
            'admin_menu' => (new Menu())->getAdminMenu(),
            'category' => $categoryOne,
        ]);
    }
    public function update(Request $request, $id) {
        //var_dump($request->all());
        if ($request->isMethod('POST')) {
            $category = Categories::find($id);
            //$category->title = $request->input('news')['title'];
            $category->fill($request->all());
            $category->save();
        }
        return redirect('admin');
    }
}
