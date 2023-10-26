<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
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
  <title> {{ env('APP_NAME') }} </title>
</head>
<body>
  
  <div class="super_container">

    @include('partials.layouts.navbar')
    @include('partials.modals.login')
    @include('partials.modals.register')

    @yield('content')

    @include('partials.layouts.footer')

  </div>

  <x-flash-message></x-flash-message>
  

  <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
  <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
  <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
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
