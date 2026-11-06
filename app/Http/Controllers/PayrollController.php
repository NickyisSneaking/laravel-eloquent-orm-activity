<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //requestn for postman
    public function toilet(Request $request)
    {
        // is this right?
       $age = $request->age;
       $message = "chat bot ai name: " . $age;
       $payment = $request->payment;  // get payment from request
       $employertype = $request->employertype; // get employertype from request
       $posiTier = $request->posiTier;
       $ghosting = $request->ghosting;
       $youLate = $request->youLate;
       $jobwelldone = $request->jobwelldone;
       $grossplay = $request->grossplay; // nagging me?
       $totaldegenerate = $request->totaldegenerate; // you not performing well

       //We are cosco guysS check me
       if ($employertype == "COSCOGUYS") {
            $message = "You are a COSCOGUYS employee";
            $baseSalary = 18000;
            $sss = 0;
            $phillhealth = 0;
            $pagibig = 0;

            //partime hahahah!
        } elseif ($employertype == "parttime" && $posiTier == "junior") {
            $message = "You are a parttime employee";
            $baseSalary = 25000;
            $sss = 1125;
            $phillhealth = 625;
            $pagibig = 200;

            //you are in the middle
        }elseif ($employertype == "middletime" && $posiTier == "senior") {
            $message = "you dumb but hardworker";
            $baseSalary = 40000;
            $sss = 18000;
            $phillhealth = 1000;
            $pagibig = 200;

            // if you are a minor 
        } else {
        $message = "you are not part of this go back";
        return response()->json([
            'message' => 'be valid because you are not in this' 
        ], 400);
        
        }
        if ($age >= 18){
            echo "oh i bet I,m working on it";
            // i made joke here all codes but it still the samr function
        } else {
            echo "oh sorry you are lost";
        }

        //formula in matrix based on the following not accuratly because im to dumb for this
        $ghosting = $youLate * $ghosting; // formula for absent
        $dailyRate = $baseSalary / 22; // formula for daily rate
        $hourlyRate = $dailyRate / 8;
        $youLate = $ghosting - $totaldegenerate; // formula for late
        $jobwelldone = $jobwelldone  * ($hourlyRate * 1.25);
        $netpay = $grossplay - $baseSalary;
        $totaldegenerate = $sss + $pagibig + $phillhealth; // total deduction of sss phill and pagibig
        $netpay = $grossplay + $totaldegenerate; //formulla for amount of reduction per late and absent
        $grossplay = $baseSalary - $youLate - $ghosting + $jobwelldone;

        //response for codding
        return response()->json([
            'age' => $age, // always $age to function
            'message' => $message, // always $message to function
            'payment' => round($payment, 2), // round to 2 decimal places
            'employertype' => $employertype, // always $employertype to function
            'posiTier' => $posiTier, // always $posiTier to
            'ghosting' => $ghosting, //Absent meaning
            'youLate' => $youLate, // late meaning
            'jobwelldone' => $jobwelldone, //fulltimer you dumbcake
            'grossplay' => round($jobwelldone, 2), // round 2 decimal from jobwelldone
            'sss' => $sss, //sss!
            'phillhealth' => $phillhealth, // phillhealthhhhh!
            'pagibig' => $pagibig, // pag ibig 
            'basesalary' => $baseSalary, // base salary
            'totaldegenerate' => round($baseSalary, 2), //this is childdish codding
            'netpay' => round($netpay, 2),
        ]);
    }
}
