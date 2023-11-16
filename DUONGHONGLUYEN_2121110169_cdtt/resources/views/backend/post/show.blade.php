@extends('layouts.admin')
@section('title', $title??"Trang quan tri")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết</h1>
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
              <a href="{{ route('post.edit',['post'=>$row->id])}}" class="btn btn-sm btn-primary">
                     <i class="fas fa-edit"></i>
                 </a>
                 <a href="{{ route('post.delete',['post'=>$row->id])}}" class="btn btn-sm btn-danger">
                     <i class="fas fa-trash"></i>
                 </a>
                <a href="{{ route('post.index')}}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus">Quay về danh sách</i>
                 </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
           <table class="table table-bordered">
                <tr>
                  <th>Tên trường</th>
                  <th>Giá trị</th>
                </tr>
                <tr>
                  <td>Id</td>
                  <td><?=$row->id;?></td>
                </tr>
                <tr>
                  <td>Topic_id</td>
                  <td><?=$row->topic_id;?></td>
                </tr>
                <tr>
                  <td>Title</td>
                  <td><?=$row->title;?></td>
                </tr>
                <tr>
                  <td>Slug</td>
                  <td><?=$row->slug;?></td>
                </tr>
                <tr>
                  <td>Detail</td>
                  <td><?=$row->detail;?></td>
                </tr>
                <tr>
                  <td>Image</td>
                  <td><?=$row->image;?></td>
                </tr>
                <tr>
                  <td>Type</td>
                  <td><?=$row->type;?></td>
                </tr>
                <tr>
                  <td>Metakey</td>
                  <td><?=$row->metakey;?></td>
                </tr>
                <tr>
                  <td>Metadesc</td>
                  <td><?=$row->metadesc;?></td>
                </tr>
                <tr>
                  <td>Created_at</td>
                  <td><?=$row->created_at;?></td>
                </tr>
                <tr>
                  <td>Created_by</td>
                  <td><?=$row->created_by;?></td>
                </tr>
                <tr>
                  <td>Updated_at</td>
                  <td><?=$row->updated_at;?></td>
                </tr>
                <tr>
                  <td>Updated_by</td>
                  <td><?=$row->updated_by;?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><?=$row->status;?></td>
                </tr>
           </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <div class="row">
              <div class="col-12 text-right">
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
@endsection