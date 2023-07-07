<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyProfile;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\PhotoTrait;

class UserController extends Controller
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
        $users=User::get();
        return view('back.users.display')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password'=>'required|min:8',
            'role'=>'required'
        ]);

        $data=$request->only('name', 'email','role');
        if($request->has('password'))
        {
            $data['password']=Hash::make($request->input('password'));
        }
        User::create($data);
        return redirect()->route('users.create')->with(['success'=>'user has added successfly']);


    }
    public function managers(){
        $users=Manager::get();
        return view('back.users.managers')->with(['users'=>$users]);
    }

    public function managersDelete($id){
        $manager=Manager::find($id);
        $manager->delete();
        return redirect(route('managers.index'))->with(['success'=>'Request Has Deleted Successfly']);
    }

    public function managerEdit($id){
        $manager=Manager::find($id);
        $cities=City::get();

        return view('back.users.managerAccept')->with(['manager'=>$manager,'cities'=>$cities]);
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
        $user=User::find($id);
        return view('back.users.add')->with(['user'=>$user]);

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
        $data=$request->only('name', 'email','role','status');
        if($request->has('password'))
        {
            $data['password']=Hash::make($request->input('password'));
        }
        User::where('id',$id)->update($data);
        return redirect()->route('users.create')->with(['success'=>'user has added successfly']);
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

    public function managerCreate(Request $request,$id){

        $manager=Manager::find($id);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->status=$request->status;
        $user->role=$request->role;
        $user->save();

        $company=new Company();
        $company->name=$request->company_name;
        $company->location=$request->company_location;
        $company->description=$request->company_description;
        $company->city_id=$request->city_id;
        $company->user_id=$user->id;
        $company->status=1;
        $company->photo=$manager->photo;
        $company->save();

        $profile=new CompanyProfile();
        $profile->information="undefined";
        $profile->members="undefined";
        $profile->conditions="undefined";
        $profile->company_id=$company->id;
        $profile->email="undefined@gmail.com";
        $profile->save();



        $manager->delete();

        return redirect(route('managers.index'))->with(['success'=>'A Company Added Successfly']);




    }
}
