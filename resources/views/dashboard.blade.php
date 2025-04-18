<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if (auth()->user()->role == "admin")
                    <div class="p-6 text-gray-900">
                        <?php return view('admin-dashboard'); ?>
                    </div>
                        @else 
                        <div class="p-6 text-gray-900">
                            {{ __("Welcome User!") }}
                        </div>
                    @endif
                </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Notifications') }}
                    </h5>
                    <br>
                        @foreach (auth()->user()->notifications as $notification)
                            <p>{{ $notification->data['message'] }}</p>
                        @endforeach
                </div>
            </div>

            <button class="p-6 font-semibold btn-blue text-white" style="background-color: #4CAF50; padding: 15px 20px; margin: 20px 0; border-radius: 10px;">
                <a href="{{ route('orders.index') }}">View Orders</a>
            </button>
        </div>
    </div>
</x-app-layout>
