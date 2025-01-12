<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="{{ asset('asset/client/images/favicon.png') }}">
      <title>{{ setting_website()->name }}</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link href="{{ asset('asset/client/css/bootstrap.css') }}" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="{{ asset('asset/client/css/font-awesome.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('asset/client/css/flexslider.css') }}" type="text/css" media="screen"/>
      <link href="{{ asset('asset/client/css/sequence-looptheme.css') }}" rel="stylesheet" media="all"/>
      <link href="{{ asset('asset/client/css/style.css') }}" rel="stylesheet">
      <script src="{{ asset('asset/client/js/jquery.elevatezoom.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('asset/admin/plugins/fontawesome-free/css/all.min.css') }}">
      @vite(['resources/client/css/auth.css', 'resources/client/css/home.css'])
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
   </head>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
    const accountIcon = document.querySelector('.account-icon'); // Icon tài khoản
    const accountDropdown = document.querySelector('.account-dropdown'); // Dropdown menu

    accountIcon.addEventListener('click', function (e) {
        console.log("đâsdsa");
        e.preventDefault(); // Ngừng hành động mặc định của liên kết
        accountDropdown.classList.toggle('active'); // Toggle dropdown
    });

    // Nếu người dùng click ra ngoài dropdown, ẩn menu
    document.addEventListener('click', function (e) {
        if (!accountIcon.contains(e.target) && !accountDropdown.contains(e.target)) {
            accountDropdown.classList.remove('active'); // Ẩn dropdown nếu click ngoài
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {

const menuLinks = document.querySelectorAll('.menu-link'); // Lấy tất cả các menu-link

menuLinks.forEach(menuLink => {
    menuLink.addEventListener('click', function (e) {
        e.preventDefault(); // Ngừng hành động mặc định của liên kết

        const menuItem = this.closest('.menu-item'); // Lấy menu item cha
        const submenu = menuItem.querySelector('.submenu'); // Lấy submenu của item này

        // Đóng tất cả các submenu khác trước khi mở submenu hiện tại
        document.querySelectorAll('.submenu').forEach(sm => {
            if (sm !== submenu) {
                sm.classList.remove('active');
                sm.closest('.menu-item').classList.remove('open');
            }
        });

        // Toggle submenu khi click
        if (submenu) {
            submenu.classList.toggle('active'); // Hiển thị hoặc ẩn submenu
            menuItem.classList.toggle('open'); // Thay đổi icon và text khi click
        }
    });
});

// Đóng submenu khi click ra ngoài
document.addEventListener("click", function (e) {
    if (!e.target.closest('.menu-item')) {
        // Đóng tất cả các submenu
        document.querySelectorAll('.submenu').forEach(submenu => {
            submenu.classList.remove('active');
            submenu.closest('.menu-item').classList.remove('open');
        });
    }
});

});


   </script>
   <style>
      .thumbnail{
          margin: unset;
          height: 260px;
      }

      .thumbnail img{
          height: 100% !important;
          width: 100% !important;
          object-fit: cover;
      }
      .productname{
          padding-top: 0;
      }
  </style>
   <body id="home">
      <div class="wrapper">
         <div class="header" style="background-color: #4f5962">
            <div class="container">
               <div class="row" style="display: flex; align-items: center">
                  <div class="col-md-4 col-sm-4" style="display: flex; align-items: center">
                    <div class="sidebar">
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="fa fa-bars" style="color: white"></i> <!-- Icon menu ban đầu -->
                                    <span class="menu-text" style="color: white;
                                                        text-decoration: none;
                                                            font-size: 10px;
                                                        text-transform: uppercase;">Menu</span> <!-- Text menu -->
                                </a>
                                <ul class="submenu">
                                    <li><a href="{{ route('user.home') }}">Trang Chủ</a></li>
                                    @foreach (category_header() as $category)
                                        <li><a href="{{ route('user.products', $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                    <li><a href="{{ route('user.introduction') }}">Giới Thiệu</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="logo">
                        <a href="{{ route('user.home') }}">
                           <img src="{{ asset("asset/client/images/" . setting_website()->logo) }}" alt="Cửa hàng Linh kiện điện tử giá tốt">
                        </a>
                     </div>
                  </div>
                  {{-- Logo --}}
                  {{-- Search --}}
                <div class="col-md-5 col-sm-5">
                    <form method="GET" action="{{ route('user.search') }}" class="search-form" style="display: flex;">
                        <input class="search-keyword" placeholder="Tìm kiếm sản phẩm" type="text" name="keyword">
                        <input class="search-submit" type="submit" value="">
                    </form>
                </div>
                <div class="col-md-3 col-sm-3" style="display: flex; align-items: center;">
                    <div class="option-cart" style="margin: 0 10px;">
                        <a style=" display: flex;
                            flex-direction: column;
                            align-items: center;"
                            href="{{ route('cart.index') }}"><svg class="svg-ico-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 -13 456.75885 456" width="456pt">
                            <path d="m150.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0"></path>
                            <path d="m446.855469 94.035156h-353.101563l-7.199218-40.300781c-4.4375-24.808594-23.882813-44.214844-48.699219-48.601563l-26.101563-4.597656c-5.441406-.96875-10.632812 2.660156-11.601562 8.097656-.964844 5.441407 2.660156 10.632813 8.101562 11.601563l26.199219 4.597656c16.53125 2.929688 29.472656 15.871094 32.402344 32.402344l35.398437 199.699219c4.179688 23.894531 24.941406 41.324218 49.199219 41.300781h210c22.0625.066406 41.546875-14.375 47.902344-35.5l47-155.800781c.871093-3.039063.320312-6.3125-1.5-8.898438-1.902344-2.503906-4.859375-3.980468-8-4zm-56.601563 162.796875c-3.773437 12.6875-15.464844 21.367188-28.699218 21.300781h-210c-14.566407.039063-27.035157-10.441406-29.5-24.800781l-24.699219-139.398437h336.097656zm0 0"></path>
                            <path d="m360.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0"></path>
                        </svg>
                        <span class="menu-text" style="color: white;
                        text-decoration: none;
                        font-size: 10px;
                        text-transform: uppercase;">Giỏ hàng</span> <!-- Text menu --></a>

                    </div>
                    <div class="option-user" style="margin: 0 10px;">
                        @if (Auth::check())
                            <ul class="nav navbar-nav usermenu">
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle profile" data-toggle="dropdown">
                                    <i class="fas fa-user fa-2x"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu-links">

                                        @if(auth()->user()->role_id == 1)
                                            <li><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                                        @endif
                                        <li><a href="{{ route('profile.index') }}">Thông tin cá nhân</a></li>
                                        <li><a href="{{ route('order_history.index') }}">Lịch sử mua hàng</a></li>
                                        <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                    </ul>
                                </div>
                                </li>
                            </ul>
                            @else
                            <div class="usermenu-log-regis" style="display: flex; align-items: center; position: relative;">
                                <!-- Icon tài khoản -->
                                <div class="account-icon">
                                    <a href="#" class="account-link" style=" display: flex;
                                    flex-direction: column;
                                    align-items: center;">
                                        <svg class="svg-ico-account" viewBox="0 0 1024 1024">
                                            <path class="path1" d="M486.4 563.2c-155.275 0-281.6-126.325-281.6-281.6s126.325-281.6 281.6-281.6 281.6 126.325 281.6 281.6-126.325 281.6-281.6 281.6zM486.4 51.2c-127.043 0-230.4 103.357-230.4 230.4s103.357 230.4 230.4 230.4c127.042 0 230.4-103.357 230.4-230.4s-103.358-230.4-230.4-230.4z"></path>
                                            <path class="path2" d="M896 1024h-819.2c-42.347 0-76.8-34.451-76.8-76.8 0-3.485 0.712-86.285 62.72-168.96 36.094-48.126 85.514-86.36 146.883-113.634 74.957-33.314 168.085-50.206 276.797-50.206 108.71 0 201.838 16.893 276.797 50.206 61.37 27.275 110.789 65.507 146.883 113.634 62.008 82.675 62.72 165.475 62.72 168.96 0 42.349-34.451 76.8-76.8 76.8zM486.4 665.6c-178.52 0-310.267 48.789-381 141.093-53.011 69.174-54.195 139.904-54.2 140.61 0 14.013 11.485 25.498 25.6 25.498h819.2c14.115 0 25.6-11.485 25.6-25.6-0.006-0.603-1.189-71.333-54.198-140.507-70.734-92.304-202.483-141.093-381.002-141.093z"></path>
                                        </svg>
                                        <span class="menu-text" style="color: white;
                                                        text-decoration: none;
                                                            font-size: 10px;
                                                        text-transform: uppercase;">Tài khoản</span> <!-- Text menu -->
                                    </a>
                                </div>

                                <!-- Dropdown menu cho tài khoản -->
                                <div class="account-dropdown">
                                    <div><a href="{{ route('user.login') }}" class="log">Đăng Nhập</a></div>
                                    <div><span style="background-color: #fff; color: #fff">|</span></div>
                                    <div><a href="{{ route('user.register') }}" class="reg">Đăng Kí</a></div>
                                </div>
                            </div>


                        @endif
                    </div>
                </div>
                  {{-- <div class="col-md-4 col-sm-4">
                     <div class="header_top">
                        <div class="row">
                           <div class="col-md-6">
                              <ul class="topmenu">
                                 <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                 <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                 <li><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                              </ul>
                           </div>
                           <div class="col-md-12">
                              @if (Auth::check())
                              <ul class="nav navbar-nav usermenu">
                                 <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown">
                                       <img src="{{ asset('asset/client/images/loginbg.png') }}" alt="">
                                       <span>{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu">
                                       <ul class="mega-menu-links">
                                          <li><a href="{{ route('profile.index') }}">Thông tin cá nhân</a></li>
                                          <li><a href="{{ route('order_history.index') }}">Lịch sử mua hàng</a></li>
                                          <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                       </ul>
                                    </div>
                                 </li>
                              </ul>
                              @else
                              <ul class="usermenu">
                                 <li><a href="{{ route('user.login') }}" class="log">Đăng Nhập</a></li>

                                 <li><a href="{{ route('user.register') }}" class="reg">Đăng Kí</a></li>
                              </ul>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="header_bottom">
                        <ul class="option">
                           <li id="search" class="search">
                              <form method="GET" action="{{ route('user.search') }}">
                                 <input class="search-submit" type="submit" value="">
                                 <input class="search-input" placeholder="Enter your search term..." type="text" value="" name="keyword">
                              </form>
                           </li>
                           <li class="option-cart">
                              <a href="{{ route('cart.index') }}" class="cart-icon">cart <span class="cart_no"></span></a>
                           </li>
                        </ul>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>


                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
         @yield('content-client')
         <div class="clearfix"></div>
         <div class="footer">
            <div class="footer-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="footer-logo">
                           <a href="{{ route('user.home') }}">
                              <img src="{{ asset("asset/client/images/" . setting_website()->logo) }}" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Thông tin liên hệ</h4>
                        <p>{{ setting_website()->address }}</p>
                        <p>Số điện thoại : {{ setting_website()->phone_number }}</p>
                        <p>Email : {{ setting_website()->email }}</p>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Về chúng tôi</h4>
                        <p>
                           Chuyên bán thời trang an toàn. Tin cậy nhanh chóng. Chăm sóc khách hàng 24/24
                        </p>
                     </div>
                     <div class="col-md-3">
                        <h4 class="title">Nhận thông tin từ chúng tôi</h4>
                        <p>Cảm ơn rất nhiều</p>
                        <form class="newsletter">
                           <input type="text" name="" placeholder="Email của bạn">
                           <input type="submit" value="Gửi" class="button">
						      </form>
                     </div>
                  </div>
               </div>
            </div>
            {{-- <div class="copyright-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
                     </div>
                     <div class="col-md-6">
                        <ul class="social-icon">
                           <li><a href="#" class="linkedin"></a></li>
                           <li><a href="#" class="google-plus"></a></li>
                           <li><a href="#" class="twitter"></a></li>
                           <li><a href="#" class="facebook"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
      @if (Session::has('success'))
        <span id="toast__js" message="{{ session('success') }}" type="success"></span>
      @elseif (Session::has('error'))
         <span id="toast__js" message="{{ session('error') }}" type="error"></span>
      @endif
      <!-- Bootstrap core JavaScript==================================================-->
      <script src="{{ asset('asset/admin/plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('asset/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
      <script type="text/javascript" src="{{ asset('asset/client/js/jquery-1.10.2.min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.easing.1.3.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/bootstrap.min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.sequence-min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
     <script type="text/javascript" src="{{ asset('asset/client/js/script.min.js') }}" ></script>
	  <script defer src="{{ asset('asset/client/js/jquery.flexslider.js') }}"></script>
     @vite(['resources/admin/js/toast-message.js'])
   </body>
</html>
