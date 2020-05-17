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

class IslamicQuestionCrawlObservers extends CrawlObserver
{
    private $questions = [];

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
        $a = $doc->getElementsByTagName("a");
        
        $arrayQuestion = [];
        foreach ($a as $item) {
            if(strpos($item->textContent, '?') !== false && strpos($item->getAttribute('href'), 'https') !== false){
                $this->questions[] = [
                    'title'     => $item->textContent,
                    'url'       => $item->getAttribute('href'),
                ];
            }
        }
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
        foreach ($this->questions as $question) {
            Question::create([
                'title'     => $question['title'],
                'url'       => $question['url'],
                'question'  => null
            ]);
        }
    }
}