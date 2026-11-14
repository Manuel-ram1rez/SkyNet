@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Encabezado simple -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                SkyNet • Repuestos Electrónicos
            </span>
            <h2 class="text-2xl font-bold text-slate-800">Detalle de la Cuenta</h2>
        </div>

        <a href="{{ route('cuentas.index') }}" 
           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2 rounded-lg transition">
            ← Volver
        </a>
    </div>

    <!-- Tarjeta única limpia -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        
        <!-- Cabecera con número de cuenta y titular -->
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <div>
                <p class="font-mono font-bold text-slate-800 text-base">{{ $cuenta->numero_cuenta }}</p>
                <p class="text-xs text-slate-500">Titular: {{ $cuenta->cliente->nombre }}</p>
            </div>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-md {{ $cuenta->tipo == 'Monetaria' ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                {{ $cuenta->tipo }}
            </span>
        </div>

        <!-- Lista de datos bien alineados -->
        <dl class="divide-y divide-slate-100 text-sm">
            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Número de Cuenta</dt>
                <dd class="font-mono font-semibold text-slate-800">{{ $cuenta->numero_cuenta }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Cliente</dt>
                <dd class="font-semibold text-slate-800">{{ $cuenta->cliente->nombre }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1">
                <dt class="font-medium text-slate-500">Tipo</dt>
                <dd class="text-slate-800">{{ $cuenta->tipo }}</dd>
            </div>

            <div class="px-6 py-3.5 flex flex-col sm:flex-row sm:justify-between gap-1 bg-slate-50/50">
                <dt class="font-medium text-slate-500">Saldo</dt>
                <dd class="font-mono font-bold text-base text-emerald-700">Q{{ number_format($cuenta->saldo, 2) }}</dd>
            </div>
        </dl>

    </div>

</div>
@endsection