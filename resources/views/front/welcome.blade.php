@extends('front.layout')
@section('content')
   <!-- About Me Row -->
   <div style="height:100px;" id="aboutme"></div>
   <section class="row" > 
       <h2 class="text-uppercase text-center wellcome-custom"><i class="fa fa-paw fa-2x text-terra-cotta"></i> {{$welcome->title}} </h2>  
      <!-- Image -->
          <div class="col-md-4 ">
          
          <?php $image=App\contentModel::getFirstImageForGallery($welcome->id);?>
            <img class="img-responsive img-thumbnail center-block" height="100" width="200" src="public/uploads/{{$image->calling_id}}">
          </div>
      <!-- About Me -->
       @if(Auth::check())
         <a href="{{url('admin/contentEdit/'.$welcome->id)}}">Edit</a>
       @endif
          <div class="col-md-8  ">
              
              <p class="text-justify para-font aboutme-para"><?php echo $welcome->content;?></p>
               
          </div>
    </section>
    
      <!-- Expertises -->
      <div style="height:100px;" id="skills"></div>
     
      <section class="row">
              <div class="col-md-6 col-md-offset-1  para-font skilllist">
               <h2 class="text-uppercase  wellcome-custom "><i class="fa fa-refresh fa-spin fa-2x text-blue"></i>&nbsp {{$profSkill->title}} </h2>

               @if(Auth::check())
                 <a href="{{url('admin/contentEdit/'.$profSkill->id)}}">Edit</a>
               @endif
               <div id="profSkill">
              		<?php echo $profSkill->content ;?>
              </div>
              </div>

              
              <div class="col-md-5 para-font skilllist">
              <h2 class="text-uppercase wellcome-custom"><i class="fa fa-cog fa-spin fa-2x text-grass"></i> &nbsp {{$tecSkill->title}}</h2>

               @if(Auth::check())
                 <a href="{{url('admin/contentEdit/'.$tecSkill->id)}}">Edit</a>
               @endif
                <div id="tecSkill">
	              <?php echo $tecSkill->content;?>
	            </div>
              </div>
      </section>

      <!-- Service I Offer -->
      <div style="height:100px;" id="services"></div>
      <section class="row" >
          <h2 class="text-uppercase text-center wellcome-custom"><i class="fa fa-cubes fa-2x  text-service"></i>&nbsp Services I Offer </h2> 
        
           
             <div class='col-md-4'>
                
                <h4 class="text-uppercase wellcome-custom"><i class="fa fa-object-group text-grass"></i>&nbsp Front-end Development</h4>
                <p class="para-font text-justify servicePara">Personally I believe front-end is the art of Application.I ensure all my web code meets the highest web standards that works across all major browsers and is S.E.O friendly.</p>
            </div>
             <div class='col-md-4'>
               
                <h4 class="text-uppercase wellcome-custom"><i class="fa fa-database  text-terra-cotta"></i>&nbsp Back-end DEVELOPMENT</h4>
                <p class="para-font  text-justify servicePara">With excellent programming skills I'm experienced with back-end development. I ensure that my code is robust and of a quality standard to stand up to rigorous testing.</p>
            </div>
            <div class='col-md-4'>
                
                <h4 class="text-uppercase wellcome-custom"><i class="fa fa-cogs text-red"></i>&nbsp Deploying & Maintaining</h4>
                <p class="para-font  text-justify servicePara">I'm experienced with cPanel management. Deploying Application is always exiting. Ohh! I love manage and moderate application from both server and admin end :D</p>
            </div>
      </section>

       <!-- My Work Section -->
      <div style="height:100px;" id="work"></div>
      <section class="row">
               <h2 class="text-uppercase text-center wellcome-custom"><i class="fa fa-object-ungroup fa-2x text-work"></i>&nbsp My Work</h2> 
               @if(Auth::check())
               <a href="{{url('admin/categoryResource/4')}}">Add/Edit</a>
               @endif
               <div id="elastic_grid_demo"></div>
      </section>
    
      <!-- Contact Section -->
      <div style="height:100px;" id="contact"></div>
      <section class="row">
	      @if (session('message'))
			    <div class="alert alert-success">
			        {{ session('message') }}
			    </div>
			@endif
        <h2 class="text-uppercase text-center wellcome-custom"><i class="fa fa-comment fa-2x text-contact"></i>&nbsp Contact</h2> 
        <div class="col-md-6" id="messageSend">        
        <form class="para-font" action="{{url('sendEmail')}}" method="POST">
        	{!!csrf_field()!!}
            <div class="form-group">
                <level for="name">Name</level>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <level for="email">Email</level>
                <input required="" type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <level for="name">Subject</level>
                <input type="text" name="subject" class="form-control">
            </div>
            <div class="form-group">
                <level for="message">Message</level>
                <textarea required="" name="message" class="form-control" ></textarea>
            </div>
            <button name="submit" class="btn btn-primary pull-right"  >Send</button>
        </form>
        </div>
        <div class="col-md-offset-2 col-md-4 skilllist">
          <h4 class="text-uppercase wellcome-custom">Find Me On</h4>
          <ul >
            <li><span><i class="fa fa-mobile fa-3x" style="color:#000"></i> </span>&nbsp +8801677007983</li>
            <li><span><i class="fa fa-skype fa-2x" style="color:#00AFF0"></i> </span>&nbsp mdashikuzzamanashik</li>
            <li><span><i class="fa fa-facebook-square fa-2x" style="color:#21356A"></i> </span>&nbsp fb.com/strangerashik</li>
            <li><span><i class="fa fa-linkedin-square fa-2x" style="color:#1A84BC"></i> </span>&nbsp bd.linkedin.com/in/strangerashik</li>
          </ul>
           
        </div>
         
      </section>


@stop