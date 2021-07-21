@extends('layouts.main')

@section('main')
<div class="container-fluid w-25 p-3" style="height: 100vh">
    <div class="row d-flex justify-content-between mb-3">
        <h3>Menu</h3>
        <div>
            <a href="{{ route('welcome') }}" class="btn btn-primary">Back</a>
            <button class="btn btn-success" onclick="document.getElementById('orderForm').submit()">Submit Order</button>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('menu.order') }}" method="POST" id="orderForm" class="w-100">
            @csrf
            @forelse ($categories as $category)
                <h3 class="mt-3">{{ $category->category }}</h3>
                <div class="card mb-3" style="width: 100%">
                    <ul class="list-group list-group-flush w-100">
                       @foreach ($category->products as $product)
                             <li class="list-group-item align-items-center w-100">
                                <input type="string" value="{{ $product->id }}" name="prd_id[]" hidden>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $product->product }}" id="{{ $product->product }}" name="prd_name[]">
                                        <label class="form-check-label" for="{{ $product->product }}">
                                          {{ $product->product }}
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" id="price" value="{{ $product->price }}" style="background: transparent; border: none" name="price[]" hidden>
                                            <label for="price"><span>&#8369;</span>{{ $product->price }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity[]">
                                </div>
                            </li>
                       @endforeach
                   </ul>
                </div>
            @empty
                <p class="text-center font-italic">No products yet</p>
            @endforelse
        </form>
    </div>
</div>
@endsection