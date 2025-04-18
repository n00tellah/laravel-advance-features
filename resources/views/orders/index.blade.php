<x-guest-layout>
    <div class="flex justify-center mt-4">
        <h2 class="text-xl font-bold">Orders</h2>
    </div>

    {{-- Display New Order if Found --}}
    @if($newOrder)
        <div class="mt-4 bg-green-100 text-green-700 p-4 rounded">
            <strong>New Order Created:</strong>
            <p>Item: {{ $newOrder->item }}</p>
            <p>Quantity: {{ $newOrder->item_quantity }}</p>
            <p>Payment Method: {{ $newOrder->payment }}</p>
        </div>
    @else
        <p class="text-gray-500">No recent order found.</p>
    @endif

    {{-- Show All Orders --}}
    <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Item</th>
                <th class="border px-4 py-2">Quantity</th>
                <th class="border px-4 py-2">Payment Method</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{ $order->item }}</td>
                    <td class="border px-4 py-2">{{ $order->item_quantity }}</td>
                    <td class="border px-4 py-2">{{ $order->payment }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('orders.edit', $order) }}" class="text-blue-500">Edit</a>
                        <form method="POST" action="{{ route('orders.destroy', $order) }}" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center mt-4">
        <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Order</a>
    </div>
</x-guest-layout>

