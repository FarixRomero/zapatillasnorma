<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('zapatillas_id') }}
            {{ Form::text('zapatillas_id', $RegistroVentas->zapatillas_id, ['class' => 'form-control' . ($errors->has('zapatillas_id') ? ' is-invalid' : ''), 'placeholder' => 'Zapatillas Id']) }}
            {!! $errors->first('zapatillas_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_venta') }}
            {{ Form::text('precio_venta', $RegistroVentas->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta']) }}
            {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('porcantaje_ganancia') }}
            {{ Form::text('porcantaje_ganancia', $RegistroVentas->porcantaje_ganancia, ['class' => 'form-control' . ($errors->has('porcantaje_ganancia') ? ' is-invalid' : ''), 'placeholder' => 'Porcantaje Ganancia']) }}
            {!! $errors->first('porcantaje_ganancia', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_venta') }}
            {{ Form::text('fecha_venta', $RegistroVentas->fecha_venta, ['class' => 'form-control' . ($errors->has('fecha_venta') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Venta']) }}
            {!! $errors->first('fecha_venta', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>