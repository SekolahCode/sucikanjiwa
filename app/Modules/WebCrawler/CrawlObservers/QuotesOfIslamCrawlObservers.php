<?php

namespace App\Modules\WebCrawler\CrawlObservers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObserver;
<<<<<<< HEAD
use App\Question;
use DOMDocument;
use Log;

class QuotesOfIslamCrawlObserver extends CrawlObserver
{
    private $quotes;
=======
use App\Quote;
use DOMDocument;

class QuotesOfIslamCrawlObservers extends CrawlObserver
{
    private $quotes;
    private $regex ='(quotes|site|online|compiled|let me know|adsbygoogle|afterall|privacy|
                        |Something went wrong|subscribing|get more|assalam|good work|walillahil|
                        |first thing first|jazak|salam|jazakallah|thanks|a good atempt|\n|email|
                        |name|comment|javascript|continue to write|mashallah|masha allah|wallpapers|
                        |impressed|mr|zazakallah|shukran|مشا الله، وجزاكم  الله خيرا|hello|table of contents|
                        |You May Like|about islam|good job|alhamdulillah|jezakumulah|mashaallaah|of course|
                        |something went wrong|you may like|love it| 
                    )';
>>>>>>> c578f2213cf1c453cdd4b6f9944b6d7986b0cd66
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

        $p            = $doc->getElementsByTagName("p");
        $newQuotes    = [];
        foreach ($p as $value) {
<<<<<<< HEAD
            dd($value->textContent);
        }
       
=======
            if(!empty($value->textContent) && $value->textContent != ' ' && $value->textContent != null){

                if(preg_match($this->regex,strtolower($value->textContent)) !==1){

                    if(strpos($value->textContent, '|') !== false){

                        $content = explode('|',$value->textContent);

                        $newQuotes[] = [
                            'quotes' => $content[0],
                            'author' => $content[1]
                        ];
                    }else{
                        $newQuotes[] = [
                            'quotes' => $value->textContent,
                            'author' => 'Anonymous'
                        ];
                    }
                }
                
            }
        }
        $this->quotes = $newQuotes;
>>>>>>> c578f2213cf1c453cdd4b6f9944b6d7986b0cd66
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
<<<<<<< HEAD
        Log::info('failed');
=======

>>>>>>> c578f2213cf1c453cdd4b6f9944b6d7986b0cd66
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling() 
    {   
<<<<<<< HEAD
=======
        foreach ($this->quotes as $value) {
            Quote::updateOrCreate(['quotes'=>$value['quotes']],$value);
        }
>>>>>>> c578f2213cf1c453cdd4b6f9944b6d7986b0cd66
        
    }
}