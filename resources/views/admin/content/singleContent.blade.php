@extends('admin.layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
  
     <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Single Content</h3>
                  <a onclick=" return confirm('Wanna Delete?')" style="color:red;float:right;" class="glyphicon glyphicon-trash" href="{{url('admin/delete/contents/'.$id)}}"></a>			 
				 &nbsp
                  <a href="{{url('admin/contentEdit/'.$id)}}"<span class="glyphicon glyphicon-edit  pull-right" style="color:green"> </span></a>

                </div><!-- /.box-header -->
                <div class="box-body ">
                 <table id="example1" class="display table table-striped table-bordered" cellspacing="0" width="100%">
			        
			        <tbody>
			        	<tr>
			        		<th>Title</th>
			        		<td>{{$contents->title}}</td>
			        	</tr>
			        	@if($contents->subtitle)
			        	<tr>
			        		<th>Subtitle</th>
			        		<td>{{$contents->subtitle}}</td>
			        	</tr>
			        	@endif
			        	<tr>
			        		<th>Category</th>
			        		<td>{{$contents->category}}</td>
			        	</tr>
			        	@if($contents->unique_key)
			        	<tr>
			        		<th>Unique Key</th>
			        		<td>{{$contents->unique_key}}</td>
			        	</tr>
			        	@endif
			        	@if($contents->content)
			        	<tr>
			        		<th>Content</th>
			        		<td><?php echo $contents->content;?></td>
			        	</tr>
			        	@endif
						@if($contents->more_content)
			        	<tr>
			        		<th>More Content</th>
			        		<td><?php echo $contents->more_content;?></td>
			        	</tr>
			        	@endif
			        	@if($contents->hyper_link)
			        	<tr>
			        		<th>Hyper Link</th>
			        		<td>{{$contents->hyper_link}}</td>
			        	</tr>
			        	@endif
			        	@if($images)
			        	<tr>
			        		<th>Images</th>
			        		<td>
								@foreach($images as $image)
									<span><img class="img-thumbnail" height="200" width="200"src="{{asset('public/uploads/'.$image->calling_id)}}"></span>
								@endforeach
			        		</td>
			        	</tr>
			        	@endif
			        	@if($pdfs)
			        	<tr>
			        		<th>PDFs</th>
			        		<td>
								@foreach($pdfs as $pdf)
									<span><a href="{{asset('public/uploads/'.$pdf->calling_id)}}">{{$pdf->doc_name}}</a></span>,
								@endforeach
			        		</td>
			        	</tr>
			        	@endif			        	
			        </tbody>
			     </table>
			    </div>
	</div>
	@stop
