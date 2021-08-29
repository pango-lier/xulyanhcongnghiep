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
                  <h4 class="card-title">Complete form validation</h4>
                  <form class="cmxform" id="createForm" method="post" action="admin/slider/update/{{$slider->id}}" enctype="multipart/form-data">
                    <fieldset>
                      <div class="form-group">
                        <label for="post_id">ID bài viết</label>
                        <input id="post_id" class="form-control @error('post_id') is-invalid @enderror" name="post_id" type="number"  value="{{$slider->post_id}}" />
                        @error('post_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      @csrf 
                      <div class="form-group">
                      <label for="img_path">Hình ảnh 1365x600</label>  
                      <input id="img_path" name="img_path" type="file" class=" dropify form-control @error('img_path') is-invalid @enderror"   data-default-file="{{$slider->img_path}}" />
                        @error('img_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                      <input type="hidden" name="img_path_old" value="{{$slider->img_path}}">
                      <input class="btn btn-primary" type="submit" value="Sua" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection