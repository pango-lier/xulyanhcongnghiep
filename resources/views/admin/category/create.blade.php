@extends('admin.layout')
@section('title','Category')
@section('content')
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Complete form validation</h4>
                  <form class="cmxform" id="createForm" method="post" action="admin/category/store">
                    <fieldset>
                    	@csrf	
                      <div class="form-group">
                        <label >Danh mục cha</label>
                        <select name="parent_id" class="form-control">
                        	<option value="0" selected>Danh mục mới</option>
                        @foreach($cats as $row)
                        	<option value="{{$row->id}}">{{str_repeat('-',$row['level']*5).$row->name}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text"  value="{{old('name')}}" />
                        @error('name')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
                      </div>
                      <div class="form-group">
                        <label >Kiểu danh mục</label>
                        <select name="type" class="form-control">
                          <option value="text" selected>Text</option>
                          <option value="video" >Video</option>
                          <option value="product" >Product</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" class="form-control"  name="description" rows="5">{{old('description')}}</textarea>
                        @error('description')
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