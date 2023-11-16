@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<form action="{{ route('slider.update', ['slider'=>$row->id])}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật danh mục</h1>
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
                <a href="{{ route('slider.index')}}" class="btn btn-sm btn-success">
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
                    <label>Tên Slider</label>
                    <input type="text" name="name" value="{{ old('name', $row->name)}}" class="form-control">
                    @if( $errors->has('name'))
                      <div class="text-danger">{{ $errors->first('name') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Link</label>
                    <textarea name="link" class="form-control">{{ old('link', $row->link)}}</textarea>
                    @if( $errors->has('link'))
                      <div class="text-danger">{{ $errors->first('link') }}</div> 
                    @endif         
                  </div>
                </div>
                <div class="col-md-3">
                <div class="mb-3">
                    <label>Thứ tự</label>
                    <select name="position" class="form-control">
                        <option value="0">Chọn vị trí</option>
                        {!! $html_position !!}
                    </select>
                   <div class="mb-3">
                    <label>Sắp xếp</label>
                    <select name="sort_order" class="form-control">
                        <option value="0">Chọn vị trí</option>
                        {!! $html_sort_order !!}
                    </select>
                   </div>
                   <div class="mb-3">
                    <label>Hình đại diện</label>
                    <input name="image" type="file" class="form-control">
                   </div>
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
              <a href="{{ route('slider.index')}}" class="btn btn-sm btn-success">
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