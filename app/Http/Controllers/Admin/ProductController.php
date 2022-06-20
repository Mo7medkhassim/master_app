<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        $categories = Category::all();

        $products = Product::when($request -> search, function ($q) use ($request) {

                return $q -> whereTranslationLike('name', '%'. $request -> search . '%');  })

                 -> when($request -> category_id, function($q) use ($request) {

                    return $q -> where ('category_id', $request -> category_id);

               
        }) -> latest () -> paginate (5);

        return view('dashboard.products.index', compact('categories','products'));

    }  // end of index


   
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact ('categories'));
    } // end of creates

    
    public function store(Request $request)
    {
        
        $rules = [
            'category_id' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => 'required|unique:product_translations,name'];
            $rules += [$locale . '.description' => 'required'];
        }

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {

            Image::make($request->image)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }


        Product::create($request_data);

        session() -> flash('success', 'Added successfully');

        return redirect()->route('dashboard.products.index');

    } // end of store

   
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('categories','product'));
    } // end of edit

   
    public function update(Request $request, Product $product)
    {
        $rules = [
            'category_id' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {

             $rules += [$locale . '.name' => 
             ['required',
                Rule::unique('product_translations', 'name') -> ignore($product -> id , 'product_id')]];
             $rules += [$locale . '.description' => 'required'];
        }

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {

            if ($product->image != 'default.png') {

                Storage::disk('public_upload')->delete('/products/' . $product->image);
            }

            Image::make($request->image)
                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/products/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $product ->  update ($request_data);

        session() -> flash('success', 'Updated successfully');

        return redirect()->route('dashboard.products.index');
    } // end of update

   
    public function destroy(Product $product)
    {
        if ($product->image !== "default.png") {
            Storage::disk('public_upload')->delete('/products/' . $product->image);
        }

        $product->delete();

        session()->flash('success', 'Delete has been successfully');

        return redirect()->route('dashboard.products.index');
    } // end of destroy
}
