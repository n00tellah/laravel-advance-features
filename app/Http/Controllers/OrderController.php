<?php

namespace App\Http\Controllers;

use App\Events\CustomerPlacedOrder;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\OrderPlaced;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        $newOrder = session('newOrder');
        return view('orders.index', compact('orders', 'newOrder'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'item_quantity' => 'required|integer|min:1',
            'payment' => 'required|string|in:cash,card,gcash',
        ]);
    
        $order = Order::create([
            'item' => $request->item,
            'item_quantity' => $request->item_quantity,
            'payment' => $request->payment,
        ]);
    
        event(new CustomerPlacedOrder($order));
    
        return redirect()->route('orders.index')->with('newOrder', $order);

}

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'item' => 'required',
            'item_price' => 'required',
            'item_quantity' => 'required',
            'payment_method' => 'required',
        ]);
        $order->update($request->input());
        return redirect()->route('orders')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders')->with('success', 'Order deleted successfully!');
    }
}
