<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiramideController extends Controller
{
    public function calc($h,$ab,$tinta) {
        $hipo = sqrt($h*$h+$ab*$ab);
        $areaTriangulo = $ab*$hipo;
        $areaBasePiramide = ($ab*2)*($ab*2);
        $areaPiramide = $areaBasePiramide+($areaTriangulo*4);
        $volumePiramide = (1/3)*$areaBasePiramide*$h;
        $litros = $areaPiramide / 4.76;
        $latas = ceil($litros / 18);
        $preco = 0;
        if ($tinta == 1) {
            $preco = 127.9;
        } elseif ($tinta == 2) {
            $preco = 258.98;
        } elseif($tinta == 3) {
            $preco = 344.34;
        }
        $precoTotal = $latas * $preco;

        echo "ab: $ab<br>";
        echo "h: $h<br>";
        echo "a1: $hipo<br>";
        echo "Área Triângulo: $areaTriangulo<br>";
        echo "Área Base: $areaBasePiramide<br>";
        echo "Área Total: $areaPiramide<br>";
        echo "Tipo de Tinta: $tinta<br>";
        echo "Litros: $litros<br>";
        echo "Latas: $latas<br>";
        echo "Preço: $precoTotal<br>";
        echo "Volume: $volumePiramide<br>";
        echo "<a href=\"http://127.0.0.1:8000/piramide/$h/$ab/$tinta\">PiramideSemController</a>";
    }
}
