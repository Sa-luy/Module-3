@extends('admin.main');
@section('content')
    <div class="customers">
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Adress</th>
                <th>Email</th>
                <th>Provider</th>
                <th>Log out date</th>
                <th>Action</th>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->provider_name }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>
                             {{-- @can('delete', \App\Models\Product::class) --}}
                  <a data-url="{{ route('customer.destroy', $customer->id) }}" id="{{ $customer->id }}"
                        class="sm deleteCustomer"><i class=" fas fa-trash-alt "></i>
                    </a> 
                {{-- @endcan  --}}


                            <td>
                                <a href="">3</a>
                            </td>

                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    @endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  
    $(function() {
        $('.deleteCustomer').on('click', deleteCustomer)
    })

    function deleteCustomer(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        Swal.fire({
            title: "Are you sure delete {{$customer->name}}?",
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
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
                            window.location="{{route('customer.index')}}";
                            alert(data.messages)

                        } 
                        if (data.status === 0) {
                            window.location="{{route('customer.index')}}";
                            alert(data.messages)

                        } 
                        }
                });

            }

        })
    }
</script>
