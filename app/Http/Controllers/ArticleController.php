<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create()
    {
        if (!session('is_admin')) {
            return redirect('/login')->with('error', 'Bu sayfayı görmek için giriş yapmalısınız!');
        }
        return view('makale-ekle');
    }

    public function store(Request $request)
    {
        if (!session('is_admin')) {
            return redirect('/login');
        }

        $makale = new Article();
        $makale->title = $request->title;
        $makale->content = $request->content;
        $makale->save();

        return back()->with('success', 'Makale başarıyla paylaşıldı!');
    }

    public function destroy($id)
    {
        if (!session('is_admin')) {
            return redirect('/');
        }
        
        $makale = Article::find($id);
        if ($makale) {
            $makale->delete();
        }
        
        return back()->with('success', 'Makale başarıyla silindi!');
    }

    // Beğen (Like) İşlemi
    public function like($id)
    {
        $makale = Article::find($id);
        if ($makale) {
            $makale->increment('likes');
        }
        return back();
    }

    // Beğenme (Dislike) İşlemi
    public function dislike($id)
    {
        $makale = Article::find($id);
        if ($makale) {
            $makale->increment('dislikes');
        }
        return back();
    }
}