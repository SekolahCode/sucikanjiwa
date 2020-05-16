<?php

namespace App\Modules\WebCrawler\CrawlObservers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObserver;
use App\Event;

class IslamicEventCrawlObservers extends CrawlObserver
{
    private $importantDates;

    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null) 
    {
        $doc = new \DOMDocument();
        @$doc->loadHTML($response->getBody());
        $tableRow = $doc->getElementsByTagName("tr");

        $importantDates = [];
        foreach ($tableRow as $row) {
            if (! empty($row->getElementsByTagName('td')[0]) && ! empty($row->getElementsByTagName('td')[1])) {
                $importantDates[] = [
                    'date'  => $row->getElementsByTagName('td')[0]->nodeValue,
                    'title' => $row->getElementsByTagName('td')[1]->nodeValue
                ];
            }
        };

        $this->importantDates = $importantDates;
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
        foreach ($this->importantDates as $event) {
            Event::updateOrCreate([
                'event_date' => $event['date'],
                'title'      => $event['title']
            ]);
        }
    }
}