@extends('layouts.admin')
@section('content')
<section section class="content">
  <div class="container-fluid">
    <div class="row">

      <div id="form-data" hidden data-rules="{{ json_encode($rules) }}"
      data-messages="{{ json_encode($messages) }}"></div>
      <form class="row" action="{{route('admin.banners_update', ['id' => $banner->id])}}" method="POST" id="form__js" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Thông tin cơ bản</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="row">
              <div class="col-8">
                <div class="card-body row">
                  <x-admin-input-prepend label="Tên Tiêu Đề" width="auto">
                    <input
                      id="name"
                      type="text"
                      name="title"
                      value="{{ $banner->title }}"
                      class="form-control">
                  </x-admin-input-prepend>

                  <div class="card card-outline card-info col-12">
                    <div class="card-header">
                      <h3 class="card-title">
                        Mô Tả Sản Phẩm
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <textarea id="summernote" name="description">
                        {{ $banner->description }}
                      </textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card-body">
                  <div class="container">
                    <div class="preview">
                      <img id="img-preview" src="{{ asset("asset/client/images/banners/$banner->image") }}" />
                      <label for="file-input">Chọn Hình Ảnh</label>
                      <input hidden accept="image/*" type="file" id="file-input" name="image"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 text-center" style="padding-bottom: 10px;">
                <button class="btn btn-success">CẬP NHẬT</button>
                <button class="btn btn-danger">HỦY</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<script>
</script>
@vite(
[
  'resources/admin/js/user-create.js',
  'resources/admin/js/edit-product.js',
  'resources/admin/css/product.css',
  'resources/admin/css/form-edit.css',
  'resources/common/js/form.js',
])
@endsection
