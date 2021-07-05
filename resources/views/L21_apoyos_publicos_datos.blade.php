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
              APOYOS O BENEFICIOS PÚBLICOS
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="F18_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del beneficiario:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F18_beneficiarioPrograma_clave">Beneficiario: 🌐 <code>*</code></label>
                        <select class="form-control @error('F18_beneficiarioPrograma_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F18_beneficiarioPrograma_clave" name="F18_beneficiarioPrograma_clave" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->beneficiarios() as $beneficiario)
                          <option value="{{ $beneficiario->clave }}"
                            @if($beneficiario->clave == old('F18_beneficiarioPrograma_clave'))
                            selected
                            @endif
                          >
                            {{ $beneficiario->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F18_beneficiarioPrograma_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueBeneficiario">
                        <label for="F18_especifiqueBeneficiario">Especifica el beneficiario: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F18_especifiqueBeneficiario') is-invalid @enderror" id="F18_especifiqueBeneficiario" name="F18_especifiqueBeneficiario" value="@if(old('F18_especifiqueBeneficiario')){{ old('F18_especifiqueBeneficiario') }}@endif" maxlength="65" required>
                        @error('F18_especifiqueBeneficiario')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Datos del apoyo:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3" id="F18_Apoyo">
                        <label for="F18_tipoApoyo_clave">Tipo de apoyo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F18_tipoApoyo_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F18_tipoApoyo_clave" name="F18_tipoApoyo_clave"  required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoApoyo() as $apoyo)
                          <option value="{{ $apoyo->clave }}"
                            @if($apoyo->clave == old('F18_tipoApoyo_clave'))
                            selected
                            @endif
                            >
                            {{ $apoyo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F18_tipoApoyo_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueApoyo">
                        <label for="F18_especifiqueApoyo">Especifica tipo apoyo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F18_especifiqueApoyo') is-invalid @enderror" id="F18_especifiqueApoyo" name="F18_especifiqueApoyo" value="@if(old('F18_especifiqueApoyo')){{ old('F18_especifiqueApoyo') }}@endif" maxlength="65" required>
                        @error('F18_especifiqueApoyo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F18_nombrePrograma">Nombre del programa: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F18_nombrePrograma') is-invalid @enderror" id="F18_nombrePrograma" name="F18_nombrePrograma" value="@if(old('F18_nombrePrograma')){{ old('F18_nombrePrograma') }}@endif" maxlength="65" required>
                        @error('F18_nombrePrograma')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F18_formaRecepcion">Forma de Recepción: 🌐 <code>*</code></label>
                        <select class="form-control @error('F18_formaRecepcion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F18_formaRecepcion" name="F18_formaRecepcion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaRecepcion() as $recepcion)
                          <option value="{{ $recepcion->valor }}"
                            @if($recepcion->valor == old('F18_formaRecepcion'))
                            selected
                            @endif
                            >
                            {{ $recepcion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F18_formaRecepcion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueBeneficio">
                        <label for="F18_especifiqueEspecie">Especifica la especie: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F18_especifiqueEspecie') is-invalid @enderror" id="F18_especifiqueEspecie" name="F18_especifiqueEspecie" value="@if(old('F18_especifiqueEspecie')){{ old('F18_especifiqueEspecie') }}@endif" maxlength="65">
                        @error('F18_especifiqueEspecie')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F18_montoApoyoMensual_valor">
                        <label for="F18_montoApoyoMensual_valor">Monto apoyo mensual: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F18_montoApoyoMensual_valor') is-invalid @enderror" id="F18_montoApoyoMensual_valor" name="F18_montoApoyoMensual_valor" @if(old('F18_montoApoyoMensual_valor')) value="{{ old('F18_montoApoyoMensual_valor') }}" @endif  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F18_montoApoyoMensual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-4 mb-3" id="div_F18_montoApoyoMensual_moneda">
                        <label for="F18_montoApoyoMensual_moneda">Monto apoyo moneda: 🌐 <code>*</code></label>
                        <select class="form-control @error('F18_montoApoyoMensual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F18_montoApoyoMensual_moneda" name="F18_montoApoyoMensual_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('F18_montoApoyoMensual_moneda') == null and $tipo->default == 1)
                              selected
                            @elseif($tipo->clave == old('F18_montoApoyoMensual_moneda'))
                              selected
                            @endif
                          >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F18_montoApoyoMensual_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del otorgante del apoyo:</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F18_nivelOrdenGobierno">Nivel de gobierno: 🌐 <code>*</code></label>
                        <select class="form-control @error('F18_nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F18_nivelOrdenGobierno" name="F18_nivelOrdenGobierno" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelOrdenGobierno() as $gobierno)
                          <option value="{{ $gobierno->clave}}"
                            @if($gobierno->clave == old('F18_nivelOrdenGobierno'))
                            selected
                            @endif
                          >
                            {{ $gobierno->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F18_nivelOrdenGobierno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F18_institucionOtorgante">Institución que da el apoyo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F18_institucionOtorgante') is-invalid @enderror" id="F18_institucionOtorgante" name="F18_institucionOtorgante" value="@if(old('F18_institucionOtorgante')){{ old('F18_institucionOtorgante') }}@endif" maxlength="65" required>
                        @error('F18_institucionOtorgante')
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
@endsection

@section('script')

$("#F18_beneficiarioPrograma_clave").ready(beneficiario);
$("#F18_beneficiarioPrograma_clave").change(beneficiario);

function beneficiario()
{
  var beneficiarioValue = $("#F18_beneficiarioPrograma_clave").val();

  if(beneficiarioValue == "OTRO")
  {
    $("#div_especifiqueBeneficiario").show();
    $('#F18_especifiqueBeneficiario').attr("required", "required");
  }
  else
  {
    $("#div_especifiqueBeneficiario").hide();
    $('#F18_especifiqueBeneficiario').removeAttr("required");
  }
}

$("#F18_tipoApoyo_clave").ready(apoyo);
$("#F18_tipoApoyo_clave").change(apoyo);

function apoyo()
{
  var apoyoValue = $("#F18_tipoApoyo_clave").val();

  if(apoyoValue == "OTRO")
  {
    $("#div_especifiqueApoyo").show();
    $('#F18_especifiqueApoyo').attr("required", "required");
  }
  else
  {
    $("#div_especifiqueApoyo").hide();
    $('#F18_especifiqueApoyo').removeAttr("required");
  }
}

$("#F18_formaRecepcion").ready(mostrar_formRep);
$("#F18_formaRecepcion").change(mostrar_formRep);

function mostrar_formRep()
{
  var formRepValue = $("#F18_formaRecepcion").val();

  if(formRepValue == "ESPECIE")
  {
    $('#div_especifiqueBeneficio').show();
    $('#div_F18_montoApoyoMensual_valor').hide();
    $('#div_F18_montoApoyoMensual_moneda').hide();
    $('#F18_especifiqueEspecie').attr("required", "required");

    $("#F18_montoApoyoMensual_valor").removeAttr("required");
    $("#F18_montoApoyoMensual_moneda").removeAttr("required");
  }
  else if(formRepValue == "MONETARIO")
  {
    $('#div_especifiqueBeneficio').hide();
    $('#div_F18_montoApoyoMensual_valor').show();
    $('#div_F18_montoApoyoMensual_moneda').show();
    $("#F18_especifiqueEspecie").removeAttr("required");

    $('#F18_montoApoyoMensual_valor').attr("required", "required");
    $("#F18_montoApoyoMensual_moneda").attr("required","required");
  }
  else
  {
    $('#div_especifiqueBeneficio').hide();
    $('#div_F18_montoApoyoMensual_valor').hide();
    $('#div_F18_montoApoyoMensual_moneda').hide();
    $("#F18_especifiqueEspecie").removeAttr("required");

    $("#F18_montoApoyoMensual_valor").removeAttr("required");
    $("#F18_montoApoyoMensual_moneda").removeAttr("required");
  }
}

@endsection
