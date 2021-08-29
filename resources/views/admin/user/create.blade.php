@extends('layouts.admin')
@section('title','Category')
@section('js')
<script src="admin/js/dropify.js"></script>
<script src="ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    </script>
    @include('ckfinder::setup')
@endsection
@section('content')

<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm tài khoản</h4>
                  <form class="cmxform" method="post" action="admin/user/store" >
                    <fieldset>
                    	@csrf
                      <div class="form-group">
                        <label for="username">Tên đăng nhập(*)</label>
                        <input id="username" name="username" class="form-control @error('username') is-invalid @enderror"  type="text"  value="{{old('username')}}" pattern="[a-zA-Z0-9-_.-]{1,30}" title="Tên đăng nhập là chữ cái,chữ số và các ký tự . _ - ." />
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email(*)</label>
                        <input id="email" name="email" class="form-control @error('email') is-invalid @enderror"  type="email"  value="{{old('email')}}"  title="Nhập email"/>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Mật khẩu(*)</label>
                        <input id="password" name="password" class="form-control @error('password') is-invalid @enderror"  type="password"  />
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password_confirm">Mật khẩu xác nhận</label>
                        <input id="password_confirm" name="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror"  type="password" />
                        @error('password_confirm')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Tên đầy đủ</label>
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"  type="text"  value="{{old('name')}}" />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="roles">Vai trò</label>
                        <select id="roles" name="roles" class="form-control">
                          <option value="1">Admin</option>
                          <option value="2" selected>Editor</option>
                        </select>
                      </div>
                      
                      <input class="btn btn-primary" type="submit" value="Thêm" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection