@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-gray-200 pb-5">
        <div>
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Listado de Clientes</h2>
                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-1 rounded-full">
                    {{ $clientes->count() }} registrados
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1">Gestión y consulta de titulares registrados en el sistema.</p>
        </div>

        <a href="{{ route('clientes.create') }}" 
           class="inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 active:bg-blue-900 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm hover:shadow transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Cliente
        </a>
    </div>

    <!-- Contenedor responsivo de la tabla -->
    <div class="overflow-x-auto bg-white rounded-xl border border-gray-200 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-800 text-white text-xs uppercase tracking-wider">
                    <th class="py-3.5 px-4 font-semibold text-center w-16">ID</th>
                    <th class="py-3.5 px-4 font-semibold">Cliente</th>
                    <th class="py-3.5 px-4 font-semibold">Correo Electrónico</th>
                    <th class="py-3.5 px-4 font-semibold">Teléfono</th>
                    <th class="py-3.5 px-4 font-semibold text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse($clientes as $c)
                <tr class="hover:bg-blue-50/60 transition-colors duration-150">
                    <!-- ID -->
                    <td class="py-3.5 px-4 text-center">
                        <span class="font-mono text-xs font-semibold bg-gray-100 text-gray-700 px-2.5 py-1 rounded-md border border-gray-200">
                            #{{ $c->id }}
                        </span>
                    </td>

                    <!-- Nombre con Avatar de inicial -->
                    <td class="py-3.5 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-blue-700 text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
                                {{ mb_strtoupper(mb_substr($c->nombre, 0, 1)) }}
                            </div>
                            <span class="font-semibold text-slate-800">{{ $c->nombre }}</span>
                        </div>
                    </td>

                    <!-- Email -->
                    <td class="py-3.5 px-4 text-gray-600">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $c->email }}</span>
                        </div>
                    </td>

                    <!-- Teléfono -->
                    <td class="py-3.5 px-4 text-gray-600 font-mono">
                        @if($c->telefono)
                            <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 px-2.5 py-1 rounded-md text-xs font-medium">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                {{ $c->telefono }}
                            </span>
                        @else
                            <span class="text-xs text-gray-400 italic">Sin teléfono</span>
                        @endif
                    </td>

                    <!-- Botones de Acciones -->
                    <td class="py-3.5 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <!-- Consultar -->
                            <a href="{{ route('clientes.show', $c) }}" 
                               class="inline-flex items-center gap-1 bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200 hover:border-emerald-600 px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-150">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Consultar
                            </a>

                            <!-- Editar -->
                            <a href="{{ route('clientes.edit', $c) }}" 
                               class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white border border-blue-200 hover:border-blue-600 px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-150">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>

                            <!-- Eliminar -->
                            <form action="{{ route('clientes.destroy', $c) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-600 text-red-700 hover:text-white border border-red-200 hover:border-red-600 px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-150 cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-10 px-4 text-center text-gray-500">
                        <p class="font-medium text-base text-gray-600">No hay clientes registrados todavía.</p>
                        <p class="text-xs mt-1">Haz clic en <span class="font-semibold text-blue-700">+ Nuevo Cliente</span> para agregar el primero.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection