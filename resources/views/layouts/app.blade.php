<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyNet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800 antialiased selection:bg-blue-600 selection:text-white">


    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">


            <a href="{{ route('clientes.index') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-cyan-500 flex items-center justify-center text-white shadow-md shadow-blue-500/25 group-hover:rotate-3 transition-transform duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="flex items-baseline gap-1.5">
                    <span class="text-xl font-black tracking-tight text-slate-900">
                        Sky<span class="text-blue-600">Net</span>
                    </span>
                    <span class="hidden sm:inline-block text-[11px] font-semibold text-slate-400">
                        | Respuestos Electónicos
                    </span>
                </div>
            </a>

            <!-- Navegación Central con Indicador Inferior -->
            <nav class="flex items-center h-full gap-1 sm:gap-2">
                <a href="{{ route('clientes.index') }}" 
                   class="relative h-full inline-flex items-center gap-2 px-4 text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('clientes.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Clientes
                    @if(request()->routeIs('clientes.*'))
                        <span class="absolute bottom-0 left-2 right-2 h-0.5 bg-blue-600 rounded-t-full"></span>
                    @endif
                </a>

                <a href="{{ route('cuentas.index') }}" 
                   class="relative h-full inline-flex items-center gap-2 px-4 text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('cuentas.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    Cuentas
                    @if(request()->routeIs('cuentas.*'))
                        <span class="absolute bottom-0 left-2 right-2 h-0.5 bg-blue-600 rounded-t-full"></span>
                    @endif
                </a>
            </nav>
            <div class="hidden md:flex items-center gap-2 bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Sistema activo
            </div>

        </div>
    </header>


    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
        <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-200/70">
            @yield('content')
        </div>
    </main>

</body>
</html>