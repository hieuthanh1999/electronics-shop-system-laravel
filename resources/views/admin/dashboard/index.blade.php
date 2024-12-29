@extends('layouts.admin')
@section('content')
<style>


</style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6" >
                <!-- small box -->
                <x-box-dashboard :data="$revenue"  title="Tổng Doanh Thu" route="doanhthu" boxtype="warning">
                    <div class="title" >
                        <i class="fas fa-money-bill-wave"></i> <!-- Thêm icon cho doanh thu -->
                        Tổng Doanh Thu
                    </div>
                    <div class="data">{{ $revenue }}</div>
                </x-box-dashboard>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <x-box-dashboard :data="$orders" title="Tổng Đơn Hàng" route="donhang" boxtype="success">
                    <div class="title">
                        <i class="fas fa-box"></i> <!-- Thêm icon cho đơn hàng -->
                        Tổng Đơn Hàng
                    </div>
                    <div class="data">{{ $orders }}</div>
                </x-box-dashboard>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <x-box-dashboard :data="$admins" title="Tổng Nhân Sự" route="sanpham" boxtype="info">
                    <div class="title">
                        <i class="fas fa-users"></i> <!-- Thêm icon cho nhân sự -->
                        Tổng Nhân Sự
                    </div>
                    <div class="data">{{ $admins }}</div>
                </x-box-dashboard>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <x-box-dashboard :data="$profit" title="Tổng Lợi Nhuận" route="loinhuan" boxtype="danger">
                    <div class="title">
                        <i class="fas fa-chart-line"></i> <!-- Thêm icon cho lợi nhuận -->
                        Tổng Lợi Nhuận
                    </div>
                    <div class="data">{{ $profit }}</div>
                </x-box-dashboard>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <x-box-dashboard :data="$products" title="Tổng Sản Phẩm Tồn Kho" route="tonkho" boxtype="primary">
                    <div class="title">
                        <i class="fas fa-cogs"></i> <!-- Thêm icon cho sản phẩm -->
                        Tổng Sản Phẩm Tồn Kho
                    </div>
                    <div class="data">{{ $products }}</div>
                </x-box-dashboard>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <x-box-dashboard :data="$users" title="Tổng Khách Hàng" route="khachhang" boxtype="warning">
                    <div class="title">
                        <i class="fas fa-users"></i> <!-- Thêm icon cho khách hàng -->
                        Tổng Khách Hàng
                    </div>
                    <div class="data">{{ $users }}</div>
                </x-box-dashboard>
            </div>

          <div class="col-md-12">
             <!-- STACKED BAR CHART -->
             <div class="card card-success">
              <div class="card-header" style="background: #4f5962">
                <h3 class="card-title">Doanh Thu Tháng {{ $month }} Năm {{ $year }}</h3>
                <div id="data-statistics" days="{{ $days }}" parameters="{{ $parameters }}"></div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-12">
            <!-- PIE CHART -->
            <div class="card card-success">
              <div class="card-header" style="background: #4f5962">
                <h3 class="card-title" >Sản phẩm bán chạy nhất</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" label="{{ $labelBestSellProduct }}" data="{{ $parameterBestSellProduct }}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
            <!-- PIE CHART -->
            <div class="card card-primary" >
              <div class="card-header" style="background: #4f5962">
                <h3 class="card-title" >Sản phẩm có nhiều lượt đánh giá nhất</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="bestReview" label="{{ $labelBestProductReview }}" data="{{ $parameterBestProductReview }}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header" style="background: #4f5962; color: while ">
                <h3 class="card-title" style="color: while !important">Đơn Hàng Gần Đây</h3>
              </div>
              <x-table-crud
                :headers="$tableCrud['headers']"
                :list="$tableCrud['list']"
                :actions="$tableCrud['actions']"
                :routes="$tableCrud['routes']"
              />
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @vite(['resources/admin/js/dashboard.js'])
@endsection
