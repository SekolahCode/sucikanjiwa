<div class="quotes">
    <div id="quotesCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($quotes as $key => $quote)
                <li data-target="#quotesCarousel" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif" style="background-color:black!important"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($quotes as $key => $quote)
            <div class="carousel-item @if($key == 0) active @endif">
                <div class="d-block w-100 quotes">
                    <h3>{{$quote->quotes}}</h3>
                    <h5>{{$quote->author}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.quotes{
    padding-top:50px;
    padding-bottom:50px;
    background-color: #ffffff;
}

.quotes h3{
    text-align:center !important;
}

.quotes h5{
    text-align:center !important;
}
</style>