@extends('admin.layout')
@section('title','Category')
@section('content')
  <div class="mb-3">
            <a class="btn btn-success" href="admin/category/create">Thêm</a></div>
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
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($cats as $row)    
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{str_repeat('-', $row['level']*5).$row->name}}</td>
                            <td>{{$row->parent_id}}</td>
                            <td>
                              <a href="admin/category/edit/{{$row->id}}"  class="btn btn-sm btn-success">Sửa</a>
                              <a href="admin/category/destroy/{{$row->id}}"  class="btn btn-sm btn-danger">Xóa</a>
                              
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