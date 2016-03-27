@extends('admin.layout.layout')

@section('content')
<div class="row">
	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">User Profile</h3>
                 
                  <a href="{{url('admin/profileEdit/'.$profile->id)}}"<span class="glyphicon glyphicon-edit  pull-right" style="color:green"> </span></a>

                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                 <table id="example1" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                 <tr>
                 	<th>Name</th><td>{{$profile->name}}</td>
                 	
                 </tr>
                 <tr>
                 	<th>Email</th><td>{{$profile->email}}</td>
                 	
                 </tr>
                 <tr>
                 	<th>Password</th><td><a href="{{url('admin/changePassword/'.$profile->id)}}">Change Password</a></td>
                 	
                 </tr>
                 </table>
                </div>
    </div>
</div>
@stop
