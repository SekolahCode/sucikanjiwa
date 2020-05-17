<?php

namespace App\Modules\WebCrawler\CrawlObservers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObserver;
use DOMDocument;

class IslamicArticleCrawlObservers extends CrawlObserver
{
    private $articles;

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
        $newArticles = [];
        foreach ($a as $value) {

            if(!empty($value->textContent)){
                $newArticles[] = [
                    'title'    => $value->textContent
                ];
            }
        }
        $this->articles = $newArticles;
        dd($this->articles);
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

    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling() 
    {   

        
    }
}