@extends('admin.layout.layout')

@section('content')


<div class="row">

   <div class="col-md-12">
   
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title">Edit Contact</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
        
       
         {!!Form::open(array('url'=>'admin/updateContact','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))!!}
         {!!Form::hidden('id',$contact->id)!!}
         <div class="box-body">
            <div class="form-group ">
               <label for="email" class="col-md-2 control-label ">Email
               </label>
               <div class="col-md-10">
                  <input name="email" class="form-control" value="{{$contact->email}}" placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group ">
               <label for="phone" class="col-md-2 control-label ">Phone
               </label>
               <div class="col-md-10">
                  <input name="phone" class="form-control" value="{{$contact->phone}}" placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group ">
               <label for="mobile" class="col-md-2 control-label ">Mobile
               </label>
               <div class="col-md-10">
                  <input name="mobile" class="form-control"  value="{{$contact->moblie}}" placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group ">
               <label for="fax" class="col-md-2 control-label ">Fax
               </label>
               <div class="col-md-10">
                  <input name="fax" class="form-control"  value="{{$contact->fax}}" placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group">
               <label for="description" class="col-md-2 control-label">Mailling Address</label>
               <div class="col-md-10">
                  <textarea name="mailling_address" class="form-control" rows="5">
                     {{$contact->mailling_address}}
                  </textarea>
                  
               </div>
            </div>

            <div class="form-group ">
               <label for="gps_latitude" class="col-md-2 control-label ">Latitude
               </label>
               <div class="col-md-10">
                  <input name="gps_latitude" class="form-control" value="{{$contact->gps_latitude}}" placeholder=" " required="">
               </div>                          
            </div>
           
            <div class="form-group ">
               <label for="gps_longitude" class="col-md-2 control-label ">Longitude
               </label>
               <div class="col-md-10">
                  <input name="gps_longitude" class="form-control"  value="{{$contact->gps_longitude}}" placeholder=" " required="">
               </div>                          
            </div>
            
          
         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            <div id="button1idGroup" class="btn-group pull-right" role="group" aria-label="">
                  <button type="reset" id="button1id" name="button1id" class="btn btn-default" aria-label="Cancel">Cancel</button>
                  <button type="submit" id="button2id" name="button2id" class="btn btn-primary" aria-label="Cancel">Update</button>
               </div>
         </div>
         <!-- /.box-footer -->
         </form>
      </div>
      <!-- /.box --> 
   </div>
  
</div>


@stop
