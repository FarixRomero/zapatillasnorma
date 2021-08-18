<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $zapatilla->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $zapatilla->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('precio_compra') }}
            {{ Form::number('precio_compra', $zapatilla->precio_compra, ['class' => 'form-control' . ($errors->has('precio_compra') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio_compra', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">
            <span>precio_compra Venta </span>
            <input type="number"  name="precio_compra" min="0" value="{{$zapatilla->precio_compra}}" step=".01" class="form-control">
                
        </div>
        <div class="form-group">
            <span>Precio Venta </span>
            <input type="number"  name="precio_venta" min="0" value="{{$zapatilla->precio_venta}}" step=".01" class="form-control">
                
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::number('cantidad', $zapatilla->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url_imagen') }}
            {{ Form::text('url_imagen', $zapatilla->url_imagen, ['class' => 'form-control' . ($errors->has('url_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Url Imagen']) }}
            {!! $errors->first('url_imagen', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('talla') }}
            {{ Form::text('talla', $zapatilla->talla, ['class' => 'form-control' . ($errors->has('detalles') ? ' is-invalid' : ''), 'placeholder' => 'Talla']) }}
            {!! $errors->first('detalles', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>