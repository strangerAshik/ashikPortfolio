@extends('admin.layout.layout')
@section('content')
<div class="row">
    <div class="col-md-6">
  
     <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Categories</h3>
                  <a href="#" ><span data-toggle="modal" data-target="#addCategory"  class="glyphicon glyphicon-plus-sign pull-right" style="color:green"></span></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <table id="example1" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>               
                <th>Edit</th>
                <th>Delete</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>#</th>
                <th>Category</th>                
                <th>Edit</th>
                <th>Delete</th>    
            </tr>
        </tfoot>
        <tbody>
        <?php $num=0;?>
       
        @foreach($categoryObject as $info)
            <tr>
                <td>{{++$num}}</td>
                <td>{{$info->category}}</td>
                
                <td >
                <a href="#" data-toggle="modal" data-target="#editCategory{{$info->id}}"><span class="glyphicon glyphicon-edit" style="color:green"> </span></a></td>

                <td>
                <a onclick=" return confirm('Wanna Delete?')" style="color:red;" class="glyphicon glyphicon-trash" href="{{url('admin/deleteBack/categories/'.$info->id)}}"></a>   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div>

    <div style="display: none" class="col-md-6">
   
    </div>

</div>
<!--Edit of Category-->
@foreach($categoryObject as $info)
  <div class="modal fade" id="editCategory{{$info->id}}" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Category</h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" role="form" method="POST" action="{{url('admin/updateCategory')}}">
            {!!Form::hidden('id',$info->id)!!}
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Category</label>
                    <div class="col-sm-10">
                        <input type="text" name="category" value="{{$info->category}}" class="form-control" 
                        id="" placeholder=""/>
                    </div>
                  </div>
                 
                 <div id="button1idGroup" class="btn-group pull-right" role="group" aria-label="">
                  <button type="button" id="button1id" name="button1id" class="btn btn-default " aria-label="Cancel" data-dismiss="modal">Cancel</button>
                  <button type="submit" id="button2id" name="button2id" class="btn btn-primary " aria-label="Cancel">Save</button>
                  </div>
             
                  
                 
                  
                </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
@endforeach
@include('admin.content.entryForm')
@yield('category')

@stop