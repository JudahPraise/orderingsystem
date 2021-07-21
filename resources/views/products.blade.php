@extends('layouts.main')

@section('main')
  <div class="container-fluid p-5">
    <div class="row d-flex justify-content-between mb-4">
        <a href="{{ route('welcome') }}" type="button" class="btn btn-primary">Back</a>
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#addProduct">Add Product</button>
        <!-- Modal -->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addProductLabel">Add Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <input type="text" class="form-control" id="name" name="product">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="cat_id">
                              @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="stocks">Stocks</label>
                          <input type="number" class="form-control" id="stocks" name="stocks">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price">
                            <small class="text-muted font-italic">*price per piece</small>
                          </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" value="Submit Value" onclick="document.getElementById('addForm').submit()">Save changes</button>
                </div>
              </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Stocks</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categories as $category)
            @foreach ($category->products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->product }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $product->stocks }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
          @empty
              <tr><td class="text-center" colspan="5"></td></tr>
          @endforelse
        </tbody>
    </table>
  </div>
@endsection