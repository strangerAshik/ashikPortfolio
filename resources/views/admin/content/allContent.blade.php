@extends('admin.layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">

     <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Content
                   @if($catName)
                   of {{$catName->category}}
                   @endif

                   </h3>
                  <a href="#" ><span class="glyphicon glyphicon-plus-sign pull-right" style="color:green"></span></a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                 <table id="example1" class="display table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>               
                <th>Subtitle</th>
                <th>Category</th>                
                <th>Unique Key</th>                
                <th>Details</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Title</th>               
                <th>subtitle</th>
                <th>Category</th>                
                <th>Unique Key</th>                
                <th>Details</th>       
            </tr>
        </tfoot>
        <tbody>
        <?php $num=0;?>
        @foreach($allContent as $info)
            <tr>
                <td>{{++$num}}</td>
                <td>{{$info->title}}</td>
                <td>{{$info->subtitle}}</td>
                <td>{{$info->category}}</td>
                <td>{{$info->unique_key}}</td>                
                <td ><a href="{{url('admin/singleContent/'.$info->id)}}"<span class="badge" style="background-color: #3C8DBC">View</span></a></td>               
            </tr>
        @endforeach
        </tbody>
    </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div>
   

</div>
@stop