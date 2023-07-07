<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('images/users/'.Auth::user()->photo)}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form --
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
           /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>



            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Management Cities</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('cities.create')}}"><i class="fa fa-circle-o"></i> Add </a></li>
                <li><a href="{{route('cities.index')}}"><i class="fa fa-circle-o"></i> Display all</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Management Companies</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('companies.create')}}"><i class="fa fa-circle-o"></i> Add </a></li>
                <li><a href="{{route('companies.index')}}"><i class="fa fa-circle-o"></i> Display all</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Management Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i> Add </a></li>
                <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> Display all</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Management Requests</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('managers.index')}}"><i class="fa fa-circle-o"></i> Display all</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="{{route('statistical')}}">
                <i class="fa fa-edit"></i> <span>Statistical</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

          </ul>
        </section>
