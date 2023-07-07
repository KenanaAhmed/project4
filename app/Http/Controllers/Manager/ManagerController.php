<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;

class ManagerController extends Controller
{
    //
    public function index(){

       $id= Auth::user()->id;
       $company=Company::where('user_id',$id)->first();
       $profile=$company->profile;
        return view('manager.companies.profile')->with(['company'=>$company,'profile'=>$profile]);
    }

    public function profile($id){

        $user=User::find($id)->first();

         return view('manager.profile')->with(['user'=>$user]);


      }
}
