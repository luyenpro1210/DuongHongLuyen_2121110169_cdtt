@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
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
                <a href="{{ route('product.index')}}" class="btn btn-sm btn-success">
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
                   <label>Tên sản phẩm</label>
                   <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                    @if( $errors->has('name'))
                      <div class="text-danger">{{ $errors->first('name') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                   <label>Từ khóa</label>
                    <textarea name="metakey" class="form-control">{{ old('metakey')}}</textarea>
                    @if( $errors->has('metakey'))
                      <div class="text-danger">{{ $errors->first('metakey') }}</div> 
                    @endif  
                   </div>
                   <div class="mb-3">
                   <label>Mô tả</label>
                    <textarea name="metadesc" class="form-control">{{ old('metadesc')}}</textarea>
                    @if( $errors->has('metadesc'))
                      <div class="text-danger">{{ $errors->first('metadesc') }}</div> 
                    @endif 
                    </div>
                   <div class="mb-3">
                    <label>Giá</label>
                    <input type="text" name="price" class="form-control">
                   </div>
                   <div class="mb-3">
                    <label>Giá khuyến mãi</label>
                    <input type="text" name="pricesale" class="form-control">
                   </div>
                   <div class="mb-3">
                    <label>Số lượng</label>
                    <input type="text" name="qty" class="form-control">
                   </div>
                   <div class="mb-3">
                    <label>Chi tiết</label>
                    <textarea name="detail" class="form-control"></textarea>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="mb-3">
                    <label>Danh mục cha</label>
                    <select name="category_id" class="form-control">
                        <option value="0">Danh mục cha</option>
                        {!! $html_category_id !!}
                    </select>
                   </div>
                   <div class="mb-3">
                    <label>Thương Hiệu</label>
                    <select name="brand_id" class="form-control">
                        <option value="0">Loại cha</option>
                        {!! $html_brand_id !!}
                    </select>
                   </div>
                   <div class="mb-3">
                    <label>Hình đại diện</label>
                    <input name="image" type="file" class="form-control">
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
              <a href="{{ route('product.index')}}" class="btn btn-sm btn-success">
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