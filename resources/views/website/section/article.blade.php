<div class="article">
    <div class="container pt-5 pb-5">
        <h2>Top Articles</h2>

        <div class="row">
            @foreach($articles as $key => $article)

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card component-card_9 article-card">
                    <img src="{{ $article->url_image }}" class="card-img-top" alt="{{ $article->url_image }}">
                    <div class="card-body">
                        <p class="meta-date">{{ $article->created_at }}</p>

                        <a href="{{ $article->url }}"><h5 class="card-title">{{ $article->title }}</h5></a>
                        <?php 
                                $url =  parse_url($article->url);
                        ?>
                        <p class="card-text text-muted">This article from {{ $url['host'] }}</p>

                        <div class="meta-info">
                            <div class="meta-user">
                                <div class="avatar avatar-sm">
                                    <span class="avatar-title rounded-circle">SJ</span>
                                </div>
                                <div class="user-name">Sucikan Jiwa</div>
                            </div>
                            
 

                            <!-- <div class="meta-action">
                                <div class="meta-likes">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> 51
                                </div>

                                <div class="meta-view">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 250
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        

    </div>
</div>

<style>
    .article{
        background-color: #e3f4fd;
    }


    .article-card{
        height: 280px;
    }
</style>