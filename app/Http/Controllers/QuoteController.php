<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\WebCrawler\WebCrawler as Crawler;

class QuoteController extends Controller
{
    public function index(){

    }

    public function crawlQuotes(){
        Crawler::crawlQuotesOfIslam();
    }
}
