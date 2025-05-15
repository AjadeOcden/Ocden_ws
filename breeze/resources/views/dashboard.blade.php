<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden">
                <div class="p-8 text-gray-800 dark:text-gray-100 text-center">
                    <h3 class="text-2xl font-semibold mb-2">Hello, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-gray-600 dark:text-gray-300">You're successfully logged in.</p>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 text-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-block px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
