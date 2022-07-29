@extends('admin.main');
@section('content')
<h1>Order</h1>
<div class="row">
    <div class="col"><a href="{{route('order.create')}}"><i class='bx bxs-comment-add btn btn-primary'></i></a></div>
    <div class="col">  @if (Session::has('messages'))
        <p class="text-messages text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('messages') }}
        </p>
    @endif</div>
    <div class="col"><a href="{{route('order-trashed')}}"><i class='bx bx-trash btn btn-danger' ></i></a></div>
</div>
  
    @if (count($orders) == 0)
        <p>Empty Order</p>
        
    @else
   
        @foreach ($orders as $order)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Notes</th>
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col">Total Money</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->fullname }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->notes }}</td>
                        {{-- <td>{{ $order->status }}</td> --}}
                        <td>{{ $order->totalmoney }}</td>
                        <td>
                            <label for="">
                                <a href="{{ route('order.show', $order->id) }}"><i class='bx bx-low-vision'></i></a>
                                <a href="{{ route('order.edit', $order->id) }}"><i class='bx bx-edit-alt'></i></a>
                                <a data-url="{{ route('order.destroy', $order->id) }}" class="deleteOrder"
                                    data-id="{{ $order->id }}"><i class='bx bx-trash'></i></a>
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    @endif
    <script>
        $(function() {
            $('.deleteOrder').on('click', deleteOrder)
        })

        function deleteOrder(event) {
            event.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');
            Swal.fire({
                title: "Are you sure delete ?",
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
                                console.log(data);
                                window.location.reload();
                                alert(data.messages)

                            }
                            if (data.status === 0) {
                                console.log(data);
                                // window.location.reload();
                                alert(data.messages)

                            }
                        }
                    });

                }

            })
        }
    </script>
@endsection
