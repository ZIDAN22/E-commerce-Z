<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('name', 'Login') - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS (via Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background: linear-gradient(135deg, #18181b 0%, #232526 100%);
                min-height: 100vh;
            }
            .glass {
                background: rgba(30, 30, 40, 0.35);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25), 0 0 0 2px #FFD70044;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-radius: 20px;
                border: 1.5px solid #FFD70088;
                position: relative;
            }
            .gold-border {
                border: 2px solid #FFD700;
                box-shadow: 0 0 12px 2px #FFD70055;
            }
            .gold-text {
                background: linear-gradient(90deg, #FFD700 0%, #FFC300 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-fill-color: transparent;
                filter: drop-shadow(0 1px 4px #FFD70088);
            }
            .gold-glow {
                position: absolute;
                top: -8px; left: -8px; right: -8px; bottom: -8px;
                border-radius: 24px;
                pointer-events: none;
                box-shadow: 0 0 32px 8px #FFD70033;
                z-index: 0;
            }
        </style>
    </head>
    <body class="font-sans text-gray-200 antialiased flex items-center justify-center min-h-screen bg-black">
        <div class="flex flex-col items-center w-full">
            <div class="mb-6 animate-fade-in-down">
                <a href="/">
                    <x-application-logo class="w-24 h-24 fill-current text-yellow-400 drop-shadow-lg" />
                </a>
            </div>
            <div class="relative w-full sm:max-w-md px-8 py-8 glass gold-border shadow-xl overflow-hidden sm:rounded-2xl animate-fade-in-up">
                <div class="gold-glow"></div>
                <h2 class="text-2xl font-bold text-center gold-text mb-6 tracking-wide z-10 relative">
                    @yield('name', 'Login')
                </h2>
                <div class="z-10 relative">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <script>
            // Simple fade-in animation
            document.querySelectorAll('.animate-fade-in-down').forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(-30px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.7s cubic-bezier(.4,0,.2,1)';
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                }, 100);
            });
            document.querySelectorAll('.animate-fade-in-up').forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.7s cubic-bezier(.4,0,.2,1)';
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                }, 200);
            });
        </script>
    </body>
</html>
