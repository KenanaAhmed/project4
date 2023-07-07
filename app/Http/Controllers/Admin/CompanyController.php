<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\City;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Traits\PhotoTrait;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use PhotoTrait;
    public function index()
    {
        //
        $companies=Company::get();
        return view('back.companies.index')->with(['companies'=>$companies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities=City::get();
        $users=User::where('role','manager')->get();
        return view('back.companies.add')->with(['cities'=>$cities,'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data=$request->only(['name','location','description','status','user_id','city_id']);
        if($request->hasFile('photo')){
            $path='images/companies';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;
        }
       $company=Company::create($data);

        $profile=new CompanyProfile();
        $profile->information="undefined";
        $profile->members="undefined";
        $profile->conditions="undefined";
        $profile->company_id=$company->id;
        $profile->email="undefined@gmail.com";
        $profile->save();
        return redirect(route('companies.index'))->with(['success'=>'The Company has added successfly']);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company=Company::find($id)->first();
        $cities=City::get();
        $users=User::where('role','manager')->get();
        return view('back.companies.add')->with(['company'=>$company,'cities'=>$cities,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->only(['name','location','description','status','user_id','city_id']);
        if($request->hasFile('photo')){
            $path='images/companies';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;
        }
        Company::where('id',$id)->update($data);
        return redirect(route('companies.index'))->with(['success'=>'The Company has updated successfly']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
