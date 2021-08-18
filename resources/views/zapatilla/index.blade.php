@extends('adminlte::page')
{{-- @extends('layouts.app') --}}

@section('template_title')
    Zapatilla
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('zapatillas.search') }}" method="GET">
                            <div class="input-group rounded p-4">
                                <input name="query" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-light" >
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                         </form>

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Zapatilla') }}
                            </span>
                          

                             <div class="float-right">
                                <a href="{{ route('zapatillas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        {{-- <th>No</th> --}}
										<th>Imagen</th>
										<th>Codigo</th>
										{{-- <th>Nombre</th> --}}
										<th>P. Compra</th>
										<th>P. Venta</th>
                                        <th>Cantidad</th>
										<th>Talla</th>
										<th>Acciones</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($zapatillas as $zapatilla)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            {{-- <td>{{ $zapatilla->id }}</td> --}}
											<td class="align-middle"
                                            ><a href="{{ route('zapatillas.index')}}">
                                                <img  style="height: 200px; width:200px"   src="{{ $zapatilla['url_imagen'] }}" alt="alternatetext">
                                            </a>
                                            </td>
											<td class="align-middle" >{{ $zapatilla['codigo'] }}</td>
                                            <td class="align-middle">{{ number_format($zapatilla['precio_compra'], 2) }}</td>
                                            <td class="align-middle" > {{number_format($zapatilla['precio_venta'], 2)}} </td>
                                            @if ($zapatilla['zapatillas_modelos'])
                                                <td colspan='4' >
                                                    <table class="table table-striped">
                                                     @foreach ($zapatilla['zapatillas_modelos'] as $zapatilla_unidad)
                                                        <tr>
                                                            <td style="width: 35%" class="align-middle">{{ $zapatilla_unidad->cantidad }}</td>
                                                            <td style="width: 20%" class="align-middle"  >{{ $zapatilla_unidad['talla'] }}</td>
                                                            {{-- <td style="width: 20%" class="align-middle"  >{{ $zapatilla_unidad->registros }}</td> --}}
                                                            <td>
                                                                <form action="{{ route('zapatillas.destroy',$zapatilla_unidad->id) }}" method="POST">
                                                                    <a class="btn btn-sm btn-primary" href="{{ route('zapatillas.venta',$zapatilla_unidad->id) }}"><i class="fa fa-fw fa-edit"></i> Vendido</a>
                                                                    <a class="btn btn-sm btn-secondary " href="{{ route('zapatillas.show',$zapatilla_unidad->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                                    <a class="btn btn-sm btn-success" href="{{ route('zapatillas.edit',$zapatilla_unidad->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </table>
                                                </td>
										     @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
