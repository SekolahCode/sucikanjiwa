<div class="questions">
    <div class="container">  
        <h2>Most Asked Question</h2>
        <div class="row">
            @foreach($questions as $key => $question)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card component-card_1 question-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->title }}</h5>
                        <a href="{{ $question->url }}" class="btn question-btn" align="center" target="blank">Answer</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>  
    </div>
</div>

<style>
    .questions{
        background-color: #e3f4fd;
        padding:50px 0 50px 0;
    }

    .questions h2{
        text-align:center;
        padding:0 0 20px 0;
    }

    .question-btn{
        color: #2a406e;
        background-color: #e3f4fd;
        position:absolute;
        bottom:30px;
        width:80%;
    }
    .question-card{
        height:200px;
        border:0px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }
</style>