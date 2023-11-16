@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đơn hàng</h1>
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
                <a href="{{ route('order.create')}}" class="btn btn-sm btn-success">
                   <i class="fas fa-plus"></i>
                   Thêm
                </a>
                <a href="{{ route('menu.trash')}}" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                 Thùng rác
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
               <th>Code đơn hàng</th>
               <th>Tên người nhận</th>
               <th>Mã khách hàng</th>
               <th>Email người nhận</th>
               <th>Điện thoại người nhận</th>
               <th>Địa chỉ người nhận</th>
               <th class="text-center">Ngày xuất</th>
               <th class="text-center">Ngày tạo</th>
               <th class="text-center">Chức năng</th>
               <th style="width:20px;" class="text-center">ID</th>
             </tr>

             @foreach ($list as $row)
             <tr>
              <td class="text-center">
                <input type="checkbox" name="checkId[]" value="{{$row->id}}">
              </td>
              <td>{{$row->code}}</td>
              <td>{{$row->deliveryname}}</td>
              <td>{{$row->user_id}}</td>
              <td>{{$row->deliveryemail}}</td>
              <td>{{$row->deliveryphone}}</td>
              <td>{{$row->deliveryaddress}}</td>
              <td class="text-center">{{$row->exportdate}}</td>
              <td class="text-center">{{$row->created_at}}</td>
              <td class="text-center">
              <div style="display: inline-flex">
                @if ($row->status==1)
                  <a href="{{ route('order.status',['order'=>$row->id])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-toggle-on"></i>
                  </a>
                @else
                  <a href="{{ route('order.status',['order'=>$row->id])}}" class="btn btn-sm btn-danger">
                     <i class="fas fa-toggle-off"></i>
                  </a>
                @endif
                 <a href="{{ route('order.edit',['order'=>$row->id])}}" class="btn btn-sm btn-primary">
                     <i class="fas fa-edit"></i>
                 </a>
                 <a href="{{ route('order.show',['order'=>$row->id])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-eye"></i>
                 </a>
                 <a href="{{ route('order.delete',['order'=>$row->id])}}" class="btn btn-sm btn-danger">
                     <i class="fas fa-trash"></i>
                 </a>
                 </div>
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
                <a href="#" class="btn btn-sm btn-success">
                   <i class="fas fa-plus"></i>
                   Thêm
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