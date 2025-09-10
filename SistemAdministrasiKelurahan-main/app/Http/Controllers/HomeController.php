<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleComment;
use App\ComplaintCategory;
use App\Carousel; // Ditambahkan untuk mengakses model Carousel
use ComplaintCategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function beranda()
    {
        // Mengambil data yang sudah ada sebelumnya
        $articles = Article::where('enabled', 1)->orderby('updated_at', 'desc')->paginate(6);
        $latestArticles = Article::where('enabled', 1)->where('category_id', '!=', 1)->orderBy('created_at', 'desc')->take(3)->get();
        $complaint_categories = ComplaintCategory::get();

        // MENAMBAHKAN PENGAMBILAN DATA CAROUSEL
        $carousels = Carousel::all();

        $user = null;
        $user_id = null;
        if (Auth::check()) {
            $user = Auth::user();
            $user_id = $user->id;
        }

        // Mengirim semua data (termasuk carousel) ke view
        return view('visitors.beranda.index', compact(
            'articles',
            'latestArticles',
            'complaint_categories',
            'user',
            'user_id',
            'carousels' // Variabel carousel ditambahkan di sini
        ));
    }
}

