@extends('layout')
    
@section('content')

<div class="container mt-4">
    
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    
    @yield('content')
</div>


<div class="container mt-5">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width: 40%">Product</th>
                <th style="width: 15%">Price</th>
                <th style="width: 20%">Quantity</th>
                <th style="width: 15%" class="text-center">Subtotal</th>
                <th style="width: 10%" class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row align-items-center">
                                <div class="col-md-3 col-sm-4 col-6">
                                    <img src="{{ asset('img') }}/{{ $details['photo'] }}" alt="{{ $details['product_name'] }}" class="img-fluid" width="100" height="100">
                                </div>
                                <div class="col-md-9 col-sm-8 col-6">
                                    <h4 class="m-0">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">RM{{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">RM {{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="Actions">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
</div>

    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3>Total: RM {{ $total }}</h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <form action="/session" method="POST">
                    <a href="{{ url('product') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                </form>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

$(".cart_update").change(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
    
    
    $(".cart_remove").click(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    
</script>
@endsection
