@extends('product.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Product Management</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px;margin-bottom:10px;">
            <a class="btn btn-success " href="{{ route('product.create') }}">
                Add product
            </a>
        </div>
    </div>

    @if ($message = Session::get('succes'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    @if(sizeof($products) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Qty.</th>
                <th width="280px">More</th>
            @foreach($products as $products)
                <td>{{ ++$i }}</td>
                <td>{{ $products->products_name }}</td>
                <td>{{ $products->products_desc }}</td>
                <td>{{ $products->products_qty }}</td>
                <td>
                    <form action="{{ route('$products.detroy',$product->id) }}" method="POST">
                        <a class="btn btn-info"
                           href="{{ route('$products.show',$product->id) }}">Show</a>
                        <a class="btn btn_primary"
                           href="{{ route('$products.edit',$product->id )}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @else
    <div class="alert alert-alert">Start Adding to the Database</div>
    @endif