<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\modelProveedores;

//para el PDF
use PDF;
use Barryvdh\DomPDF\Facade;
//
use Illuminate\Database\QueryException;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $stocks = Stock::select('*')->orderBy('idStock','ASC');
        $productos = Producto::select('*')->get();
        $proveedores = modelProveedores::select('*')->get();
        $stocks = Stock::select('*')->get();
        $stocks = Stock::select('*')->orderBy('idStock', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $stocks = $stocks->where('idStock', 'like', '%'.$request->search.'%')
            ->orWhere('precioCompra','like', '%'.$request->search.'%')
            ->orWhere('precioVenta','like', '%'.$request->search.'%')
            ->orWhere('cantidad','like', '%'.$request->search.'%')
            ->orWhere('notas','like', '%'.$request->search.'%')
            ->orWhere('idProducto','like', '%'.$request->search.'%')
            ->orWhere('idProveedor','like', '%'.$request->search.'%');
        }
        $stocks = $stocks->paginate($limit)->appends($request->all());
        return view('stocks.index', compact('stocks', 'productos', 'proveedores'));
        // return view('stocks.index')->with('stocks', Parada::all());

    }


    // public function index(Request $request)
    // {
    //     //$stocks = Stock::select('*')->get();
    
    //     $stocks = Stock::select('*')->orderBy('idStock', 'ASC');
    //     $limit=(isset($request->limit)) ? $request->limit:6;

    //     if(isset($request->search)){
    //         $stocks = $stocks->where('idStock', 'like', '%'.$request->search.'%')
    //         ->orWhere('nombre','like', '%'.$request->search.'%')
    //         ->orWhere('descripcion','like', '%'.$request->search.'%')
    //         ->orWhere('precio','like', '%'.$request->search.'%')
    //         ->orWhere('expiracion','like', '%'.$request->search.'%')
    //         ->orWhere('stock','like', '%'.$request->search.'%');
          
    //     }
    
    //     $stocks = $stocks->paginate($limit)->appends($request->all());
    //     return view('stocks.index', compact('stocks'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //manda a traer la vista
        $stocks = Stock::get();
        $productos = Producto::all();
        $proveedores = modelProveedores::all();
        return view('stocks.create', compact('stocks', 'productos', 'proveedores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $stock = new Stock();
        $stock = $this->createUpdateStock($request, $stock);
        return redirect()
            ->route('stocks.index')
            ->with('message', 'Registro AGREGADO'); 
        // ->whith('message', 'Se creado.');
    }

    public function createUpdateStock(Request $request, $stock)
    {
        $stock->precioCompra = $request->precioCompra;
        $stock->precioVenta = $request->precioVenta;
        $stock->cantidad = $request->cantidad;
        $stock->notas = $request->notas;
        $stock->idProducto = $request->idProducto;
        $stock->idProveedor = $request->idProveedor;
        $stock->save();
        return $stock;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = Stock::where('idStock', $id)->firstOrFail();
        $productos = Producto::all();
        $proveedores = modelProveedores::all();
        return view('stocks.show', compact('stock','productos','proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stock = Stock::where('idStock', $id)->firstOrFail();
        $productos = Producto::all();
        $proveedores = modelProveedores::all();
        return view('stocks.edit', compact('stock','productos', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::where('idStock', $id)->firstOrFail();
        $stock = $this->createUpdateStock($request, $stock);
        return redirect()
            ->route('stocks.index')
            ->with('message', 'Registro ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);
        try {
            $stock->delete();
            return redirect()
                ->route('stocks.index')
                ->with('message', 'Registro eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()
                ->route('stocks.index')
                ->with('danger', 'Registro no se puede eliminar.');
        }


    }

    //FUNCION PARA GENERAR PDF
    public function exportPDF(){

        $stocks = Stock::all();
        $pdf = PDF::loadView('stocks.exportPDF', compact('stocks'));
        //linea para mostrar hoja horizontal 
        $pdf->setPaper('a4','landscape');


        return $pdf->stream();
    }
}
