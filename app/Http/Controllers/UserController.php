<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public Function EditUser($uid) {
      $user = User::where('id', $uid)->first();
      return view('useredit', ['user' => $user]);
    }
}
