<?php

namespace App\Http\Controllers;

use App\Models\RegistroVentas;
use Illuminate\Http\Request;

/**
 * Class RegistroVentumController
 * @package App\Http\Controllers
 */
class RegistroVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registroVenta = RegistroVentas::paginate();

        return view('registro-ventas.index', compact('registroVenta'))
            ->with('i', (request()->input('page', 1) - 1) * $registroVenta->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $RegistroVentas = new RegistroVentas();
        return view('registro-ventas.create', compact('RegistroVentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RegistroVentas::$rules);

        $RegistroVentas = RegistroVentas::create($request->all());

        return redirect()->route('registro-venta.index')
            ->with('success', 'RegistroVentas created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $RegistroVentas = RegistroVentas::find($id);

        return view('registro-ventas.show', compact('RegistroVentas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RegistroVentas = RegistroVentas::find($id);

        return view('registro-ventas.edit', compact('RegistroVentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RegistroVentas $RegistroVentas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroVentas $RegistroVentas)
    {
        request()->validate(RegistroVentas::$rules);

        $RegistroVentas->update($request->all());

        return redirect()->route('registro-venta.index')
            ->with('success', 'RegistroVentas updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $RegistroVentas = RegistroVentas::find($id)->delete();

        return redirect()->route('registro-venta.index')
            ->with('success', 'RegistroVentas deleted successfully');
    }
}
