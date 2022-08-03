@extends('admin.main');
@section('content')
    <div class="customers">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @if (Session::has('messages'))
                    <p class="text-danger">{{ Session::get('success') }}</p>
                @endif
            </div>
            <div class="col"></div>
        </div>
        @if (count($customers)==0)
            <p>Empty List</p>
        @else
        <h4>List Customer Delete</h4>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Email</th>
                    <th>Provider</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->provider_name }}</td>
                            <td>
                                @can('view', \App\Models\Customer::class)
                                    <a href="{{ route('customer.show', $customer->id) }}" class="waves-effect waves-light">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                @endcan
                                @can('update', \App\Models\Customer::class)
                                    <a class="restoreCustomer" data-url="{{ route('customer.restore', $customer->id) }}"
                                        data-id={{ $customer->id }}>
                                        <i class="fa-solid fa-arrows-rotate"></i>
                                    </a>
                                @endcan

                                @can('delete', \App\Models\Customer::class)
                                    <a data-url="{{ route('customer.forceDelete', $customer->id) }}" id="{{ $customer->id }}"
                                        class="btn btn-danger sm forceDeleteCustomer"><i class=" fas fa-trash-alt "></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $('.restoreCustomer').on('click', restoreCustomer)
        $('.forceDeleteCustomer').on('click', forceDeleteCustomer)

    })

    function forceDeleteCustomer(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        Swal.fire({
            title: "Are you sure Force Delete ?",
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery.ajax({
                    type: "post",
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
                        if (data.status === 0) {
                            window.location.reload();
                            alert(data.messages)

                        }
                    }
                });

            }

        })
    }

    function restoreCustomer(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        Swal.fire({
            title: "Are you sure restore ?",
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery.ajax({
                    type: "post",
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
                        if (data.status === 0) {
                            window.location.reload();
                            alert(data.messages)

                        }
                    }
                });

            }

        })
    }
</script>
