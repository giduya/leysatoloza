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
              ¿PARTICIPA EN LA TOMA DE DECISIONES DE ALGUNA DE ESTAS INSTITUCIONES?
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="col-md-12 order-md-1">
              <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                @csrf

                <input name="F17_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                <fieldset>
                  <legend><h4 class="mb-3">Relación con la institución:</h4></legend>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="F17_tipoRelacion">Tipo de relación: 🌐 <code>*</code></label>
                      <select class="form-control @error('F17_tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F17_tipoRelacion" name="F17_tipoRelacion" required autofocus>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                        <option value="{{ $relacion->clave }}"
                          @if($relacion->clave == old('F17_tipoRelacion'))
                          selected
                          @endif
                        >
                        {{ $relacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F17_tipoRelacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="F17_puestoRol"> Puesto/rol en la institución: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F17_puestoRol') is-invalid @enderror" id="F17_puestoRol" name="F17_puestoRol" value="@if(old('F17_puestoRol')){{ old('F17_puestoRol') }}@endif" maxlength="65" required>
                      @error('F17_puestoRol')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="F17_fechaInicioParticipacion">Inicio de la participación: 🌐 <code>*</code></label>
                      <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F17_fechaInicioParticipacion') is-invalid @enderror" id="F17_fechaInicioParticipacion" name="F17_fechaInicioParticipacion" @if(old('F17_fechaInicioParticipacion')) value="{{ old('F17_fechaInicioParticipacion') }}" @endif required>
                      @error('F17_fechaInicioParticipacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                  <legend><h4 class="mb-3">Datos de la institución:</h4></legend>

                  <div class="row">
                    <div class="col-md-4 mb-3" id="div_institucion" >
                      <label for="F17_tipoInstitucion_clave">Tipo de institución: 🌐 <code>*</code></label>
                      <select class="form-control @error('F17_tipoInstitucion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F17_tipoInstitucion_clave" name="F17_tipoInstitucion_clave" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoInstitucion() as $institucion)
                        <option value="{{ $institucion->clave }}"
                          @if($institucion->clave == old('F17_tipoInstitucion_clave'))
                          selected
                          @endif
                        >
                        {{ $institucion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F17_tipoInstitucion_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-8 mb-3" id="div_especifiqueInstitucion">
                      <label for="F17_especifiqueInstitucion">Especifica el tipo de Institución: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F17_especifiqueInstitucion') is-invalid @enderror" id="F17_especifiqueInstitucion" name="F17_especifiqueInstitucion" @if(old('F17_especifiqueInstitucion')) value="{{ old('F17_especifiqueInstitucion') }}" @endif maxlength="65">
                      @error('F17_especifiqueInstitucion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-5 mb-3">
                      <label for="F17_nombreInstitucion">Nombre de la institución: <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F17_nombreInstitucion') is-invalid @enderror" id="F17_nombreInstitucion" name="F17_nombreInstitucion" value="@if(old('F17_nombreInstitucion')){{ old('F17_nombreInstitucion') }}@endif" maxlength="65" required>
                      @error('F17_nombreInstitucion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="F17_rfc"> RFC: </label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F17_rfc') is-invalid @enderror" id="F17_rfc" name="F17_rfc" value="@if(old('F17_rfc')){{ old('F17_rfc') }}@endif" maxlength="12" minlenght="12">
                      @error('F17_rfc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_pais">
                      <label for="F17_pais">País: 🌐 <code>*</code></label>
                      <select class="form-control @error('F17_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F17_pais" name="F17_pais" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->paises() as $pais)
                        <option value="{{ $pais->ISO2 }}"
                          @if($pais->ISO2 == old('F17_pais'))
                          selected
                          @elseif($declaracion->F2_pais == $pais->ISO2 and old('F17_pais') == null)
                            selected
                            @elseif(old('F17_pais') == null and $declaracion->F17_pais == null)
                              @if($pais->default == true) selected @endif
                          @endif
                        >
                        {{ $pais->ESPANOL }}
                        </option>
                        @endforeach
                      </select>
                      @error('F17_pais')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_entidadFederativa_clave">
                      <label for="F17_entidadFederativa_clave">Estado: 🌐 <code>*</code></label>
                      <select class="form-control @error('F17_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F17_entidadFederativa_clave" name="F17_entidadFederativa_clave">
                        <option value="">Seleccione una entidad:</option>
                        @foreach($declaracion->catalogo->inegiEntidades() as $tipo)
                        <option value="{{ $tipo->Cve_Ent }}"
                          @if($tipo->Cve_Ent == old('F17_entidadFederativa_clave'))
                          selected
                          @endif
                          >
                          {{ $tipo->Nom_Ent }}
                        </option>
                        @endforeach
                      </select>
                      @error('F17_entidadFederativa_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                    <legend><h4 class="mb-3">Remuneración mensual</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F17_recibeRemuneracion">¿Recibe remuneración? 🌐 <code>*</code></label>
                        <select class="form-control @error('F17_recibeRemuneracion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F17_recibeRemuneracion" name="F17_recibeRemuneracion" required>
                          <option value="">Seleccione...</option>
                          <option value="1" @if(1 == old('F17_recibeRemuneracion')) selected @endif>SI</option>
                          <option value="0" @if("0" == old('F17_recibeRemuneracion')) selected @endif>NO</option>
                        </select>
                        @error('F17_recibeRemuneracion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F17_montoMensual_valor">
                        <label for="F17_montoMensual_valor">Monto mensual: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F17_montoMensual_valor') is-invalid @enderror" id="F17_montoMensual_valor" name="F17_montoMensual_valor" value="@if(old('F17_montoMensual_valor')){{ old('F17_montoMensual_valor') }}@endif" required maxlength="20" style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F17_montoMensual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <small>Aproximado sin decimales</small>
                      </div>

                      <div class="col-md-4 mb-3" id="div_F17_montoMensual_moneda">
                        <label for="F17_montoMensual_moneda">Moneda: 🌐 <code>*</code></label>
                        <select class="form-control @error('F17_montoMensual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F17_montoMensual_moneda" name="F17_montoMensual_moneda" required>
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
                        @error('F17_montoMensual_moneda')
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

@endsection

@section('script')

$("#F17_tipoInstitucion_clave").ready(mostrar_inst);
$("#F17_tipoInstitucion_clave").change(mostrar_inst);

function mostrar_inst()
{
  var instValue = $("#F17_tipoInstitucion_clave").val();

  if(instValue == "OTRO")
  {
    $('#div_especifiqueInstitucion').show();
    $("#F17_especifiqueInstitucion").attr("required","required");
  }
  else
  {
    $('#div_especifiqueInstitucion').hide();
    $("#F17_especifiqueInstitucion").removeAttr("required");
  }
}

$("#F17_recibeRemuneracion").ready(mostrar_remun);
$("#F17_recibeRemuneracion").change(mostrar_remun);

function mostrar_remun()
{
  var remunValue = $("#F17_recibeRemuneracion").val();

  if(remunValue == "1")
  {
    $('#div_F17_montoMensual_moneda').show();
    $('#div_F17_montoMensual_valor').show();
    $('#F17_montoMensual_valor').attr("required","required");
  }
  else
  {
    $('#div_F17_montoMensual_moneda').hide();
    $('#div_F17_montoMensual_valor').hide();
    $('#F17_montoMensual_valor').removeAttr("required");
  }
}

$("#F17_pais").ready(pais);
$("#F17_pais").change(pais);

function pais()
{
  var paisValue = $("#F17_pais").val();

  if(paisValue == "MX")
  {
    $('#div_entidadFederativa_clave').show();
    $('#F17_entidadFederativa_clave').attr("required","required");
  }
  else
  {
    $('#div_entidadFederativa_clave').hide();
    $('#F17_entidadFederativa_clave').removeAttr("required");
  }
}
@endsection
