@extends('admin.layout')
@section('title','Category')
@section('js')
<script src="admin/js/dropify.js"></script>
@endsection
@section('content')
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Khách hàng</h4>
                  <form class="cmxform" id="createForm" method="post" action="admin/intercooperation/store" enctype="multipart/form-data">
                    <fieldset>
                      <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text"  value="{{old('name')}}" />
                        @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                    	@csrf	
                      <div class="form-group">
                      <label for="img_path">Hình ảnh 170x79</label>  
                      <input id="img_path" name="img_path" type="file" class=" dropify form-control @error('img_path') is-invalid @enderror"   />
                        @error('img_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      
                      <input class="btn btn-primary" type="submit" value="Thêm" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection