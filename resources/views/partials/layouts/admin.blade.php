<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }} | Trang chủ</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=" {{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('backend/dist/css/adminlte.min.css') }}">

  <style>
    .notification {
      position: fixed;
      bottom: 10px;
      left: -600px;
      max-width: 500px;
      padding: 30px;
      color: #fff;
      border-radius: 5px;
      transition: left .5s ease;
      z-index: 9999;
    }

    .notification .close {
      position: absolute;
      top: 0;
      right: 10px;
    }
  </style>

  @stack('css')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">


        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>

        <!-- user menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">{{ session('currentUser')['username'] }}</a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Thông tin
            </a>
            <a href="{{ route('auth.logout') }}" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Đăng xuất
            </a>
          </div>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    @include('partials.admin.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">

      <!-- Content Header -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="card p-3">
            <div class="row">
              <div class="col-sm-6">
                <h5 class="m-0">@yield('pageTitle')</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card p-3">
            @yield('content')
          </div>
        </div>
      </div>

    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>


  <x-flash-message></x-flash-message>

  <!-- jQuery -->
  <script src=" {{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src=" {{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src=" {{ asset('backend/dist/js/adminlte.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.0/autoNumeric.js"></script>
  
  <script>
    const notification = document.querySelector('.notification')

    const handleNotification = (notification) => {
      if (notification) {
        document.addEventListener('DOMContentLoaded', () => {
          (document.querySelectorAll('.notification .close') || []).forEach((btnClose) => {
            const snotification = btnClose.parentNode;

            btnClose.addEventListener('click', () => {
              snotification.parentNode.removeChild(notification);
            });
          });
        });

        setTimeout(() => {
          notification.style.left = '10px';
        }, 100)

        setTimeout(() => {
          notification.style.left = '-600px';
        }, 5000)
      }
    }

    handleNotification(notification)
  </script>

  @stack('js')
</body>

</html>
