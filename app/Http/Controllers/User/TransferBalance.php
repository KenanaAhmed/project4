<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferRequest;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Company;
use App\Models\Transfer;
use App\Traits\PhotoTrait;
use App\Models\MessageResponse;
use App\Models\User;

class TransferBalance extends Controller
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
        $transfers=Transfer::get();
        return view('manager.transfer.index')->with(['transfers'=>$transfers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $account=Account::find($id);
        return view('user.transfer.create')->with(['account'=>$account]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferRequest $request,$id)
    {
        //
        $account=Account::find($id);
        $data=$request->only(['amount','account_id','receiver_number','code']);
        if($request->hasFile('photo')){
            $path='images/transfers';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;
        }
        Transfer::create($data);
        return redirect(route('home'))->with(['success'=>'your transiction send successfly']);


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
    }

    public function accept($id){

        $transfer=Transfer::find($id);


        $account=$transfer->account;
        $company_id=$account->company_id;
        $company=Company::find($company_id)->first();
        $company->balance=$company->balance+1000;
        $company->save();



        // account_id from
        //receiver_number to
        $from=$transfer->account_id;
        $to=$transfer->receiver_number;


        //Get User1 Sender
        $user1=Account::where('id',$from)->first();
        $user2=Account::where(['company_id'=>$company_id,'user_id'=>$to])->first();

        $user1->balance=$user1->balance-$transfer->amount;
        $user1->save();
        $user2->balance=$user2->balance+$transfer->amount;
        $user2->save();

        $transfer->status="accept";
        $transfer->save();

        $massege=new MessageResponse();
        $massege->transfer_id=$transfer->id;
        $massege->user1=$user1->id;
        $massege->user2=$user2->id;
        $massege->massege="The Process done";
        $massege->save();

  return redirect(route('transfer.index'))->with(['success'=>'data has updated successfly']);

    }
}
