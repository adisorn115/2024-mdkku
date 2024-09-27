<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function showinfo(){
        $name ="Manman";
        $phone = "09-000-8885";
        $address = "khonkaen";

        return view('showinfo',[
            'name'=>$name,
            'phone'=>$phone,
            'address'=>$address
        ]);

    }
}
