@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<form action="{{ route('contact.update', ['contact'=>$row->id])}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa Contact</h1>
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
                    <i class="fas fa-save"></i>Lưu[Sửa]
                </button>
                <a href="{{ route('contact.index')}}" class="btn btn-sm btn-success">
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
                    <input type="text" name="name" value="{{ old('name', $row->name)}}" class="form-control">
                    @if( $errors->has('name'))
                      <div class="text-danger">{{ $errors->first('name') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $row->email)}}" class="form-control">
                    @if( $errors->has('email'))
                      <div class="text-danger">{{ $errors->first('email') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" value="{{ old('phone', $row->phone)}}" class="form-control">
                    @if( $errors->has('phone'))
                      <div class="text-danger">{{ $errors->first('phone') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" value="{{ old('title', $row->title)}}" class="form-control">
                    @if( $errors->has('title'))
                      <div class="text-danger">{{ $errors->first('title') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Chi Tiết</label>
                    <textarea name="detail" class="form-control">{{ old('detail', $row->detail)}}</textarea>
                    @if( $errors->has('detail'))
                      <div class="text-danger">{{ $errors->first('detail') }}</div> 
                    @endif         
                  </div>
                   <div class="mb-3">
                    <label>Nội dung liên hệ</label>
                    <textarea name="replaydetail" class="form-control">{{ old('replaydetail', $row->replaydetail)}}</textarea>
                    @if( $errors->has('replaydetail'))
                      <div class="text-danger">{{ $errors->first('replaydetail') }}</div> 
                    @endif 
                  </div>

                </div>
                <div class="col-md-3">                  
                   <div class="mb-3">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="1" <?=($row->status==1)?'selected':''?>>Xuất bản</option>
                        <option value="2" <?=($row->status==2)?'selected':''?>>Chưa Xuất bản</option>
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
                    <i class="fas fa-save"></i>Lưu[Sửa]
                </button>
              <a href="{{ route('contact.index')}}" class="btn btn-sm btn-success">
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