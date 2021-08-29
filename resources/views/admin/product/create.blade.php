@extends('admin.layout')
@section('title','Category')

@section('js')
<script src="admin/js/dropify.js"></script>
<script src="admin/js/owl-carousel.js"></script>
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
                  <h4 class="card-title">Tin tức</h4>
                  <form class="cmxform" method="post" action="admin/product/store" enctype="multipart/form-data">
                    <fieldset>
                    	@csrf
                      <div class="form-group">
                        <label for="name">Tên tin tức</label>
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"  type="text"  value="{{old('name')}}" />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price">Giá sản phẩm</label>
                        <input id="price" name="price" class="form-control @error('price') is-invalid @enderror"  type="number"  value="{{old('price')}}" />
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label >Danh mục</label>
                        <select name="category_id" class="form-control">
                        @foreach($cats as $row)
                          @if($row->type=='product')
                          <option value="{{$row->id}}">{{str_repeat('-',$row['level']*5).$row->name}}</option>
                          @endif
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="file_path">File pdf</label>  
                      <input id="file_path" name="file_path" type="file" class="  form-control @error('file_path') is-invalid @enderror"   />
                        @error('file_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                      <label for="img_path">Hình ảnh mô tả 300x250</label>  
                      <input id="img_path" name="img_path" type="file" class=" dropify form-control @error('img_path') is-invalid @enderror"   />
                        @error('img_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                       <label for="multi_img_path">Hình ảnh chi tiết (nhiều ảnh  600x500)</label>
                      <input id="multi_img_path" name="multi_img_path[]" type="file" class=" form-control @error('multi_img_path') is-invalid @enderror" data-default-file=""  multiple />
                        @error('multi_img_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="video_link">Video</label>
                        <input id="video_link" name="video_link" class="form-control @error('video_link') is-invalid @enderror"  type="text"  value="{{old('name')}}" />
                        @error('video_link')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      
                        </div>
                      <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" class="form-control"  name="description" rows="5">{{old('description')}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>	
                      <div class="form-group">
                        <label for="content" >Nội dung</label>
                        <textarea class="form-control" id="content"  name="content" rows="10">{{old('content')}}</textarea>
                        @error('content')
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