<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <span>Precio Compra de la zapatilla</span>
            <input type="number"  name="precio_venta" min="0" value="{{$zapatilla->precio_compra}}" step=".01" class="form-control" disabled>
        </div>

        <div class="form-group">
            <span>Precio Venta de la zapatilla</span>
            <input type="number"  name="precio_venta" min="0" value="{{$zapatilla->precio_venta}}" step=".01" class="form-control">
        </div>
        <img src="{{ $zapatilla->url_imagen }}" style="height: 250px; width:250px" class="p-4">
      
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>