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
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="F20_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <div class="form-group row">
                      <label for="F20_realizaActividadLucrativa" class="col-sm-6 col-form-label">¿Realiza actividad lucrativa? 🌐 <code>*</code></label>
                      <div class="col-sm-3">
                      <select class="form-control @error('F20_realizaActividadLucrativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_realizaActividadLucrativa" name="F20_realizaActividadLucrativa" required autofocus>
                        <option value="">Seleccione...</option>
                        <option value="1" @if(1 == old('F20_realizaActividadLucrativa')) selected @endif>SI</option>
                        <option value="0" @if("0" == old('F20_realizaActividadLucrativa')) selected @endif>NO</option>
                      </select>
                      @error('F20_realizaActividadLucrativa')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="F20_tipoRelacion" class="col-sm-6 col-form-label">¿Quién se relaciona con el cliente?: 🌐 <code>*</code></label>
                    <div class="col-sm-3">
                      <select class="form-control @error('F20_tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_tipoRelacion" name="F20_tipoRelacion" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                        <option value="{{ $relacion->clave }}"
                          @if($relacion->clave == old('F20_tipoRelacion'))
                          selected
                          @endif
                          >
                          {{ $relacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F20_tipoRelacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos de la empresa o servicio:
                        <small>
                          <br>
                          Nombre de la empresa o servicio con el que tú, pareja o dependiente económico realiza la actividad lucrativa prestando un servicio a algún cliente.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-9 mb-3">
                        <label for="F20_empresa_nombreEmpresaServicio">Nombre de la empresa y/o servicio que proporciona: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F20_empresa_nombreEmpresaServicio') is-invalid @enderror" id="F20_empresa_nombreEmpresaServicio" name="F20_empresa_nombreEmpresaServicio" value="@if(old('F20_empresa_nombreEmpresaServicio')){{ old('F20_empresa_nombreEmpresaServicio') }}@endif" maxlength="191" required>
                        <small> Ejemplo: Consultoria Rogalsa S.A. de C.V. / Servicio de consultoría contable</small>
                        @error('F20_empresa_nombreEmpresaServicio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F20_empresa_rfc"> RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F20_empresa_rfc') is-invalid @enderror" id="F20_empresa_rfc" name="F20_empresa_rfc" value="@if(old('F20_empresa_rfc')){{ old('F20_empresa_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('F20_empresa_rfc')
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos del cliente principal:
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="F20_clientePrincipal_tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F20_clientePrincipal_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_clientePrincipal_tipoPersona" name="F20_clientePrincipal_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if($persona->clave == old('F20_clientePrincipal_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F20_clientePrincipal_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F20_clientePrincipal_nombreRazonSocial">Nombre o razón social del cliente: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F20_clientePrincipal_nombreRazonSocial') is-invalid @enderror" id="F20_clientePrincipal_nombreRazonSocial" name="F20_clientePrincipal_nombreRazonSocial" value="@if(old('F20_clientePrincipal_nombreRazonSocial')){{ old('F20_clientePrincipal_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F20_clientePrincipal_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F20_clientePrincipal_rfc"> RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F20_clientePrincipal_rfc') is-invalid @enderror" id="F20_clientePrincipal_rfc" name="F20_clientePrincipal_rfc" value="@if(old('F20_clientePrincipal_rfc')){{ old('F20_clientePrincipal_rfc') }}@endif">
                        @error('F20_clientePrincipal_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div><!--row-->

                    <div class="row">
                      <div class="col-md-3 mb-3" id="sector_clave">
                        <label for="F20_sector_clave">Sector productivo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F20_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_sector_clave" name="F20_sector_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->sector() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F20_sector_clave'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F20_sector_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3" id="div_especifiqueSector">
                        <label for="F20_especifiqueSector">Especifique sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F20_especifiqueSector') is-invalid @enderror" id="F20_especifiqueSector" name="F20_especifiqueSector" value="@if(old('F20_especifiqueSector')){{ old('F20_especifiqueSector') }}@endif" maxlength="65">
                        @error('F20_especifiqueSector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3" id="div_pais_clave">
                        <label for="F20_pais_clave">Pais: 🌐 <code>*</code></label>
                        <select class="form-control @error('F20_pais_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_pais_clave" name="F20_pais_clave" required>
                          <option value="">Seleccione un país:</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('F20_pais') == $pais->ISO2)
                            selected
                            @elseif($declaracion->F2_pais == $pais->ISO2 and old('F20_pais') == null)
                            selected
                            @elseif(old('F20_pais') == null and $declaracion->F20_pais == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F20_pais_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-md-3 mb-3" id="div_entidadFederativa_clave">
                        <label for="F20_entidadFederativa_clave">Estado: 🌐 <code>*</code></label>
                        <select class="form-control @error('F20_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_entidadFederativa_clave" name="F20_entidadFederativa_clave">
                          <option value="">Seleccione una entidad:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $tipo)
                          <option value="{{ $tipo->Cve_Ent }}"
                            @if($tipo->Cve_Ent == old('F20_entidadFederativa_clave'))
                            selected
                            @endif
                            >
                            {{ $tipo->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('F20_entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div><!--row-->
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Ganancia obtenida del cliente principal:
                      </h4>
                    </legend>
                    <div class="form-group row">
                      <label for="F20_montoAproximadoGanancia_valor" class="col-sm-4 col-form-label">
                        Monto mensual aproximado: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F20_montoAproximadoGanancia_valor') is-invalid @enderror" id="F20_montoAproximadoGanancia_valor" name="F20_montoAproximadoGanancia_valor" value="@if(old('F20_montoAproximadoGanancia_valor')){{ old('F20_montoAproximadoGanancia_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F20_montoAproximadoGanancia_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('F20_montoAproximadoGanancia_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F20_montoAproximadoGanancia_moneda" name="F20_montoAproximadoGanancia_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F20_montoAproximadoGanancia_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('F20_montoAproximadoGanancia_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F20_montoAproximadoGanancia_moneda')
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

$("#F20_clientePrincipal_tipoPersona").ready(largo_rfc);
$("#F20_clientePrincipal_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcValue = $("#F20_clientePrincipal_tipoPersona").val();

  if(rfcValue == "MORAL")
  {
    $('#F20_clientePrincipal_rfc').attr("maxlength","12");
    $('#F20_clientePrincipal_rfc').attr("minlength","12");
  }
  else
  {
    $('#F20_clientePrincipal_rfc').attr("maxlength","13");
    $('#F20_clientePrincipal_rfc').attr("minlength","13");
  }
}


$("#F20_sector_clave").ready(sector);
$("#F20_sector_clave").change(sector);

function sector()
{
  var sectorValue = $("#F20_sector_clave").val();

  if(sectorValue == "OTRO")
  {
    $('#div_sector').attr("class","col-md-3 mb-3");
    $('#div_especifiqueSector').show();
    $('#F20_especifiqueSector').attr("required","required");
  }
  else
  {
    $('#div_sector').attr("class","col-md-6 mb-3");
    $('#div_especifiqueSector').hide();
    $('#F20_especifiqueSector').removeAttr("required");
  }
}


$("#F20_pais_clave").ready(pais);
$("#F20_pais_clave").change(pais);

function pais()
{
  var paisValue = $("#F20_pais_clave").val();

  if(paisValue == "MX")
  {
    $('#div_pais_clave').attr("class","col-md-3 mb-3");
    $('#div_entidadFederativa_clave').show();
    $('#F20_entidadFederativa_clave').attr("required","required");
  }
  else
  {
    $('#div_pais_clave').attr("class","col-md-3 mb-3");
    $('#div_entidadFederativa_clave').hide();
    $('#F20_entidadFederativa_clave').removeAttr("required");
  }
}
@endsection
