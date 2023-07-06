<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\modelCategorias;
use Illuminate\Http\Request;


//para el PDF
use PDF;
use Barryvdh\DomPDF\ServiceProvider;
//
use Illuminate\Database\QueryException; 

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:productos')->only('index', 'edit', 'create', 'update', 'store');   
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $productos = Producto::select('*')->orderBy('idProducto','ASC');ygujhh
        $categorias = modelCategorias::select('*')->get();
        $productos = Producto::select('*')->get();
        $productos = Producto::select('*')->orderBy('idProducto', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $productos = $productos->where('idProducto', 'like', '%'.$request->search.'%')
            ->orWhere('nombre','like', '%'.$request->search.'%')
            ->orWhere('detalles','like', '%'.$request->search.'%')
            ->orWhere('idCategoria','like', '%'.$request->search.'%');
        }
        $productos = $productos->paginate($limit)->appends($request->all());
        return view('productos.index', compact('productos', 'categorias'));
        // return view('productos.index')->with('productos', Parada::all());

    }


    // public function index(Request $request)
    // {
    //     //$productos = Producto::select('*')->get();
    
    //     $productos = Producto::select('*')->orderBy('idProducto', 'ASC');
    //     $limit=(isset($request->limit)) ? $request->limit:6;

    //     if(isset($request->search)){
    //         $productos = $productos->where('idProducto', 'like', '%'.$request->search.'%')
    //         ->orWhere('nombre','like', '%'.$request->search.'%')
    //         ->orWhere('descripcion','like', '%'.$request->search.'%')
    //         ->orWhere('precio','like', '%'.$request->search.'%')
    //         ->orWhere('expiracion','like', '%'.$request->search.'%')
    //         ->orWhere('stock','like', '%'.$request->search.'%');
          
    //     }
    
    //     $productos = $productos->paginate($limit)->appends($request->all());
    //     return view('productos.index', compact('productos'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //manda a traer la vista
        $productos = Producto::get();
        $categorias = modelCategorias::all();
        return view('productos.create', compact('productos', 'categorias'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto = new Producto();
        $producto = $this->createUpdateProducto($request, $producto);
        return redirect()
            ->route('productos.index')
            ->with('message', 'Registro AGREGADO'); 
        // ->whith('message', 'Se creado.');
    }

    public function createUpdateProducto(Request $request, $producto)
    {
        $producto->nombre = $request->nombre;
        $producto->detalles = $request->detalles;
        $producto->idCategoria = $request->idCategoria;
        $producto->save();
        return $producto;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::where('idProducto', $id)->firstOrFail();
        $categorias = modelCategorias::all();
        return view('productos.show', compact('producto','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::where('idProducto', $id)->firstOrFail();
        $categorias = modelCategorias::all();
        return view('productos.edit', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::where('idProducto', $id)->firstOrFail();
        $producto = $this->createUpdateProducto($request, $producto);
        return redirect()
            ->route('productos.index')
            ->with('message', 'Registro ACTUALIZADO');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        try {
            $producto->delete();
            return redirect()
                ->route('productos.index')
                ->with('message', 'Registro eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()
                ->route('productos.index')
                ->with('danger', 'Registro no se puede eliminar.');
        }


    }

    //FUNCION PARA GENERAR PDF
    public function exportPDF(){
        $productos = Producto::all();
        $pdf = PDF::loadView('productos.exportPDF', compact('productos'));

        //linea para mostrar hoja horizontal 
        $pdf->setPaper('a4','landscape');

        //linea para mostrarlo en el navegador el PDF
        return $pdf->stream();
    }
}
