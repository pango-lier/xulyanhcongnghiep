@extends('admin.layout')

@section('title', 'Category')

@section('content')

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Complete form validation</h4>

                    <form class="cmxform" id="createForm" method="post"
                        action="admin/category/update/{{ $cat->id }}">

                        <fieldset>

                            @csrf

                            <div class="form-group">

                                <label>Danh mục cha</label>

                                <select name="parent_id" class="form-control">

                                    <option value="0" @if ($cat->parent_id == 0) selected @endif>Danh mục mới
                                    </option>

                                    @foreach ($cats as $row)
                                        <option value="{{ $row->id }}"
                                            @if ($row->id == $cat->parent_id) selected @endif>
                                            {{ str_repeat('-', $row['level'] * 5) . $row->name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group">

                                <label for="name">Tên danh mục</label>

                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                    type="text" value="{{ $cat->name }}" />

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label>Kiểu danh mục</label>

                                <select name="type" class="form-control">

                                    <option value="text" @if ($cat->type == 'text') selected @endif>Text</option>

                                    <option value="video" @if ($cat->type == 'video') selected @endif>Video</option>

                                    <option value="product" @if ($cat->type == 'product') selected @endif>Product
                                    </option>

                                </select>

                            </div>
                            <div class="form-group">

                                <label for="meta_title">Title</label>

                                <input id="meta_title" class="form-control @error('meta_title')  @enderror"
                                    name="meta_title" type="text" value="{{ $cat->meta_title }}" />

                                @error('meta_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group">

                                <label for="description">Mô tả</label>

                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="5">{{ $cat->description }}</textarea>

                                @error('description')
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
