<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Requests\ProfileCreateRequest;
use Illuminate\Session;
use Illuminate\Support\Facades\Route;;

use App\Models\Menu;
use App\Models\Categories;
use App\Models\News;

class ProfileController extends Controller
{

    public function update(Request $request)
    {
        //dd(\Session::all());
        
        $user = \Auth::user();

        if ($request->isMethod('post')) {
            
            if (\Hash::check($request->post('current_password'), $user->password)) {
                $password = $request->post('password');
                if (!empty($password)) {
                    $user->password = \Hash::make($request->post('password'));
                }
                $user->name = $request->post('name');
                $user->email = $request->post('email');
                $user->save(); 
            } 
            // else {
            //     $errors['current_password'][] = 'Пароль указан не верно';
            // }
            return redirect('admin/profile/update');
        }

        return view('admin.profile.update', ['user' => $user]);
    }
}
