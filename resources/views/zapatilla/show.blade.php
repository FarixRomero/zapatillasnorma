@extends('layouts.app')

@section('template_title')
    {{ $zapatilla->id ?? 'Show a Zapatilla' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show  Zapatilla</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('zapatillas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $zapatilla->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $zapatilla->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $zapatilla->precio_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $zapatilla->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Url Imagen:</strong>
                            {{ $zapatilla->url_imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Detalles:</strong>
                            {{ $zapatilla->detalles }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
