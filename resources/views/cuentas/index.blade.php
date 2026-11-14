@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Encabezado simple -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200 pb-5">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                SkyNet • Repuestos Electrónicos
            </span>
            <div class="flex items-center gap-3 mt-0.5">
                <h2 class="text-2xl font-bold text-slate-800">Listado de Cuentas</h2>
                <span class="bg-slate-100 text-slate-700 border border-slate-200 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                    {{ $cuentas->count() }} registradas
                </span>
            </div>
        </div>

        <a href="{{ route('cuentas.create') }}" 
           class="inline-flex items-center justify-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition">
            + Nueva Cuenta
        </a>
    </div>

    <!-- Tabla limpia -->
    <div class="overflow-x-auto bg-white border border-slate-200 rounded-xl shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold uppercase tracking-wider text-slate-500">
                    <th class="py-3.5 px-4">No. Cuenta</th>
                    <th class="py-3.5 px-4">Cliente</th>
                    <th class="py-3.5 px-4">Tipo</th>
                    <th class="py-3.5 px-4 text-right">Saldo</th>
                    <th class="py-3.5 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($cuentas as $q)
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <td class="py-3.5 px-4 font-mono font-semibold text-slate-800">
                        {{ $q->numero_cuenta }}
                    </td>

                    <td class="py-3.5 px-4">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-xs flex items-center justify-center shrink-0">
                                {{ mb_strtoupper(mb_substr($q->cliente->nombre, 0, 1)) }}
                            </div>
                            <span class="font-medium text-slate-800">{{ $q->cliente->nombre }}</span>
                        </div>
                    </td>

                    <td class="py-3.5 px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold {{ $q->tipo == 'Monetaria' ? 'bg-blue-50 text-blue-700 border border-blue-200/80' : 'bg-amber-50 text-amber-700 border border-amber-200/80' }}">
                            {{ $q->tipo }}
                        </span>
                    </td>

                    <td class="py-3.5 px-4 text-right font-mono font-semibold text-slate-800">
                        Q{{ number_format($q->saldo, 2) }}
                    </td>

                    <td class="py-3.5 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('cuentas.show', $q) }}" 
                               class="bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200 hover:border-emerald-600 px-3 py-1 rounded-lg text-xs font-semibold transition">
                                Consultar
                            </a>

                            <a href="{{ route('cuentas.edit', $q) }}" 
                               class="bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white border border-blue-200 hover:border-blue-600 px-3 py-1 rounded-lg text-xs font-semibold transition">
                                Editar
                            </a>

                            <form action="{{ route('cuentas.destroy', $q) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-50 hover:bg-red-600 text-red-700 hover:text-white border border-red-200 hover:border-red-600 px-3 py-1 rounded-lg text-xs font-semibold transition cursor-pointer">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-10 px-4 text-center text-slate-500">
                        <p class="font-medium text-slate-700">No hay cuentas registradas todavía.</p>
                        <p class="text-xs mt-1">Haz clic en <span class="font-semibold text-blue-600">+ Nueva Cuenta</span> para agregar la primera.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection