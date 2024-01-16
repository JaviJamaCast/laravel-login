<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">

    <!-- Encabezado con Navbar de Tailwind CSS -->
    <header>
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="-ml-2 mr-2 flex items-center">
                            <a class="text-xl font-semibold text-gray-700 hover:text-gray-900" href="#">
                                RevistApp
                            </a>
                        </div>
                        <!-- Espacio para elementos adicionales a la izquierda si es necesario -->
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <!-- Navegación -->
                        <a href="#"
                            class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition">
                            Inicio
                        </a>
                        <!-- Más elementos del menú aquí -->
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto mt-4 px-4">
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-white text-center text-gray-700 mt-4">
        <div class="py-4">
            @yield('footer')
        </div>
    </footer>

    @vite(['resources/js/app.js'])
</body>

</html>