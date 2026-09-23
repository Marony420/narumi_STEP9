<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Like;
use App\Models\Sale;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductSearchRequest;
use illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductSearchRequest $request)
    {
        $products = Product::query();

        if ($request->filled('product_name')){
            $products->where('product_name', 'like', '%' . $request->product_name . '%');
        }

        if ($request->filled('min_price')){
            $products->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')){
            $products->where('price', '<=', $request->max_price);
        }

        $products = $products->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function toggleLike(Product $product)
    {
        $like = Like::where('user_id', auth()->id())
           ->where('product_id', $product->id)
           ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ]);
        }

        return back();
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $imgPath = $request->file('img_path')->store('products', 'public');

        Product::create([
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'img_path' => $imgPath,
        ]);

        return redirect()->route('mypage');
    }
    
    public function edit(Product $product)
    {
        abort_unless($product->user_id === auth()->id(), 403);
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        abort_unless($product->user_id === auth()->id(), 403);
        $data = [
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ];

        if ($request->hasFile('img_path')) {
             $data['img_path'] = $request->file('img_path')->store('products', 'public');
        }

         $product->update($data);

        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        abort_unless($product->user_id === auth()->id(), 403);
        $product->delete();

        return redirect()->route('mypage');
    }

    public function purchase(Product $product)
    {
        return view('products.purchase', compact('product'));
    }
    
    public function storePurchase(PurchaseRequest $request, Product $product)
    {
       $quantity = $request->quantity;

       Sale::create([
           'user_id' => auth()->id(),
           'product_id' => $product->id,
           'quantity' => $quantity,
        ]);

        $product->stock -= $quantity;
        $product->save();

        return redirect()->route('products.index');
    }

}
