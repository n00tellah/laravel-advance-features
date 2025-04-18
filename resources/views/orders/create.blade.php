<x-guest-layout>
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div>
            <x-input-label for="item" :value="__('Item')" />
            <x-text-input id="item" class="block mt-1 w-full" type="text" name="item" :value="old('item')"/>
        </div>

        <div class="mt-4">
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')"/>
        </div>
<br>
        <div  class="block mt-1 w-full">
            <select id="payment" name="payment">
                <option value="cash">Cash</option>
                <option value="card">Card</option>
                <option value="gcash">GCash</option>
            </select>
        </div>

            <x-primary-button class="mt-4 justify-center">
                <a href="{{ route('orders.index') }}">{{ __('Place Order') }}</a>
            </x-primary-button>
    </form>
</x-guest-layout>
