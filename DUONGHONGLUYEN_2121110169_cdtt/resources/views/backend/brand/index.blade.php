@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand</h1>
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
                <a href="{{ route('brand.create')}}" class="btn btn-sm btn-success">
                   <i class="fas fa-plus"></i>
                   Thêm
                </a>
                <a href="{{ route('brand.trash')}}" class="btn btn-sm btn-danger">
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
               <th>Tên thương hiệu</th>
               <th style="width:90px;" class="text-center">Hình</th>
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
                <img class="img-fluid" src="{{ asset('images/brand/'.$row->image)}}" alt="{{$row->image}}">
              </td>
              <td class="text-center">{{$row->created_at}}</td>
              <td class="text-center">
              @if ($row->status==1)
                  <a href="{{ route('brand.status',['brand'=>$row->id])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-toggle-on"></i>
                  </a>
                @else
                  <a href="{{ route('brand.status',['brand'=>$row->id])}}" class="btn btn-sm btn-danger">
                     <i class="fas fa-toggle-off"></i>
                  </a>
                @endif
                 <a href="{{ route('brand.edit',['brand'=>$row->id])}}" class="btn btn-sm btn-primary">
                     <i class="fas fa-edit"></i>
                 </a>
                 <a href="{{ route('brand.show',['brand'=>$row->id])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-eye"></i>
                 </a>
                 <a href="{{ route('brand.delete',['brand'=>$row->id])}}" class="btn btn-sm btn-danger">
                     <i class="fas fa-trash"></i>
                 </a>
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