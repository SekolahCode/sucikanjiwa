<?php

namespace App\Modules\WebCrawler\CrawlObservers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObserver;
use App\Question;
use DOMDocument;
use Log;

class QuestionDescriptionCrawlObservers extends CrawlObserver
{
    private $descriptions;
    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null) 
    {
        $doc = new DOMDocument();

        @$doc->loadHTML($response->getBody());

        $div            = $doc->getElementsByTagName("div");
        $className      = 'main-question-block';
        $newQuestion    = null;
        foreach ($div as $value) {
            
            if(stripos($value->getAttribute('class'), $className) !== false){
                $question       = str_replace("Q","",$value->textContent);
                $newQuestion    = [
                    'question'  => trim(preg_replace('/\n+/', '', $question)),
                    'url'       => $url
                ];
            }
        }
        $this->descriptions = $newQuestion;
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null)
    {
        Log::info('failed');
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling() 
    {   
        Question::where('url', $this->descriptions['url'])
                ->update([
                    'question' => $this->descriptions['question'],
                ]);
    }
}