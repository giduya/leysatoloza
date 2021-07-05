@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              FIDEICOMISOS
              <br>
              <small>     </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <p>
                Este apartado solo lo llenaran las personas servidoras públicas que tengan participación en un fideicomiso, ya sea en el carácter de fideicomitente, fiduciario, fideicomisario o dentro del consejo técnico. Deberá reportar hasta los últimos dos años.
                </p>
                <p>
                Todos los datos de participación en fideicomisos de la pareja o dependientes económicos no serán públicos.
                </p>
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
                          <input type="hidden" value="0" name="F22_ninguno">
                          <input type="checkbox" value="1" name="F22_ninguno" id="ninguno" @if($declaracion->F22_ninguno == 1 or old('F22_ninguno') == 1) checked @endif>
                          Ninguno
                        </label>
                      </h4>
                    </legend>

                    <div class="table-responsive" id="tabla">

                      <p>&nbsp;</p>

                      <table class="table table-responsive-md">
                        <thead>
                          <tr>
                            <th><strong>TIPO DE FIDEICOMISO</strong></th>
                            <th><strong>TIPO DE PARTICIPACIÓN</strong></th>
                            <th><strong>RELACIÓN</strong></th>
                            <th><strong>OPCIONES</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($declaracion->filas as $fila)
                          <tr>
                            <td>{{ $fila->F22_tipoFideicomiso }}</td>
                            <td>{{ $fila->F22_tipoParticipacion }}</td>
                            <td>{{ $fila->F22_tipoRelacion }}</td>
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
                        <textarea tabindex="8" class="form-control" id="aclaracionesObservaciones" rows="7" name="F22_aclaracionesObservaciones" placeholder="">@if(old('F22_aclaracionesObservaciones')){{ old('F22_aclaracionesObservaciones') }}@else{{ $declaracion->F22_aclaracionesObservaciones }}@endif</textarea>
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
