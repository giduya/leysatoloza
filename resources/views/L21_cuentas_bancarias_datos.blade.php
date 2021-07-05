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
              Inversiones, Cuentas Bancarias y otro tipo de valores/activos
              <br>
              <small>(Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)</small>
              <small> (Situación Actual) </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Tipo de Inversion:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F13_tipoInversion_clave">Tipo de Inversion/activo 🌐</label>
                        <select class="form-control @error('F13_tipoInversion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F13_tipoInversion_clave" name="F13_tipoInversion_clave" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInversion() as $relacion)
                          <option value="{{ $relacion->clave }}"
                            @if($relacion->clave == old('tipoRelacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F13_tipoInversion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                          <label for="F13_subTipoInversion_clave">Subtipo de Inversion 🌐</label>
                        <select class="form-control @error('F13_subTipoInversion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F13_subTipoInversion_clave" name="F13_subTipoInversion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->subtipoinversion() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('subTipoInversion'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F13_subTipoInversion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Datos del Titular</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F13_titular_clave" > Titular : 🌐 <code>*</code> </label>
                        <select class="form-control @error('F13_titular_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F13_titular_clave" name="F13_titular_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->titularBien() as $relacion)
                          <option value="{{ $relacion->clave }}"
                            @if($relacion->clave == old('tipoRelacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F13_titular_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F13_numeroCuentaContrato">Número de cuenta, contrato o póliza : <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F13_numeroCuentaContrato') is-invalid @enderror" id="F13_numeroCuentaContrato" name="F13_numeroCuentaContrato" value="@if(old('F13_numeroCuentaContrato')){{ old('F13_numeroCuentaContrato') }}@endif" maxlength="65" required>
                        @error('F13_numeroCuentaContrato')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                <legend><h4 class="mb-3">Copropiedad con Terceros:</h4></legend>
                  <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F13_tercero_tipoPersona" > Tipo de persona: 🌐 <code>*</code> </label>
                        <select class="form-control @error('F13_tercero_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F13_tercero_tipoPersona" name="F13_tercero_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F13_tercero_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F13_tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="tercero_nombreRazonSocial">
                        <label for="F13_tercero_nombreRazonSocial">Nombre o razón social del tercero: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F13_tercero_nombreRazonSocial') is-invalid @enderror" id="F13_tercero_nombreRazonSocial" name="F13_tercero_nombreRazonSocial" value="@if(old('F13_tercero_nombreRazonSocial')){{ old('F13_tercero_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F13_tercero_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3" id="tercero_rfc">
                        <label for="F13_tercero_rfc">RFC del tercero:  🌐 <code>*</code> </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F13_tercero_rfc') is-invalid @enderror" id="F13_tercero_rfc" name="F13_tercero_rfc" value="@if(old('F13_tercero_rfc')){{ old('F13_tercero_rfc') }}@endif" required>
                        @error('F13_tercero_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Ubicación</h4></legend>
                  <div class="row">
                      <div class="col-md-4 mb-3" id="div_pais">
                        <label for="F13_pais">País : 🌐 <code>*</code></label>
                        <select class="form-control @error('F13_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F13_pais" name="F13_pais" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if($pais->ISO2 == old('pais'))
                            selected
                            @elseif($declaracion->F13_pais == $pais->ISO2 and old('F13_pais') == null)
                            selected
                            @elseif(old('F13_pais') == null and $declaracion->F13_pais == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F13_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <p>&nbsp;</p>

                    <div class="row">
                      <div class="col-md-6 mb-3" id="institucionRazonSocial">
                        <label for="F13_institucionRazonSocial">Institución o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F13_institucionRazonSocial') is-invalid @enderror" id="F13_institucionRazonSocial" name="F13_institucionRazonSocial" value="@if(old('F13_institucionRazonSocial')){{ old('F13_institucionRazonSocial') }}@endif" maxlength="65" required>
                        @error('F13_institucionRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3" id="div_institucionRazonSocial_rfc">
                        <label for="F13_rfc">RFC: 🌐 <code>*</code> </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F13_rfc') is-invalid @enderror" id="F13_rfc" name="F13_rfc" value="@if(old('F13_rfc')){{ old('F13_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('F13_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>                 
                  </fieldset>



                  <fieldset>
                    <legend><h4 class="mb-3">Saldo</h4></legend>

                    @if($declaracion->inicial == true)
                    <div class="form-group row">
                      <label for="F13_saldoSituacionActual_valor" class="col-sm-4 col-form-label">
                        Saldo Actual: <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F13_saldoSituacionActual_valor') is-invalid @enderror" id="F13_saldoSituacionActual_valor" name="F13_saldoSituacionActual_valor" @if(old('F13_saldoSituacionActual_valor')) value="{{ old('F13_saldoSituacionActual_valor') }}" @endif  maxlength="20" style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F13_saldoSituacionActual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <select class="form-control @error('F13_saldoSituacionActual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F13_saldoSituacionActual_moneda" name="F13_saldoSituacionActual_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F13_saldoSituacionActual_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('saldoSituacionActual_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F13_saldoSituacionActual_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    @endif

                  <p>&nbsp;</p>
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

$("#F13_tercero_tipoPersona").ready(largo_rfc);
$("#F13_tercero_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcValue = $("#F13_tercero_tipoPersona").val();

  if(rfcValue == "MORAL")
  {
    $('#F13_tercero_rfc').attr("maxlength","12");
    $('#F13_tercero_rfc').attr("minlength","12");
  }
  else
  {
    $('#F13_tercero_rfc').attr("maxlength","13");
    $('#F13_tercero_rfc').attr("minlength","13");
  }
}

$("#F13_pais").ready(pais);
$("#F13_pais").change(pais);

function pais()
{
  var paisValue = $("#F13_pais").val();

  if(paisValue == "MX")
  {
    $('#div_institucionRazonSocial').show();
    $('#div_institucionRazonSocial_rfc').show();
    $('#F13_rfc').attr("required","required");
  }
  else 
  {
    $('#div_institucionRazonSocial').show();
    $('#div_institucionRazonSocial_rfc').hide();
    $('#F13_rfc').removeAttr("required");
  }
}

@endsection
