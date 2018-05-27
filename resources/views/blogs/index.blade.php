@extends('blogs.layouts.master')

@section('slide-header')
<!-- SLIDER -->
        <div class="tada-slider">
            <ul id="tada-slider">
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-1.jpg') }}" alt="image slider 1">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-2.jpg') }}" alt="image slider 2">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>MAECENAS CONSECTETUR</h1>
                        <h2>Lorem <span class="main-color">ipsum dolor</span> sit amet</h2>
                        <span class="button"><a href="#">READ ME</a></span>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-3.jpg') }}" alt="image slider 3">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>                
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-4.jpg') }}" alt="image slider 4">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>                
                </li>
            </ul>
            
        </div><!-- #SLIDER -->

@endsection

@section('content')
        <!-- CONTENT -->
<div class="content col-xs-8">
    <!-- ARTICLE 1 -->
    @foreach ($posts as $post)
        <article>
        <div class="post-image">
            <img src="{{$post->image}}" alt="">
            <div class="category"><a href="#">IMG</a></div>
        </div>
        <div class="post-text">
            <span class="date">{{ $post->created_at }}</span>
            <h2><a href="{{ route('post_detail',$post->slug) }}">{{ $post->title}}</a></h2>
            <p class="text">{{$post->description}}<a href="{{ route('post_detail',$post->slug) }}"><i class="icon-arrow-right2"></i></a></p>                                 
        </div>
        <div class="post-info">
            <div class="post-by">Post By <a href="#">AD-Theme</a></div>
            <div class="extra-info">
                <a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <span class="comments">25 <i class="icon-bubble2"></i></span>
            </div>
            <div class="clearfix"></div>
        </div>
    </article>
    @endforeach       
    

    <!-- NAVIGATION -->
    <div class="navigation">
        <a href="{{$posts->previousPageUrl()}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        <a href="{{$posts->nextPageUrl()}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        <div class="clearfix"></div>
    </div>

</div>


<!-- SIDEBAR -->
<div class="sidebar col-xs-4">
    
    
    <!-- ABOUT ME -->                    
    <div class="widget about-me">
        <div class="ab-image">
            <img src="{{ asset('blog_assets/img/about-me.jpg') }}" alt="about me">
            <div class="ab-title">About Me</div>
        </div>
        <div class="ad-text">
            <p> I'm D.Dai Nguyen and i'm learning web programming with the laravel framework.</p>
            <span class="signing"><img src="{{ asset('blog_assets/img/signing.png') }}" alt="signing"></span>
        </div>
    </div>


    <!-- LATEST POSTS -->                             
    <div class="widget latest-posts">
        <h3 class="widget-title">
            Latest Posts
        </h3>
        <div class="posts-container">
        @foreach ($latestPosts as $latestPost)
            <div class="item">
                <img src="{{$latestPost->image}}" alt="post 1" style="width: 100px" class="post-image">
                <div class="info-post">
                    <h6><a href="{{ route('post_detail',$latestPost->slug) }}">{{$latestPost->title}}</h6>
                    <span class="date">{{$latestPost->created_at->diffForHumans()}}</span>  
                </div> 
            </div>

        @endforeach
    <div class="clearfix"></div>   
    </div>


    <!-- FOLLOW US -->                             
    <div class="widget follow-us">
        <h3 class="widget-title">
            Follow Us
        </h3>
        <div class="follow-container">
            <a href="#"><i class="icon-facebook5"></i></a>
            <a href="#"><i class="icon-twitter4"></i></a>
            <a href="#"><i class="icon-google-plus"></i></a>
            <a href="#"><i class="icon-linkedin2"></i></a>                
        </div>
        <div class="clearfix"></div>
    </div>            


    <!-- TAGS -->                            
    <div class="widget tags">
        <h3 class="widget-title">
            Tags
        </h3>
        <div class="tags-container">
            <a href="#">Audio</a>
            <a href="#">Travel</a>
            <a href="#">Food</a>
            <a href="#">Event</a>
            <a href="#">Wordpress</a>
            <a href="#">Video</a>
            <a href="#">Design</a>
            <a href="#">Sport</a>
            <a href="#">Blog</a>
            <a href="#">Post</a> 
            <a href="#">Img</a>
            <a href="#">Masonry</a>                                    
        </div>
        <div class="clearfix"></div>
    </div> 


    <!-- ADVERTISING -->                           
    <div class="widget advertising">
        <div class="advertising-container">
            <img src="img/350x300.png" alt="banner 350x300">
        </div>
    </div>


    <!-- NEWSLETTER -->                          
    <div class="widget newsletter">
        <h3 class="widget-title">
            Newsletter
        </h3>
        <div class="newsletter-container">
            <h4>DO NOT MISS OUR NEWS</h4>
            <p>Sign up and receive the <br> latest news of our company</p> 
            <form>
               <input type="email" class="newsletter-email" placeholder="Your email address...">
               <button type="submit" class="newsletter-btn">Send</button>
            </form>                                  
        </div>
        <div class="clearfix"></div>
    </div>      
</div> <!-- #SIDEBAR -->
        <div class="clearfix"></div>
 
 </section>

@endsection
