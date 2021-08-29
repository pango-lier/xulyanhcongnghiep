@extends('admin.layout')
@section('title','Category')
@section('content')
  <div class="mb-3">
            <a class="btn btn-success" href="admin/slider/create">Thêm</a></div>
@if(session('success'))            
<div class="alert alert-fill-success" role="alert">
                    <i class="mdi mdi-alert-circle"></i>
                    {{session('success')}}
                  </div> 
@endif                             
<div class="card">

            <div class="card-body">
              <h4 class="card-title">Bảng danh mục</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Post</th>
                            <th>Tên bài viết</th>
                            <th>Hình ảnh</th>
                            <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($sliders as $row)    
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->post->id}}</td>
                            <td>{{$row->post->name}}</td>
                            <td><img src="{{$row->img_path}}"></td>
                            <td>
                              <a href="admin/slider/edit/{{$row->id}}"  class="btn btn-sm btn-success">Sửa</a>
                              <a href="admin/slider/destroy/{{$row->id}}"  class="btn btn-sm btn-danger">Xóa</a>
                              
                            </td>
                        </tr>
                    @endforeach    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
 </div>           
@endsection