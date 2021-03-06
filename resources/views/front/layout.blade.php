<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ashik | Welcome To My Land</title>
       <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap -->
    <link href="{{asset('public/frontAsset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontAsset/css/style.css')}}" rel="stylesheet">

    <!-- wellcome font -->
    <link href='https://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
    <!-- Paragraph font -->
    <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- For My Work -->   
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontAsset/css/elastic_grid.min.css')}}" />
  
  </head>
  <body>
  
  <nav class="navbar navbar-default  navbar-fixed-top nav-custom">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed .nav-button-mobile" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" style="margin:auto 15%;" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        
        <li ><a href="#aboutme">About Me</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#work">My Work</a></li>        
        <li><a href="#contact">Contact ME</a></li>
        <li><a href="{{url('/blog')}}">Blog</a></li>
      </ul>      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 <div class="container" >
	@yield('content')
     
 </div>
   <div style="height:100px;" ></div>
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <span class="text-uppercase wellcome-custom">Quick Contact: </span>
  <i class="fa fa-skype fa-2x" style="color:#00AFF0"></i> </span>&nbsp mdashikuzzamanashik &nbsp | &nbsp 
  <i class="fa fa-mobile fa-2x" style="color:#000"></i> </span>&nbsp +8801677007983 &nbsp | &nbsp
  <i class="fa fa-facebook-square fa-2x" style="color:#21356A"></i> </span>&nbsp fb.com/strangerashik &nbsp | &nbsp
  <i class="fa fa-linkedin-square fa-2x" style="color:#1A84BC"></i> </span>&nbsp bd.linkedin.com/in/strangerashik
    </div>
  </nav>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('public/frontAsset/js/bootstrap.min.js')}}"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- For My Work -->
<script src="{{asset('public/frontAsset/js/modernizr.custom.js')}}"></script>
<script src="{{asset('public/frontAsset/js/classie.js')}}"></script>
<!--- uncompress-->
<!-- <script type="text/javascript" src="js/jquery.elastislide.js"></script>
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>
<script type="text/javascript" src="js/elastic_grid.js"></script> -->

<!-- compress version-->


      <script type="text/javascript" src="{{asset('public/frontAsset/js/elastic_grid.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontAsset/js/elastic_grid.min.js')}}"></script>

<script type="text/javascript">
    $(function(){
        $("#elastic_grid_demo").elastic_grid({         
            'showAllText' : 'All',
            'filterEffect': 'popup', // moveup, scaleup, fallperspective, fly, flip, helix , popup
            'hoverDirection': true,
            'hoverDelay': 0,
            'hoverInverse': true,
            'expandingSpeed': 500,
            'expandingHeight': 500,
            'items' :
            [
            @foreach($works as $info)
            <?php $images=App\contentModel::documents($info->id,'contents');?>
                {
                    'title'         : "{{$info->title}}",
                    'description'   : '<?php echo $info->content; ?>',

                    'thumbnail'     : [
                    @foreach($images as $img)
                      'public/uploads/{{$img->calling_id}}',
                    @endforeach
                    
                    ],
                    'large'         : [ 
                     @foreach($images as $img)
                      'public/uploads/{{$img->calling_id}}',
                     @endforeach
                    ],
                    'button_list'   :
                   
                    [
                      @if($info->hyper_link)
                        { 'title':'Live @', 'url' : "{{$info->hyper_link}}", 'new_window' : true },
                        @endif
                        // { 'title':'Download', 'url':'http://porfolio.bonchen.net/', 'new_window' : false}
                    ],

                    'tags'          : [<?php echo $info->subtitle;?>]
                },
                @endforeach
            ]
        });
    });
</script>

  
  </body>
</html>