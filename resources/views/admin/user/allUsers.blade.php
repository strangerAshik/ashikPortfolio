@extends('admin.layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">

     <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Users
                 

                   </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                 <table id="example1" class="display table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>               
                <th>Email Address</th>
                          
                <th>Details</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>               
                <th>Email Address</th>
                          
                <th>Details</th>    
            </tr>
        </tfoot>
        <tbody>
        <?php $num=0;?>
        @foreach($users as $info)
            <tr>
                <td>{{++$num}}</td>
                <td>{{$info->name}}</td>
                <td>{{$info->email}}</td>
                           
                <td ><a href="{{url('admin/singleUser/'.$info->id)}}"<span class="badge" style="background-color: #3C8DBC">View</span></a></td>               
            </tr>
        @endforeach
        </tbody>
    </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div>
   

</div>
@stop