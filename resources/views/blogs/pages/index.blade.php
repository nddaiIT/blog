@extends('blogs.layouts.master')
@section('content')
	<!-- CONTENT -->
	<div class="content col-xs-12">

    
    	<!-- ARTICLE 1 -->        
    	<article>
        	<div class="post-image">
            	<img src="{{$post->image}}" alt=""> 
            </div>
            <div class="post-text">
                <h2>{{$post->title}}</h2>
            </div>                 
            <div class="post-text text-content">                  
            	<div class="text">
                	{!!$post->content!!}
                	<div class="clearfix"></div>
                </div>
            </div>
        
        
   	 	</article>
    
     
    </div>
    
	<div class="clearfix"></div>
@endsection