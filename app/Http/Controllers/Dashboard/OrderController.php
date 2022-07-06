<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {

        // return 123;
        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);
        // return $orders;
        return view('dashboard.orders.index', compact('orders'));
    } // end of index

    public function products(Order $order)
    {
        //
        $products = $order -> products;

        return view('dashboard.orders._products', compact('products', 'order'));

    } // end of products

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {

        // return $order;
        $order -> products -> first() -> pivot -> quantity;

        foreach ($order -> products as $product) {

            $product -> update([

                'stock' => $product -> stock + $product -> pivot -> quantity,

            ]);

        } // end of foreach

        $order -> delete();

        session()->flash('success', 'Deleted successfully');

        return redirect()->route('dashboard.clients.index');

    } // end of destroy

} // end of controller
