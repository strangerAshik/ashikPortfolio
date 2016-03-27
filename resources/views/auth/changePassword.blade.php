@extends('admin.layout.layout')

@section('content')


<div class="row">

   <div class="col-md-12">
  
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title">Change Password</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
        
        
    
         {!!Form::open(array('url'=>'admin/updateUserPassword','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))!!}
         <div class="box-body"> 
         {!!Form::hidden('id',$id)!!}
          <div class="form-group ">
               <label for="title" class="col-md-2 control-label ">Existing Password</label>
               <div class="col-md-6">
                  <input type="password" name="old_password" class="form-control"  placeholder=" " required="">
               </div>
            </div>
            <div class="form-group ">
               <label for="title" class="col-md-2 control-label ">New Password</label>
               <div class="col-md-6">
                  <input type="password" name="password" class="form-control"  placeholder=" " required="">
               </div>
            </div>
            <div class="form-group ">
               <label for="title" class="col-md-2 control-label ">Confirm Password</label>
               <div class="col-md-6">
                  <input type="password" name="password_confirmation" class="form-control"  placeholder=" " required="">
               </div>
            </div>
         <!-- /.box-body -->
         <div class="box-footer">
            <div id="button1idGroup" class="btn-group pull-right" role="group" aria-label="">
                  <button type="reset" id="button1id" name="button1id" class="btn btn-default" aria-label="Cancel">Cancel</button>
                  <button type="submit" id="button2id" name="button2id" class="btn btn-primary" aria-label="Cancel">Change Password</button>
               </div>
         </div>
         <!-- /.box-footer -->
         </form>
      </div>
      <!-- /.box --> 
   </div>
</div>


@stop
