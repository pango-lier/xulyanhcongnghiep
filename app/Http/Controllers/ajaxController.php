<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Mail\contactMail;
use Mail;
class ajaxController extends Controller
{
    //
    public function postMail(Request $request)
    {
        $mail=$request->all();
        Mail::to("kinhdoanh11.bt@gmail.com")->send(new contactMail($mail));
        return redirect('/');
    }

    public function addToCart(){

    }

}
