<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HojeController;
use App\Http\Controllers\PiramideController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Home - GET";
});

Route::post('/', function () {
    return "Home - POST";
});

Route::put('/', function () {
    return "Home - PUT";
});

Route::delete('/', function () {
    return "Home - DELETE";
});

Route::get('/teste', function () {
    return "Teste";
});

Route::get('/tab/{number}/{start}/{end}', function ($number,$start,$end) {
    for ($x=$start; $x <= $end; $x++) {
        echo $number." x ".$x." = ".($x*$number)."<br>";
    }
})->where("number","[0-9]+")->where("start","[0-9]+")->where("end","[0-9]+");

Route::get('/valida/{texto}/{numero}', function ($texto,$numero) {
    return "Texto: $texto <br>Número: $numero";
})->where("texto","[A-z]+")->where("numero","[0-9]+");

Route::prefix('/app')->group(function () {
    Route::get('/', function () {
        return "app - home";
    });
    Route::get('/teste', function () {
        return "app - teste";
    });
});

Route::get('/piramide/{h}/{ab}/{tinta}', function ($h,$ab,$tinta) {
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
    echo "<a href=\"http://127.0.0.1:8000/piramidec/$h/$ab/$tinta\">PiramideController</a>";
})->where("h","[0-9]+")->where("ab","[0-9]+")->where("tinta","[1-3]+");

Route::get('/jogadores', function () {
    echo "1 - Neymar<br>";
    echo "2 - Pelé<br>";
    echo "3 - Zico<br>";
});

Route::redirect('players','jogadores');

Route::get('/hoje/{num?}',[HojeController::class, 'teste'])->where("num","[0-9]+");
Route::get('/hoje/tab/{number?}/{start?}/{end?}',[HojeController::class, 'tab'])->where("number","[0-9]+")->where("start","[0-9]+")->where("end","[0-9]+");

Route::get('/piramidec/{h}/{ab}/{tinta}',[PiramideController::class, 'calc'])->where("h","[0-9]+")->where("ab","[0-9]+")->where("tinta","[1-3]+");

Route::resource('/agenda', AgendaController::class);

Route::resource('/contato', ContatoController::class);

//php artisan serve (iniciar servidor)

//.env não vai subir para o repositório
//pegar .env.example e substituir o .env
//alterar .env (colocar senhas)
//composer install
//php artisan key:generate

//php artisan make:controller HojeController --resource