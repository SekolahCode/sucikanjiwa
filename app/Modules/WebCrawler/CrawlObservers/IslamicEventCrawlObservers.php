<?php

namespace App\Modules\WebCrawler\CrawlObservers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObserver;
use Carbon\Carbon;
use App\Event;

class IslamicEventCrawlObservers extends CrawlObserver
{
    private $importantDates;
    private const MONTH = [
        'Januari'   => 'January',
        'Februari'  => 'February',
        'Mac'       => 'March',
        'April'     => 'April',
        'Mei'       => 'May',
        'Jun'       => 'June',
        'Julai'     => 'July',
        'Ogos'      => 'August',
        'September' => 'September',
        'Oktober'   => 'October',
        'November'  => 'November',
        'Disember'  => 'December'
    ];

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

        foreach ($tableRow as $row) {
            if (! empty($row->getElementsByTagName('td')[0]) && ! empty($row->getElementsByTagName('td')[1])) {
                $this->importantDates[] = [
                    'date'  => $this->convertDateToCarbon($row->getElementsByTagName('td')[0]->nodeValue),
                    'title' => $row->getElementsByTagName('td')[1]->nodeValue
                ];
            }
        };
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
            $found = Event::whereDate('event_date', '=', $event['date'])->where('title', $event['title'])->first();
            if (! $found) {
                Event::Create([
                    'event_date' => $event['date'],
                    'title'      => $event['title']
                ]);
            }
        }
    }

    public function convertDateToCarbon(String $date)
    {
        $explodedDate = explode(' ', $date);
        $month = self::MONTH[$explodedDate[1]];

        return Carbon::createFromFormat('d F Y', sprintf('%s %s %s', $explodedDate[0], $month, $explodedDate[2]));
    }
}