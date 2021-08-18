@extends('adminlte::page')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Vender zapatilla</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('zapatillas.ventapost', $zapatilla->id) }}"  role="form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            @include('zapatilla.formventa')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
