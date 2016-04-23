@extends('front.layoutBlog')
@section('content')
     

               <div style="height:100px;" ></div>

                <!-- First Blog Post -->
            
                @if($posts)

                @foreach($posts as $info)

                <h2>
                    <a href="{{url('blog/single/'.$info->id)}}">{{$info->title}}</a>
                </h2>

               @if(Auth::check())
                 <a href="{{url('admin/contentEdit/'.$info->id)}}">Edit</a>
               @endif
               
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$info->created_at}} by {{$info->creator}}</p>
                <hr>
                
                <img class="img-responsive" src="{{asset('public/uploads/'.$info->calling_id)}}" alt="">
                
               
                <p><?php echo substr($info->content, 0, 400);?><a href="{{url('blog/single/'.$info->id)}}">....</a></p>
                <a class="btn btn-primary" href="{{url('blog/single/'.$info->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                @endforeach
                <!-- Pager -->
              {!! $posts->render() !!}
                @else 
                   <h2>No Result Found</h2>
                @endif


           
            </div>

          
@stop