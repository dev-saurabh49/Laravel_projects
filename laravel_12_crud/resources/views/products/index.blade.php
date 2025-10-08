<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product || Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        td>img{
            height: 80px;
            width: 100px;
            object-fit: cover;
        }
        td,th
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="bg-dark text-center text-white py-3">
        <h1>Laravel 12 CRUD</h1>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="d-flex justify-content-end p-0 mt-3">
                <a href="{{route('products.create')}}" class="btn btn-dark">
                    <i class="bi bi-plus-circle me-1"></i>Add Product
                </a>
            </div>
            <div class="mt-3">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif
            </div class="mt-3">
            <div class="card p-0 mt-3">
                <div class="card-header bg-dark text-white">
                    <h4 class="h4">Products</h4>
                </div>
                <div class="card-body shadow-lg">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                
                                <th>NAME</th>
                                <th>SKU</th>
                                <th>PRICE</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th width="120" class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>₹{{ $product->price }}</td>
                                <td>
                                    @if (!empty($product->image))
                                        <img src="{{asset('uploads/products/'.$product->image)}}" class="img-responsive img-fluid" alt="">
                                        @else
                                        <img src="https://imgs.search.brave.com/jC-ljk9gczCKNz8-HHrcPHwnGZaEWQGOZEWmw69TDyM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly92aWEu/YXNzZXRzLnNvL2lt/Zy5qcGc_dz00MDAm/aD0zMDAmYmc9ZTVl/N2ViJmY9cG5n" alt="">
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($product->status == 'Active')
                                        <span class="badge bg-success"> {{ $product->status }}</span>
                                    @else
                                        <span class="badge bg-info">{{ $product->status }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning me-1" title="Edit">
                                        <i class="bi bi-pencil-square"></i> 
                                    </a>
                                    <form action="{{route('products.destroy',$product->id)}}" onsubmit=" return confirm('Are you sure to delete this')"  class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="btn btn-danger me-1" title="Edit">
                                        <i class="bi bi-trash"></i> 
                                    </button>
                                    </form>
                                    
                                </td>
                            </tr>

                        </tbody>
                        @endforeach
                        @else
                        <td colspan="7" class="text-center">No Products Found</td>
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
