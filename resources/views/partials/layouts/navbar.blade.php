 <!-- Header -->
 <header class="header trans_300">

   <div class="top_nav">
     <div class="container">
       <div class="row">
         <div class="col-md-6">
           <div class="top_nav_left">free shipping on all u.s orders over $50</div>
         </div>
         <div class="col-md-6 text-right">
           <div class="top_nav_right">
             <ul class="top_nav_menu">

                @if (session('currentUser'))
                  <li class="account">
                    <a href="#">{{ session('currentUser')['username'] }}<i class="fa fa-angle-down"></i></a>
                    <ul class="account_selection" style="width: 150px;">
                      <li><a href="{{ route('client.userInfo') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Thông tin</a></li>
                      <li><a href="{{ route('auth.logout') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng xuất</a></li>
                    </ul>
                  </li>
                @else
                  <li class="account">
                    <a href="#">Tài khoản<i class="fa fa-angle-down"></i></a>
                    <ul class="account_selection" style="width: 150px;">
                      <li style="cursor: pointer;"><a type="button" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
                      <li style="cursor: pointer;"><a type="button" data-toggle="modal" data-target="#registerModal"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
                    </ul>
                  </li>
                @endif

             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="main_nav_container">
     <div class="container">
       <div class="row">
         <div class="col-lg-12 text-right">
           <div class="logo_container">
             <a href="{{ route('client.home') }}">Mobile<span>Tech</span></a>
           </div>
           <nav class="navbar">

             <ul class="navbar_menu">
               <li><a href="{{ route('client.home') }}">Trang chủ</a></li>
               <li><a href="{{ route('client.store') }}">Sản phẩm</a></li>
             </ul>

             <ul class="navbar_user">

               <li class="checkout">
                 <a href="{{ route('client.cart') }}">
                   <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                   <span id="checkout_items" class="checkout_items">{{ $cartCount }}</span>
                 </a>
               </li>
               
             </ul>

             <div class="hamburger_container">
               <i class="fa fa-bars" aria-hidden="true"></i>
             </div>

           </nav>
         </div>
       </div>
     </div>
   </div>

 </header>

 <div class="fs_menu_overlay"></div>
 <div class="hamburger_menu">
   <div class="hamburger_close" style="cursor: pointer;"><i class="fa fa-times" aria-hidden="true"></i></div>
   <div class="hamburger_menu_content text-right">
     <ul class="menu_top_nav">
       
      @if (session('currentUser'))
        <li class="menu_item has-children">
          <a href="#">{{session('currentUser')['username']}}<i class="fa fa-angle-down"></i></a>
          <ul class="menu_selection">
            <li style="cursor: pointer;"><a href="{{ route('client.userInfo') }}"></i>Thông tin</a></li>
            <li style="cursor: pointer;"><a href="{{ route('auth.logout') }}"></i>Đăng xuất</a></li>
          </ul>
        </li>
      @else
        <li class="menu_item has-children">
          <a href="#">Tài khoản<i class="fa fa-angle-down"></i></a>
          <ul class="menu_selection">
            <li style="cursor: pointer;"><a type="button" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
            <li style="cursor: pointer;"><a type="button" data-toggle="modal" data-target="#registerModal"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
          </ul>
        </li>
      @endif

       <li class="menu_item"><a href="#">Trang chủ</a></li>
       <li class="menu_item"><a href="#">Sản phẩm</a></li>
     </ul>
   </div>
 </div>
