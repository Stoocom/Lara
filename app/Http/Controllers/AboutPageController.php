<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;


class AboutPageController extends Controller
{ 
    public function index()
    {
       return view('about_page', ['param' => $name = "Guest!"]);
    }

}