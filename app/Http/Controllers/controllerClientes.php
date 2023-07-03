<?php

namespace App\Http\Controllers;
use App\Models\modelClientes;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\ServiceProvider;
use PDF;

class controllerClientes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = modelClientes::select('*')->orderBy('idCliente', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $clientes = $clientes->where('idCliente', 'like', '%'.$request->search.'%')
            ->orWhere('nombre','like', '%'.$request->search.'%')
            ->orWhere('telefono','like', '%'.$request->search.'%')
            ->orWhere('correo','like', '%'.$request->search.'%')
            ->orWhere('direccion','like', '%'.$request->search.'%');
        }
        $clientes = $clientes->paginate($limit)->appends($request->all());
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = modelClientes::get();
        return view('clientes.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new modelClientes();
        $cliente = $this->createUpdateClientes($request, $cliente);
        return redirect()->route('clientes.index');
    }

    public function createUpdateClientes(Request $request, $cliente){
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->direccion=$request->direccion;
        $cliente->save();
        return $cliente;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = modelClientes::where('idCliente', $id)->firstOrFail();
        return view('clientes.show' ,compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = modelClientes::where('idCliente', $id)->firstOrFail();
        return view('clientes.edit' ,compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = modelClientes::where('idCliente', $id)->firstOrFail();
        $cliente = $this->createUpdateClientes($request, $cliente);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente=modelClientes::findOrFail($id);
        try{
            $cliente->delete();
            return redirect()->route('clientes.index')->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()->route('clientes.index')->with('message', 'Registro relacionado imposible de eliminer.');;
        }
    }

    public function exportPDF(){
        $clientes = modelClientes::all();
        $pdf = PDF::loadView('clientes.exportPDF', compact('clientes'));

        //linea para tamaño y en que modo en este caso esta horizontal
        $pdf->setPaper('a4', 'landscape');

        //linea para mostrarlo en el navegador el PDF
        return $pdf->stream();
    }
}
