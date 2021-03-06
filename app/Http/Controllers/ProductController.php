<?php

namespace App\Http\Controllers;

use App\ClientSelection;
use Illuminate\Http\Request;
use App\Product;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = DB::table('products')->paginate(5);
        return view('admin/viewproducts', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->user_id = Auth::id();
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();
        return redirect('admin/products')->with('saved_successfully', 'Products successfully saved');

    }

    public function edit($id)
    {
        $products = Product::where('id', $id)->get();
        return view('admin.products.edit', ['products' => $products]);
    }

    public function update(Request $request, $id)
    {
        if (Input::hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $image = $request->file('image')->move('images/productsimage', $file_name);

            $image = $image->getPathname();
        }
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        Product::where('id', $id)->update(['name' => $name, 'description' => $description, 'image' => $image, 'price' => $price]);
        return redirect('/admin/products/edit_' . $id);
    }

    public function reports()
    {
        $products = Product::all()->sortByDesc('count');
        return view('admin.reports', ['products' => $products]);

    }

    public function analytics()
    {
        $products = Product::all();
        $count = Product::all()->pluck('count')->toArray();
        $name = Product::all()->pluck('id');
        $nameArray = array();
        foreach ($name as $item) {
            $nameArray[] = $item;
        }

        return view('admin.analytics', [
            'name' => json_encode($nameArray),
            'count' => $count,
            'products' => $products
        ]);

    }

    public function key()
    {
        $products = Product::all();
        return view('admin.analytics', ['products' => $products]);
    }
}
