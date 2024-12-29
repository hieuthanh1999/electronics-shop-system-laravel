@include('layouts.admin-header')
@include('layouts.admin-sidebar')
<div class="content-wrapper">
    <style>
        /* Cải tiến toàn bộ box */
        .x-box-dashboard {
            position: relative;
            background: linear-gradient(145deg, #6a11cb, #2575fc); /* Gradient background */
            border-radius: 15px;  /* Góc bo tròn mượt mà */
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);  /* Bóng mờ nhẹ */
            transition: all 0.3s ease;
        }

        /* Hiệu ứng hover */
        .x-box-dashboard:hover {
            transform: translateY(-8px);  /* Hiệu ứng nâng lên khi hover */
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);  /* Tăng bóng khi hover */
            background: linear-gradient(145deg, #2575fc, #6a11cb);  /* Đổi gradient khi hover */
        }

        /* Tiêu đề */
        .x-box-dashboard .title {
            font-size: 18px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        /* Biểu tượng nhỏ bên cạnh tiêu đề */
        .x-box-dashboard .title i {
            margin-right: 10px;
        }

        /* Dữ liệu */
        .x-box-dashboard .data {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }

        /* Các màu sắc tùy chỉnh cho các loại box */
        .x-box-dashboard.warning {
            background: linear-gradient(145deg, #f39c12, #f1c40f);  /* Gradient màu vàng */
        }

        .x-box-dashboard.success {
            background: linear-gradient(145deg, #28a745, #218838);  /* Gradient xanh lá */
        }

        .x-box-dashboard.info {
            background: linear-gradient(145deg, #17a2b8, #138496);  /* Gradient xanh dương */
        }

        .x-box-dashboard.danger {
            background: linear-gradient(145deg, #dc3545, #c82333);  /* Gradient đỏ */
        }

        .x-box-dashboard.primary {
            background: linear-gradient(145deg, #007bff, #0069d9);  /* Gradient xanh dương đậm */
        }

        /* Button liên kết */
        .x-box-dashboard .btn-link {
            font-size: 14px;
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .x-box-dashboard .btn-link:hover {
            color: #ffcc00;  /* Màu vàng khi hover */
        }

        /* Nền sidebar tối và màu chữ sáng */
        .main-sidebar {
            background-color: #586777; /* Màu nền xám đen */
            color: #ffffff; /* Màu chữ trắng để dễ đọc */
        }

        /* Màu chữ các liên kết */
        .main-sidebar .nav-link {
            color: #dcdcdc; /* Màu xám sáng cho chữ */
            font-weight: 500; /* Làm cho chữ dễ đọc và rõ ràng */
        }

        /* Màu chữ khi hover */
        .main-sidebar .nav-link:hover {
            color: #ffffff; /* Chữ chuyển sang màu trắng khi hover */
            background-color: #1e90ff; /* Màu xanh dương sáng khi hover */
            border-radius: 4px; /* Viền bo góc mềm mại khi hover */
        }

        /* Màu chữ khi mục được chọn (active) */
        .main-sidebar .nav-link.active {
            background-color: #ff7f50; /* Màu cam sáng khi active */
            color: #ffffff; /* Màu trắng khi active */
        }

        /* Màu icon trong sidebar */
        .main-sidebar .nav-icon {
            color: #ffffff; /* Màu trắng cho icon */
        }

        /* Thêm hiệu ứng cho các icon khi hover */
        .main-sidebar .nav-icon:hover {
            color: #1e90ff; /* Chuyển màu icon thành xanh dương sáng khi hover */
        }

        /* Màu chữ tên người dùng */
        .main-sidebar .user-panel .info a {
            color: #ffffff; /* Chữ người dùng màu trắng */
            font-weight: bold; /* Chữ đậm cho tên người dùng */
        }

        /* Chỉnh sửa khoảng cách giữa các mục trong sidebar */
        .main-sidebar .nav-item {
            margin-bottom: 15px; /* Khoảng cách giữa các mục */
        }

        /* Thêm padding cho các liên kết trong sidebar */
        .main-sidebar .nav-item a {
            padding: 12px 15px; /* Padding cho các mục trong sidebar để tạo khoảng trống */
        }

        .btn-primary {
        background-color: #007bff !important;
        border-color: #007bff !important;
        }

        /* Ghi đè màu khi hover lên nút */
        .btn-primary:hover {
        background-color: #0069d9 !important; /* Màu khi hover */
        border-color: #0062cc !important;     /* Viền khi hover */
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @if (Session::has('success'))
        <span id="toast__js" message="{{ session('success') }}" type="success"></span>
    @elseif (Session::has('error'))
        <span id="toast__js" message="{{ session('error') }}" type="error"></span>
    @endif
      <!-- /.content-header -->
    @yield('content')
</div>
<x-loading />
@vite(['resources/admin/js/toast-message.js'])
@include('layouts.admin-footer')
