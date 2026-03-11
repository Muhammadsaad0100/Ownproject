<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
   public function alluser(){
    $user=User::where('status','0')->get();
           return view('dashboard', compact('user'));

   }
}
