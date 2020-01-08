<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class emailvarifycontroller extends Controller
{
    public function index($usetoken)
    {
        $data=user::where('verify_token',$usetoken)->first();
        if($data)
        {
            if($data->verifyEML==0)
            {
                $data->verifyEML=1;
                $data->save();
                echo "verify is comlited";
            }
            elseif($data->verifyEML==0){
                   echo "your email already verifyed";
            }
            else{
                echo "error";
            }
        }
        else{
           echo "error";
        }


    }
}
