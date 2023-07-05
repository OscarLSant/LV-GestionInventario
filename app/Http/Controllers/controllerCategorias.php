<?php

namespace App\Http\Controllers;

use App\Models\modelCategorias;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\ServiceProvider;
use PDF;


class controllerCategorias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = modelCategorias::select('*')->orderBy('idCategoria', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $categorias = $categorias->where('idCategoria', 'like', '%'.$request->search.'%')
            ->orWhere('nombre','like', '%'.$request->search.'%');
        }
        $categorias = $categorias->paginate($limit)->appends($request->all());
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = modelCategorias::get();
        return view('categorias.create', compact('categorias'));
    }


    /**
     * Storeeeeee a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new modelCategorias();
        $categoria = $this->createUpdateCategorias($request, $categoria);
        return redirect()
            ->route('categorias.index')
            ->with('message', 'Registro AGREGADO');
    }

    public function createUpdateCategorias(Request $request, $categoria){
        $categoria->nombre=$request->nombre;
        $categoria->save();
        return $categoria;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = modelCategorias::where('idCategoria', $id)->firstOrFail();
        return view('categorias.show' ,compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = modelCategoria::where('idCategoria', $id)->firstOrFail();
        $categoria = $this->createUpdateCategorias($request, $categoria);
        return redirect()
            ->route('stocks.index')
            ->with('message', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria=modelCategorias::findOrFail($id);
        try{
            $categoria->delete();
            return redirect()->route('categorias.index')->with('message', 'Registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()->route('categorias.index')->with('message', 'No se puede eliminar el registro.');;
        }
    }

    public function exportPDF(){
        $categorias = modelCategorias::all();
        $pdf = PDF::loadView('categorias.exportPDF', compact('categorias'));

        //linea para tamaño y en que modo en este caso esta horizontal
        $pdf->setPaper('a4', 'landscape');

        //linea para mostrarlo en el navegador el PDF
        return $pdf->stream();
    }
}