
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин ножей</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div>
            <a href="{{ route('knives.index') }}" class="text-blue-600 hover:underline font-semibold mr-4">🗂 Каталог</a>
            <a href="{{ route('knives.cart') }}" class="text-blue-600 hover:underline font-semibold">🛒 Корзина</a>
        </div>
        @auth
            <span>Привет, {{ auth()->user()->name }}!</span>
        @endauth
    </nav>

   
    <div class="container mx-auto px-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>



