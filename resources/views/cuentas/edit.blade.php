@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Encabezado simple -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">
                SkyNet • Repuestos Electrónicos
            </span>
            <h2 class="text-2xl font-bold text-slate-800">Editar Cuenta</h2>
        </div>

        <a href="{{ route('cuentas.index') }}" 
           class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200/80 px-4 py-2 rounded-lg transition">
            ← Volver
        </a>
    </div>

    <!-- Tarjeta del formulario -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <div>
                <p class="text-sm font-mono font-bold text-slate-800">{{ $cuenta->numero_cuenta }}</p>
                <p class="text-xs text-slate-500 mt-0.5">Modifica el titular, tipo o saldo disponible de la cuenta.</p>
            </div>
            <span class="text-xs font-semibold bg-white text-slate-600 px-2.5 py-1 rounded border border-slate-200">
                {{ $cuenta->tipo }}
            </span>
        </div>

        <form action="{{ route('cuentas.update', $cuenta) }}" method="POST" class="p-6 space-y-5">
            @csrf 
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Cliente <span class="text-red-500">*</span>
                </label>
                <select name="cliente_id" required
                        class="w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}" {{ old('cliente_id', $cuenta->cliente_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Número de Cuenta <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="numero_cuenta" value="{{ old('numero_cuenta', $cuenta->numero_cuenta) }}" required
                           class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm font-mono text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Tipo <span class="text-red-500">*</span>
                    </label>
                    <select name="tipo" required
                            class="w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
                        <option value="Ahorro" {{ old('tipo', $cuenta->tipo) == 'Ahorro' ? 'selected' : '' }}>Ahorro</option>
                        <option value="Monetaria" {{ old('tipo', $cuenta->tipo) == 'Monetaria' ? 'selected' : '' }}>Monetaria</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Saldo (Q) <span class="text-red-500">*</span>
                </label>
                <input type="number" step="0.01" name="saldo" value="{{ old('saldo', $cuenta->saldo) }}" required
                       class="w-full border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm font-mono text-slate-800 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/15 transition">
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('cuentas.index') }}" 
                   class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-sm transition cursor-pointer">
                    Actualizar Cuenta
                </button>
            </div>
        </form>
    </div>

</div>
@endsection