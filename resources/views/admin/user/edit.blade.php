@extends('layouts.admin')
@section('title','Category')
@section('js')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        var errors=false;
        @error('password_confirm')
          errors=true;
        @enderror
        @error('password');
          errors=true;
        @enderror
       {{-- var errors=JSON.parse("{{$errors}}");
      //  console.log(errors);--}}
        $('#password_change').click(function(){
          if($(this).prop('checked')){
            $('.en_password').prop('disabled',false);
          }else{
            $('.en_password').prop('disabled',true);
          }
        });
        errors_password_change( );
      function errors_password_change()
          {  
            if(errors==true){
            $('#password_change').prop('checked',true);
            $('.en_password').prop('disabled',false);
          }
      }
      });

    </script>
@endsection
@section('content')

<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm tài khoản</h4>
                  <form class="cmxform" method="post" action="admin/user/update/{{$rowUser->id}}" >
                    <fieldset>
                    	@csrf
                      <div class="form-group">
                        <label for="username">Tên đăng nhập(*)</label>
                        <input id="username" name="username" class="form-control @error('username') is-invalid @enderror"  type="text"  value="{{$rowUser->username}}" pattern="[a-zA-Z0-9-_.-]{1,30}" title="Tên đăng nhập là chữ cái,chữ số và các ký tự . _ - ." />
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email(*)</label>
                        <input id="email" name="email" class="form-control @error('email') is-invalid @enderror"  type="email"  value="{{$rowUser->email}}"  title="Nhập email"/>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password_change">Thay đổi mật khẩu</label>
                        <input id="password_change" name="password_change" class="ml-4"  type="checkbox" />
                      </div>
                      <div class="form-group">
                        
                        <label for="password">Mật khẩu(*)</label>
                        <input id="password" name="password" class="en_password form-control @error('password') is-invalid @enderror"  type="password" disabled value="{{session('old_password')}}" />
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password_confirm">Mật khẩu xác nhận</label>
                        <input id="password_confirm" name="password_confirm" class="en_password form-control @error('password_confirm') is-invalid @enderror"  type="password" disabled/>
                        @error('password_confirm')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="name">Tên đầy đủ</label>
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"  type="text"  value="{{$rowUser->name}}" />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="roles">Vai trò</label>
                        <select id="roles" name="roles" class="form-control">
                          <option value="1" @if($rowUser->roles==1)selected @endif>Admin</option>
                          <option value="2" @if($rowUser->roles==2)selected @endif>Editor</option>
                        </select>
                      </div>
                      <div>{{session('field')}}</div>
                      <input class="btn btn-primary" type="submit" value="Sửa" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection