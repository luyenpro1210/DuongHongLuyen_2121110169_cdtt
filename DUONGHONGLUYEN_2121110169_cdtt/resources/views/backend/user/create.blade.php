@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<form action="{{ route('user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm</h1>
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
                <a href="{{ route('user.index')}}" class="btn btn-sm btn-success">
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
                    <label>Họ và Tên</label>
                    <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                    @if( $errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Tên tài khoản</label>
                    <input type="text" name="username" value="{{ old('username')}}" class="form-control">
                    @if( $errors->has('username'))
                    <div class="text-danger">{{ $errors->first('username') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" value="{{ old('password')}}" class="form-control">
                    @if( $errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email')}}" class="form-control">
                    @if( $errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" value="{{ old('phone')}}" class="form-control">
                    @if( $errors->has('phone'))
                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address')}}" class="form-control">
                    @if( $errors->has('address'))
                    <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                </div>
                <div class="col-md-3">
                   <div class="mb-3">
                    <label>Hình đại diện</label>
                    <input name="image" type="file" class="form-control">
                   </div>
                   <div class="mb-3">
                    <label>Giới Tính</label>
                    <select name="gender" class="form-control">
                        <option value="1">Nữ</option>
                        <option value="0">Nam</option>
                    </select>
                   </div>
                   <div class="mb-3">
                    <label>Quyền truy cập</label>
                    <select name="roles" class="form-control">
                        <option value="1">Được phép</option>
                        <option value="0">Không được phép</option>
                    </select>
                   </div>
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
              <a href="{{ route('user.index')}}" class="btn btn-sm btn-success">
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