@extends('fronten.layouts.main')
$@section('hot_product')
    <div class="cart-wrapper">
      @include('components.cart_show')
    </div>
@endsection
@section('content')
@endsection
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script>
    $(function(){
 $(document).on('click','.cart_update',cartUpdate)
 $(document).on('click','.cart_delete',cartDelete)

    })
    function cartUpdate (event){
        event.preventDefault();
        let url= $('.updateCartUrl').data('url');
        let id=$(this).data('id');
        let quantity= $(this).parents('tr').find('input.quantity').val();

        // alert(quantity);
        $.ajax({
            type: "GET",
            url:url,
            data:{id:id,
            quantity: quantity
            },
            success: function(data){
               if(data.code=== 200){
                $('.cart-wrapper').html(data.cartComponent);
                alert('cập nhật thành công')
               }
            },
            error: function(){}
        })
    }
    function cartDelete(event){
        event.preventDefault();
        let url= $(this).data('url');
        let id=$(this).data('id');

        $.ajax({
            type: "GET",
            url:url,
            data:{id:id,
            },
            success: function(data){
               if(data.code=== 200){
                $('.cart-wrapper').html(data.cartComponent);
                alert('cập nhật thành công')
               }
            },
            error: function(){}
        })
    }
</script>
