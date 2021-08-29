@extends('admin.layout')
@section('title','Dashboard')
@section('content')
<div class="card">

            <div class="card-body">
              <h4 class="card-title">Đơn hàng</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Tổng Tiền</th>
                            <th>Ngày mua hàng</th>
                            <th>Tình trạng</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($bills as $row)    
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->customer->name}}</td>
                            <td>{{$row->total}}</td>
                            
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->total}}</td>
                            {{-- <td>{{date('h:i:s d-m-Y',strtotime($row->created_at))}}</td>--}}
                        </tr>
                    @endforeach    
                      </tbody>
                    </table>
                  </div>
                  <div>{{$bills->links()}}</div>
                </div>
              </div>
            </div>
 </div> 
@endsection