<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits;
use App\Traits\PhotoTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use PhotoTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case "admin"         :
                return redirect(route('admin.home'));
                break;
            case "manager"       :
                return redirect(route('manager.home'));
                break;
            case "user"          :
                return redirect(route('user.home'));
                break;
            default              :
                return redirect(route('site.welcome'));
        }
    }





        public function updateProfile(Request $request,$id)
        {

            //Validation
            $user=User::find($id);

            $data=$request->only(['name', 'email','country','city','address','about',
                'work','phone','role','status']);
            if($request->hasfile('photo')) {
                $path='images/users';
                $photo=$request->photo;
                $file_name=$this->savePhoto($photo,$path);
                $data['photo']=$file_name;
            }

            if($request->has('password'))
            {
                $data['password']=bcrypt($request->password);
            }
            User::where('id',$id)->update($data);
            return redirect()->route('home')->with(['success'=>'The profile updated successfuly']);

        }
}
