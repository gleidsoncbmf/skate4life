<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ModalidadeController;
use App\Http\Controllers\InscricaoController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/modalidades/create', [ModalidadeController::class, 'create'])->name('modalidades.create');
Route::post('/modalidades', [ModalidadeController::class, 'store'])->name('modalidades.store');
Route::get('/modalidades/index', [ModalidadeController::class, 'index'])->name('modalidades.index');
Route::delete('/modalidades/{id}', [ModalidadeController::class, 'destroy'])->name('modalidades.delete');
Route::get('/modalidades/{id}', [ModalidadeController::class, 'destroy'])->name('modalidades.delete');



Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/index', [CategoriaController::class, 'index'])->name('categorias.index');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.delete');
Route::get('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.delete');

Route::post('/campeonatos/{id}/inscricao/', [InscricaoController::class, 'store'])->name('inscricoes.store');
Route::get('/campeonatos/{id}/inscricao', [InscricaoController::class, 'create'])->name('inscricoes.create');


Route::get('/campeonato/create', [CampeonatoController::class, 'create'])->name('campeonato.create');
Route::post('/campeonato/create', [CampeonatoController::class, 'store'])->name('campeonato.store');
Route::put('/campeonato/{id}/', [CampeonatoController::class, 'update'])->name('campeonato.update');
Route::get('/campeonato/{id}/edit', [CampeonatoController::class, 'edit'])->name('campeonato.edit');
Route::get('/campeonato/{id}', [CampeonatoController::class, 'show'])->name('campeonato.show');
Route::get('/campeonato/show/{id}', [CampeonatoController::class, 'showPublic'])->name('campeonato.showPublic');
Route::get('/campeonato', [CampeonatoController::class, 'index'])->name('campeonato.index');
Route::delete('/campeonatos/{id}', [CampeonatoController::class, 'destroy'])->name('campeonatos.delete');
Route::get('/campeonatos/{id}', [CampeonatoController::class, 'destroy'])->name('campeonatos.delete');
Route::get('/', [CampeonatoController::class, 'indexPublic'])->name('campeonatos.indexPublic');
Route::get('/campeonatos/{id}/inscricoes', [CampeonatoController::class, 'inscricoes'])->name('campeonatos.inscricoes');
Route::get('/campeonatos/{id}/inscricoes-publicas', [CampeonatoController::class, 'inscricoesPublic'])->name('campeonatos.inscricoesPublic');


Route::get('/campeonatos/{id}/pagamento/inscricoes', [InscricaoController::class, 'pagamento'])->name('inscricao.pagamento');
Route::put('/campeonatos/{id}/inscricoes', [InscricaoController::class, 'alteraPagamento'])->name('inscricao.alteraPagamento');















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
