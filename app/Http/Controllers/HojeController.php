<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HojeController extends Controller
{
    public function teste($num=null) {
        echo "Teste - Controller - Hoje<br>";
        if (isset($num)) {
            echo "num = $num";
        }
    }

    public function tab($number=2,$start=0,$end=10) {
        HojeController::calc($number,$start,$end);
    }

    public function calc($number=2,$start=0,$end=10) {
        for ($x=$start; $x <= $end; $x++) {
            echo $number." x ".$x." = ".($x*$number)."<br>";
        }
    }
}
