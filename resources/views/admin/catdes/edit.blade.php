@extends('admin.layout')
@section('title','Category')
@section('js')
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
                  <form class="cmxform" method="post" action="admin/catdes/update/{{$catdes->id}}" >
                    <fieldset>
                      @csrf
                        <div class="form-group">
                        <label >Danh mục cha</label>
                        <select name="category_id" class="form-control">
                        @foreach($cats as $row)
                            <option value="{{$row->id}}"  @if($row->id==$catdes->category_id) selected @endif >{{str_repeat('-',$row['level']*5).$row->name}}</option>
                        @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"   name="description" rows="5">{{$catdes->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>  
                      <input type="hidden" name="count_views" value="{{$catdes->count_views}}">
                      <input type="hidden" name="img_path_old" value="{{$catdes->img_path}}">
                      <input class="btn btn-primary" type="submit" value="Sửa" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection