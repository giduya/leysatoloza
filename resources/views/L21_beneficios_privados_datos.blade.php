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
              BENEFICIOS PRIVADOS
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="basic-form">

              <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                @csrf
                <input name="F21_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                <fieldset>
                  <legend>
                    <h4 class="mb-3">Datos del beneficio:</h4>
                  </legend>

                  <div class="row" id="tipo_beneficio_clave">
                    <div class="col-md-4 mb-3">
                      <label for="F21_tipoBeneficio_clave">Tipo de beneficio: 🌐 <code>*</code></label>
                      <select class="form-control @error('F21_tipoBeneficio_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F21_tipoBeneficio_clave" name="F21_tipoBeneficio_clave" autofocus required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoBeneficio() as $beneficio)
                        <option value="{{ $beneficio->clave }}"
                          @if($beneficio->clave == old('F21_tipoBeneficio_clave'))
                          selected
                          @endif
                          >
                          {{ $beneficio->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F21_tipoBeneficio_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueTipo">
                      <label for="F21_especifiqueTipo">Especifica el tipo: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F21_especifiqueTipo') is-invalid @enderror" id="F21_especifiqueTipo" name="F21_especifiqueTipo" value="@if(old('F21_especifiqueTipo')){{ old('F21_especifiqueTipo') }}@endif" maxlength="65">
                      @error('F21_especifiqueTipo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id ="div_sector">
                      <label for="F21_sector_clave">Sector productivo: 🌐 <code>*</code></label>
                      <select class="form-control @error('F21_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F21_sector_clave" name="F21_sector_clave" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->sector() as $sector)
                        <option value="{{ $sector->clave }}"
                          @if($sector->clave == old('F21_sector_clave'))
                          selected
                          @endif
                          >
                          {{ $sector->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F21_sector_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueSector">
                      <label for="F21_especifiqueSector">Especifica el sector: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F21_especifiqueSector') is-invalid @enderror" id="F21_especifiqueSector" name="F21_especifiqueSector" value="@if(old('F21_especifiqueSector')){{ old('F21_especifiqueSector') }}@endif" maxlength="65" >
                      @error('F21_especifiqueSector')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="F21_beneficiario_clave">Beneficiario: 🌐 <code>*</code></label>
                      <select class="form-control @error('F21_beneficiario_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F21_beneficiario_clave" name="F21_beneficiario_clave" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->beneficiarios() as $beneficiario)
                        <option value="{{ $beneficiario->clave }}"
                          @if($beneficiario->clave == old('F21_beneficiario_clave'))
                          selected
                          @endif
                          >
                          {{ $beneficiario->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F21_beneficiario_clave')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueBeneficiario">
                      <label for="F21_especifiqueBeneficiario">Especifica el beneficiario: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F21_especifiqueBeneficiario') is-invalid @enderror" id="F21_especifiqueBeneficiario" name="F21_especifiqueBeneficiario" value="@if(old('F21_especifiqueBeneficiario')){{ old('F21_especifiqueBeneficiario') }}@endif" maxlength="65" >
                      @error('F21_especifiqueBeneficiario')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>


                    <div class="col-md-4 mb-3">
                      <label for="F21_formaRecepcion">Forma de recepción: 🌐 <code>*</code></label>
                      <select class="form-control @error('F21_formaRecepcion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F21_formaRecepcion" name="F21_formaRecepcion" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->formaRecepcion() as $forma)
                        <option value="{{ $forma->valor }}"
                          @if($forma->valor == old('F21_formaRecepcion'))
                          selected
                          @endif
                          >
                          {{ $forma->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F21_formaRecepcion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueBeneficio">
                      <label for="F21_especifiqueBeneficio">Especifica la especie: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F21_especifiqueBeneficio') is-invalid @enderror" id="F21_especifiqueBeneficio" name="F21_especifiqueBeneficio" value="@if(old('F21_especifiqueBeneficio')){{ old('F21_especifiqueBeneficio') }}@endif" maxlength="65">
                      @error('F21_especifiqueBeneficio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_montoMensual">
                      <label for="F21_montoMensualAproximado_valor">Monto mensual: 🌐 <code>*</code></label>
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F21_montoMensualAproximado_valor') is-invalid @enderror" id="F21_montoMensualAproximado_valor" name="F21_montoMensualAproximado_valor" @if(old('F21_montoMensualAproximado_valor')) value="{{ old('F21_montoMensualAproximado_valor') }}" @endif maxlength="20" style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('F21_montoMensualAproximado_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <small>Aproximado sin decimales</small>
                    </div>

                    <div class="col-md-4 mb-3" id="div_moneda">
                      <label for="F21_montoMensualAproximado_moneda">Moneda: 🌐 <code>*</code></label>
                      <select class="form-control @error('F21_montoMensualAproximado_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F21_montoMensualAproximado_moneda" name="F21_montoMensualAproximado_moneda" >
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('F21_montoMensualAproximado_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('F21_montoMensualAproximado_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('F21_montoMensualAproximado_moneda')
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
                      Datos del otorgante del beneficio:
                    </h4>
                  </legend>

                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="F21_otorgante_tipoPersona">
                        Tipo de persona: 🌐 <code>*</code>
                      </label>
                      <select class="form-control @error('F21_otorgante_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F21_otorgante_tipoPersona" name="F21_otorgante_tipoPersona" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipopersona() as $persona)
                        <option value="{{ $persona->clave }}"
                          @if($persona->clave == old('F21_otorgante_tipoPersona'))
                          selected
                          @endif
                          >
                          {{ $persona->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('F21_otorgante_tipoPersona')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-5 mb-3">
                      <label for="F21_otorgante_nombreRazonSocial">
                        Nombre o razón social: 🌐 <code>*</code>
                      </label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F21_otorgante_nombreRazonSocial') is-invalid @enderror" id="F21_otorgante_nombreRazonSocial" name="F21_otorgante_nombreRazonSocial" value="@if(old('F21_otorgante_nombreRazonSocial')){{ old('F21_otorgante_nombreRazonSocial') }}@endif" required maxlength="65">
                      @error('F21_otorgante_nombreRazonSocial')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-3 mb-3" >
                      <label for="F21_otorgante_rfc">RFC: 🌐</label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F21_otorgante_rfc') is-invalid @enderror" id="F21_otorgante_rfc" name="F21_otorgante_rfc" value="@if(old('F21_otorgante_rfc')){{ old('F21_otorgante_rfc') }}@endif">
                      @error('F21_otorgante_rfc')
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
$("#F21_tipoBeneficio_clave").ready(mostrar_tipoBen);
$("#F21_tipoBeneficio_clave").change(mostrar_tipoBen);

function mostrar_tipoBen()
{
  var tipoBenValue = $( "#F21_tipoBeneficio_clave" ).val();

  if(tipoBenValue == "O")
  {
    $('#div_especifiqueTipo').show();
    $('#F21_especifiqueTipo').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueTipo').hide();
    $("#F21_especifiqueTipo").removeAttr("required");
  }
}


$("#F21_sector_clave").ready(mostrar_sect);
$("#F21_sector_clave").change(mostrar_sect);

function mostrar_sect()
{
  var sectValue = $("#F21_sector_clave").val();

  if(sectValue == "OTRO")
  {
    $('#div_especifiqueSector').show();
    $('#F21_especifiqueSector').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueSector').hide();
    $("#F21_especifiqueSector").removeAttr("required");
  }
}

$("#F21_beneficiario_clave").ready(mostrar_benef);
$("#F21_beneficiario_clave").change(mostrar_benef);

function mostrar_benef()
{
  var benefValue = $("#F21_beneficiario_clave").val();

  if(benefValue == "OTRO")
  {
    $('#div_especifiqueBeneficiario').show();
    $('#F21_especifiqueBeneficiario').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueBeneficiario').hide();
    $("#F21_especifiqueBeneficiario").removeAttr("required");
  }
}



$("#F21_otorgante_tipoPersona").ready(largo_rfc);
$("#F21_otorgante_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcValue = $("#F21_otorgante_tipoPersona").val();

  if(rfcValue == "MORAL")
  {
    $('#F21_otorgante_rfc').attr("maxlength","12");
    $('#F21_otorgante_rfc').attr("minlength","12");
  }
  else
  {
    $('#F21_otorgante_rfc').attr("maxlength","13");
    $('#F21_otorgante_rfc').attr("minlength","13");
  }
}

$("#F21_formaRecepcion").ready(mostrar_formRep);
$("#F21_formaRecepcion").change(mostrar_formRep);

function mostrar_formRep()
{
  var formRepValue = $("#F21_formaRecepcion").val();

 if(formRepValue == "ESPECIE")
  {
    $('#div_especifiqueBeneficio').show();
    $('#div_montoMensual').hide();
    $('#div_moneda').hide();
    $('#F21_especifiqueBeneficio').attr("required", "required");
    $("#F21_montoMensualAproximado_valor").removeAttr("required");
    $("#F21_montoMensualAproximado_moneda").removeAttr("required");
  }
  else if(formRepValue == "MONETARIO")
  {
    $('#div_especifiqueBeneficio').hide();
    $('#div_montoMensual').show();
    $('#div_moneda').show();
    $('#div_especifiqueBeneficio').hide();
    $("#F21_especifiqueBeneficio").removeAttr("required");
    $('#F21_montoMensualAproximado_valor').attr("required", "required");
    $('#F21_montoMensualAproximado_moneda').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueBeneficio').hide();
    $('#div_montoMensual').hide();
    $('#div_moneda').hide();
    $("#F21_especifiqueBeneficio").removeAttr("required");
    $("#F21_montoMensualAproximado_valor").removeAttr("required");
    $("#F21_montoMensualAproximado_moneda").removeAttr("required");
  }
}
@endsection
