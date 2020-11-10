<div class="faq container event">
    <div class="faq-layouting layout-spacing">

    <div class="fq-comman-question-wrapper">
        <div class="row">
            <div class="col-md-12 widget-content widget-content-area text-center">

                @if (isset($countdownEvent))
                    <h3> {{ $countdownEvent->title }} </h3>
                    <div id="cd-simple">
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">00</h1>
                            </div>
                            <h4 class="clock-text"> Months </h4>
                        </div>
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">08</h1>
                            </div>
                            <h4 class="clock-text"> Days </h4>
                        </div>
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">32</h1>
                            </div>
                            <h4 class="clock-text"> Hours </h4>
                        </div>
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">45</h1>
                            </div>
                            <h4 class="clock-text"> Mins </h4>
                        </div>
                    </div>
                    <input type="hidden" id="event_date" value="{{ $countdownEvent->event_date }}">
                @else
                    <h3> No Event Scheduled </h3>
                    <div id="cd-simple">
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">00</h1>
                            </div>
                            <h4 class="clock-text"> Months </h4>
                        </div>
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">00</h1>
                            </div>
                            <h4 class="clock-text"> Days </h4>
                        </div>
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">00</h1>
                            </div>
                            <h4 class="clock-text"> Hours </h4>
                        </div>
                        <div class="countdown">
                            <div class="clock-count-container">
                                <h1 class="clock-val">00</h1>
                            </div>
                            <h4 class="clock-text"> Mins </h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="timeline-simple">
            <div class="row">
                <div class="col-lg-7">
                    <div id="with_captions" class="col-lg-12 col-md-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Beautiful Picture</h4> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area p-2">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{ asset('custom/img/masjid1.jpg')}}" alt="First slide" style="max-height:400px;max-width:550px">
                                                    
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{ asset('custom/img/masjid2.jpg')}}" alt="Second slide" style="max-height:400px;max-width:550px">
                                                    
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{ asset('custom/img/masjid3.jpg')}}" alt="Third slide" style="max-height:400px;max-width:550px">
                                                    
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{ asset('custom/img/masjid4.jpg')}}" alt="Fourth slide" style="max-height:400px;max-width:550px">
                                                    
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{ asset('custom/img/masjid5.jpg')}}" alt="Fifth slide" style="max-height:400px;max-width:550px">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <p class="timeline-title">Upcoming ..</p>
                    <div class="timeline-list">
                        @forelse ($upcomingEvents as $key => $event)
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
                        @empty
                        <div class="timeline-post-content">
                            <div class="user-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                            </div>
                            <div class="">
                                <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <h6 class=""></h6>
                                    <h5 class="post-text">No Events Inline </h5>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>