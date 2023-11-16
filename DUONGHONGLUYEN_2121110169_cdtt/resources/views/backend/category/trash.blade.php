@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÙNG RÁC DANH MỤC SẢN PHẨM</h1>
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
                <a href="{{ route('category.index')}}" class="btn btn-sm btn-success">
                   <i class="fas fa-plus"></i>
                   Quay về danh sách
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">   
          @includeIf('backend.message')
            <table class="table table-bordered">
             <tr> 
               <th style="width:20px;" class="text-center">#</th>
               <th>Tên sản phẩm</th>
               <th>Hình đại diện</th>
               <th>Danh mục</th>
               <th>Thương hiệu</th>
               <th class="text-center">Ngày tạo</th>
               <th class="text-center">Chức năng</th>
               <th style="width:20px;" class="text-center">ID</th>
             </tr>

             @foreach ($list as $row)
             <tr>
              <td class="text-center">
                <input type="checkbox" name="checkId[]" value="{{$row->id}}">
              </td>
              <td>{{$row->name}}</td>
              <td class="text-center">
                <img class="img-fluid" src="{{ asset('images/category/'.$row->image)}}" alt="{{$row->image}}">
              </td>
              <td>{{$row->parent_id}}</td>
              <td>{{$row->sort_order}}</td>
              <td class="text-center">{{$row->created_at}}</td>
              <td class="text-center">
                 <a href="{{ route('category.restore',['category'=>$row->id])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-trash-restore"></i>
                 </a>
                 <form action="{{ route('category.destroy',['category'=>$row->id])}}" method="post">
                  @method('DELETE')
                  @csrf
                 <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                 </form>
              </td>
              <td class="text-center">{{$row->id}}</td>
             </tr>
             @endforeach
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <div class="row">
              <div class="col-12 text-right">
              <a href="{{ route('category.index')}}" class="btn btn-sm btn-success">
                   <i class="fas fa-plus"></i>
                   Quay về danh sách
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
@endsection