<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\sendemail;
class sendemailcontroller extends Controller
{
    public function index()
    {
        
        return view('sendemail');
    }

    public function sendtoemail(Request $request)
    { $data=[
        "prodact_name"=>'samsung a50',
        "price"=>20000,
        "discount"=>"10%"
    ];
        $id=$request->id;
         $user=User::find($request->id);
        //  send a email to user
         $user->notify(new sendemail($user,$data));
         return redirect()->route('home');
    }
}
