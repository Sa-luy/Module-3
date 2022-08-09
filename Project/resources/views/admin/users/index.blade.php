@extends('admin.main');
@section('content')
    <div>
        <h3>User List</h3>
        <div class="row">
            <div class="col">
                @can('create', App\models\User::class)
                    <a href="{{ route('user.create') }}" class="btn btn-primary ">Add</a>
                @endcan
            </div>
            <div class="col">
                @if (Session::has('success'))
                    <p style="color: blue">{{ Session::get('success') }}</p>
                @endif
            </div>
            <div class="col">
                @can('delete', App\models\User::class)
                <a href="{{ route('user-trashed') }}"> <button type="subit" class="btn btn-labeled btn-danger">
                        <span class="btn-label"><i class="fa fa-trash"></i>Trash</span>
                    </button>
                </a>
                @endcan
            </div>



        </div>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td> Phone</td>
                    <td> Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key }}</a> </td>
                        <td> {{ $user->name }}</a></td>
                        <td> {{ $user->email }}</a></td>
                        <td>{{ $user->phone }}</a></td>
                        <td>
                            @can('update', App\models\User::class)
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info sm">
                                    <i class="fas fa-edit "></i>
                                </a>
                            @endcan
                            @can('delete', App\models\User::class)
                                <a data-href="{{ route('user.destroy', $user->id) }}" id="{{ $user->id }}"
                                    class="btn btn-danger sm deleteIcon"><i class=" fas fa-trash-alt "></i>
                                </a>
                            @endcan
                            @can('view', App\models\User::class)
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $users->links() }}
    </div>
@endsection
