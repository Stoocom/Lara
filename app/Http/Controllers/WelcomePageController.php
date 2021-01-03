<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;


class WelcomePageController extends Controller
{ 
    public function index()
    {
       return view('welcome', ['param' => $name = "Guest!"]);
    }

}