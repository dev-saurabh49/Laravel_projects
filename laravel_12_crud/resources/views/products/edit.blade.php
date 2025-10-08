<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product || Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        img
        {
            height: 200px;
            width: 200px;
            object-fit: cover
        }
    </style>
</head>
<body>
    <div class="bg-secondary text-center text-white py-3">
        <h1>Laravel 12 CRUD</h1>
    </div>
    <div class="container py-5">
        <div class="row">
            
            <div class="d-flex justify-content-end p-0 mt-3">
                <a href="{{route('products.create')}}" class="btn btn-dark me-3">
                    <i class="bi bi-plus-circle me-1"></i>Add Product
                </a>
                <a href="{{route('products.index')}}" class="btn btn-danger">
                    <i class="bi-arrow-left-circle me-1"></i>Go Back
                </a>
            </div>
            <div class="card p-0 mt-3">
                <div class="card-header bg-dark text-white">
                    <h4 class="h4">Edit Product</h4>
                </div>
                <div class="card-body shadow-lg">
                    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-lebel">Product Name</label>
                            <input   type="text" name="name" class="form-control shadow-none  @error('name') is-invalid @enderror " placeholder="name" id="" value="{{old('name',$product->name)}}">
                            @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- sku --}}
                        <div class="mb-3">
                            <label for="image" class="form-lebel">Image</label>
                            <input  type="file" name="image" class="form-control shadow-none @error('image') is-invalid @enderror" value="{{old('image')}}">
                            @if (!empty($product->image))
                                        <img src="{{asset('uploads/products/'.$product->image)}}" class="img-responsive img-fluid mt-3" alt="">
                                        
                                    @endif
                            @error('image')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-lebel">SKU</label>
                            <input  type="text" name="sku" class="form-control shadow-none @error('sku') is-invalid @enderror" placeholder="sku" id="" value="{{old('sku',$product->sku)}}">
                            @error('sku')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- price --}}
                        <div class="mb-3">
                            <label for="price" class="form-lebel">Product Price</label>
                            <input  type="number" name="price" class="form-control shadow-none @error('price')
                                is-invalid
                            @enderror" placeholder="price" id="" value="{{old('price',$product->price)}}">
                            @error('price')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-lebel">Status</label>
                            <select name="status" id="status" class="form-select shadow-none">
                                <option {{($product->status == 'Active') ? 'selected' : ''}} value="Active">Active</option>
                                <option {{($product->status == 'Inactive') ? 'selected' : ''}} value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
