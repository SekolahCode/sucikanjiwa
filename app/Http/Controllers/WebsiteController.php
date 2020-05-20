<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\WebCrawler\WebCrawler as Crawler;
use Carbon\Carbon;

use App\Article;
use App\Event;
use App\Question;
use App\Quote;


class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        Crawler::crawlIslamicEvent();

        $questions      = Question::whereNotNull('question')->orderby('created_at')->limit(5)->get();
        $quotes         = Quote::whereNotNull('quotes')->orderby('created_at')->limit(3)->get();
        $events         = Event::whereDate('event_date', '>', Carbon::today())->get();
        $articles       = Article::orderby('created_at')->limit(3)->get();

        return view('website.index', [
            'countdownEvent'    => $events->first(),
            'upcomingEvents'    => $events->forget(0),
            'questions'         => $questions,
            'quotes'            => $quotes,
            'articles'          => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
