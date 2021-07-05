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
              PARTICIPACIÓN EN EMPRESAS, SOCIEDADES O ASOCIACIONES
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="col-md-12 order-md-1">

              <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                @csrf

                <input name="F16_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                <fieldset>
                  <legend><h4 class="mb-3">Datos de la participación:</h4></legend>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="F16_tipoRelacion">¿Quién participa?: 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_tipoRelacion" name="F16_tipoRelacion" required autofocus>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                        <option value="{{ $relacion->clave }}"
                          @if($relacion->clave == old('F16_tipoRelacion'))
                          selected
                          @endif
                        >
                        {{ $relacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F16_tipoRelacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="F16_porcentajeParticipacion">% de participación: 🌐 <code>*</code></label>
                      <input type="number" tabindex="{{ ++$tabindex }}" class="form-control @error('F16_porcentajeParticipacion') is-invalid @enderror" id="F16_porcentajeParticipacion" name="F16_porcentajeParticipacion" value="@if(old('F16_porcentajeParticipacion')){{ old('F16_porcentajeParticipacion') }}@endif" min="0" max="100" required>
                      @error('F16_porcentajeParticipacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="F16_tipoParticipacion_clave">Tipo de participación: 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_tipoParticipacion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_tipoParticipacion_clave" name="F16_tipoParticipacion_clave" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoParticipacion() as $participacion)
                        <option value="{{ $participacion->clave }}"
                          @if($participacion->clave == old('F16_tipoParticipacion_clave'))
                          selected
                          @endif
                          >
                          {{ $participacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F16_tipoParticipacion_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueParticipacion">
                      <label for="F16_especifiqueParticipacion">Especifica participación: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F16_especifiqueParticipacion') is-invalid @enderror" id="F16_especifiqueParticipacion" name="F16_especifiqueParticipacion" value="@if(old('F16_especifiqueParticipacion')){{ old('F16_especifiqueParticipacion') }}@endif" maxlength="65" required>
                      @error('F16_especifiqueParticipacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend><h4 class="mb-3">Datos de la empresa, sociedad o asociación:</h4></legend>
                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label for="F16_nombreEmpresaSociedadAsociacion">Empresa o asociación: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F16_nombreEmpresaSociedadAsociacion') is-invalid @enderror" id="F16_nombreEmpresaSociedadAsociacion" name="F16_nombreEmpresaSociedadAsociacion" value="@if(old('F16_nombreEmpresaSociedadAsociacion')){{ old('F16_nombreEmpresaSociedadAsociacion') }}@endif" maxlength="65" required>
                      @error('F16_nombreEmpresaSociedadAsociacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="F16_rfc">RFC: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F16_rfc') is-invalid @enderror" id="F16_rfc" name="F16_rfc" value="@if(old('F16_rfc')){{ old('F16_rfc') }}@endif" maxlength="12" minlength="12" required>
                      @error('F16_rfc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="sector_clave">
                      <label for="F16_sector_clave">Sector productivo: 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_sector_clave" name="F16_sector_clave" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->sector() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if($tipo->clave == old('F16_sector_clave'))
                          selected
                          @endif
                        >
                          {{ $tipo->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F16_sector_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueSector">
                      <label for="F16_especifiqueSector">Especifique sector: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F16_especifiqueSector') is-invalid @enderror" id="F16_especifiqueSector" name="F16_especifiqueSector" value="@if(old('F16_especifiqueSector')){{ old('F16_especifiqueSector') }}@endif" maxlength="65">
                      @error('F16_especifiqueSector')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_pais">
                      <label for="F16_pais">País: 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_pais" name="F16_pais" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->paises() as $pais)
                        <option value="{{ $pais->ISO2 }}"
                          @if($pais->ISO2 == old('F16_pais'))
                            selected
                          @elseif($declaracion->F2_pais == $pais->ISO2 and old('F16_pais') == null)
                            selected
                          @elseif(old('F16_pais') == null and $declaracion->F16_pais == null)
                            @if($pais->default == true) selected @endif
                          @endif
                        >
                        {{ $pais->ESPANOL }}
                        </option>
                        @endforeach
                      </select>
                      @error('F16_pais')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_entidadFederativa_clave">
                      <label for="F16_entidadFederativa_clave">Estado: 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_entidadFederativa_clave" name="F16_entidadFederativa_clave">
                        <option value="">Seleccione una entidad:</option>
                        @foreach($declaracion->catalogo->inegiEntidades() as $tipo)
                        <option value="{{ $tipo->Cve_Ent }}"
                          @if($tipo->Cve_Ent == old('F16_entidadFederativa_clave'))
                          selected
                          @endif
                          >
                          {{ $tipo->Nom_Ent }}
                        </option>
                        @endforeach
                      </select>
                      @error('F16_entidadFederativa_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend><h4 class="mb-3">Remuneración:</h4></legend>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="F16_recibeRemuneracion">¿Recibe remuneración? 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_recibeRemuneracion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_recibeRemuneracion" name="F16_recibeRemuneracion" required>
                        <option value="">Seleccione...</option>
                        <option value="1" @if(1 == old('F16_recibeRemuneracion')) selected @endif>SI</option>
                        <option value="0" @if("0" == old('F16_recibeRemuneracion')) selected @endif>NO</option>
                      </select>
                      @error('F16_recibeRemuneracion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_F16_montoMensual_valor">
                      <label for="F16_montoMensual_valor">Monto mensual: 🌐 <code>*</code></label>
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F16_montoMensual_valor') is-invalid @enderror" id="F16_montoMensual_valor" name="F16_montoMensual_valor" value="@if(old('F16_montoMensual_valor')){{ old('F16_montoMensual_valor') }}@endif" required maxlength="20" style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('F16_montoMensual_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <small>Aproximado sin decimales</small>
                    </div>

                    <div class="col-md-4 mb-3" id="div_F16_montoMensual_moneda">
                      <label for="F16_montoMensual_moneda">Moneda: 🌐 <code>*</code></label>
                      <select class="form-control @error('F16_montoMensual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F16_montoMensual_moneda" name="F16_montoMensual_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('montoMensual_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('montoMensual_moneda'))
                          selected
                          @endif
                        >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('F16_montoMensual_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div> {{--row--}}
                </fieldset>

                <p>&nbsp;</p>

                <button tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--**********************************
Content body end
***********************************-->
@endsection

@section('script')

$("#F16_tipoParticipacion_clave").ready(tipoPart);
$("#F16_tipoParticipacion_clave").change(tipoPart);

function tipoPart()
{
  var partValue = $("#F16_tipoParticipacion_clave").val();

  if(partValue == "OTRO")
  {
    $('#div_especifiqueParticipacion').show();
    $('#F16_especifiqueParticipacion').attr("required","required");
  }
  else
  {
    $('#div_especifiqueParticipacion').hide();
    $('#F16_especifiqueParticipacion').removeAttr("required");
  }
}


$("#F16_recibeRemuneracion").ready(mostrar_remun);
$("#F16_recibeRemuneracion").change(mostrar_remun);

function mostrar_remun()
{
  var remunValue = $("#F16_recibeRemuneracion").val();

  if(remunValue == "1")
  {
    $('#div_F16_montoMensual_valor').show();
    $('#div_F16_montoMensual_moneda').show();
    $('#F16_montoMensual_valor').attr("required","required");
    $('#F16_montoMensual_moneda').attr("required","required");
  }
  else
  {
    $('#div_F16_montoMensual_valor').hide();
    $('#div_F16_montoMensual_moneda').hide();
    $('#F16_montoMensual_valor').removeAttr("required");
    $('#F16_montoMensual_moneda').removeAttr("required");
  }
}

$("#F16_pais").ready(pais);
$("#F16_pais").change(pais);

function pais()
{
  var paisValue = $("#F16_pais").val();

  if(paisValue == "MX")
  {
    $('#div_entidadFederativa_clave').show();
    $('#F16_entidadFederativa_clave').attr("required","required");
  }
  else
  {
    $('#div_entidadFederativa_clave').hide();
    $('#F16_entidadFederativa_clave').removeAttr("required");
  }
}

$("#F16_sector_clave").ready(sector);
$("#F16_sector_clave").change(sector);

function sector()
{
  var sectorValue = $("#F16_sector_clave").val();

  if(sectorValue == "OTRO")
  {
    $('#div_especifiqueSector').show();
    $('#F16_especifiqueSector').attr("required","required");

  }
  else
  {
    $('#div_especifiqueSector').hide();
    $('#F16_especifiqueSector').removeAttr("required");
  }
}

@endsection
