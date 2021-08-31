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

            <a class="btn btn-success" href="admin/post/create">Thêm</a></div>

@if(session('success'))

<div class="alert alert-fill-success" role="alert">

                    <i class="mdi mdi-alert-circle"></i>

                    {{session('success')}}

                  </div>

@endif
<div>
    @foreach ($tables as $table)
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$table['table']->name}}</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>

                            <th>ID</th>

                            <th>User</th>

                            <th>Tên tin tức</th>

                            <th>Mô tả</th>

                            <th>Danh mục</th>

                            <th>Kiểu</th>

                            <th>Chức năng</th>

                        </tr>

                      </thead>

                      <tbody>

                    @foreach($posts as $row)

                        <tr>

                            <td>{{$row->id}}</td>

                            <td>{{$row->user->name}}</td>

                            <td>{{$row->name}}</td>

                            <td>{{$row->description}}</td>

                            <td>{{$row->category->name}}</td>

                            <td style="text-align: center;">

                              <img src="@if(file_exists(substr($row->img_path,1))) {{$row->img_path}}

                              @else

                                storage/post/default.png

                              @endif">

                              <span>{{$row->type}}</span>

                              {{--<a href="admin/post/comment/{{$row->id}}"  class="">({{$row->comment->count()}})</a>--}}

                            </td>

                            <td>

                              <a href="admin/post/edit/{{$row->id}}"  class="btn btn-sm btn-success">Sửa</a>

                              <a onclick="redirect_del('admin/post/destroy/{{$row->id}}')"  class="btn btn-sm btn-danger">Xóa</a>

                            </td>

                        </tr>

                    @endforeach

                    <script>

                      function redirect_del(href){

                        if(confirm("Bạn có thực sự chắn chắn xóa hay không ?")==true){

                          window.location.href=href;

                        }

                      }

                    </script>

                      </tbody>

                    </table>

                  </div>

                  <div class="">{{$posts->links()}}</div>

                </div>

              </div>

            </div>
        </div>
    @endforeach

</div>
@endsection
