@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Encabezado simple -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                SkyNet • Repuestos Electrónicos
            </span>
            <h2 class="text-2xl font-bold text-slate-800">Editar Cliente</h2>
        </div>

        <a href="{{ route('clientes.index') }}" 
           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2 rounded-lg transition">
            ← Volver
        </a>
    </div>

    <!-- Tarjeta del formulario -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-slate-800">{{ $cliente->nombre }}</p>
                <p class="text-xs text-slate-500 mt-0.5">Actualiza los datos de contacto o ruta de distribución.</p>
            </div>
            <span class="text-xs font-mono font-semibold bg-white text-slate-600 px-2.5 py-1 rounded border border-slate-200">
                ID #{{ $cliente->id }}
            </span>
        </div>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="p-6 space-y-5">
            @csrf 
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Nombre <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required
                       class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', $cliente->email) }}" required
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Teléfono
                    </label>
                    <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm font-mono text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Dirección de envío / distribución
                </label>
                <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}"
                       class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('clientes.index') }}" 
                   class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-sm transition cursor-pointer">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

</div>
@endsection