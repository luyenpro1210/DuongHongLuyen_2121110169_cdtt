@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm bài viết</h1>
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
                <a href="{{ route('post.index')}}" class="btn btn-sm btn-success">
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
                    <label>Tiêu đề bài viết</label>
                    <input type="text" name="title" value="{{ old('title')}}" class="form-control">
                    @if( $errors->has('title'))
                      <div class="text-danger">{{ $errors->first('title') }}</div> 
                    @endif 
                   </div>
                   <div class="mb-3">
                    <label>Chi tiết</label>
                    <textarea name="detail" class="form-control">{{ old('detail')}}</textarea>
                    @if( $errors->has('detail'))
                      <div class="text-danger">{{ $errors->first('detail') }}</div> 
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
                </div>
                <div class="col-md-3">
                   <div class="mb-3">
                    <label>Mã chủ đề</label>
                    <select name="topic_id" class="form-control">
                        <option value="0">Danh mục cha</option>
                        {!! $html_topic_id !!}
                    </select>
                   </div>
                   <div class="mb-3">
                    <label>Kiểu bài viết</label>
                    <select name="type" class="form-control">
                        <option value="0">Chọn kiểu</option>
                        {!! $html_type !!}
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
              <a href="{{ route('post.index')}}" class="btn btn-sm btn-success">
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