<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller{
    
    
    
    public function palindrome($request){
        if (strrev($request) == $request){ 
            echo "Palindrome"; 
        }
        else{ 
            echo "Not Palindrome"; 
        }
    }
    
    public function seconds(){
        $diffInYears   = date('Y') - 1732;
        $diffInMonths  = date('m') - 4;
        $diffInDays    = date('d') - 14;
        if($diffInMonths < 0){
            $diffInMonths = 12 + $diffInMonths;
            $diffInYears--;
        }
        if($diffInDays < 0){
            $diffInDays = 30 + $diffInDays;
            $diffInMonths--;
        }
        $totaldays = ($diffInYears * 365) + ($diffInMonths * 30) + $diffInDays;
        $seconds =  $totaldays * 24 * 60 * 60;
        echo $seconds . " seconds";
    }
    public function text(){
        $text = Http::get('https://icanhazdadjoke.com/slack')->json();
        echo $text['attachments'][0]['text'];
    }
    public function beer(){
        $text = Http::get('https://api.punkapi.com/v2/beers')->json();
        $count = count($text);
        $random = rand(0, $count - 1);
        echo json_encode($text[$random]['ingredients']);
    }
    public function teams(){
        $students = Http::get('https://api.punkapi.com/v2/beers')->json();
        $count = count($students);
        $j=0;
        if($count%2 == 0){
            for($i = 0; $i < $count; $i=+2){
                $teams[$j]= array($students[$i], $students[$i+1]);
                $j++;
            }
        }
        else{
            for($i = 0; $i < $count-1; $i=+2){
                $teams[$j]= array($students[$i], $students[$i+1]);
                $j++;
            }
            $teams[$j+1]= array($students[$count-1], " ");
        }

        echo json_encode($teams);
    }
    public function nominee() {
        $students = Http::get('https://api.punkapi.com/v2/beers')->json();
        $count = count($students);
        $students[$count] = "Pablo";
        $students[$count+1] = "Pablo";
        $students[$count+2] = "Pablo";
        $random = rand(0, $count +2);
        echo json_encode($teams[$random]);
    }
}