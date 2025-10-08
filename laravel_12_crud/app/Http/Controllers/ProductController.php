<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::OrderBy('created_at','desc')
        ->get();
        return view('products.index',compact('products'));
    }

    
    public function create()
    {
        return view('products.create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);
        if($validator->fails())
        {
            return redirect()->route('products.create')->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->status = $request->status;
        $product->save();

        if($request->hasFile('image'))
        {
            $image = $request->image;

            $img_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'),$img_name);
            $product->image = $img_name;
            $product->save();
        }
        
        return redirect()->route('products.index')->with('success','product created successful !');
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit' , compact('product'));
    }

    
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $old_image = $product->image;
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'sku' => 'required|unique:products,sku,'.$id,
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);
        if($validator->fails())
        {
            return redirect()->route('products.edit',$product->id)->withErrors($validator)->withInput();
        }

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->status = $request->status;
        $product->save();

        if($request->hasFile('image'))
        {
            if($old_image!=null && File::exists(public_path('uploads/products/'.$old_image)))
            {
                File::delete(public_path('uploads/products/'.$old_image));
            }
            $image = $request->image;

            $img_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'),$img_name);
            $product->image = $img_name;
            $product->save();
        }
        
        return redirect()->route('products.index')->with('success','product updated successful !');
    }

    
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if($product->image!=null && File::exists(public_path('uploads/products/'.$product->image)))
            {
                File::delete(public_path('uploads/products/'.$product->image));
            }

        $product->delete();    

        return redirect()->route('products.index')->with('success','product deleted successful !');
    }
}
