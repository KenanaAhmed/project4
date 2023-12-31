<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $accounts=Account::where('user_id',Auth::user()->id)->get();
        return view('home')->with(['accounts'=>$accounts]);
    }

}
