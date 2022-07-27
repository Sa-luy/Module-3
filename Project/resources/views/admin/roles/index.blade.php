@extends('admin.main');
@section('content')
    <div class="container">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="row w3-res-tb">
                    <h3>Danh Sách Vai Trò</h3>
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('role.create') }}" class="btn btn-sm btn-success">
                                <button type="subit" class="btn btn-labeled">

                                    <i class='bx bx-message-add'></i>

                                </button>
                            </a>
                            {{-- <a href="{{ route('role.create') }}" class="btn btn-info">Add</a> --}}
                        </div>
                        <div class="col-4">
                            @if (Session::has('success'))
                                <p class="text-success">
                                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-4">

                            <a href="{{ route('role-trashed') }}" class="btn btn-sm btn-danger"><button type="subit"
                                    class="btn btn-labeled">
                                    <i class="fa fa-trash"></i></button></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th style="width:20px;">
                                        <label class="i-checks m-b-none">
                                            <input type="checkbox"><i></i>
                                        </label>
                                    </th>
                                    <th>#</th>
                                    <th>Vai tro</th>
                                    <th>Mô Tả</th>
                                    <th>action</th>
                                    <th style="width:30px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    @csrf
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox"
                                                    name="post[]"><i></i></label></td>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}
                                        <td>
                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger align-middle" type="submit"
                                                    onclick="execute_example()"><i
                                                        class="fa-solid fa-trash-can-clock"></i></button>
                                            </form>
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-info sm">
                                                <i class="fas fa-edit "></i>
                                            </a>
                                            {{-- @endcan --}}
                                            {{-- @can('role delete') --}}
                                            <a data-href="" data-id="{{ $role->id }}"
                                                data-url="{{ route('role.destroy', $role->id) }}"
                                                class="btn btn-danger sm deleteIcon"><i class=" fas fa-trash-alt "></i>
                                            </a>
                                            {{-- @endcan --}}
                                            {{-- @can('role view') --}}
                                            <a href="{{ route('role.show', $role->id) }}"
                                                class="btn btn-primary waves-effect waves-light">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            {{-- @endcan --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-5 text-center">
                                <small class="text-muted inline m-t-sm m-b-sm">showing 1-5 of {{count($roles)}} items</small>
                            </div>
                            <div class="col-sm-7 text-right text-center-xs">
                                <ul class="pagination pagination-sm m-t-none m-b-none">

                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function() {
                jQuery('.deleteIcon').click( function(){
                    let id= jQuery(this).data('id')
                    alert(id)
                } )
                Try me! 

            });
            $(function() {
                $('.deleteIcon').on('click', deleteRole)
            })

            function deleteRole(event) {
                event.preventDefault();
                let url = $(this).data('url');
                let id = $(this).data('id');
                // alert(url)
                jQuery.ajax({
                    type: "delete",
                    'url': url,
                    'data': {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    success: function(data, ) {
                        if (data.status === 1) {
                            window.location.reload();
                            alert(data.messages)
                                
                        }
                    },
                    error: function(data) {
                        if (data.status === 0) {
                            alert(data.messages)
                        }
                    }



                });

            }
        </script>
    @endsection
