<?php

namespace App\Http\Controllers;

use App\Modules\WebCrawler\WebCrawler as Crawler;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        $question = Question::orderBy('created_at')->paginate('5');

    }

    public function crawlQuestion(){
        Crawler::crawlCommonIslamicQuestion();
        Crawler::crawlQuestionDescription();
    }
}
