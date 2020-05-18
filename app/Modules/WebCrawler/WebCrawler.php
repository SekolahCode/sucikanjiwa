<?php

namespace App\Modules\WebCrawler;

use Spatie\Crawler\Crawler;
use App\Modules\WebCrawler\CrawlObservers\IslamicArticleCrawlObservers;
use App\Modules\WebCrawler\CrawlObservers\IslamicEventCrawlObservers;
use App\Modules\WebCrawler\CrawlObservers\IslamicQuestionCrawlObservers;
use App\Modules\WebCrawler\CrawlObservers\QuestionDescriptionCrawlObservers;
use App\Modules\WebCrawler\CrawlObservers\QuotesOfIslamCrawlObservers;
use App\Question;

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

    public static function crawlCommonIslamicQuestion(){
        $url = 'https://aboutislam.net/reading-islam/understanding-islam/50-common-questions-new-muslims-ask/';
        Crawler::create()
            ->setCrawlObservers([new IslamicQuestionCrawlObservers])
            ->setMaximumCrawlCount(1)
            ->ignoreRobots() 
            ->startCrawling($url);
    }

    public static function crawlQuestionDescription(){
        $urls = Question::pluck('url');

        foreach ($urls as $url) {
            Crawler::create()
                ->setCrawlObservers([new QuestionDescriptionCrawlObservers])
                ->setMaximumCrawlCount(1)
                ->ignoreRobots() 
                ->startCrawling($url);
        }
    }

    public static function crawlQuotesOfIslam(){
        $urls = [
            'http://quotesofislam.com/islamic-quotes/',
            'http://quotesofislam.com/islamic-quotes-part-2/',
        ];

        foreach ($urls as $url) {
            Crawler::create()
                ->setCrawlObservers([new QuotesOfIslamCrawlObservers])
                ->setMaximumCrawlCount(1)
                ->ignoreRobots() 
                ->startCrawling($url);
        }
    }

    public static function crawlArticlesIslamic(){
        $urls = [
            'https://backtojannah.com/',
            'https://backtojannah.com/page/2/'
        ];

        foreach ($urls as $url) {
            Crawler::create()
                ->setCrawlObservers([new IslamicArticleCrawlObservers])
                ->setMaximumCrawlCount(1)
                ->ignoreRobots() 
                ->startCrawling($url);
        }
    }
}
