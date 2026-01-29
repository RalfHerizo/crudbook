<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
                
                body {
                    font-family: 'Poppins', sans-serif;
                }
                
                .bg-gradient-custom {
                    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
                }
                
                .book-stack {
                    animation: float 3s ease-in-out infinite;
                }
                
                @keyframes float {
                    0%, 100% {
                        transform: translateY(0px);
                    }
                    50% {
                        transform: translateY(-20px);
                    }
                }
                
                .leaf {
                    animation: rotate 4s linear infinite;
                }
                
                @keyframes rotate {
                    from {
                        transform: rotate(0deg);
                    }
                    to {
                        transform: rotate(360deg);
                    }
                }
                
                .btn-primary {
                    background: linear-gradient(135deg, #ff9a56 0%, #ff6b3d 100%);
                    transition: all 0.3s ease;
                }
                
                .btn-primary:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 10px 25px rgba(255, 107, 61, 0.4);
                }
            </style>
        @else
        @endif
    </head>
    <body class="bg-gradient-custom min-h-screen flex items-center justify-center p-4">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-8 items-center max-w-6xl mx-auto">
                <!-- Left Content -->
                <div class="text-left space-y-6 p-6">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-800 leading-tight">
                        Clean Library
                    </h1>
                    <p class="text-gray-600 text-lg leading-relaxed max-w-md">
                        Découvrez une application de gestion de bibliothèque construite avec les principes de Clean Architecture.
                    </p>
                    <div class="pt-4">
                        <a href="{{route('books.index')}}" class="btn-primary inline-block px-8 py-4 rounded-lg text-white font-semibold text-lg shadow-lg">
                            Go to Library
                        </a>
                    </div>
                </div>
                
                <!-- Right Illustration -->
                <div class="relative h-96 md:h-[500px] flex items-center justify-center">
                    <x-book-illustrations />
                </div>
            </div>
        </div>
    </body>
</html>
