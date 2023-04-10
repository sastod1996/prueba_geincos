<?php

namespace App\Http\Controllers;

use App\Models\Gaseosas;
use Illuminate\Http\Request;
class GaseosasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaseosas = Gaseosas::all();
        return view('gaseosas.listar',compact('gaseosas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gaseosas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'mililitros' => 'required|numeric',
        ]);
        
        Gaseosas::create($request->all());
         
        return redirect()->route('gaseosas.index')
                        ->with('success','gaseosa creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaseosas $gaseosas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaseosas $gaseosa)
    {
        return view('gaseosas.editar',compact('gaseosa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaseosas $gaseosa)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'mililitros' => 'required|numeric',
        ]);
        
        $gaseosa->update($request->all());
        
        return redirect()->route('gaseosas.index')
                        ->with('success','gaseosas actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaseosas $gaseosa)
    {
        $gaseosa->delete();
         
        return redirect()->route('gaseosas.index')
                        ->with('success','Gaseosa eliminado satisfactoriamente');
    }
}
