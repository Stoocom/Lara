<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryOfNewsController;
use App\Models\Menu;
use App\Models\Categories;
use App\Models\News;

class NewsController extends Controller
{ 

    // public function __construct() {
    //     $this->middleware = ['locale'];
    // }

    public function index(Categories $categories) {
        //echo __('test.test'); exit; 
        //dd(\App::getLocale());
        return view('admin111', [
            'categories' => $categories::all(),
            'admin_menu' => (new Menu())->getAdminMenu(),
            ]);
    }

    public function indexNews() { 
        $news = News::query()
            ->paginate(10);
        return view('admin_news', [
            'news' => $news,
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
        
        $rules = [
            'title' => 'required|min::5|max:255|unique:news',
            'content' => 'required',
        ];
        
        
        if ($request->isMethod('POST')) {
            //dd($request);
            
            $newsOne = News::find($id);
            $newsOne->title = $request->input('news')['title'];
            $newsOne->description = $request->input('news')['content'];
            $newsOne->save();
        }
        return redirect('admin');
    }

    public function createView() {
        //$categories = Categories::all();
        return view('admin.news.create', [
            'html' => "Добавление новости",
            'admin_menu' => (new Menu())->getAdminMenu(),
            //'categories' => $categories,
            'categories' => $this->getCategoriesList(),
        ]);
    }

    public function create(AdminNewsCreateRequest $request) {
        
        
        //dd(\Session::all());

        //$this->validate($request, News::rules(), ['required' => "Прошу тебя заполни поле :attribute"],  ['news.title' => 'Заголовок']);

        // $validator = \Validator::make(
        //     $request->all(),
        //     // [
        //     //     'id' => 'ggjfhk',
        //     //     'content' => '1111111111',
        //     // ],
        //     [
        //         'id' => 'integer',
        //         'content' => 'max:255',
        //     ]
        // );
        //dd($validator->fails(),$validator->failed());

        //echo __('test'); exit;

        if ($request->isMethod('POST')) {
            $newsOne = new News();
            //dd($newsOne);
            $newsOne->id_category = $request->input('news')['id_category'];
            //Без строчки выше возникает ошибка почему-то!
            $newsOne->title = $request->input('news')['title'];
            $newsOne->description = $request->input('news')['content'];
            $newsOne->fill($request->all());
            //dd($newsOne);
            $newsOne->save();
        }
        
        return redirect('admin');
    }

    public function getCategoriesList() {
        return Categories::query()
            ->select(['id', 'title'])
            ->get();
    }

    
}
