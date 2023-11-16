@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<form action="{{ route('order.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="row">
              <div class="col-12 text-right">
              <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-save"></i>Lưu[Thêm]
                </button>
                <a href="{{ route('order.index')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus">Quay về danh sách</i>
                 </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                   <div class="mb-3">
                    <label>Code đơn hàng</label>
                    <input type="text" name="code" value="{{ old('code')}}" class="form-control">
                    @if( $errors->has('name'))
                      <div class="text-danger">{{ $errors->first('code') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Mã khách hàng</label>
                    <textarea name="userid" class="form-control">{{ old('userid')}}</textarea>
                    @if( $errors->has('userid'))
                      <div class="text-danger">{{ $errors->first('userid') }}</div> 
                    @endif 
                  </div>
                  <div class="mb-3">
                    <label>Tên người nhận</label>
                    <textarea name="deliveryname" class="form-control">{{ old('deliveryname')}}</textarea>
                    @if( $errors->has('deliveryname'))
                      <div class="text-danger">{{ $errors->first('deliveryname') }}</div> 
                    @endif 
                  </div>
                   <div class="mb-3">
                    <label>Số điện thoại người nhận</label>
                    <textarea name="deliveryphone" class="form-control">{{ old('deliveryphone')}}</textarea>
                    @if( $errors->has('deliveryphone'))
                      <div class="text-danger">{{ $errors->first('deliveryphone') }}</div> 
                    @endif 
                  </div>
                  <div class="mb-3">
                    <label>Email người nhận</label>
                    <textarea name="deliveryemail" class="form-control">{{ old('deliveryemail')}}</textarea>
                    @if( $errors->has('deliveryemail'))
                      <div class="text-danger">{{ $errors->first('deliveryemail') }}</div> 
                    @endif 
                  </div>
                  <div class="mb-3">
                    <label>Địa chỉ người nhận</label>
                    <textarea name="deliveryaddress" class="form-control">{{ old('deliveryaddress')}}</textarea>
                    @if( $errors->has('deliveryaddress'))
                      <div class="text-danger">{{ $errors->first('deliveryaddress') }}</div> 
                    @endif 
                  </div>
                </div>
                <div class="col-md-3">
                   <div class="mb-3">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="1">Xuất bản</option>
                        <option value="2">Chưa Xuất bản</option>
                    </select>
                   </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <div class="row">
              <div class="col-12 text-right">
              <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-save"></i>Lưu[Thêm]
                </button>
              <a href="{{ route('order.index')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus">Quay về danh sách</i>
                 </a>
              </div>
            </div>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

</form>
@endsection