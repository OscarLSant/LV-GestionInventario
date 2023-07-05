<?php

namespace App\Http\Controllers;

use App\Models\Venta_Stock;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Stock;

//para el PDF
use PDF;
use Barryvdh\DomPDF\Facade;
//
use Illuminate\Database\QueryException;

class VentaStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $venta_stocks = Stock::select('*')->orderBy('idVentaStock','ASC');
        $ventas = Venta::select('*')->get();
        $stocks = Stock::select('*')->get();

        $venta_stocks = Venta_Stock::select('*')->get();
        $venta_stocks = Venta_Stock::select('*')->orderBy('idVentaStock', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $venta_stocks = $venta_stocks->where('idVentaStock', 'like', '%'.$request->search.'%')
            ->orWhere('cantidad','like', '%'.$request->search.'%')
            ->orWhere('descuento','like', '%'.$request->search.'%')
            ->orWhere('idVenta','like', '%'.$request->search.'%')
            ->orWhere('idStock','like', '%'.$request->search.'%');
        }
        $venta_stocks = $venta_stocks->paginate($limit)->appends($request->all());
        return view('venta_stocks.index', compact('venta_stocks', 'ventas', 'stocks'));
        // return view('venta_stocks.index')->with('venta_stocks', Parada::all());

    }


    // public function index(Request $request)
    // {
    //     //$venta_stocks = Stock::select('*')->get();
    
    //     $venta_stocks = Stock::select('*')->orderBy('idVentaStock', 'ASC');
    //     $limit=(isset($request->limit)) ? $request->limit:6;

    //     if(isset($request->search)){
    //         $venta_stocks = $venta_stocks->where('idVentaStock', 'like', '%'.$request->search.'%')
    //         ->orWhere('nombre','like', '%'.$request->search.'%')
    //         ->orWhere('descripcion','like', '%'.$request->search.'%')
    //         ->orWhere('precio','like', '%'.$request->search.'%')
    //         ->orWhere('expiracion','like', '%'.$request->search.'%')
    //         ->orWhere('stock','like', '%'.$request->search.'%');
          
    //     }
    
    //     $venta_stocks = $venta_stocks->paginate($limit)->appends($request->all());
    //     return view('venta_stocks.index', compact('venta_stocks'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //manda a traer la vista
        $venta_stocks = Venta_Stock::get();
        $ventas = Venta::all();
        $stocks = Stock::all();
        return view('venta_stocks.create', compact('venta_stocks', 'ventas', 'stocks'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $venta_stock = new Venta_Stock();
        $venta_stock = $this->createUpdateVentaStock($request, $venta_stock);
        return redirect()
            ->route('venta_stocks.index')
            ->with('message', 'Registro AGREGADO'); 
        // ->whith('message', 'Se creado.');
    }

    public function createUpdateVentaStock(Request $request, $venta_stock)
    {
        $venta_stock->cantidad = $request->cantidad;
        $venta_stock->descuento = $request->descuento;
        $venta_stock->idVenta = $request->idVenta;
        $venta_stock->idStock = $request->idStock;
        $venta_stock->save();
        return $venta_stock;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta_stock = Venta_Stock::where('idVentaStock', $id)->firstOrFail();
        $ventas = Venta::all();
        $stocks = Stock::all();
        return view('venta_stocks.show', compact('stock','ventas','stocks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venta_stock = Venta_Stock::where('idVentaStock', $id)->firstOrFail();
        $ventas = Venta::all();
        $stocks = Stock::all();
        return view('venta_stocks.edit', compact('stock','ventas', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $venta_stock = Venta_Stock::where('idVentaStock', $id)->firstOrFail();
        $venta_stock = $this->createUpdateStock($request, $venta_stock);
        return redirect()
            ->route('venta_stocks.index')
            ->with('message', 'Registro ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta_stock = Venta_Stock::findOrFail($id);
        try {
            $venta_stock->delete();
            return redirect()
                ->route('venta_stocks.index')
                ->with('message', 'Registro eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()
                ->route('venta_stocks.index')
                ->with('danger', 'Registro no se puede eliminar.');
        }


    }

    //FUNCION PARA GENERAR PDF
    public function exportPDF(){

        $venta_stocks = Venta_Stock::all();
        $pdf = PDF::loadView('venta_stocks.exportPDF', compact('venta_stocks'));
        //linea para mostrar hoja horizontal 
        $pdf->setPaper('a4','landscape');


        return $pdf->stream();
    }
}
