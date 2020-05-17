<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

class QuotesController extends Controller
{
    //
=======
use App\Modules\WebCrawler\WebCrawler as Crawler;

class QuotesController extends Controller
{
    public function index(){

    }

    public function crawlQuotes(){
        Crawler::crawlQuotesOfIslam();
    }
>>>>>>> c578f2213cf1c453cdd4b6f9944b6d7986b0cd66
}
