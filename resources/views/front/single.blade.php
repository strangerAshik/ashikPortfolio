@extends('front.layoutBlog')
@section('content')
     

               <div style="height:100px;" ></div>

                <!-- First Blog Post -->
               
                <h2>
                    <a href="{{url('blog/single/'.$post->id)}}">{{$post->title}}</a>
                </h2>
                @if(Auth::check())
                    <a href="{{url('admin/contentEdit/'.$post->id)}}">Edit</a>
                @endif
               <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}} by {{$post->creator}}</p>
                <hr>
                
                <img class="img-responsive" src="{{asset('public/uploads/'.$post->calling_id)}}" alt="">
                
                
                <p><?php echo $post->content;?></p>
              
                <hr>
              
            </div>

          
@stop