<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\support\Facades\Auth;



class changepasscontroller extends Controller
{
    public function index()
    {
        return view('passwordchangetable');
    }

    public function change(Request $request)
    {
       $id=auth::user()->id;
      $oldpass= $request->oldpassword ;
      $newpass= $request->newpassword ;
      echo $newpass;
      $dboldpass= auth::user()->password ;
      if(Hash::check($oldpass,$dboldpass))
      {
        $data=User::find($id);
     $data->password=Hash::make($newpass);
     $data->save();
     auth::logout();
     return redirect()->route('login')->with('message','password change successfull');
      }
     else{
        return redirect()->back()->with('message','password change not successfull');
     }
    
     
     
    }
}
