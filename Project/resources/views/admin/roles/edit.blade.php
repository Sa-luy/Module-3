@extends('admin.main');
@section('content')
    <style>
       
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
                        @if (Session::has('messages'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('messages') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            {{-- <input type="text" class="input-sm form-control" placeholder="Search"> --}}
                            <img src="{{ asset('img/1657963066.gif') }}" alt="" width="100px">
                        </div>


                    </div>
                </div>
                <div class="panel-heading">
                    <h3>Edit Role</h3>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label >Tên Vai trò :</label>
                        <input type="text" name="name" class="input-sm form-control"value="{{$role->name }}">
                        <label>Mô Tả Vai trò:</label>
                        <textarea name="display_name" id="" cols="100" rows="2" class="input-sm form-control"
                            value="{{ $role->display_name }}">{{ $role->display_name }}</textarea>

                        {{-- carrd --}}
                        <div class="col-md-12">
                            <div class="col-12 form-check form-switch">
                                <label>
                                    <input class="form-check-input checkbox_all" type="checkbox" role="switch">
                                    Check All</label>
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="row">
                                    <div class="card border-primary mb-3">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12 form-check form-switch">
                                                    <span class="">
                                                        <input class="form-check-input checkbox_wrapper" type="checkbox"
                                                            role="switch">
                                                    </span>
                                                    <span class="">{{ $permission->name }}</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body text-primary">
                                            <div class="row">
                                                @foreach ($permission->permissionChild as $permissionChildItem)
                                                    <div class="col form-check form-switch ">
                                                        <span class="name_role">
                                                            <input class="form-check-input checkbox_child"
                                                                name="permission_ids[]" type="checkbox" role="switch"
                                                                {{ $permissionsChecked->contains('id', $permissionChildItem->id) ? 'checked' : '' }}
                                                                value="{{ $permissionChildItem->id }}">
                                                        </span>
                                                        <span class="role">
                                                            {{ $permissionChildItem->name }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
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
    
@endsection
