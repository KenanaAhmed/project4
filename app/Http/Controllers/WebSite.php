<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Manager;
use App\Models\User;
use App\Traits\PhotoTrait;
use Illuminate\Support\Facades\Hash;

class WebSite extends Controller
{
    //
    use PhotoTrait;
    public function index(){
        $companies=Company::get();
        $cities=City::get();
        $managers=User::where('role','manager')->get();

        return view('index')->with(['companies'=>$companies,'managers'=>$managers,'cities'=>$cities]);
    }

    public function show($id){
        $company=Company::find($id);
        return view('companyDetalis')->with(['company'=>$company]);
    }

    public function companiesCity($id){

        $city=City::find($id);
        $companies=$city->companies;
        return view('companies_cities')->with(['companies'=>$companies]);

    }

    public function registerManager(){

        return view('auth.registerManager');
    }

    public function registerManagerStore(ManagerRequest $request){
        $data=$request->only('name', 'email','company_name','company_location','company_description');
        if($request->hasFile('photo')){
            $path='images/managers';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;
        }
        if($request->has('password'))
        {
            $data['password']=Hash::make($request->input('password'));
        }
        Manager::create($data);
        return redirect()->route('regester.manager')->with(['success'=>'Your Request Send Successfly']);

    }
}
