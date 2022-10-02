@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
@endphp


<!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item has-treeview {{ ($prefix=='/courses')?'menu-open': '' }}">
            <a href="#" class="nav-link">

              <p>
                Course Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('courses.index') }}" class="nav-link {{ ($route=='courses.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Courses</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('courses.create') }}" class="nav-link {{ ($route=='courses.create')?'active':'' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Courses</p>
                  </a>
                </li>
              </ul>
          </li>
              <li class="nav-item has-treeview {{ ($prefix=='/students')?'menu-open': '' }}">
            <a href="#" class="nav-link">

              <p>
                Student Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('students.index') }}" class="nav-link {{ ($route=='students.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Students</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('register') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Students</p>
                  </a>
                </li>
              </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
