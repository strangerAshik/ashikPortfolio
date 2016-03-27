@section('leftAside')
 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
               <img src="{{asset('public/adminAsset/images/admin.png')}}" class="user-image img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin: {{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
    <!--       <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="{{url('admin/dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
           
            <!--New Content-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Content Manager</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/content/new')}}"><i class="fa fa-circle-o"></i>New Content</a></li>
                <li><a href="{{url('admin/contact')}}"><i class="fa fa-circle-o"></i>Contact</a></li>
                <li><a href="{{url('admin/categories')}}"><i class="fa fa-circle-o"></i>Categories</a></li>
                <li><a href="{{url('admin/allContent')}}"><i class="fa fa-circle-o"></i>All Content</a></li>
              </ul>
            </li>
            <!--Contact-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Contact</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">                
                <li><a href="{{url('admin/contact')}}"><i class="fa fa-circle-o"></i>Contact</a></li>
              </ul>
            </li>
            <!--Category Wise Content-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Category Wise Content</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <?php $categories=App\contentModel::getCategoryAsObject()?>
              <ul class="treeview-menu">
                @foreach($categories as $info)
                <li><a href="{{url('admin/categoryResource/'.$info->id)}}"><i class="fa fa-circle-o"></i>{{$info->category}}</a></li>
                @endforeach
              
              </ul>
            </li>
            <!--User -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
              <ul class="treeview-menu">               
               <li><a href="{{url('admin/profile/')}}"><i class="fa fa-circle-o"></i>My Profile</a></li>
               <li><a href="{{url('admin/addUser')}}"><i class="fa fa-circle-o"></i>Add User</a></li>
               <li><a href="{{url('admin/allUsers')}}"><i class="fa fa-circle-o"></i>All Users</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
@stop