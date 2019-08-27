<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\Mail\sendmail;

class UserController extends Controller
{
    public $successStatus = 200;
    public $from_email = 'jatin.dhorajiya@gmail.com';
    public $from_name = 'jatin';
	
	public function mailto(Request $request){ 

        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $inputs = $request->all();
        Mail::to($inputs['email'])->send(new sendmail($request->all()));

        if (Mail::failures()) {
            return response()->json(['error'=>'There was fail to sent mail'], 401);
        }

        return response()->json(['success'=>'Email sent!'], $this-> successStatus);        

    }
}
