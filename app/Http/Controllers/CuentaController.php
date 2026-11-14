<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index() {
        $cuentas = Cuenta::with('cliente')->get();
        return view('cuentas.index', compact('cuentas'));
    }

    public function create() {
        $clientes = Cliente::all();
        return view('cuentas.create', compact('clientes'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero_cuenta' => 'required|max:20|unique:cuentas',
            'tipo' => 'required|in:Ahorro,Monetaria',
            'saldo' => 'required|numeric',
        ]);
        Cuenta::create($data);
        return redirect()->route('cuentas.index');
    }

    public function show(Cuenta $cuenta) {
        return view('cuentas.show', compact('cuenta'));
    }

    public function edit(Cuenta $cuenta) {
        $clientes = Cliente::all();
        return view('cuentas.edit', compact('cuenta', 'clientes'));
    }

    public function update(Request $request, Cuenta $cuenta) {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero_cuenta' => 'required|max:20|unique:cuentas,numero_cuenta,' . $cuenta->id,
            'tipo' => 'required|in:Ahorro,Monetaria',
            'saldo' => 'required|numeric',
        ]);
        $cuenta->update($data);
        return redirect()->route('cuentas.index');
    }

    public function destroy(Cuenta $cuenta) {
        $cuenta->delete();
        return redirect()->route('cuentas.index');
    }
}