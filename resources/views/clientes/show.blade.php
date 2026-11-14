@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Encabezado simple -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                SkyNet • Repuestos Electrónicos
            </span>
            <h2 class="text-2xl font-bold text-slate-800">Detalle del Cliente</h2>
        </div>

        <a href="{{ route('clientes.index') }}" 
           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2 rounded-lg transition">
            ← Volver
        </a>
    </div>

    <!-- Tarjeta única limpia -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        
        <!-- Cabecera con inicial y nombre -->
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center">
                    {{ mb_strtoupper(mb_substr($cliente->nombre, 0, 1)) }}
                </div>
                <div>
                    <p class="font-bold text-slate-800">{{ $cliente->nombre }}</p>
                    <p class="text-xs text-slate-500">Cliente de venta y distribución</p>
                </div>
            </div>
            <span class="text-xs font-mono font-semibold bg-white text-slate-600 px-2.5 py-1 rounded border border-slate-200">
                ID #{{ $cliente->id }}
            </span>
        </div>

        <!-- Lista de datos bien alineados -->
        <dl class="divide-y divide-slate-100 text-sm">
            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">ID</dt>
                <dd class="font-mono text-slate-800">{{ $cliente->id }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Nombre</dt>
                <dd class="font-semibold text-slate-800">{{ $cliente->nombre }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Email</dt>
                <dd class="text-slate-800">{{ $cliente->email }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Teléfono</dt>
                <dd class="font-mono text-slate-800">{{ $cliente->telefono ?: 'No registrado' }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Dirección de envío</dt>
                <dd class="text-slate-800 sm:text-right max-w-md">{{ $cliente->direccion ?: 'Sin dirección registrada' }}</dd>
            </div>
        </dl>

    </div>

</div>
@endsection