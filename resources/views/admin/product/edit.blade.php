@extends('admin.layout')
@section('title','Category')
@section('css')
<style type="text/css">
  .youtube {
 position:relative;
 padding-bottom:56.25%;
 padding-top:30px;
 height:0;
 overflow:hidden;
  max-width: 800px;
    max-height: 600px;
 }

.youtube iframe, .youtube object, .youtube embed {
 position:absolute;
 top:0;
 left:0;

 width:99%;
 height:99%;
 }
</style>
@endsection
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
                  <h4 class="card-title">Tin tức</h4>
                  <form class="cmxform" method="post" action="admin/product/update/{{$product->id}}" enctype="multipart/form-data">
                    <fieldset>
                      @csrf
                      <div class="form-group">
                        <label for="name">Tên tin tức</label>
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"  type="text"  value="{{$product->name}}" />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="category_id">Danh mục</label>
                        <select id="category_id" name="category_id" class="form-control">
                        @foreach($cats as $row)
                          @if($row->type=='product')
                          <option value="{{$row->id}}" @if($row->id==$product->category_id)selected @endif >{{str_repeat('-',$row['level']*5).$row->name}}</option>
                          @endif
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="price">Giá sản phẩm</label>
                        <input id="price" name="price" class="form-control @error('price') is-invalid @enderror"  type="number"  value="{{$product->price}}" />
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                       <div class="form-group">
                      <label for="file_path">File pdf</label>
                      <input id="file_path" name="file_path" type="file" class="  form-control @error('file_path') is-invalid @enderror" data-default-file="{{$product->file_path}}"  />
                        @error('file_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                      <label for="img_path">Hình ảnh 300x250</label>
                      <input id="img_path" name="img_path" type="file" class="dropify  form-control @error('img_path') is-invalid @enderror" data-default-file="{{$product->img_path}}"  />
                        @error('img_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                       <label for="multi_img_path">Hình ảnh chi tiết 600x500(Nhieu anh)</label>
                      <input id="multi_img_path" name="multi_img_path[]" type="file" class=" dropify form-control @error('multi_img_path') is-invalid @enderror" data-default-file=""  multiple />
                        @error('multi_img_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="video_link">Video</label>
                        <input id="video_link" name="video_link" class="form-control @error('video_link') is-invalid @enderror"  type="text"  value="{{$product->video_link}}" />
                        @error('video_link')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <div class="youtube mt-4">
                            <iframe id="video_link_iframe" width="560" height="315" src="{{$product->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                         </div>
                      <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"   name="description" rows="5">{{$product->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>  
                      <div class="form-group">
                        <label for="content" >Nội dung</label>
                        <textarea class="form-control" id="content"  name="content" rows="10">{{$product->content}}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <input type="hidden" name="count_views" value="{{$product->count_views}}">
                      <input type="hidden" name="img_path_old" value="{{$product->img_path}}">
                      <input class="btn btn-primary" type="submit" value="Sửa" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection