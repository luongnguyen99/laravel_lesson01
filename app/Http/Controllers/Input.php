<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Input extends Controller
{
    public function index()
    {
        return view('input/index');
    }

    public function add()
    {
        return view('input/add');
    }
    public function saveadd(Request $request)
    {
      
            $number1 = $request->input('number1');
            $number2 = $request->input('number2');
            $number3 = $request->input('number3');
            $x;
            if($number1 == 0){
                $x = - $number3/$number2;
            }else{
                $result =  ($number2*$number2) - 4*$number1*$number3;
                if($result < 0 ){
                    $x = 'vô nghiệm';
                 return view('input/output',['x' => $x]);

                }elseif($result == 0){
                    $x = 'Phương trình có nghiệm kép: '. - $number2/(2*$number1);
                 return view('input/output',['x' => $x]);

                }elseif($result > 0){
                    $x1 = (- $number2 + sqrt($result))/ (2*$number1);
                    $x2 = (- $number2 - sqrt($result))/ (2*$number1);
                  return view('input/output',['x1' => 'Phương trình có 2 nghiệm phân biệt là : '.$x1,'x2' => $x2]);

                }
            }
            
            
       

        return view('input/output',['ket_qua' => $result,'number1' => $number1,'number2' => $number2 ]);

    }
}
