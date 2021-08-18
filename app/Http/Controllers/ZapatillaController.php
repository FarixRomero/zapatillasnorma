<?php

namespace App\Http\Controllers;

use App\Models\Zapatilla;
use App\Models\RegistroVentas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

/**
 * Class ZapatillaController
 * @package App\Http\Controllers
 */
class ZapatillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zapatillas = Zapatilla::paginate();
        $zapatillas = Zapatilla::select('codigo','url_imagen','precio_compra','precio_venta')
        ->groupBy('codigo','url_imagen','precio_compra','precio_venta')->get();
        // dd($zapatillas);
      
        foreach($zapatillas as $key => $zapatilla){
            $zapatilla_orden = Zapatilla::where('codigo',$zapatilla['codigo'])
            ->get();
            // $zapatilla_orden = Zapatilla::where('codigo',$zapatilla['codigo'])
            // ->filter(function ($item) {
            //     return $item->cantidad>0;
            // })->values();
            // dd($zapatilla_orden->toArray());
            $zapatilla_orden=$zapatilla_orden->filter(function ($item) {
                    return $item->cantidad >=0;
                })->values();
            $zapatillas[$key]['zapatillas_modelos']=$zapatilla_orden;
            // dd($zapatilla->precio_compra);
        }
        
        // dd($zapatillas['url_imagen']);
        // dd($zapatillas->toArray());
        return view('zapatilla.index', compact('zapatillas'))   ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zapatilla = new Zapatilla();
        return view('zapatilla.create', compact('zapatilla'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Zapatilla::$rules);

        $zapatilla = Zapatilla::create($request->all());
        return redirect()->route('zapatillas.index')
            ->with('success', 'Zapatilla created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zapatilla = Zapatilla::find($id);

        return view('zapatilla.show', compact('zapatilla'));
    }
    public function search()
    {
        $zapatillas = Zapatilla::select('codigo','url_imagen','precio_compra','precio_venta')
        ->where('codigo','LIKE','%'.$_GET['query'].'%')
        ->groupBy('codigo','url_imagen','precio_compra','precio_venta')->get();
      
        foreach($zapatillas as $key => $zapatilla){
            $zapatilla_orden = Zapatilla::where('codigo',$zapatilla['codigo'])->get();
            $zapatillas[$key]['zapatillas_modelos']=$zapatilla_orden;
        }
        return view('zapatilla.index', compact('zapatillas'));
    }

    public function venta(Request $request, $id)
    {
        $zapatilla = Zapatilla::findOrFail($id);
        if( $zapatilla->cantidad<=0){
             return redirect()->route('zapatillas.index');
        }
        $zapatilla->cantidad =$zapatilla->cantidad -1; 
        $zapatilla->save();
        $request['zapatillas_id'] = $id;
        $request['porcantaje_ganancia'] = $request->precio_venta - $zapatilla->precio_compra;
        $request['fecha_venta'] = Carbon::now();
        $registro = RegistroVentas::create($request->all());
     
        return redirect()->route('zapatillas.index');
    }
    public function editventa($id)
    {
        $zapatilla = Zapatilla::find($id);
        $registro = new RegistroVentas();

        return view('zapatilla.venta', compact('zapatilla'))
        ->with(compact('registro'));
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zapatilla = Zapatilla::find($id);

        return view('zapatilla.edit', compact('zapatilla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Zapatilla $zapatilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zapatilla $zapatilla)
    {
        request()->validate(Zapatilla::$rules);

        $zapatilla->update($request->all());

        return redirect()->route('zapatillas.index')
            ->with('success', 'Zapatilla updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $zapatilla = Zapatilla::find($id)->delete();

        return redirect()->route('zapatillas.index')
            ->with('success', 'Zapatilla deleted successfully');
    }
}
