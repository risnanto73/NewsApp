<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\Category;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){

        //get data category
        $category = Category::latest()->get();

        // slider/carousel news latest
        $sliderNews = News::latest()->limit(3)->get();

        return view('frontend.news.index', compact(
            'category',
            'sliderNews',
        ));
    }
}
