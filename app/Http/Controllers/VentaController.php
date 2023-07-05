<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\modelClientes;

//para el PDF
use PDF;
use Barryvdh\DomPDF\Facade;
//
use Illuminate\Database\QueryException;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $ventas = venta::select('*')->orderBy('idVenta','ASC');
        $clientes = modelClientes::select('*')->get();
        
        $ventas = Venta::select('*')->get();
        $ventas = Venta::select('*')->orderBy('idVenta', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $ventas = $ventas->where('idVenta', 'like', '%'.$request->search.'%')
            ->orWhere('fechaFactura','like', '%'.$request->search.'%')
            ->orWhere('idCliente','like', '%'.$request->search.'%');
        }
        $ventas = $ventas->paginate($limit)->appends($request->all());
        return view('ventas.index', compact('ventas', 'clientes'));
        // return view('ventas.index')->with('ventas', Parada::all());

    }


    // public function index(Request $request)
    // {
    //     //$ventas = venta::select('*')->get();
    
    //     $ventas = venta::select('*')->orderBy('idVenta', 'ASC');
    //     $limit=(isset($request->limit)) ? $request->limit:6;

    //     if(isset($request->search)){
    //         $ventas = $ventas->where('idVenta', 'like', '%'.$request->search.'%')
    //         ->orWhere('nombre','like', '%'.$request->search.'%')
    //         ->orWhere('descripcion','like', '%'.$request->search.'%')
    //         ->orWhere('precio','like', '%'.$request->search.'%')
    //         ->orWhere('expiracion','like', '%'.$request->search.'%')
    //         ->orWhere('venta','like', '%'.$request->search.'%');
          
    //     }
    
    //     $ventas = $ventas->paginate($limit)->appends($request->all());
    //     return view('ventas.index', compact('ventas'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //manda a traer la vista
        $ventas = Venta::get();
        $clientes = modelClientes::all();
        return view('ventas.create', compact('ventas','clientes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $venta = new Venta();
        $venta = $this->createUpdateVenta($request, $venta);
        return redirect()
            ->route('ventas.index')
            ->with('message', 'Registro AGREGADO'); 
        // ->whith('message', 'Se creado.');
    }

    public function createUpdateVenta(Request $request, $venta)
    {
        $venta->fechaFactura = $request->fechaFactura;
        $venta->idCliente = $request->idCliente;
        $venta->save();
        return $venta;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = Venta::where('idVenta', $id)->firstOrFail();
        $clientes = modelClientes::all();
        return view('ventas.show', compact('venta','clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venta = Venta::where('idVenta', $id)->firstOrFail();
        $clientes = modelClientes::all();

        return view('ventas.edit', compact('venta','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $venta = Venta::where('idVenta', $id)->firstOrFail();
        $venta = $this->createUpdateVenta($request, $venta);
       
        return redirect()
            ->route('ventas.index')
            ->with('message', 'Registro ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = venta::findOrFail($id);
        try {
            $venta->delete();
            return redirect()
                ->route('ventas.index')
                ->with('message', 'Registro eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()
                ->route('ventas.index')
                ->with('danger', 'Registro no se puede eliminar.');
        }


    }

    //FUNCION PARA GENERAR PDF
    public function exportPDF(){

        $ventas = Venta::all();
        $pdf = PDF::loadView('ventas.exportPDF', compact('ventas'));
        //linea para mostrar hoja horizontal 
        $pdf->setPaper('a4','landscape');


        return $pdf->stream();
    }
}
