@extends('products.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Product</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" herf="{{ route('products.index') }}">Back</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-dange">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as @error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('product.update',$product->id) }}" method="POST">
        @csrff
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name"
                           value="{{ $product->Product_name }}"
                           class="form-control" placeholder="product Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Description:</strong>
                    <textarea type="number" name="product_desc"
                           style="height:150px"
                           placeholder="product description">{{ $product->product_desc }}
                    </textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Qty:</strong>
                    <input type="number" name="product_qty" class="form-control"
                           style="height:150px"
                           value="{{ $product->product_qty}}" placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="subimt" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
