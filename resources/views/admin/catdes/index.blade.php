@extends('admin.layout')
@section('title','post')
@section('css')
<style type="text/css">
.pagination {
margin-top: 20px;
  justify-content:center;}
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/typeahead.js-bootstrap4-css@1.0.0/typeaheadjs.min.css">
@endsection
@section('content')
  <div class="mb-3">
            <a class="btn btn-success" href="admin/catdes/create">Thêm</a></div>
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
                            <th>Tên tin tức</th>
                            <th>Mô tả</th>
                            <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($catdess as $row) 
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->category->name}}</td>
                            <td>{{$row->description}}</td>
                            
                            <td>
                              <a href="admin/catdes/edit/{{$row->id}}"  class="btn btn-sm btn-success">Sửa</a>
                              <a href="admin/catdes/destroy/{{$row->id}}"  class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach    
                      </tbody>
                    </table>
                  </div>
                  <div class="">{{$catdess->links()}}</div>
                </div>
              </div>
            </div>

 </div>           
@endsection