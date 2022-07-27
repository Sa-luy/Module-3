@extends('admin.main');
@section('content')
    <div class="container">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    thung rac 
                </div>
                <div class="row w3-res-tb">
                   
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            {{-- <input type="text" class="input-sm form-control" placeholder="Search"> --}}
                            <span class="input-group-btn">
                                <a href="" class="btn btn-sm btn-default">Trash</a>
                            </span>
                        </div>
                        @if (Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                            </p>
                        @endif
                      
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
                            {{-- @if (!empty($roles)) --}}
                                @foreach ($roles as $key => $role)
                                    @csrf
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox"
                                                    name="post[]"><i></i></label></td>
                                                    <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }} </td>
                                        <td>
                                            <form action="{{ route('admin.role.restore', $role->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger align-middle" type="submit"
                                                    onclick="return confirm('Bạn muốn Phục hồi {{ $role->name }} ?')">Restore</button>
                                            </form>  
                                            <form action="{{ route('role-force-delete', $role->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger align-middle" type="submit"
                                                    onclick="return confirm('Bạn muốn xóa vĩnh viễn  {{ $role->name }} ?')">Force
                                                    Delete</button>
                                            </form> 
                                        </td>  
                                    </tr>
                                @endforeach
                            {{-- @else --}}
                                <tr>
                                    <td colspan="5">
                                        <p>Empty</p>
                                    </td>
                                </tr>
                            {{-- @endif --}}
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">

                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                {{-- {!!$admin->links()!!} --}}
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    
@endsection
