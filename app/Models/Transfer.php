<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable=['account_id','receiver_number','code','amount','photo','status'];


    public function sender($id){

        $account=Account::find($id);
        $name=$account->user->name;
        return $name;

    }

    public function reciver($id){
        $user=User::find($id);
        $name=$user->name;
        return $name;
    }
/*
    public function account($id){
        $account=Account::find($id);
        return $account;
    }
    */

    public function condition($id){

        $transfer=Transfer::find($id);


        //check company
        $from=$this->account($transfer->account_id);
        $to=$this->account($transfer->receiver_number);
        if($from->company_id==$to->company_id)
           {
             //check balance

             if($from->balance >= $transfer->amount){

                $from->balance=$from->balance-$transfer->amount;
                $from->save();

                $to->balance=$to->balance+$transfer->amount;


             }

             return true;
           }

        else
              return false;



    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

}
