<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="saleeshprakash">
  <meta name="csrf_token" content="{{ csrf_token() }}">
  <title>Student Management System</title>

  <title>Dashboard</title>

  <!-- vendor css -->
  <link href="{{asset('/')}}lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="{{asset('/')}}lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="{{asset('/')}}lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link href="{{asset('/')}}lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">

  <!-- Bracket CSS -->
  <link rel="stylesheet" href="{{asset('/')}}css/bracket.css">

  <style>
    label.error {
      color: red;
      font-size: 12px;
    }
  </style>
</head>

<body>

  <div class="br-logo"><a href=""><span>[</span>SMS<span>]</span></a></div>
  <div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
      <a href="{{route('dashboard')}}" class="br-menu-link {{Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div>
      </a>
      <a href="{{route('students')}}" class="br-menu-link {{Route::currentRouteName() === 'students' ? 'active' : '' }}">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-people tx-22"></i>
          <span class="menu-item-label">Students</span>
        </div>
      </a>
    </div>
    <br>
  </div>

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="br-header">
    <div class="br-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- br-header-left -->
    <div class="br-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name hidden-md-down">{{Auth::user()->name}}</span>
            <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
            <span class="square-10 bg-success"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      <div class="navicon-right">
        &nbsp;
      </div><!-- navicon-right -->
    </div><!-- br-header-right -->
  </div><!-- br-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: MAIN PANEL ########## -->
  @yield('main-content')
  <!-- ########## END: MAIN PANEL ########## -->

  <script src="{{asset('/')}}lib/jquery/jquery.js"></script>
  <script src="{{asset('/')}}lib/popper.js/popper.js"></script>
  <script src="{{asset('/')}}lib/bootstrap/bootstrap.js"></script>
  <script src="{{asset('/')}}lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="{{asset('/')}}lib/moment/moment.js"></script>
  <script src="{{asset('/')}}lib/jquery-ui/jquery-ui.js"></script>
  <script src="{{asset('/')}}lib/jquery-switchbutton/jquery.switchButton.js"></script>
  <script src="{{asset('/')}}lib/peity/jquery.peity.js"></script>

  <script src="{{asset('/')}}js/bracket.js"></script>
  <script src="{{asset('/')}}js/jquery.validate.min.js"></script>

  @yield('scripts')
</body>

</html>