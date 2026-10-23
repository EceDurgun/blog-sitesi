<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Giriş sayfasını ekrana yansıtır
    public function showLogin()
    {
        return view('login');
    }

    // Giriş yapma işlemini kontrol eder
    public function login(Request $request)
    {
        // .env dosyasındaki gizli bilgileri çekiyoruz
        $gizliKullanici = env('ADMIN_USERNAME');
        $gizliSifre = env('ADMIN_PASSWORD');

        // Formdan gelenlerle .env içindekiler eşleşiyor mu?
        if ($request->username === $gizliKullanici && $request->password === $gizliSifre) {
            // Şifre doğruysa yetki ver ve makale ekleme sayfasına yönlendir
            session()->put('is_admin', true);
            return redirect('/makale-ekle');
        }

        // Şifre yanlışsa hata vererek login sayfasına geri gönder
        return back()->with('error', 'Kullanıcı adı veya şifre hatalı!');
    }

    // Çıkış yapma işlemi
    public function logout()
    {
        session()->forget('is_admin');
        return redirect('/');
    }
}
    //

