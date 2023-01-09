<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContohController extends Controller
{
    public function Contoh(){
        return view('saya');
    }

    public function Halo(){
        $user = User::find(1); //select * from users where id = '1'
        $user = User::where('name', 'naya')->get(); //select * from users where email = 'naya@gmail.com'
        // $user = User::where('name', 'naya')->first(); //select * from users where email = 'naya@gmail.com' limit 1
        return view('saya', compact('user'));
    }


    public function showUser($nama){
        $user = User::where('name',$nama)->firstOrFail();
        // dd($user);
        return view('user', compact('user'));
    }
}
