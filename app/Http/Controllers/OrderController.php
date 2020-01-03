<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\orderEmail;
use App\order;
use App\user;
use Auth;

class OrderController extends Controller
{
    public function order(Request $request)
    {  
       $userinfo=user::find(auth::user()->id);
       $orderdata=new order;
       $orderdata->shipping_address=$request->shipping_address;
       $orderdata->phone_number=$request->phone_number;
       $orderdata->user_id=$request->user_id;
       $orderdata->price=$request->price;
       $data=$orderdata->save();

      

    $userinfo->notify(new orderEmail($userinfo,$orderdata));
   
    return Redirect()->back()->with('sms', 'email send success');



      
   
    }
}
