<?php

namespace App\Modules\WebCrawler;

use Spatie\Crawler\Crawler;
use App\Modules\WebCrawler\CrawlObservers\IslamicEventCrawlObservers;

class WebCrawler
{
    public static function crawlIslamicEvent()
    {
        $url = 'https://www.e-solat.gov.my/index.php?siteId=24&pageId=26';
        Crawler::create()
            ->setCrawlObservers([new IslamicEventCrawlObservers])
            ->setMaximumCrawlCount(1)
            ->ignoreRobots() 
            ->startCrawling($url);
    }
}
