@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              CLIENTES PRINCIPALES
              <br>
              <small>  </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">
                Todos los datos de clientes principales de la pareja o dependientes económicos no serán públicos.<br>
Se manifestará el beneficio o ganancia directa del declarante si supera mensualmente 250 unidades de medida y actualización (UMA), es decir: $2,240.5 mensuales.
                <p>&nbsp;</p>
                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <legend>
                      <span class="pull-right agregar">
                        <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" class="btn btn-rounded btn-primary">
                          <span class="btn-icon-left text-primary">
                            <i class="fa fa-plus color-info"></i>
                          </span>
                          AGREGAR
                        </a>
                      </span>

                      <h4 class="mb-3">
                        <label>
                          <input type="hidden" value="0" name="F20_ninguno">
                          <input type="checkbox" value="1" name="F20_ninguno" id="ninguno" @if($declaracion->F20_ninguno == 1 or old('F20_ninguno') == 1) checked  @endif>
                          No realizo actividades lucrativas
                        </label>
                      </h4>
                    </legend>

                    <div class="table-responsive" id="tabla">
                      <p>&nbsp;</p>
                      <table class="table table-responsive-md">
                        <thead>
                          <tr>
                            <th><strong>NOMBRE EMPRESA</strong></th>
                            <th><strong>GANANCIA</strong></th>
                            <th><strong>OPCIONES</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($declaracion->filas as $fila)
                          <tr>
                            <td>{{ $fila->F20_empresa_nombreEmpresaServicio }}</td>
                            <td>$@money($fila->F20_montoAproximadoGanancia_valor) {{ $fila->F20_montoAproximadoGanancia_moneda }}</td>
                            <td>
                              <div class="d-flex">
                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        <label for="aclaracionesObservaciones">
                          Aclaraciones / Observaciones:
                        </label>
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <textarea tabindex="8" class="form-control" id="aclaracionesObservaciones" rows="7" name="F20_aclaracionesObservaciones" placeholder="">@if(old('F20_aclaracionesObservaciones')){{ old('F20_aclaracionesObservaciones') }}@else{{ $declaracion->F20_aclaracionesObservaciones }}@endif</textarea>
                        <div class="invalid-feedback">
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <button tabindex="9" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  @include('layouts.ninguno')
@endsection
