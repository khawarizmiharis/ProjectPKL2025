<?php

namespace App\Http\Controllers;

use App\Article;
use App\Carousel; 
use App\Complaint;
use App\LetterSubmission;
use App\UmkmProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function beranda()
    {

        $carousels = Carousel::latest()->get();

        $complaints = Complaint::latest()->limit(3)->get();
        $letter_submissions = LetterSubmission::latest()->limit(3)->get();
        $articles = Article::latest()->limit(3)->get();
        $umkm_products = UmkmProduct::latest()->limit(4)->get();

        
        return view('visitors.beranda.index', compact('complaints', 'letter_submissions', 'articles', 'umkm_products', 'carousels'));
    }
}
