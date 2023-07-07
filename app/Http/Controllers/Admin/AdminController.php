<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\City;

class AdminController extends Controller
{
    //
    public function index(){
        return view('back.back');
    }

    public function profile($id){

      $user=User::find($id)->first();

       return view('back.profile')->with(['user'=>$user]);


    }

    public function counts()
    {
        $countUser=User::get()->where('role','user')->count();
        $countManager=User::get()->where('role','manager')->count();
        $countAdmin=User::get()->where('role','admin')->count();
        $companies=Company::get()->count();
        $cities=City::get()->count();
        return view('back.counts')
            ->with(['countUser'=>$countUser,'countManager'=>$countManager,
                    'countAdmin'=>$countAdmin,'companies'=>$companies,
                   'cities'=>$cities]);

    }
}
