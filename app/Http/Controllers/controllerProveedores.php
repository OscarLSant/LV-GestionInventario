<?php

namespace App\Http\Controllers;

use App\Models\modelProveedores;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\ServiceProvider;
use PDF;

class controllerProveedores extends Controller
{

    public function __construct()
    {
        $this->middleware('can:proveedores')->only('index', 'edit', 'create', 'update', 'store');   
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $proveedores = modelProveedores::select('*')->orderBy('idProveedor', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $proveedores = $proveedores->where('idProveedor', 'like', '%'.$request->search.'%')
            ->orWhere('nombre','like', '%'.$request->search.'%')
            ->orWhere('telefono','like', '%'.$request->search.'%')
            ->orWhere('correo','like', '%'.$request->search.'%')
            ->orWhere('direccion','like', '%'.$request->search.'%');
        }
        $proveedores = $proveedores->paginate($limit)->appends($request->all());
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = modelProveedores::get();
        return view('proveedores.create',compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedor = new modelProveedores();
        $proveedor = $this->createUpdateProveedor($request, $proveedor);
        return redirect()->route('proveedores.index');
    }

    public function createUpdateProveedor(Request $request, $proveedor){
        $proveedor->nombre=$request->nombre;
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->direccion=$request->direccion;
        $proveedor->save();
        return $proveedor;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = modelProveedores::where('idProveedor', $id)->firstOrFail();
        return view('proveedores.show' ,compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = modelProveedores::where('idProveedor', $id)->firstOrFail();
        return view('proveedores.edit' ,compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $proveedor = modelProveedores::where('idProveedor', $id)->firstOrFail();
        $proveedor = $this->createUpdateProveedor($request, $proveedor);
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor=modelProveedores::findOrFail($id);
        try{
            $proveedor->delete();
            return redirect()->route('proveedores.index')->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()->route('proveedores.index')->with('message', 'Registro relacionado imposible de eliminer.');;
        }
    }

    public function exportPDF(){
        $proveedores = modelProveedores::all();
        $pdf = PDF::loadView('proveedores.exportPDF', compact('proveedores'));

        //linea para tamaño y en que modo en este caso esta horizontal
        $pdf->setPaper('a4', 'landscape');

        //linea para mostrarlo en el navegador el PDF
        return $pdf->stream();
    }
}
