<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use Illuminate\Session;
use App\Http\Controllers\CategoryOfNewsController;
use App\Models\Menu;
use App\Models\Categories;
use App\Models\News;

class LangChangeController extends Controller
{ 

    public function index($lang) {
        //dd('Hello');
        session()->put('local', $lang);
        //dump(session()->get('local'));
        return redirect()->back();
    }
  
}
