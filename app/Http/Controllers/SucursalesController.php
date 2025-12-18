<?php

namespace App\Http\Controllers;

use App\Models\Sucursales;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(auth()->user()->rol != 'Administrador') {
            return redirect('Inicio');
        }

        $sucursales = Sucursales::all();

        return view('modulos.users.Sucursales', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Sucursales::create([
            'nombre' => $request->nombre,
            'estado' => 1
        ]);
        return redirect('Sucursales')->with('success', 'La sucursal ha sido agreegada exitosamente');
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_sucursal)
    {
        $sucursal = Sucursales::find($id_sucursal);
       
        return response()->json($sucursal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sucursales $sucursales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursales $sucursales)
    {
        //
    }
}
