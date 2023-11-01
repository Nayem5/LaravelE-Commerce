<!DOCTYPE html>
<html>
<head>
    <title>Product Information Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
    @endif
 
    <div class="container">
        <h2 class="mt-3">Edit Product</h2>
        <form action="{{route('product.update', ['product' => $product])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" value="{{ $product -> product_name }}">
            </div>

            <div class="form-group">
                <label for="photo">Product Photo:</label>
                <input type="file" class="form-control-file"  name="photo">
                <label>Current Image</label><br>
                <img src="{{ asset('img/' . $product->photo) }}" alt="Product Photo" style="max-width: 200px;">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control"  name="price" step="0.01" value="{{ $product -> price }}">
            </div>

            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <textarea class="form-control" name="product_descripton" rows="4" >{{ $product -> product_descripton }}</textarea>
            </div>

            <button type="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
