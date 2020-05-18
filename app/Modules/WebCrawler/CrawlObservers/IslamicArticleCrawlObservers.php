<?php

namespace App\Modules\WebCrawler\CrawlObservers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObserver;
use App\Article;
use DOMDocument;

class IslamicArticleCrawlObservers extends CrawlObserver
{
    private $articles;
    private $regex = '(continue|reading|\n|contribute|submit|menu|articles|previous|youtube|facebook|downloads|instagram|click|directory|backtojannah|name|twitter|back|home|privacy|help|contact)';
    private $images;
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
        
        $a              = $doc->getElementsByTagName("a");
        $div            = $doc->getElementsByTagName("div");

        $newArticles    = [];
        $images         = [];

        foreach ($div as $item) {
            
            foreach ($item->childNodes as $value) {

                if ( $value->nodeName == 'img' ) {
                    $images[] = [
                        'images'   => $value->getAttribute('src')
                    ];
                }
            }
        }

        $this->images = $images;
        $i = 0;
        foreach ($a as $key => $value) {
            
            if(stripos($value->getAttribute('id'), 'featured-thumbnail') !== false){

                $newArticles[] = [
                    'title'    => $value->getAttribute('title'),
                    'url'      => $value->getAttribute('href'),
                    'url_image'    => $this->images[$i++]['images']
                ];
            }
        }

        $this->articles = $newArticles;
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
        foreach ($this->articles as $value) {
            Article::updateOrCreate(['title'=>$value['title']],$value);
        }
    }
}