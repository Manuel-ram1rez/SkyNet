@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Encabezado simple -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                SkyNet • Repuestos Electrónicos
            </span>
            <h2 class="text-2xl font-bold text-slate-800">Crear Cliente</h2>
        </div>

        <a href="{{ route('clientes.index') }}" 
           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2 rounded-lg transition">
            ← Volver
        </a>
    </div>

    <!-- Tarjeta del formulario -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
            <p class="text-sm font-semibold text-slate-800">Registro de nuevo comprador o distribuidor</p>
            <p class="text-xs text-slate-500 mt-0.5">Completa los datos de contacto y entrega de repuestos.</p>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Nombre <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                       placeholder="Ej. Taller Electrónico Central o Juan Pérez"
                       class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           placeholder="correo@ejemplo.com"
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Teléfono
                    </label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}"
                           placeholder="Ej. 5555-0000"
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm font-mono text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Dirección de envío / distribución
                </label>
                <input type="text" name="direccion" value="{{ old('direccion') }}"
                       placeholder="Zona, calle o punto de entrega de pedidos"
                       class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('clientes.index') }}" 
                   class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-sm transition cursor-pointer">
                    Guardar
                </button>
            </div>
        </form>
    </div>

</div>
@endsection