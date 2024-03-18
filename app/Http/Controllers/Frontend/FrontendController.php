<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class FrontendController extends Controller
{
    public function index(){

        //get data category
        $category = Category::latest()->get();

        return view('frontend.news.index', compact(
            'category',
        ));
    }

    public function detailNews($slug){
        // get data news by slug
        // fungsi first() digunakan untuk mengambil data pertama yang ditemukan
        $news = News::where('slug', $slug)->first();
        
        return view('frontend.news.detail', compact(
            'news',
        ));
    }
}
