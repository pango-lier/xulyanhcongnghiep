@extends('admin.layout')

@section('title', 'Setting')

@section('content')
    <script>
        function onChange() {
            var el = document.getElementById('setting_id');
            if (el.options[el.selectedIndex].value) {
                window.location.replace('admin/setting?config_key=' + el.options[el.selectedIndex].value);
            }
        }
    </script>
    <div class="mb-3 row">
        <div class="col-2">
            <a class="btn btn-success" href="admin/setting/create">Thêm</a>
        </div>
        <div class="col-8">
            <select id="setting_id" onchange="onChange()" name="setting_id" class="form-control">
                <option value="" disabled selected>Select your Filter</option>

                <option value="_about">About Us</option>
                <option value="_foot">Footer</option>
                <option value="_meta">Meta Tag</option>
                <option value="_foot">Slide</option>
                <option value="_partner">Partner</option>
                <option value="_contact">Contact</option>
                <option value="_header">Slide</option>
                <option value="_product">Product</option>
                <option value="_">Reset Filter</option>
            </select>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-fill-success" role="alert">

            <i class="mdi mdi-alert-circle"></i>

            {{ session('success') }}

        </div>
    @endif

    <div class="card">



        <div class="card-body">

            <h4 class="card-title">Setting</h4>

            <div class="row">



                    <div class="table-responsive">

                        <table id="order-listing" class="table">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>Config key</th>

                                    <th>Config value</th>

                                    <th>Chức năng</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($settings as $row)
                                    <tr>

                                        <td>{{ $row->id }}</td>

                                        <td>{{ $row->config_key }}</td>

                                        <td  style="overflow-wrap: break-word !important;max-width:320px">{{ $row->config_value }}</td>

                                        <td>

                                            <a href="admin/setting/edit/{{ $row->id }}"
                                                class="btn btn-sm btn-success">Sửa</a>

                                            {{-- <a href="admin/setting/destroy/{{ $row->id }}"
                                                class="btn btn-sm btn-danger">Xóa</a> --}}



                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                    <div>{{ $settings->links() }}</div>

            </div>

        </div>

    </div>

@endsection
