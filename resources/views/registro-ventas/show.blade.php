@extends('layouts.app')

@section('template_title')
    {{ $RegistroVentas->name ?? 'Show Registro Ventum' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Registro Ventum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registro-venta.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Zapatillas Id:</strong>
                            {{ $RegistroVentas->zapatilla->codigo }}
                        </div>
                        <div class="form-group">
                            <img src="{{ $RegistroVentas->zapatilla->url_imagen }}" style="height: 200px; width:200px" ></strong>
                        </div>
                        <div class="form-group">
                            <strong>Precio Venta:</strong>
                            {{ $RegistroVentas->precio_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Porcantaje Ganancia:</strong>
                            {{ $RegistroVentas->porcantaje_ganancia }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Venta:</strong>
                            {{ $RegistroVentas->fecha_venta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
