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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
