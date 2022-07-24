@extends('admin.layouts.master')
@section('content')
    <style>
        .card-header {
            background-color: chartreuse
        }

        .card-body {
            color: blue;
        }
    </style>
    <div class="container">
        <div class="table-agile-info">
            <div class="panel panel-default">

                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <input type="text" class="input-sm form-control w-sm inline v-middle">
                        {{-- <button class="btn btn-sm btn-default" type="submit">Search</button> --}}
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            {{-- <input type="text" class="input-sm form-control" placeholder="Search"> --}}
                            <img src="{{ asset('images/hinh-anh-dong-hoat-hinh.gif') }}" alt="" width="100px">
                        </div>
                        @if (Session::has('messages'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('messages') }}
                            </p>
                        @endif

                    </div>
                </div>
                <div class="panel-heading">
                    <h3>Phân quyền</h3>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        {{-- <p>Thêm quyền cho trang wep</p> --}}

                        {{-- carrd --}}
                        <div class="col-md-12">
                            {{-- <div class="col-12 form-check form-switch">
                                <label>
                                    <input class="form-check-input checkbox_all" type="checkbox" role="switch">
                                    Check All</label>
                            </div> --}}

                            <div class="container">
                                <p>Thêm quyền cho trang wep</p>
                                <div class="card border-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <p>Cấp Quyền cho Module   <div class="col-12 form-check form-switch">
                                                <select class="form-select" aria-label="Default select example" name="module">
                                                    <option selected>Nhấp để chọn</option>
                                                    @foreach (config('permissions.table') as $key => $permission)
                                                        <option value="{{$key}}"> {{ $permission }}</option>
                                                       
                                                    @endforeach
                                                </select>
                                            </div>
                                        </p>

                                        </div>
                                    </div>
                                    <div class="card-body text-primary">
                                    <p>Phân quyền
                                    <div class="col-12 form-check form-switch">
                                        <input class="form-check-input checkbox_wrapper" type="checkbox"
                                            role="switch"> Tất cả
                                        </div></p>
                                        <div class="row">
                                            @foreach (config('permissions.action') as $key => $permissionChild)
                                                <div class="col form-check form-switch ">
                                                    <input class="form-check-input checkbox_child" name="permission_ids[]"
                                                        type="checkbox" role="switch" value="{{ $key }}">
                                                    {{ $permissionChild }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-primary" value="ADD">
                    </form>
                </div>

            </div>

        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(".checkbox_wrapper").on('click', function() {
            $(this).parents('.card').find('.checkbox_child').prop('checked', $(this).prop('checked'));
        });
        $(".checkbox_all").on('click', function() {
            $(this).parents().find('.checkbox_child').prop('checked', $(this).prop('checked'));
            $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
        });
    </script>
    </div>
@endsection
