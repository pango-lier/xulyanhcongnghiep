@extends('admin.layout')
@section('title','Setting')
@section('content')
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Complete form validation</h4>
                  <form class="cmxform" id="createForm" method="post" action="admin/setting/update/{{$setting->id}}">
                    <fieldset>
                    	@csrf	
                      <div class="form-group">
                        <label for="config_key">Config Key</label>
                        <input id="config_key" class="form-control @error('config_key') is-invalid @enderror" name="config_key" type="text"  value="{{$setting->config_key}}" />
                        @error('config_key')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                      </div>
                      <div class="form-group">
                        <label for="config_value">Config Value</label>
                        <textarea rows="5" id="config_value" class="form-control @error('config_value') is-invalid @enderror" name="config_value">{{$setting->config_value}}</textarea>
                        @error('config_value')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                      </div>
                       
                      <input class="btn btn-primary" type="submit" value="Sửa" />
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>       
@endsection