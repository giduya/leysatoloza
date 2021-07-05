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
              VEHÍCULO
              <br>
              <small> (Situación Actual) </small>
              <small>(Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Titular del Vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="F11_titular_clave">Titular (Dueño del Vehículo): 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_titular_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_titular_clave" name="F11_titular_clave">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->titularBien() as $titular)
                          <option value="{{ $titular->clave }}"
                            @if($titular->clave == old('titular'))
                            selected
                            @endif
                          >
                          {{ $titular->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_titular_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_tipoVehiculo_clave">Tipo de Vehículo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_tipoVehiculo_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_tipoVehiculo_clave" name="F11_tipoVehiculo_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoVehiculo() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoVehiculo'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_tipoVehiculo_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3" id="div_tipoVehiculo_especifique">
                      <label for="F11_especifiqueVehiculo">Especifica el tipo: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_especifiqueVehiculo') is-invalid @enderror" id="F11_especifiqueVehiculo" name="F11_especifiqueVehiculo" value="@if(old('F11_especifiqueVehiculo')){{ old('F11_especifiqueVehiculo') }}@endif" maxlength="65" >
                      @error('F11_especifiqueVehiculo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div> {{--row--}}

                      <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="F11_marca">Marca: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_marca') is-invalid @enderror" id="F11_marca" name="F11_marca" value="@if(old('F11_marca')){{ old('F11_marca') }}@endif" maxlength="65" required>
                        @error('F11_marca')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6 mb-3">
                        <label for="F11_modelo">Modelo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_modelo') is-invalid @enderror" id="F11_modelo" name="F11_modelo" value="@if(old('F11_modelo')){{ old('F11_modelo') }}@endif" maxlength="65" required>
                        @error('F11_modelo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>

                      <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="F11_anio">Año: 🌐 <code>*</code></label>
                        <input type="number" step="1" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_anio') is-invalid @enderror" id="F11_anio" name="F11_anio" value="@if(old('F11_anio')){{ old('F11_anio') }}@endif" min="1850" max="2030" required>
                        @error('F11_anio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6 mb-3">
                        <label for="F11_numeroSerieRegistro">No. Serie / Registro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_numeroSerieRegistro') is-invalid @enderror" id="F11_numeroSerieRegistro" name="F11_numeroSerieRegistro" value="@if(old('F11_numeroSerieRegistro')){{ old('F11_numeroSerieRegistro') }}@endif" maxlength="65" required>
                        @error('F11_numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                      <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Relación con el Transmisor</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-6 mb-3" id="relacion_clave">
                        <label for="F11_relacion_clave">Relación del transmisor de la propiedad con el titular: 🌐 <code>*</code></label>
                        <select class="form-control @error('relacion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_relacion_clave" name="F11_relacion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->parentescoRelacion() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('transmisor_relacion'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_relacion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_transmisor_relacion_especifique">
                        <label for="F11_especifiqueRelacion">Especifica la relación: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_especifiqueRelacion') is-invalid @enderror" id="F11_especifiqueRelacion" name="F11_especifiqueRelacion" value="@if(old('F11_especifiqueRelacion')){{ old('F11_especifiqueRelacion') }}@endif" maxlength="65" required>
                        @error('F11_especifiqueRelacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Datos del Transmisor:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_transmisor_tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_transmisor_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_transmisor_tipoPersona" name="F11_transmisor_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_transmisor_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_transmisor_nombreRazonSocial">Nombre o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_transmisor_nombreRazonSocial') is-invalid @enderror" id="F11_transmisor_nombreRazonSocial" name="F11_transmisor_nombreRazonSocial" value="@if(old('F11_transmisor_nombreRazonSocial')){{ old('F11_transmisor_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F11_transmisor_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-form-group col-md-4 mb-3-6">
                        <label for="F11_transmisor_rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_transmisor_rfc') is-invalid @enderror" id="F11_transmisor_rfc" name="F11_transmisor_rfc" value="@if(old('F11_transmisor_rfc')){{ old('F11_transmisor_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('F11_transmisor_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Datos del Tercero:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_tercero_tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_tercero_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_tercero_tipoPersona" name="F11_tercero_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_tercero_nombreRazonSocial">Nombre o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_tercero_nombreRazonSocial') is-invalid @enderror" id="F11_tercero_nombreRazonSocial" name="F11_tercero_nombreRazonSocial" value="@if(old('F11_tercero_nombreRazonSocial')){{ old('F11_tercero_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F11_tercero_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_tercero_rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_tercero_rfc') is-invalid @enderror" id="F11_tercero_rfc" name="F11_tercero_rfc" value="@if(old('F11_tercero_rfc')){{ old('F11_tercero_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('F11_tercero_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Ubicación del Registro:</h4></legend>

                        <div class="row">
                        <div class="form-group col-md-6 mb-3">
                          <label for="F11_pais">Lugar Registro: 🌐 <code>*</code></label>
                          <select class="form-control @error('F11_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_pais" name="F11_pais">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}"
                              @if(old('lugarRegistro_pais') == $pais->ISO2)
                              selected
                              @elseif($pais->default == true)
                              selected
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                            </option>
                            @endforeach
                          </select>
                          @error('F11_pais')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3" id="div_entidadFederativa_clave">
                          <label for="F11_entidadFederativa_clave">Estado: 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_entidadFederativa_clave" name="F11_entidadFederativa_clave">
                          <option value="">Seleccione una entidad:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $tipo)
                          <option value="{{ $tipo->Cve_Ent }}"
                            @if($tipo->Cve_Ent == old('ubicacion_entidadFederativa'))
                            selected
                            @endif
                            >
                            {{ $tipo->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                      </div>

                    </fieldset>

                    <p>&nbsp;</p>

                    <fieldset>
                      <legend><h4 class="mb-3">Datos de Adquisición:</h4></legend>

                      <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_formaAdquisicion_clave">Forma adquisición: 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_formaAdquisicion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_formaAdquisicion_clave" name="F11_formaAdquisicion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaAdquisicion() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('formaAdquisicion_clave'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_formaAdquisicion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_fechaAdquisicion">Fecha adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_fechaAdquisicion') is-invalid @enderror" id="F11_fechaAdquisicion" name="F11_fechaAdquisicion" value="@if(old('F11_fechaAdquisicion')){{ old('F11_fechaAdquisicion') }}@endif" required>
                        @error('F11_fechaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F11_formaPago">Forma de pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('F11_formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_formaPago" name="F11_formaPago" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formapago() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F11_formaPago'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>

                    <div class="form-group row" id="div_valorAdquisicion">
                      <label for="F11_valorAdquisicion_valor" class="col-sm-4 col-form-label">
                        Valor de la adquisición: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F11_valorAdquisicion_valor') is-invalid @enderror" id="F11_valorAdquisicion_valor" name="F11_valorAdquisicion_valor" value="@if(old('F11_valorAdquisicion_valor')){{ old('F11_valorAdquisicion_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F11_valorAdquisicion_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('F11_valorAdquisicion_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_valorAdquisicion_moneda" name="F11_valorAdquisicion_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F11_valorAdquisicion_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('F11_valorAdquisicion_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_valorAdquisicion_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Motivo de Baja</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="F11_motivoBaja_clave">Motivo de Baja 🌐 <code>*</code></label>
                        <select class="form-control @error('motivoBaja') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F11_motivoBaja_clave" name="F11_motivoBaja_clave">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->motivobaja() as $baja)
                          <option value="{{ $baja->clave }}"
                            @if($baja->clave == old('F11_motivoBaja_clave'))
                            selected
                            @endif
                            >
                            {{ $baja->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F11_motivoBaja_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueBaja">
                        <label for="F11_especifiqueBaja">Especifica el motivo de baja: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F11_especifiqueBaja') is-invalid @enderror" id="F11_especifiqueBaja" name="F11_especifiqueBaja" value="@if(old('F11_especifiqueBaja')){{ old('F11_especifiqueBaja') }}@endif" maxlength="65" >
                       @error('F11_especifiqueBaja')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                       </span>
                        @enderror
                      </div>
                    </div>

                    </fieldset>

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
@endsection

@section('script')

$("#F11_tipoVehiculo_clave").ready(tipoVehiculo);
$("#F11_tipoVehiculo_clave").change(tipoVehiculo);

function tipoVehiculo()
{
  var tipoValue = $("#F11_tipoVehiculo_clave").val();

  if(tipoValue == "OTRO")
  {
    $('#div_tipoVehiculo_especifique').show();
    $('#F11_especifiqueVehiculo').attr("required","required");
  }
  else
  {
    $('#div_tipoVehiculo_especifique').hide();
    $('#F11_especifiqueVehiculo').removeAttr("required");
  }
}


$("#F11_relacion_clave").ready(transmisor_relacion);
$("#F11_relacion_clave").change(transmisor_relacion);

function transmisor_relacion()
{
  var relacionValue = $("#F11_relacion_clave").val();

  if(relacionValue == "OTRO")
  {
    $('#div_transmisor_relacion_especifique').show();
    $('#F11_especifiqueRelacion').attr("required","required");
  }
  else
  {
    $('#div_transmisor_relacion_especifique').hide();
    $('#F11_especifiqueRelacion').removeAttr("required");

  }
}

$("#F11_transmisor_tipoPersona").ready(largo_rfc);
$("#F11_transmisor_tipoPersona").change(largo_rfc);

$("#F11_tercero_tipoPersona").ready(largo_rfc);
$("#F11_tercero_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcTransmisorValue = $("#F11_transmisor_tipoPersona").val();
  var rfcTerceroValue = $("#F11_tercero_tipoPersona").val();

  if(rfcTransmisorValue == "MORAL")
  {
    $('#F11_transmisor_rfc').attr("maxlength","12");
    $('#F11_transmisor_rfc').attr("minlength","12");
  }
  else
  {
    $('#F11_transmisor_rfc').attr("maxlength","13");
    $('#F11_transmisor_rfc').attr("minlength","13");
  }

    if(rfcTerceroValue == "MORAL")
  {
    $('#F11_tercero_rfc').attr("maxlength","12");
    $('#F11_tercero_rfc').attr("minlength","12");
  }
  else
  {
    $('#F11_tercero_rfc').attr("maxlength","13");
    $('#F11_tercero_rfc').attr("minlength","13");
  }

}

$("#F11_pais").ready(lugar_registro);
$("#F11_pais").change(lugar_registro);

function lugar_registro()
{
  var registroValue = $("#F11_pais").val();

  if(registroValue == "")
  {
    $('#div_entidadFederativa_clave').hide();
    $('#F11_entidadFederativa_clave').removeAttr("required");
  }
  else if(registroValue == "MX")
  {
    $('#div_entidadFederativa_clave').show();
    $('#F11_entidadFederativa_clave').attr("required","required");
  }
  else
  {
    $('#div_entidadFederativa_clave').hide();
    $('#F11_entidadFederativa_clave').removeAttr("required");
  }
 }

$("#F11_formaPago").ready(pago);
$("#F11_formaPago").change(pago);

function pago()
{
  var pagoValue = $("#F11_formaPago").val();

  if(pagoValue == "NO APLICA")
  {
    $('#div_valorAdquisicion').hide();
    $('#F11_valorAdquisicion_valor').removeAttr("required");
    $('#F11_valorAdquisicion_moneda').removeAttr("required");
  }
  else if (pagoValue == "")
  {
    $('#div_valorAdquisicion').hide();
    $('#F11_valorAdquisicion_valor').removeAttr("required");
    $('#F11_valorAdquisicion_moneda').removeAttr("required");
  }
  else
  {
    $('#div_valorAdquisicion').show();
    $('#F11_valorAdquisicion_valor').attr("required","required");
    $('#F11_valorAdquisicion_moneda').attr("required","required");
  }
}


$("#F11_motivoBaja_clave").ready(baja);
$("#F11_motivoBaja_clave").change(baja);

function baja()
{
  var bajaValue = $("#F11_motivoBaja_clave").val();

  if(bajaValue == "OTRO")
  {
    $('#div_especifiqueBaja').show();
    $('#F11_especifiqueBaja').attr("required","required");
  }
  else
  {
    $('#div_especifiqueBaja').hide();
    $('#F11_especifiqueBaja').removeAttr("required");
  }
}


@endsection
