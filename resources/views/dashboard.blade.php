<x-app-layout>
    @extends('index')

@section('title', 'Dashboard')

@section('isihalaman')
<div class="container mt-5 text-center">
    <h3>Selamat Datang, {{ Auth::user()->name }} 🎉</h3>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger mt-3">Logout</button>
    </form>
</div>
@endsection

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    {{ __("You're logged in!") }}

                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button class="btn btn-danger bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
