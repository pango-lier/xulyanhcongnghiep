@extends('admin.layout')
@section('title','Bình Luận')
@section('css')
<style type="text/css">
.pagination {
margin-top: 20px;
  justify-content:center;}
</style>
@endsection
@section('content')
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
                            <th>ID Cha</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Nội dung</th>
                            <th></th>
                            <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($comments as $row) 
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->parent_id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->content}}</td>
                            <td><a href="{{$row->news->slug.'+'.$row->news->id.'.html'}}#outner_comment"  class="btn btn-sm btn-success" target="_blank" >Trả lời</a></td>
                            <td>
                                
                              <a href="admin/comment/destroy/{{$row->id}}"  class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach 
                    
                      </tbody>
                    </table>
                  </div>
                  <div class="">{{$comments->links()}}</div>
                </div>
              </div>
            </div>

 </div>           
@endsection