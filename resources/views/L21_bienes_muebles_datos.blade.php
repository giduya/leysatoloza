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
              Bienes Inmuebles
              <br>
              <small> (Situación Actual) </small>
              <small> (Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)   </small>
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
                      <h4 class="mb-3">Datos del Inmueble:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F12_titular_clave">Titular del bien: 🌐 <code>*</code></label>
                        <select class="form-control @error('F12_titular_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_titular_clave" name="F12_titular_clave" required>
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
                        @error('F12_titular_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F12_tipoBien_clave">Tipo de Bien: 🌐 <code>*</code></label>
                        <select class="form-control @error('F12_tipoBien_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_tipoBien_clave" name="F12_tipoBien_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipobienbienesmueble() as $tipoBien)
                          <option value="{{ $tipoBien->clave }}"
                            @if($tipoBien->clave == old('tipoBien_clave'))
                            selected
                            @endif
                            >
                            {{ $tipoBien->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_tipoBien_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueBien">
                        <label for="F12_especifiqueBien">Especifica el tipo de Bien: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_especifiqueBien') is-invalid @enderror" id="F12_especifiqueBien" name="F12_especifiqueBien" value="@if(old('F12_especifiqueBien')){{ old('F12_especifiqueBien') }}@endif" maxlength="65" >
                        @error('F12_especifiqueBien')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div> {{--row--}}

                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="F12_descripcionGeneralBien"> Descripción General del Bien: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_descripcionGeneralBien') is-invalid @enderror" id="F12_descripcionGeneralBien" name="F12_descripcionGeneralBien" value="@if(old('F12_descripcionGeneralBien')){{ old('F12_descripcionGeneralBien') }}@endif" maxlength="65" required>
                        @error('F12_descripcionGeneralBien')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Relación con el Transmisor</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F12_relacion_clave">Relación con el Transmisor: <code>*</code></label>
                        <select class="form-control @error('F12_relacion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_relacion_clave" name="F12_relacion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->parentescorelacion() as $relacion)
                          {{-- @foreach($declaracion->catalogo->parentescorelacion() as $relacion) --}}
                          <option value="{{ $relacion->clave }}"
                            @if($relacion->clave == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_relacion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueRelacion">
                        <label for="F12_especifiqueRelacion">Especifica la relación: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_especifiqueRelacion') is-invalid @enderror" id="F12_especifiqueRelacion" name="F12_especifiqueRelacion" value="@if(old('F12_especifiqueRelacion')){{ old('F12_especifiqueRelacion') }}@endif" maxlength="65" required>
                        @error('F12_especifiqueRelacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Tercero:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F12_tercero_tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F12_tercero_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_tercero_tipoPersona" name="F12_tercero_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F12_tercero_nombreRazonSocial"> Nombre del Transmisor: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_tercero_nombreRazonSocial') is-invalid @enderror" id="F12_tercero_nombreRazonSocial" name="F12_tercero_nombreRazonSocial" value="@if(old('F12_tercero_nombreRazonSocial')){{ old('F12_tercero_nombreRazonSocial') }}@endif" maxlength="65">
                        @error('F12_tercero_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F12_tercero_rfc"> RFC: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_tercero_rfc') is-invalid @enderror" id="F12_tercero_rfc" name="F12_tercero_rfc" value="@if(old('F12_tercero_rfc')){{ old('F12_tercero_rfc') }}@endif" maxlength="13"  minlength="12">
                        @error('F12_tercero_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Transmisor:</h4>
                    </legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="F12_transmisor_tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F12_transmisor_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_transmisor_tipoPersona" name="F12_transmisor_tipoPersona">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_transmisor_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F12_transmisor_nombreRazonSocial"> Nombre del Transmisor: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_transmisor_nombreRazonSocial') is-invalid @enderror" id="F12_transmisor_nombreRazonSocial" name="F12_transmisor_nombreRazonSocial" value="@if(old('F12_transmisor_nombreRazonSocial')){{ old('F12_transmisor_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F12_transmisor_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F12_transmisor_rfc"> RFC: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_transmisor_rfc') is-invalid @enderror" id="F12_transmisor_rfc" name="F12_transmisor_rfc" value="@if(old('F12_transmisor_rfc')){{ old('F12_transmisor_rfc') }}@endif" maxlength="12">
                        @error('F12_transmisor_rfc')
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
                      <h4 class="mb-3">Datos de Adquisición del Bien Mueble</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="F12_formaAdquisicion_clave">Forma de Adquisición 🌐 <code>*</code></label>
                        <select class="form-control @error('F12_formaAdquisicion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_formaAdquisicion_clave" name="F12_formaAdquisicion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaadquisicion() as $adquisicion)
                          <option value="{{ $adquisicion->clave }}"
                            @if($adquisicion->clave == old('adquisicion'))
                            selected
                            @endif
                            >
                            {{ $adquisicion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_formaAdquisicion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F12_formaPago">Forma de Pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('F12_formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_formaPago" name="F12_formaPago" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formapago() as $pago)
                          <option value="{{ $pago->clave }}"
                            @if($pago->clave == old('pago'))
                            selected
                            @endif
                            >
                            {{ $pago->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F12_fechaAdquisicion"> Fecha de Adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F12_fechaAdquisicion') is-invalid @enderror" id="F12_fechaAdquisicion" name="F12_fechaAdquisicion" value="@if(old('F12_fechaAdquisicion')){{ old('F12_fechaAdquisicion') }}@endif" required>
                        @error('F12_fechaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row" id="div_valoradquisicion">
                      <label for="F12_valorAdquisicion_valor" class="col-sm-4 col-form-label">
                        Valor de Adquisición: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F12_valorAdquisicion_valor') is-invalid @enderror" id="F12_valorAdquisicion_valor" name="F12_valorAdquisicion_valor" value="@if(old('F12_valorAdquisicion_valor')){{ old('F12_valorAdquisicion_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F12_valorAdquisicion_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-sm-4" id="div_monedaAdquisicion">
                        <select class="form-control @error('F12_valorAdquisicion_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F12_valorAdquisicion_moneda" name="F12_valorAdquisicion_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F12_valorAdquisicion_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('F12_valorAdquisicion_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F12_valorAdquisicion_moneda')
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
<!--**********************************
Content body end
***********************************-->
@endsection

@section('script')

$("#F12_tipoBien_clave").ready(tipobien);
$("#F12_tipoBien_clave").change(tipobien);

 function tipobien()
{
  var bienValue = $("#F12_tipoBien_clave").val();

  if(bienValue == "OTRO")
  {
    $('#div_especifiqueBien').show();
    $('#F12_especifiqueBien').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueBien').hide();
    $('#F12_especifiqueBien').removeAttr("required");
  }
}

$("#F12_relacion_clave").ready(tiporelacion);
$("#F12_relacion_clave").change(tiporelacion);

 function tiporelacion()
{
  var relValue = $("#F12_relacion_clave").val();

  if(relValue == "OTRO")
  {
    $('#div_especifiqueRelacion').show();
    $('#F12_especifiqueRelacion').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueRelacion').hide();
    $('#F12_especifiqueRelacion').removeAttr( "required");
  }
}

$("#F12_formaPago").ready(pago);
$("#F12_formaPago").change(pago);

 function pago()
{
  var pagoValue = $("#F12_formaPago").val();

  if(pagoValue == "NO APLICA")
  {
    $('#div_valoradquisicion').hide();
    $('#div_monedaadquisicion').hide();
    $('#F12_valorAdquisicion_valor').removeAttr("required");
    $('#F12_valorAdquisicion_moneda').removeAttr("required");
  }
  else if (pagoValue == "")
  {
    $('#div_valoradquisicion').hide();
    $('#div_monedaadquisicion').hide();
    $('#F12_valorAdquisicion_valor').removeAttr("required");
    $('#F12_valorAdquisicion_moneda').removeAttr("required");
  }
  else
  {
    $('#div_valoradquisicion').show();
    $('#div_monedaadquisicion').show();
    $('#F12_valorAdquisicion_valor').attr("required","required");
    $('#F12_valorAdquisicion_moneda').attr("required","required");
  }
}

$("#F12_tercero_tipoPersona").ready(largo_rfc);
$("#F12_tercero_tipoPersona").change(largo_rfc);
$("#F12_transmisor_tipoPersona").ready(largo_rfc);
$("#F12_transmisor_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcTerceroValue = $("#F12_tercero_tipoPersona").val();
  var rfcTransmisorValue = $("#F12_transmisor_tipoPersona").val();

  if(rfcTerceroValue == "MORAL")
  {
    $('#F12_tercero_rfc').attr("maxlength","12");
    $('#F12_tercero_rfc').attr("minlength","12");
  }
  else
  {
    $('#F12_tercero_rfc').attr("maxlength","13");
    $('#F12_tercero_rfc').attr("minlength","13");
  }

  if(rfcTransmisorValue == "MORAL")
  {
    $('#F12_transmisor_rfc').attr("maxlength","12");
    $('#F12_transmisor_rfc').attr("minlength","12");
  }
  else
  {
    $('#F12_transmisor_rfc').attr("maxlength","13");
    $('#F12_transmisor_rfc').attr("minlength","13");
  }
}

@endsection
