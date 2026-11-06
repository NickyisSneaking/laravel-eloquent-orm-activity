<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResource extends Controller
{
    //test run voting system
   public function testRun(Request $request)
    {
        //what am i doing is this right?
       $age = 20;
       $message = $age;
       $payment = $request->payment;  // get payment from request
       

        //if else statement 
        if ($age >= 18){
            echo "you are allowed";
            //if false
        } else {
            echo "too bad you are a minor";
        }
        //response this api 
        return response()->json([
            'age' => $age,
            'message' => $message,
        ]);

    }
}
