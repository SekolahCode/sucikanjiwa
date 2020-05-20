<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modules\WebCrawler\WebCrawler as Crawler;

class ArticleController extends Controller
{
    public function index(){

    }

    public function crawlArticle(){
        
        dd(Crawler::crawlArticlesIslamic());
    }
}
