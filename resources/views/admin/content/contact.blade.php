@extends('admin.layout.layout')

@section('content')


<div class="row">

   <div class="col-md-6">
   
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title">New Contact</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
        
        
         {!!Form::open(array('url'=>'admin/saveContact','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))!!}
         <div class="box-body">
            <div class="form-group ">
               <label for="email" class="col-md-2 control-label ">Email
               </label>
               <div class="col-md-10">
                  <input name="email" class="form-control"  placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group ">
               <label for="phone" class="col-md-2 control-label ">Phone
               </label>
               <div class="col-md-10">
                  <input name="phone" class="form-control"  placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group ">
               <label for="mobile" class="col-md-2 control-label ">Mobile
               </label>
               <div class="col-md-10">
                  <input name="mobile" class="form-control"  placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group ">
               <label for="fax" class="col-md-2 control-label ">Fax
               </label>
               <div class="col-md-10">
                  <input name="fax" class="form-control"  placeholder=" " required="">
               </div>                          
            </div>
            <div class="form-group">
               <label for="description" class="col-md-2 control-label">Mailling Address</label>
               <div class="col-md-10">
                  <textarea name="mailling_address" class="form-control" rows="5"></textarea>
                  
               </div>
            </div>

            <div class="form-group ">
               <label for="gps_latitude" class="col-md-2 control-label ">Latitude
               </label>
               <div class="col-md-10">
                  <input name="gps_latitude" class="form-control"  placeholder=" " required="">
               </div>                          
            </div>
           
            <div class="form-group ">
               <label for="gps_longitude" class="col-md-2 control-label ">Longitude
               </label>
               <div class="col-md-10">
                  <input name="gps_longitude" class="form-control"  placeholder=" " required="">
               </div>                          
            </div>
            
          
         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            <div id="button1idGroup" class="btn-group pull-right" role="group" aria-label="">
                  <button type="reset" id="button1id" name="button1id" class="btn btn-default" aria-label="Cancel">Cancel</button>
                  <button type="submit" id="button2id" name="button2id" class="btn btn-primary" aria-label="Cancel">Save</button>
               </div>
         </div>
         <!-- /.box-footer -->
         </form>
      </div>
      <!-- /.box --> 
   </div>
   <div class="col-md-6">
   
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title">Contact Details</h3>
            @if($contact)
            <a onclick=" return confirm('Wanna Delete?')" style="color:red;float:right;" class="glyphicon glyphicon-trash" href="{{url('admin/deleteBack/contacts/'.$contact->id)}}"></a>         
             &nbsp
                  <a href="{{url('admin/contactEdit/'.$contact->id)}}"<span class="glyphicon glyphicon-edit  pull-right" style="color:green"> </span></a>
            @endif
         </div>
         <!-- /.box-header -->
         <!-- form start -->
         
         <div class="box-body">
         @if($contact)
         <table class="table table-striped">
            <tr>
               <th>Email</th>
               <td>{{$contact->email}}</td>
            </tr>
             <tr>
               <th>Phone</th>
               <td>{{$contact->phone}}</td>
            </tr>
             <tr>
               <th>Mobile</th>
               <td>{{$contact->moblie}}</td>
            </tr>
             <tr>
               <th>Fax</th>
               <td>{{$contact->fax}}</td>
            </tr>
             <tr>
               <th>Mailling Address</th>
               <td><?php echo nl2br($contact->mailling_address);?></td>
            </tr>
             <tr>
               <th>Latitude</th>
               <td>{{$contact->gps_latitude}}</td>
            </tr>
             <tr>
               <th>Longitude</th>
               <td>{{$contact->gps_longitude}}</td>
            </tr>
         </table>
         @else 
            <table>
               <tr>
                  <th colspan="2">No Contact Provided</th>
               </tr>
            </table>
         @endif
          
         </div>
         <!-- /.box-body -->
     
      </div>
      <!-- /.box --> 
   </div>
</div>


@stop
