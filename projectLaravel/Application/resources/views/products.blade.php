@extends('layout')
@section('title', 'Product Page')
@section('styles')
  <link href="{{asset('css/style.css') }}"  rel="stylesheet">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* Styles for the nicer alert */
    .alert {
      border-radius: 0;
      text-align: center;
    }

    /* Styles for the smaller "Add to cart" button */
    .btn-add-to-cart {
      font-size: 12px;
      padding: 5px 10px;
    }

    /* Styles for the cart dropdown */
    .cart-dropdown {
        width: 300px;
        background: #ffffff;
        border-radius: 5px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding: 20px;
    }

    .cart-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .cart-item img {
        height: 80px;
        width: 80px;
        object-fit: cover;
        margin-right: 20px;
        border-radius: 5px;
    }

    .cart-item p {
        margin-bottom: 0;
        font-size: 16px;
    }

    .cart-item .price {
        color: #007bff;
    }

    .cart-item .count {
        color: #6c757d;
    }

    .cart-total {
        text-align: right;
        margin-top: 20px;
    }

    .btn-view-all {
        background: #007bff;
        color: #fff;
        padding: 10px 30px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: background 0.3s;
    }

    .btn-view-all:hover {
        background: #0056b3;
        text-decoration: none;
    }

    /* Styles to make all images the same size */
    .productlist img {
        height: 200px; /* Adjust the height as needed */
        object-fit: cover;
    }

    /* Style to display three products in a row */
    @media (min-width: 576px) {
        .productlist .col-sm-6 {
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
    }
  </style>
@endsection

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <!-- Cart Dropdown (Top-Right) -->
        <div class="dropdown cart-dropdown">
            <button id="dLabel" type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>                 
            </button> 
            <div class="dropdown-menu" aria-labelledby="dLabel">
                <div class="row total-header-section">
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                        <p>Total: <span class="text-success">RM {{ $total }}</span></p>
                    </div>
                </div>

                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <div class="row cart-item">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ asset('img') }}/{{ $details['photo'] }}" />
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['product_name'] }}</p>
                            <p><span class="price text-success"> RM {{ $details['price'] }}</span> <span class="count">  | Quantity:{{ $details['quantity'] }}</span></p>
                        </div>
                    </div>
                @endforeach
                @endif

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center cart-total">
                        <a href="{{ route ('cart') }}" class="btn btn-primary btn-view-all">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        @foreach($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-4" style="margin-top: 20px;">
                <div class="card productlist"> <!-- Add the 'productlist' class to the card -->
                    <img src="{{ asset('img') }}/{{ $product ->photo }}" class="card-img-top" alt="{{ $product->product_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_descripton }}</p>
                        <p class="card-text"><strong>Price: </strong> RM{{ $product->price }}</p>
                        <p class="text-center"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-add-to-cart" role="button">Add to cart</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<br/>

@endsection
