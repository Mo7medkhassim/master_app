<?php

namespace App\Http\Controllers\Dashboard\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();

        return view('dashboard.clients.orders.index');
    } // end of index


    public function create(Client $client)
    {
        $categories = Category::with('products')->get();

        return view('dashboard.clients.orders.create', compact('client', 'categories'));
    } // end of create


    public function store(Request $request, Client $client)
    {
        // dd($request->product_ids[1]['quantities']);

        $request->validate([

            'products' => 'required|array',

        ]);

        $order = $client->orders()->create([]);

        $order->products()->attach($request->products);

        $total_price = 0;

        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);

            $total_price += $product->sale_price * $quantity['quantity'];

            $product->update([

                'stock' => $product->stock - $quantity['quantity']
            ]);
        } // end of foreach

        $order->update([

            'total_price' => $total_price,
        ]); // end of update

        session()->flash('success', 'Add it successfully');

        return redirect()->route('dashboard.orders.index');
    } // end of store


    public function show(Order $order)
    {
        //
    } // end of show


    public function edit(Order $order)
    {
        //
    } // end of edit


    public function update(Request $request, Order $order)
    {
        //
    } // end of update


    public function destroy(Order $order)
    {
        //
    } // end of destroy

} // end of controller
