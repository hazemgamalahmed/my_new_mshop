@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">categories</a></li>
                            <li class="breadcrumb-item active">Show Category:</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-body">
                        <form method="POST" action="{{route('admin.orders.update', $orders)}}">
                            @method('PUT')
                            @csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_id">Client Name</label>
            <select name="client_id" id="client_id" class="form-control">
               
                    <option value="  {{ $orders->client->id }} "
                        {{ old('client_id') == $orders->client->id ? 'selected' : '' }}>
                        {{$orders->client->name }}
                    </option>
                
            </select>
            @if ($errors->first('client_id'))
                <span class="text-danger">
          {{ $errors->first('client_id') }}
        </span>
            @endif

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">Order Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
            @if ($errors->first('date'))
                <span class="text-danger">
                  {{ $errors->first('date') }}
                </span>
            @endif

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Products
            @if ($errors->first('products'))
                <span class="text-danger">
                  {{ $errors->first('products') }}
                </span>
            @endif

        </h3>

        <button type="button" class="btn btn-info" id="btn-add-new-product">Add Product</button>
    </div>
    <table class="table mt-3">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="products-list">

        @if (old('products'))
            @foreach(old('products') as $rowId => $rowProduct)
                <tr id="product-{{$rowId}}">
                    <td>
                        <select name="products[{{$rowId}}][product_id]"
                                class="form-control input-product-product_id"
                                row-id="product-{{$rowId}}">
                            @foreach($products as $product)
                                @if ($product->id == $rowProduct['product_id'])
                                    <option value="{{ $product->id }}" selected data-price="{{ $product->price }}">
                                        {{ $product->name }} | {{ $product->price }}
                                    </option>
                                @else
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }} | {{ $product->price }}
                                    </option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->first('products.' . $rowId . '.product_id'))
                            <span class="text-danger">
                              {{ $errors->first('products.' . $rowId . '.product_id') }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <input type="number"
                               name="products[{{$rowId}}][quantity]"
                               value="{{ $rowProduct['quantity']?? 1 }}"
                               row-id="product-{{$rowId}}"
                               class="form-control input-product-quantity">
                        @if ($errors->first('products.' . $rowId . '.quantity'))
                            <span class="text-danger">
                              {{ $errors->first('products.' . $rowId . '.quantity') }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <input type="number"
                               name="products[{{$rowId}}][price]"
                               readonly
                               class="form-control input-product-price"
                               row-id="product-{{$rowId}}"
                               value="{{ $rowProduct['price']?? 1 }}">
                        @if ($errors->first('products.' . $rowId . '.price'))
                            <span class="text-danger">
                              {{ $errors->first('products.' . $rowId . '.price') }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <input type="number"
                               name="products[{{$rowId}}][total]"
                               readonly
                               class="form-control input-product-total"
                               row-id="product-{{$rowId}}"
                               value="{{ $rowProduct['total'] == 0 ? $rowProduct['price'] : $rowProduct['total'] }}">

                        @if ($errors->first('products.' . $rowId . '.total'))
                            <span class="text-danger">
                              {{ $errors->first('products.' . $rowId . '.total') }}
                            </span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger row-delete" row-id="product-{{$rowId}}">-</button>
                    </td>
                </tr>
            @endforeach
        @else
        @foreach($orders->products as $order)
            <tr id="product-1">
                <td>
                    
                    <select name="products[1][product_id]"
                            class="form-control input-product-product_id"
                            row-id="product-1">
                        @foreach($products as $product)
                        @if(isset($orders) && $product->id == $order->id)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}" selected="">
                                {{ $product->name }} | {{ $product->price }}
                            </option>

                        @endif
                            <option value="{{ $product->id }}"
                             data-price="{{ $product->price }}">
                                {{ $product->name }} | {{ $product->price }}
                            </option> 
                        @endforeach
                    </select>
                  
                </td>
                <td>
                    
                    <input type="number"
                           name="products[1][quantity]"
                           value="{{$order->pivot->quantity}}"
                           row-id="product-1"
                           class="form-control input-product-quantity">
                       
                </td>
                <td>
                    <input type="number"
                           name="products[1][price]"
                           readonly
                           class="form-control input-product-price"
                           row-id="product-1"
                           value="{{ $order->pivot->price  }}">
                </td>
                <td>
                    <input type="number"
                           name="products[1][total]"
                           
                           class="form-control input-product-total"
                           row-id="product-1"
                           value="{{ $order->pivot->total }}">
                </td>
                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-1">-</button>
                </td>
            </tr>
            @endforeach
        @endif

        </tbody>

    </table>

</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">Edit</button>

</div>
</form>
@section('js')
    <script>

        /**
         * Events
         */
        $(document).on('click', '#btn-add-new-product', function () {
            const rowId = Date.now();
            const productRow = `
             @foreach($orders->products as $order)
            <tr id="product-${rowId}">
                <td>
                    <select name="products[${rowId}][product_id]"
                    row-id="product-${rowId}"
                    class="form-control  input-product-product_id">
                       @foreach($products as $product)
                       @if(isset($orders) && $product->id == $order->id)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} | {{ $product->price }}
                            </option>
                            @endif
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} | {{ $product->price }}
                            </option>
                       @endforeach
                    </select>
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][quantity]"
                    value="{{$order->pivot->quantity}}"
                    row-id="product-${rowId}"
                    class="form-control input-product-quantity">
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][price]"
                    row-id="product-${rowId}"
                    value="{{ $order->pivot->price }}"
                    readonly
                    class="form-control input-product-price">
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][total]"
                    row-id="product-${rowId}"
                    
                    value="{{ $order->pivot->price }}"
                    class="form-control input-product-total">
                </td>
                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
             @endforeach
            `;
            $('#products-list').append(productRow);
        });

        $(document).on('click', '.row-delete', function () {
            const rowId = '#' + $(this).attr('row-id');
            $(rowId).remove();
        });

        $(document).on('keyup', '.input-product-quantity', function () {
            const rowId = '#' + $(this).attr('row-id');
            calculateTotal(rowId);
        });

        $(document).on('change', '.input-product-product_id', function () {
            const rowId = '#' + $(this).attr('row-id'),
                price = $(this).children("option:selected").data('price')
            ;
            $(`${rowId} .input-product-price`).val(price);
            calculateTotal(rowId);
        });

        ///////////////////////////
        /**
         * Functions
         */

        /**
         * @param rowId
         */
        function calculateTotal(rowId) {
            const quantity = $(`${rowId} .input-product-quantity`).val(),
                price = $(`${rowId} .input-product-price`).val(),
                total = price * quantity;

            $(`${rowId} .input-product-total`).val(total);
        }
    </script>
@endsection

                        </form>

                   </div>
                </div>
            </div>
        </div>
    </div>


        @endsection