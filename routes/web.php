<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

// Anasayfa
Route::get('/', function () {
    $makaleler = Article::latest()->get();
    return view('anasayfa', compact('makaleler'));
});

// Giriş ve Çıkış
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Makale Ekleme ve Silme
Route::get('/makale-ekle', [ArticleController::class, 'create']);
Route::post('/makale-ekle', [ArticleController::class, 'store']);
Route::get('/makale-sil/{id}', [ArticleController::class, 'destroy']);

// Beğeni (Like/Dislike) İşlemleri
Route::get('/makale-like/{id}', [ArticleController::class, 'like']);
Route::get('/makale-dislike/{id}', [ArticleController::class, 'dislike']);