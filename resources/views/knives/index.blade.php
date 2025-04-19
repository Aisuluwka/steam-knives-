@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Каталог ножей</h1>

    <a href="/knives/create" class="text-blue-600 hover:underline mb-4 inline-block">➕ Добавить нож</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($knives as $knife)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                @if ($knife->image)
                    <img src="{{ asset('storage/' . $knife->image) }}" alt="{{ $knife->name }}" class="w-full h-48 object-contain bg-gray-100 p-4">
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $knife->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ $knife->description }}</p>
                    <p class="text-lg font-bold">Цена: {{ number_format($knife->price, 2, ',', ' ') }} ₽</p>

        
                    <form action="{{ route('knives.add_to_cart', $knife->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-shopping-cart"></i> Купить
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


