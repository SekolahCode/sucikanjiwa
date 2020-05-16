<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use DOMDocument;

class QuestionController extends Controller
{   
    public function assign($link){
        $this->beginCrawling($link);
    }

    private function beginCrawling($url){
        // The array that we pass to stream_context_create() to modify our User Agent.
        $options = array('http'=>array('method'=>"GET", 'headers'=>"User-Agent: Googlebot"));
        // Create the stream context.
        $context = stream_context_create($options);

        // Create a new instance of PHP's DOMDocument class.
        $doc = new DOMDocument();
        // Use file_get_contents() to download the page, pass the output of file_get_contents()
        // to PHP's DOMDocument class.
        @$doc->loadHTML(@file_get_contents($url, false, $context));
        // Create an array of all of the links we find on the page.
        $a = $doc->getElementsByTagName("a");
        $no = 0;

        $time_start = microtime(true); 

        for ($i = 0; $i < $a->length; $i++) {
            
            $title = $a->item($i)->textContent;
            $urlnew = $a->item($i)->getAttribute("href");
            if (strpos($title, '?') !== false && strpos($urlnew, 'https') !== false) {
                $question = $this->getDetails($urlnew);
                $stripped = trim(preg_replace('/\t+/', '', $question));
                if($question){
                    Question::create([
                        'title'     => $title,
                        'url'       => $urlnew,
                        'question'  => $stripped
                    ]);
                }
            }
        }

        $time_end = microtime(true);

        //dividing with 60 will give the execution time in minutes otherwise seconds
        $execution_time = ($time_end - $time_start);

        //execution time of the script
        echo 'Total Execution Time'.$execution_time.' Secs';
    }

    private function getDetails($url){
        // The array that we pass to stream_context_create() to modify our User Agent.
        $options = array('http'=>array('method'=>"GET", 'headers'=>"User-Agent: Googlebot"));
        // Create the stream context.
        $context = stream_context_create($options);

        // Create a new instance of PHP's DOMDocument class.
        $doc = new DOMDocument();
        // Use file_get_contents() to download the page, pass the output of file_get_contents()
        // to PHP's DOMDocument class.
        @$doc->loadHTML(@file_get_contents($url, false, $context));
        // Create an array of all of the links we find on the page.
        $div = $doc->getElementsByTagName("div");
        $className = 'main-question-block';
        for ($i = 0; $i < $div->length; $i++) {
            if (stripos($div->item($i)->getAttribute('class'), $className) !== false) {
                $question = $div->item($i)->textContent;
                return str_replace("Q","",$question);
            } 
        } 
    }


}
