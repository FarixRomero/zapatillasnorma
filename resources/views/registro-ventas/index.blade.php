@extends('adminlte::page')

@section('template_title')
    Registro Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registro Ventum') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registro-venta.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Zapatillas Id</th>
										<th>Precio Venta</th>
										<th>Porcantaje Ganancia</th>
										<th>Fecha Venta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registroVenta as $RegistroVentas)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $RegistroVentas->zapatilla->codigo }}</td>
											<td>{{ $RegistroVentas->precio_venta }}</td>
											<td>{{ $RegistroVentas->porcantaje_ganancia }}</td>
											<td>{{ Carbon\Carbon::parse($RegistroVentas->fecha_venta)->format('d/m/y') }} </td>
                                            <td>
                                                <form action="{{ route('registro-venta.destroy',$RegistroVentas->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registro-venta.show',$RegistroVentas->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registro-venta.edit',$RegistroVentas->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $registroVenta->links() !!}
            </div>
        </div>
    </div>
@endsection
