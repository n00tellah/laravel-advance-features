<x-guest-layout>
    <form method="POST" action="{{ route('orders.update', $order) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="item" :value="__('Item')" />
            <x-text-input id="item" class="block mt-1 w-full" type="text" name="item" value="{{ old('item', $order->item) }}" />
        </div>

        <div class="mt-4">
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" value="{{ old('quantity', $order->quantity) }}" />
        </div>

        <div class="mt-4">
            <x-input-label for="payment" :value="__('Payment Method')" />
            <select id="payment" name="payment">
                <option value="cash" {{ $order->payment == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="card" {{ $order->payment == 'card' ? 'selected' : '' }}>Card</option>
                <option value="gcash" {{ $order->payment == 'gcash' ? 'selected' : '' }}>GCash</option>
            </select>
        </div>

        <div class="flex justify-center mt-4">
            <x-primary-button>
                {{ __('Update Order') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
