@extends('admin.layout')
@section('title','Category')
@section('content')
  <div class="mb-3">
            <a class="btn btn-success" href="admin/admin_user/create">Thêm</a></div>
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
                            <th>Tên đầy đủ</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($users as $row) 
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->roles}}</td>
                            <td>
                              <a href="admin/admin_user/edit/{{$row->id}}"  class="btn btn-sm btn-success">Sửa</a>
                              @if($row->roles!=0)
                              <a href="admin/admin_user/destroy/{{$row->id}}"  class="btn btn-sm btn-danger">Xóa</a>
                              @endif
                            </td>
                        </tr>
                    @endforeach    
                      </tbody>
                    </table>
                  </div>
                  <div>{{$users->links()}}</div>
                </div>
              </div>
            </div>

 </div>           
@endsection