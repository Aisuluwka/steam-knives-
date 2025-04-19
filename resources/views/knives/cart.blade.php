@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Корзина</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach(session('cart') as $id => $details)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $details['name'] }}</h2>
                <p class="text-gray-600 mb-2">Количество: {{ $details['quantity'] }}</p>
                <p class="text-lg font-bold">Цена: {{ number_format($details['price'], 2, ',', ' ') }} ₽</p>

                <form action="{{ route('knives.remove_from_cart', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="btn btn-danger mt-4 px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Удалить из корзины
                    </button>
                </form>
            </div>
        </div>
        @php
        $total = 0;
        foreach(session('cart') as $details) {
        $total += $details['price'] * $details['quantity'];
        }
        @endphp

        @endforeach

    </div> 

    <div class="mt-8 p-6 bg-gray-100 rounded-xl text-xl font-semibold text-right">
        🧾 Общая сумма: {{ number_format($total, 2, ',', ' ') }} ₽
    </div>

</div>
@else
<p>Ваша корзина пуста.</p>
@endif
</div>
@endsection
