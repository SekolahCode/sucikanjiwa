@include('website.layouts.header')
<body class="sidebar-noneoverflow">

    <div class="fq-header-wrapper">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center order-md-0 order-1">
                    <h1 class="">Sucikan Jiwa</h1>
                    <p class="">We are compiling articles, quotes and questions regarding to islam.</p>
                    <button class="btn">More Details</button>
                </div>
                <div class="col-md-6 order-md-0 order-0">
                    <a target="_blank" href="#" class="banner-img">
                        <img src="assets/img/faq.svg" class="d-block" alt="header-image">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="faq container">

        <div class="faq-layouting layout-spacing">

            <div class="fq-comman-question-wrapper">
                <div class="row">
                    <div class="col-md-12 widget-content widget-content-area text-center">
                        <h3> {{ $countdownEvent->title }} </h3>
                            <div id="cd-simple">
                                <div class="countdown">
                                    <div class="clock-count-container">
                                        <h1 class="clock-val">00</h1>
                                    </div>
                                    <h4 class="clock-text"> Days </h4>
                                </div>
                                <div class="countdown">
                                    <div class="clock-count-container">
                                        <h1 class="clock-val">08</h1>
                                    </div>
                                    <h4 class="clock-text"> Hours </h4>
                                </div>
                                <div class="countdown">
                                    <div class="clock-count-container">
                                        <h1 class="clock-val">32</h1>
                                    </div>
                                    <h4 class="clock-text"> Mins </h4>
                                </div>
                                <div class="countdown">
                                    <div class="clock-count-container">
                                        <h1 class="clock-val">45</h1>
                                    </div>
                                    <h4 class="clock-text"> Sec </h4>
                                </div>
                            </div>
                        <input type="hidden" id="event_date" value="{{ $countdownEvent->event_date }}">
                    </div>
                </div>
            </div>

            <div class="fq-comman-question-wrapper mt-5">
                <div class="timeline-simple">
                    <div class="row">
                        <div class="col-lg-7">

                        </div>
                        <div class="col-lg-5">
                            <p class="timeline-title">Upcoming ..</p>
                            <div class="timeline-list">
                                @foreach ($upcomingEvents as $key => $event)
                                <div class="timeline-post-content">
                                    <div class="user-profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                    </div>
                                    <div class="">
                                        <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <h6 class="">{{ $event->event_date->format('d F Y') }}</h6>
                                            <h5 class="post-text">{{ $event->title }} </h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fq-tab-section">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5 mt-5 p-0">
                    <h2>Popular Article</h2>
                        <div id="style1" class="carousel slide style-custom-1" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($articles as $key => $article)
                                    <li data-target="#style1" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($articles as $key => $article)
                                <div class="carousel-item @if($key == 0) active @endif">
                                    <a href="{{ $article->url }}" target="blank">
                                    <img class="d-block w-100 slide-image" src="{{ $article->url_image }}" style="width:600px;height:500px">
                                    <div class="carousel-caption">
                                        <span class="badge">Articles</span>
                                        <div class="badge" style="background-color: rgba(192, 129, 192, 0.5);">
                                            <h3 style="color:white">{{ $article->title }}</h3>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#style1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#style1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fq-tab-section">
                <div class="row">
                    <div class="col-md-12 mb-5 mt-5">

                        <h2>Popular Ask Question</h2>

                        <div class="accordion" id="accordionExample">
                            @foreach($questions as $key => $item)
                            <div class="card">
                                <div class="card-header" id="fqheading{{$key}}">
                                    <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapse{{$key}}" aria-expanded="true" aria-controls="fqcollapse{{$key}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg> <span class="faq-q-title">{{ $item->title }}</span> 
                                        
                                    </div>
                                </div>
                                
                                <div id="fqcollapse{{$key}}" class="collapse @if( $key == 0) show @endif" aria-labelledby="fqcollapse{{$key}}" data-parent="#accordionExample">

                                    <div class="card-body">
                                        <p>{{ $item->question }}</p>
                                        <div style="text-align: center">
                                            <a class="btn btn-outline-primary btn-rounded mb-2" href="{{$item->url}}" target="_blank">View Answer</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>                            
            </div>

            <div class="fq-article-section">
                <h2>Popular Quotes</h2>
                <div class="row">
                    @foreach($quotes as $quote)
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                        <div class="card component-card_5" style="height:12rem">
                            <div class="card-body">
                                <p class="card-text" style="color:white">{{$quote->quotes}}</p>
                                <div class="user-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check mr-2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                    <div class="media-body">
                                        <h5 class="card-user_name">{{ $quote->author }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @include('website.layouts.footer')

    @include('website.layouts.script')
</body>
</html>