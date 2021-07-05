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
              REPRESENTACIÓN
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="F19_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos de representación:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F19_tipoRelacion">¿Quién está relacionado?: 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_tipoRelacion" name="F19_tipoRelacion" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->clave }}"
                            @if($relacion->clave == old('F19_tipoRelacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_tipoRelacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F19_tipoRepresentacion">Tipo de representación: 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_tipoRepresentacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_tipoRepresentacion" name="F19_tipoRepresentacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRepresentacion() as $representacion)
                          <option value="{{ $representacion->valor }}"
                            @if($representacion->valor == old('F19_tipoRepresentacion'))
                            selected
                            @endif
                            >
                            {{ $representacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_tipoRepresentacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F19_fechaInicioRepresentacion">Fecha de inicio: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F19_fechaInicioRepresentacion') is-invalid @enderror" id="F19_fechaInicioRepresentacion" name="F19_fechaInicioRepresentacion" required value="@if(old('F19_fechaInicioRepresentacion')){{ old('F19_fechaInicioRepresentacion') }}@endif">
                        @error('F19_fechaInicioRepresentacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset id=fieldset_representante>
                    <legend><h4 class="mb-3">Datos del <span id="span_representante">representante</span><span id="span_representado">representado</span>:</h4></legend>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="F19_tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_tipoPersona" name="F19_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if($persona->clave == old('F19_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="F19_nombreRazonSocial">Nombre o Razón Social 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F19_nombreRazonSocial') is-invalid @enderror" id="F19_nombreRazonSocial" name="F19_nombreRazonSocial" value="@if(old('F19_nombreRazonSocial')){{ old('F19_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F19_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F19_rfc"> RFC: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F19_rfc') is-invalid @enderror" id="F19_rfc" name="F19_rfc" value="@if(old('F19_rfc')){{ old('F19_rfc') }}@endif" required>
                        @error('F19_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_pais">
                        <label for="F19_pais">País : 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_pais" name="F19_pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if($pais->ISO2 == old('F19_pais'))
                            selected
                            @elseif($declaracion->F2_pais == $pais->ISO2 and old('F19_pais') == null)
                            selected
                            @elseif(old('F19_pais') == null and $declaracion->F19_pais == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="F19_entidadFederativa_clave">Estado: 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_entidadFederativa_clave" name="F19_entidadFederativa_clave" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('F19_entidadFederativa_clave'))
                            selected
                            @endif
                            >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_sector">
                        <label for="F19_sector_clave">Sector productivo: <code>*</code></label>
                        <select class="form-control @error('F19_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_sector_clave" name="F19_sector_clave" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->sector() as $sector)
                          <option value="{{ $sector->clave }}"
                            @if($sector->clave == old('F19_sector_clave'))
                            selected
                            @endif
                            >
                            {{ $sector->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_sector_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueSector">
                        <label for="F19_especifiqueSector">Especifique sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F19_especifiqueSector') is-invalid @enderror" id="F19_especifiqueSector" name="F19_especifiqueSector" value="@if(old('F19_especifiqueSector')){{ old('F19_especifiqueSector') }}@endif" maxlength="65">
                        @error('F19_especifiqueSector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset id=fieldset_remuneracion>
                    <legend>
                      <h4 class="mb-3">Remuneración por representación:</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="F19_recibeRemuneracion">¿Recibe remuneración?: 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_recibeRemuneracion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_recibeRemuneracion" name="F19_recibeRemuneracion" required>
                          <option value="">Seleccione...</option>
                          <option value="1" @if(1 == old('F19_recibeRemuneracion')) selected @endif>SI</option>
                          <option value="0" @if("0" == old('F19_recibeRemuneracion')) selected @endif>NO</option>
                        </select>
                        @error('F19_recibeRemuneracion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3" id="div_F19_montoMensual_valor">
                        <label for="F19_montoMensual_valor">Monto Mensual: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F19_montoMensual_valor') is-invalid @enderror" id="F19_montoMensual_valor" name="F19_montoMensual_valor" value="@if(old('F19_montoMensual_valor')){{ old('F19_montoMensual_valor') }}@endif" required maxlength="20" style="text-align:right">

                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F19_montoMensual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4 mb-3" id="div_F19_montoMensual_moneda">
                        <label for="F19_montoMensual_moneda">Monto Mensual: 🌐 <code>*</code></label>
                        <select class="form-control @error('F19_montoMensual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F19_montoMensual_moneda" name="F19_montoMensual_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('montoMensualAproximado_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('montoMensualAproximado_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F19_montoMensual_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
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
</div>
<!--**********************************
Content body end
***********************************-->
@endsection

@section('script')

$("#F19_pais").ready(entidad);
$("#F19_pais").change(entidad);

function entidad()
{
  var paisValue = $("#F19_pais").val();

  if(paisValue == "")
  {
    $('#div_entidadFederativa').hide();
    $('#F19_entidadFederativa_clave').removeAttr("required");
    $('#div_pais_clave').hide();
  }
  else if(paisValue == "MX")
  {
    $('#div_entidadFederativa').show();
    $('#F19_entidadFederativa_clave').attr("required","required");
    $('#div_pais_clave').hide();
  }
  else
  {
    $('#div_pais_clave').show();
    $('#F19_entidadFederativa_clave').removeAttr("required");
    $('#div_entidadFederativa').hide();
  }
}

$("#F19_tipoRepresentacion").ready(despliega);
$("#F19_tipoRepresentacion").change(despliega);

function despliega()
{
  var muestraValue = $("#F19_tipoRepresentacion").val();

  if(muestraValue == "")
  {
    $('#fieldset_representante').hide();
    $('#fieldset_remuneracion').hide();
  }
  else
  {
    $('#fieldset_representante').show();
    $('#fieldset_remuneracion').show();
  }
}

$("#F19_tipoRepresentacion").ready(span);
$("#F19_tipoRepresentacion").change(span);

function span()
{
  var tipoValue = $("#F19_tipoRepresentacion").val();

  if(tipoValue == "REPRESENTANTE")
  {
    $('#span_representante').show();
    $('#span_representado').hide();
  }
  else if(tipoValue == "REPRESENTADO")
  {
    $('#span_representante').hide();
    $('#span_representado').show();
  }
  else
  {
    $('#span_representado').hide();
    $('#span_representante').hide();
  }
}

$("#F19_tipoPersona").ready(largo_rfc);
$("#F19_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcValue = $("#F19_tipoPersona").val();

  if(rfcValue == "MORAL")
  {
    $('#F19_rfc').attr("maxlength","12");
    $('#F19_rfc').attr("minlength","12");
  }
  else
  {
    $('#F19_rfc').attr("maxlength","13");
    $('#F19_rfc').attr("minlength","13");
  }
}

$("#F19_sector_clave").ready(sector);
$("#F19_sector_clave").change(sector);

function sector()
{
  var sectorValue = $("#F19_sector_clave").val();

  if(sectorValue == "OTRO")
  {
    $('#div_especifiqueSector').show();
    $('#F19_especifiqueSector').attr("required","required");
  }
  else
  {
    $('#div_especifiqueSector').hide();
    $('#F19_especifiqueSector').removeAttr("required");
  }
}


$("#F19_recibeRemuneracion").ready(remunera);
$("#F19_recibeRemuneracion").change(remunera);

function remunera()
{
  var remuneraValue = $("#F19_recibeRemuneracion").val();

  if(remuneraValue == 1)
  {
    $('#div_F19_montoMensual_valor').show();
    $('#div_F19_montoMensual_moneda').show();

    $('#F19_montoMensual_valor').attr('required',"required");
    $('#F19_montoMensual_moneda').attr('required',"required");
  }
  else
  {
    $('#div_F19_montoMensual_valor').hide();
    $('#div_F19_montoMensual_moneda').hide();

    $('#F19_montoMensual_valor').removeAttr('required');
    $('#F19_montoMensual_moneda').removeAttr('required');
  }
}

@endsection
