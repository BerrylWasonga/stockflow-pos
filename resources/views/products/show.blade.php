@extends('layouts.layout')

@section('title', $product->name)

@section('main')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5>{{ $product->name }}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Product Name</strong></label>
                            <p>{{ $product->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Brand</strong></label>
                            <p>{{ $product->brand->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>Description</strong></label>
                    <p>{{ $product->description }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Categories</strong></label>
                    <div>
                        @forelse($product->categories as $category)
                            <span class="badge badge-primary">{{ $category->name }}</span>
                        @empty
                            <p class="text-muted">No categories assigned</p>
                        @endforelse
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>Batches & Quantity</strong></label>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Batch Number</th>
                                <th>Remaining Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product->batches as $batch)
                                <tr>
                                    <td>{{ $batch->batch_no }}</td>
                                    <td>{{ $batch->rem_quantity }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">No batches available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label><strong>Product Image</strong></label>
                    <div>
                        <img class="img-fluid" style="max-width: 300px; border-radius: 5px;" 
                             src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">
                    <i class="feather icon-edit"></i> Edit
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="feather icon-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
