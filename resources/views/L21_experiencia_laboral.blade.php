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
              EXPERIENCIA LABORAL
              <br>
              <small>(Últimos cinco empleos)</small>
            </h4>
          </div>
          <div class="card-body">

            <p>&nbsp;</p>

            <div class="row">
              <div class="col-md-12 order-md-1">

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
                          <input type="hidden" value="0" name="F5_ninguno">
                          <input type="checkbox" value="1" name="F5_ninguno" id="ninguno" @if($declaracion->F5_ninguno == 1 or old('F5_ninguno') == 1) checked @endif>
                          NINGUNO
                        </label>
                      </h4>
                    </legend>

                    <div class="table-responsive" id="tabla">

                      <p>&nbsp;</p>

                      <table class="table table-responsive-md">
                        <thead>
                          <tr>
                            <th><strong>ÁMBITO</strong></th>
                            <th><strong>ENTE PÚBLICO / EMPRESA, ASOCIACIÓN</strong></th>
                            <th><strong>EMPLEO O CARGO</strong></th>
                            <th><strong>OPCIONES</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($declaracion->filas as $fila)
                          <tr>
                            <td>{{ $fila->F5_ambitoSector_valor }}</td>
                            <td>{{ $fila->F5_nombreEnte }}</td>
                            <td>{{ $fila->F5_empleoCargoComision }}</td>
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
                        <textarea tabindex="8" class="form-control" id="aclaracionesObservaciones" rows="7" name="F5_aclaracionesObservaciones" placeholder="">@if(old('F5_aclaracionesObservaciones')){{ old('F5_aclaracionesObservaciones') }}@else{{ $declaracion->F5_aclaracionesObservaciones }}@endif</textarea>
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
