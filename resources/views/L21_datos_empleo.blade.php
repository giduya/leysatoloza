@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              @if($declaracion->inicial == true)
              DATOS DEL EMPLEO, CARGO O COMISIÓN QUE INICIA
              @endif
              @if($declaracion->modificacion == true)
              DATOS DEL EMPLEO, CARGO O COMISIÓN ACTUAL
              @endif
              @if($declaracion->conclusion == true)
              DATOS DEL EMPLEO, CARGO O COMISIÓN QUE CONCLUYE
              @endif
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <legend>
                      <span class="pull-right" id="agregar">
                        <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" class="btn btn-rounded btn-primary">
                          <span class="btn-icon-left text-primary">
                            <i class="fa fa-plus color-info"></i>
                          </span>
                          AGREGAR
                        </a>
                      </span>
                    </legend>

                    <div class="table-responsive" id="tabla">

                      <p>&nbsp;</p>

                      <table class="table table-responsive-md">
                        <thead>
                          <tr>
                            <th><strong>NO.</strong></th>
                            <th><strong>TIPO OPERACIÓN</strong></th>
                            <th><strong>NOMBRE DEL ENTE PÚBLICO</strong></th>
                            <th><strong>EMPLEO, CARGO O COMISIÓN</strong></th>
                            <th><strong>OPCIONES</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($declaracion->filas as $fila)
                          <tr>
                            <td>{{ $loop->iteration	 }}</td>
                            <td>{{ $fila->F4_tipoOperacion	 }}</td>
                            <td>{{ $fila->empleoCargoComision	 }}</td>
                            <td>{{ $fila->nombreEntePublico }}</td>
                            <td>
                              <div class="d-flex">
                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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
                        <textarea tabindex="8" class="form-control" id="aclaracionesObservaciones" rows="7" name="F4_aclaracionesObservaciones" placeholder="">@if(old('F4_aclaracionesObservaciones')){{ old('F4_aclaracionesObservaciones') }}@else{{ $declaracion->F4_aclaracionesObservaciones }}@endif</textarea>
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
