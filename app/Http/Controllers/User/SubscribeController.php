<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use Illuminate\Http\Request;
use App\Traits\PhotoTrait;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Company;

class SubscribeController extends Controller
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
        $company=Company::where('user_id',Auth::user()->id)->first();
        $subscribes=Subscribe::where('company_id',$company->id)->get();
        return view('manager.subscribers.index')->with(['subscribes'=>$subscribes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscribeRequest $request)
    {
        //
        $test=Subscribe::where('user_id',Auth::user()->id)->first();
       // return $test;
       if(!$test){

        $data=$request->only(['user_id','company_id','email']);
        if($request->hasFile('photo')){
            $path='images/subscribers';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;
        }
        Subscribe::create($data);
        return redirect(route('companyDetalis.show',$data['company_id']))->with(['success'=>'your request send successfly']);
       }
       else{
        $company_id=$request->company_id;
        return redirect(route('companyDetalis.show',$company_id))->with(['error'=>'sorry you have request recently']);
       }
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
        $subscribe=Subscribe::find($id);
        $account=Account::where('company_id',$subscribe->company_id)->first();
        if($account)
           $account->delete();
        $subscribe->delete();
        return redirect(route('subscribe.index'))->with(['success','data has updated successfly']);




    }

    public function accept($id){

        $subscribe=Subscribe::find($id);
        //id user_id email photo status
        $account=Account::where('user_id',$subscribe->user_id)->first();
      //  return $account;
        if($account)
          return view('manager.subscribers.accept')->with(['subscribe'=>$subscribe,'account'=>$account]);
        else
            return view('manager.subscribers.accept')->with(['subscribe'=>$subscribe]);
    }

    public function accepted(Request $request,$id){
        $validatedData = $request->validate([
            'code' => 'required',
            'balance' => 'required',
        ]);


        $subscribe=Subscribe::find($id);

        $account=Account::where('user_id',$subscribe->user_id)->first();
        if($account)
        {
            $account->company_id=$subscribe->company_id;
            $account->user_id=$subscribe->user_id;
            $account->code=$request->code;
            $account->photo=$subscribe->photo;
            $account->balance=$request->balance;
            $account->status="active";
            $account->save();
        }
        else{
            $account=new Account();
            $account->company_id=$subscribe->company_id;
            $account->user_id=$subscribe->user_id;
            $account->code=$request->code;
            $account->photo=$subscribe->photo;
            $account->balance=$request->balance;
            $account->status="active";
            $account->save();
        }

        //update subscribe
        $subscribe->status="ok";
        $subscribe->save();
        return redirect(route('subscribe.index'))->with(['success','data has updated successfly']);

    }
    public function unaccept($id){
        $subscribe=Subscribe::find($id);
        $account=Account::where('user_id',$subscribe->user_id)->first();
        $subscribe->status="notOk";
        $account->status="decline";
        $subscribe->save();
        $account->save();
        return redirect(route('subscribe.index'))->with(['success','data has updated successfly']);
    }
}
