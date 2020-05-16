<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Crawler\QuestionController;

class testCrawling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:question';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $link       = 'https://aboutislam.net/reading-islam/understanding-islam/50-common-questions-new-muslims-ask/';
        $question   = new QuestionController();

        $question->assign($link);
    }
}
