@extends('layouts.app')

@section('content')
 <!--**********************************
    Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Datos del Adeudo:
              <br>
              <small> (Situación Actual: Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        <small>
                          Todos los datos de los adeudos / pasivos a nombre de la pareja, dependientes económicos y o terceros o que sea en copropiedad con el declarante no serán públicos.Adeudos del declarante, pareja y / o dependientes económicos.
                        </small>
                        <p><br></p>
                        <p>
                          Titular del Adeudo o Pasivo:
                        </p>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F14_titular_clave">Titular del adeudo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F14_titular_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_titular_clave" name="F14_titular_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->titularBien() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if($persona->clave == old('titular'))
                            selected
                            @endif
                          >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_titular_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F14_tipoAdeudo_clave">Tipo de Adeudo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F14_tipoAdeudo_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_tipoAdeudo_clave" name="F14_tipoAdeudo_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoAdeudo() as $adeudo)
                          <option value="{{ $adeudo->clave }}"
                            @if($adeudo->clave == old('tipoAdeudo'))
                            selected
                            @endif
                            >
                            {{ $adeudo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_tipoAdeudo_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-6 mb-3" id="div_tipo_otro">
                        <label for="F14_tipo_otro">Especifica el tipo de adeudo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_tipo_otro') is-invalid @enderror" id="F14_tipo_otro" name="F14_tipo_otro" value="@if(old('F14_tipo_otro')){{ old('F14_tipo_otro') }}@endif" maxlength="65" required>
                        @error('F14_tipo_otro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <p>&nbsp;</p>
                  </fieldset>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Otorgante del Crédito:</h4>
                    </legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="F14_otorganteCredito_tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F14_otorganteCredito_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_otorganteCredito_tipoPersona" name="F14_otorganteCredito_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_otorganteCredito_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F14_otorganteCredito_nombreInstitucion"> Nombre del Otorgante: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_otorganteCredito_nombreInstitucion') is-invalid @enderror" id="F14_otorganteCredito_nombreInstitucion" name="F14_otorganteCredito_nombreInstitucion" value="@if(old('F14_otorganteCredito_nombreInstitucion')){{ old('F14_otorganteCredito_nombreInstitucion') }}@endif" maxlength="65" required>
                        @error('F14_otorganteCredito_nombreInstitucion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F14_otorganteCredito_rfc"> RFC: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_otorganteCredito_rfc') is-invalid @enderror" id="F14_otorganteCredito_rfc" name="F14_otorganteCredito_rfc" value="@if(old('F14_otorganteCredito_rfc')){{ old('F14_otorganteCredito_rfc') }}@endif" required>
                        @error('F14_otorganteCredito_rfc')
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
                      <h4 class="mb-3">
                        Datos del Tercero
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F14_tercero_tipoPersona">Tercero: </label>
                        <select class="form-control @error('F14_tercero_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_tercero_tipoPersona" name="F14_tercero_tipoPersona" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('tercero_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F14_tercero_nombreRazonSocial">Nombre o Razón Social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_tercero_nombreRazonSocial') is-invalid @enderror" id="F14_tercero_nombreRazonSocial" name="F14_tercero_nombreRazonSocial" value="@if(old('F14_tercero_nombreRazonSocial')){{ old('F14_tercero_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F14_tercero_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F14_tercero_rfc">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_tercero_rfc') is-invalid @enderror" id="F14_tercero_rfc" name="F14_tercero_rfc" value="@if(old('F14_tercero_rfc')){{ old('F14_tercero_rfc') }}@endif" required>
                        @error('F14_tercero_rfc')
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
                      <h4 class="mb-3">Datos del Adeudo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F14_numeroCuentaContrato">No. de cuenta o contrato: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_numeroCuentaContrato') is-invalid @enderror" id="F14_numeroCuentaContrato" name="F14_numeroCuentaContrato" value="@if(old('F14_numeroCuentaContrato')){{ old('F14_numeroCuentaContrato') }}@endif" maxlength="65" required>
                        @error('F14_numeroCuentaContrato')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F14_fechaAdquisicion">Fecha de adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F14_fechaAdquisicion') is-invalid @enderror" id="F14_fechaAdquisicion" name="F14_fechaAdquisicion" value="@if(old('F14_fechaAdquisicion')){{ old('F14_fechaAdquisicion') }}@endif" required>
                        @error('F14_fechaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F14_pais">País: 🌐 <code>*</code></label>
                        <select class="form-control @error('F14_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_pais" name="F14_pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if($pais->ISO2 == old('pais'))
                            selected
                            @elseif($declaracion->F2_pais == $pais->ISO2 and old('F14_pais') == null)
                            selected
                            @elseif(old('F14_pais') == null and $declaracion->F14_pais == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="form-group row">
                      <label for="F14_monto_valor" class="col-sm-6 col-form-label">
                        Monto original del adeudo: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F14_monto_valor') is-invalid @enderror" id="F14_monto_valor" name="F14_monto_valor" value="@if(old('F14_monto_valor')){{ old('F14_monto_valor') }}@endif"  maxlength="20"  style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F14_monto_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control @error('F14_monto_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_monto_moneda" name="F14_monto_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F14_monto_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('montoOriginal_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_monto_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    @if($declaracion->inicial == true)
                    <div class="form-group row">
                      <label for="F14_saldoInsolutoSituacionActual_valor" class="col-sm-6 col-form-label">
                        Saldo insoluto (situación actual):: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F14_saldoInsolutoSituacionActual_valor') is-invalid @enderror" id="F14_saldoInsolutoSituacionActual_valor" name="F14_saldoInsolutoSituacionActual_valor" value="@if(old('F14_saldoInsolutoSituacionActual_valor')){{ old('F14_saldoInsolutoSituacionActual_valor') }}@endif"  maxlength="20"  style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F14_saldoInsolutoSituacionActual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control @error('F14_saldoInsolutoSituacionActual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F14_saldoInsolutoSituacionActual_moneda" name="F14_saldoInsolutoSituacionActual_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F14_saldoInsolutoSituacionActual_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('F14_saldoInsolutoSituacionActual_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F14_saldoInsolutoSituacionActual_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    @endif

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

@section("script")
$("#F14_tipoAdeudo_clave").ready(mostrar_inst);
$("#F14_tipoAdeudo_clave").change(mostrar_inst);

function mostrar_inst()
{
  var instValue = $("#F14_tipoAdeudo_clave").val();

  if(instValue == "OTRO")
  {
    $('#div_tipo_otro').show();
    $('#F14_tipo_otro').attr("required","required");
  }
  else
  {
    $('#div_tipo_otro').hide();
    $('#F14_tipo_otro').removeAttr("required");
  }
}

$("#F14_otorganteCredito_tipoPersona").ready(largo_rfc);
$("#F14_otorganteCredito_tipoPersona").change(largo_rfc);

$("#F14_tercero_tipoPersona").ready(largo_rfc);
$("#F14_tercero_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var personaValue = $("#F14_otorganteCredito_tipoPersona").val();
  var terceroValue = $("#F14_tercero_tipoPersona").val();

  if(personaValue == "MORAL")
  {
    $('#F14_otorganteCredito_rfc').attr("maxlength","12");
    $('#F14_otorganteCredito_rfc').attr("minlength","12");
  }
  else
  {
    $('#F14_otorganteCredito_rfc').attr("maxlength","13");
    $('#F14_otorganteCredito_rfc').attr("minlength","13");
  }

  if(terceroValue == "MORAL")
  {
    $('#F14_tercero_rfc').attr("maxlength","12");
    $('#F14_tercero_rfc').attr("minlength","12");
  }
  else
  {
    $('#F14_tercero_rfc').attr("maxlength","13");
    $('#F14_tercero_rfc').attr("minlength","13");
  }
}
@endsection
