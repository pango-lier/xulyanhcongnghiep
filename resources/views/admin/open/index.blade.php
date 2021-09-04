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
              <h4 class="card-title">{{$table[0]->name}}</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive ">
                    <table id="order-listing" class="table table-responsive table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            @foreach ($table[0]->fields as $key => $th)
                            <th scope="col">{{$th}}</th>
                            @endforeach
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($table as $stt=> $row)
                        <tr>
                            <th  scope="row">{{$stt}}</th>
                            @foreach($row->row as $key=>$td)
                            <td>{{$td}}</td>
                            @endforeach
                            <td>
                              <a href="javascript:void(0)" style="color: red" onclick="redirect_del('admin/post/destroy/{{$row->id}}')" >Xóa</a>
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

                  {{--<div class="">{{$link->links()}}</div>--}}

                </div>

              </div>

            </div>
        </div>
    @endforeach

</div>
@endsection
