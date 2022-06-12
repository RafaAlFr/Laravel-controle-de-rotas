<?php

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('minhaprimeiraview', function () {
    return view('segundaview');
});
*/

Route::get('/', function () {
    return view('inicio');
});

Route::post('/cadastrar-produto', function(Request $request){
	//dd($request->all());
    Produto::create([
        'nome'=>$request->nome,
        'valor'=>$request->valor,
        'estoque'=>$request->estoque,
    ]);

    echo "Produto criado com sucesso!";
});


Route::get('/listar-produto/{id}', function($id){
    //dd(Produto::find($id)); //debug and die
    $produto = Produto::find($id);
    return view('listar', ['produto' => $produto]);
    //a view em questao está nomeada como formulario
});

Route::get('/editar-produto/{id}', function($id){
    //dd(Produto::find($id)); //debug and die
    $produto = produto::find($id);
    return view('editar', ['produto' => $produto]);
});

Route::post('/editar-produto/{id}', function(Request $request, $id){
    //dd($request->all());
    $produto = produto::find($id);
    $produto->update([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);
    echo "Produto editado com sucesso!";
});