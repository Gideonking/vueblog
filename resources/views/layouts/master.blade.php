
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>VueBlog | Starter</title>
   <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="http://vueblogg.test:8000" class="brand-link">
        <img src="./img/startup.png" alt="Vueblog Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Vue Blog</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link to="#" class="nav-link">
              <i class="nav-icon fab fa-audible pink bounce"></i>
                      <p>
                          Starter Page
                      </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt blue"></i>
                      <p>
                          Dashboard
                      </p>
              </router-link>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                <i class="nav-icon  fas fa-cog green fa-spin"></i>
                <p>
                  Management
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/users" class="nav-link active">
                    <i class="fas fa-users nav-icon cyan fa-spin"></i>
                    <p>Users</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/professors" class="nav-link active">
                  <i class="fas fa-chalkboard-teacher teal bounce"></i>
                    <p>Professors</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/students" class="nav-link active">
                  <i class="fas fa-user-graduate indigo bounce"></i>
                    <p>Students</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/courseYears" class="nav-link active">
                  <i class="fas fa-school black bounce"></i>
                    <p>Course Years</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/courseGroups" class="nav-link active">
                  <i class="fas fa-layer-group blue bounce"></i>
                    <p>Course Groups</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/courseSections" class="nav-link active">
                  <i class="fas fa-puzzle-piece silver fa-spin"></i>
                    <p>Course Sections</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/exams" class="nav-link active">
                  <i class="fas fa-book-reader orange"></i>
                    <p>Exams</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <a href="/areaChart" class="nav-link active">Charts</a>
                  <!-- <i class="fas fa-book-reader orange"></i>  -->
                    <!-- <!-- <p>Charts</p>
                  </router-link> -->
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <router-link to="/profile" class="nav-link">
                  <i class="nav-icon fas fa-user orange"></i>
                      <p>
                          Profile
                      </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/developer" class="nav-link">
                  <i class="nav-icon fas fa-user red"></i>
                      <p>
                          Developer
                      </p>
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                   <i class="nav-icon fas fa-power-off red fa-spin"></i>
                    <p> {{ __('Logout') }} </p>
                </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
          </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <router-view></router-view>
           <!-- set progressbar -->
        <vue-progress-bar></vue-progress-bar>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2018 <a href="#">VueBlog.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  <script src="/js/app.js"></script>
</body>
</html>
