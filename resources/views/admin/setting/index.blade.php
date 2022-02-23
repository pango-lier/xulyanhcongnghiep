@extends('admin.layout')

@section('title','Setting')

@section('content')

  <div class="mb-3">

            <a class="btn btn-success" href="admin/setting/create">Thêm</a></div>

@if(session('success'))

<div class="alert alert-fill-success" role="alert">

                    <i class="mdi mdi-alert-circle"></i>

                    {{session('success')}}

                  </div>

@endif

<div class="card">



            <div class="card-body">

              <h4 class="card-title">Setting</h4>

              <div class="row">

                <div class="col-12">

                  <div class="table-responsive">

                    <table id="order-listing" class="table">

                      <thead>

                        <tr>

                            <th>ID</th>

                            <th>Config key</th>

                            <th>Config value</th>

                            <th>Chức năng</th>

                        </tr>

                      </thead>

                      <tbody>

                    @foreach($settings as $row)

                        <tr>

                            <td>{{$row->id}}</td>

                            <td>{{$row->config_key}}</td>

                             <td>{{$row->config_value}}</td>

                            <td>

                              <a href="admin/setting/edit/{{$row->id}}"  class="btn btn-sm btn-success">Sửa</a>

                              <a href="admin/setting/destroy/{{$row->id}}"  class="btn btn-sm btn-danger">Xóa</a>



                            </td>

                        </tr>

                    @endforeach

                      </tbody>

                    </table>

                  </div>
                  <div>{{$settings->links()}}</div>
                </div>

              </div>

            </div>

 </div>

@endsection
