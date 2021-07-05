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
              PRÉSTAMO O COMODATO POR TERCEROS
              <br>
              <small>Situación Actual</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <span class="pull-right agregar">
                      <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar/vehiculo') }}" class="btn btn-rounded btn-primary">
                        <span class="btn-icon-left text-primary">
                          <i class="fa fa-car color-info"></i>
                        </span>
                        AGREGAR VEHÍCULO
                      </a>
                    </span>

                    <span class="pull-right agregar" style="margin-right:25px">
                      <a href="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar/inmueble') }}" class="btn btn-rounded btn-primary">
                        <span class="btn-icon-left text-primary">
                          <i class="fa fa-home color-info"></i>
                        </span>
                        AGREGAR INMUEBLE
                      </a>
                    </span>

                    <h4 class="mb-3">
                      <label>
                        <input type="checkbox" value="1" name="F15_ninguno" id="ninguno" @if($declaracion->ninguno == 1 or old('F15_ninguno') == 1) checked  @endif>
                        NINGUNO
                      </label>
                    </h4>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        <label for="F15_aclaracionesObservaciones">
                          Aclaraciones / Observaciones:
                        </label>
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <textarea tabindex="16" class="form-control" id="F15_aclaracionesObservaciones" rows="7" name="F15_aclaracionesObservaciones" placeholder="">@if(old('F15_aclaracionesObservaciones')){{ old('F15_aclaracionesObservaciones') }}@else{{ $declaracion->F15_aclaracionesObservaciones }}@endif</textarea>
                      </div>
                    </div>
                  </fieldset>

                  <button tabindex="16" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

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
