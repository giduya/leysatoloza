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
              DATOS GENERALES
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <legend><h4 class="mb-3">Tus datos personales:</h4></legend>


                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nombres">Nombre(s): 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="@if(old('nombres')){{ old('nombres') }}@else{{ $declaracion->nombres }}@endif" maxlength="65" required="required">
                        @error('nombres')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="primerApellido">Primer apellido: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder="" value="@if(old('primerApellido')){{ old('primerApellido') }}@else{{ $declaracion->primerApellido }}@endif" maxlength="65" required="required">
                        @error('primerApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="segundoApellido">Segundo apellido: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder="" value="@if(old('segundoApellido')){{ old('segundoApellido') }}@else{{ $declaracion->segundoApellido }}@endif" maxlength="65">
                        @error('segundoApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="paisNacimiento">País de nacimiento: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F1_paisNacimiento') is-invalid @enderror" id="paisNacimiento" name="F1_paisNacimiento" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('F1_paisNacimiento') == $pais->ISO2)
                            selected
                            @elseif($declaracion->F1_paisNacimiento == $pais->ISO2 and old('F1_paisNacimiento') == null)
                            selected
                            @elseif(old('F1_paisNacimiento') == null and $declaracion->F1_paisNacimiento == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F1_paisNacimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="nacionalidad">Nacionalidad: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F1_nacionalidad') is-invalid @enderror" id="nacionalidad" name="F1_nacionalidad" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('F1_nacionalidad') == $pais->ISO2)
                            selected
                            @elseif($declaracion->F1_nacionalidad == $pais->ISO2 and old('F1_nacionalidad') == null)
                            selected
                            @elseif(old('F1_nacionalidad') == null and $declaracion->F1_nacionalidad == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F1_nacionalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="curp">CURP: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('F1_curp') is-invalid @enderror" id="curp" name="F1_curp" placeholder="" value="@if(old('F1_curp')){{ old('F1_curp') }}@else{{ $declaracion->F1_curp }}@endif" minlength="18" maxlength="18" required="required">
                        @error('F1_curp')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="rfc_rfc">RFC: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('F1_rfc_rfc') is-invalid @enderror" id="rfc_rfc" name="F1_rfc_rfc" placeholder="" value="@if(old('F1_rfc_rfc')){{ old('F1_rfc_rfc') }}@else{{ $declaracion->F1_rfc_rfc }}@endif"  maxlength="10" minlength="10" required="required">
                        @error('F1_rfc_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-2 mb-3">
                        <label for="rfc_homoClave">Homoclave: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('F1_rfc_homoClave') is-invalid @enderror" id="rfc_homoClave" name="F1_rfc_homoClave" placeholder="" value="@if(old('F1_rfc_homoClave')){{ old('F1_rfc_homoClave') }}@else{{ $declaracion->F1_rfc_homoClave }}@endif" maxlength="3" minlength="3" required="required">
                        @error('F1_rfc_homoClave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde te contactamos?:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                      <label for="correoElectronico_institucional">Correo institucional: 🌐</label>
                        <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('F1_correoElectronico_institucional') is-invalid @enderror" id="correoElectronico_institucional" name="F1_correoElectronico_institucional" placeholder="tu@ejemplo.gob.mx" maxlength="65" value="@if(old('F1_correoElectronico_institucional')){{ old('F1_correoElectronico_institucional') }}@else{{ $declaracion->F1_correoElectronico_institucional }}@endif">
                        @error('F1_correoElectronico_institucional')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="correoElectronico_personal">Correo personal:</label>
                        <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('F1_correoElectronico_personal') is-invalid @enderror" id="correoElectronico_personal" name="F1_correoElectronico_personal" placeholder="tu@ejemplo.com" maxlength="65" value="@if(old('F1_correoElectronico_personal')){{ old('F1_correoElectronico_personal') }}@else{{ $declaracion->F1_correoElectronico_personal }}@endif">
                        @error('F1_correoElectronico_personal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="telefono_casa">Lada + Teléfono de casa:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F1_telefono_casa_lada') is-invalid @enderror" id="telefono_casa_lada" name="F1_telefono_casa_lada" required="required">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}"
                              @if(old('F1_telefono_casa_lada') == $pais->LADA)
                              selected
                              @elseif($declaracion->F1_telefono_casa_lada == $pais->LADA and old('F1_telefono_casa_lada') == null)
                              selected
                              @elseif(old('F1_telefono_casa_lada') == null and $declaracion->F1_telefono_casa_lada == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('F1_telefono_casa') is-invalid @enderror" id="telefono_casa" name="F1_telefono_casa" value="@if(old('F1_telefono_casa')){{ old('F1_telefono_casa') }}@else{{ $declaracion->F1_telefono_casa }}@endif" minlength="10" maxlength="10">
                          @error('F1_telefono_casa')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('F1_telefono_casa_lada')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="telefono_celularPersonal">Lada + Teléfono celular: <code>*</code></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F1_telefono_celularPersonal_lada') is-invalid @enderror" id="telefono_celularPersonal_lada" name="F1_telefono_celularPersonal_lada">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}"
                              @if(old('F1_telefono_celularPersonal_lada') == $pais->LADA)
                              selected
                              @elseif($declaracion->F1_telefono_celularPersonal_lada == $pais->LADA and old('F1_telefono_celularPersonal_lada') == null)
                              selected
                              @elseif(old('F1_telefono_celularPersonal_lada') == null and $declaracion->F1_telefono_celularPersonal_lada == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('F1_telefono_celularPersonal') is-invalid @enderror" id="telefono_celularPersonal" name="F1_telefono_celularPersonal" minlength="10" maxlength="10" value="@if(old('F1_telefono_celularPersonal')){{ old('F1_telefono_celularPersonal') }}@else{{ $declaracion->F1_telefono_celularPersonal }}@endif" required="required">
                          @error('F1_telefono_celularPersonal')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('F1_telefono_celularPersonal_lada')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Cúal es tu situación personal?:</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="situacionPersonalEstadoCivil_clave">Estado civil: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F1_situacionPersonalEstadoCivil_clave') is-invalid @enderror" id="situacionPersonalEstadoCivil_clave" name="F1_situacionPersonalEstadoCivil_clave" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->estadoCivil() as $civil)
                          <option value="{{ $civil->clave }}"
                            @if(old('F1_situacionPersonalEstadoCivil_clave') == $civil->clave)
                              selected
                            @elseif($declaracion->F1_situacionPersonalEstadoCivil_clave == $civil->clave and old('F1_situacionPersonalEstadoCivil_clave') == null)
                              @if($civil->clave == $declaracion->F1_situacionPersonalEstadoCivil_clave) selected @endif
                            @endif
                            >
                            {{ $civil->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F1_situacionPersonalEstadoCivil_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div id="div_regmat" class="col-md-4 mb-3">
                        <label for="regimenMatrimonial_clave">Régimen matrimonial: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F1_regimenMatrimonial_clave') is-invalid @enderror" id="regimenMatrimonial_clave" name="F1_regimenMatrimonial_clave">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->regimenMatrimonial() as $regimen)
                          <option value="{{ $regimen->clave }}"
                            @if(!is_null($declaracion->F1_regimenMatrimonial_clave))
                              @if($regimen->clave == $declaracion->F1_regimenMatrimonial_clave) selected @endif
                            @endif
                          >
                            {{ $regimen->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F1_regimenMatrimonial_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div id="div_otro" class="col-md-4 mb-3">
                        <label for="especifiqueRegimen">Otro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F1_especifiqueRegimen') is-invalid @enderror" id="especifiqueRegimen" name="F1_especifiqueRegimen" value="@if(old('F1_especifiqueRegimen')){{ old('F1_especifiqueRegimen') }}@else{{ $declaracion->F1_especifiqueRegimen }}@endif" maxlength="65">
                        @error('F1_especifiqueRegimen')
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
                        <label for="aclaracionesObservaciones">
                          Aclaraciones / Observaciones:
                        </label>
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <textarea tabindex="{{ ++$tabindex }}" class="form-control" id="aclaracionesObservaciones" rows="7" name="F1_aclaracionesObservaciones" placeholder="">@if(old('F1_aclaracionesObservaciones')){{ old('F1_aclaracionesObservaciones') }}@else{{ $declaracion->F1_aclaracionesObservaciones }}@endif</textarea>
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
$("#situacionPersonalEstadoCivil_clave").ready(mostrar_regmat);
$("#situacionPersonalEstadoCivil_clave").change(mostrar_regmat);

function mostrar_regmat()
{
  var sitperValue = $("#situacionPersonalEstadoCivil_clave").val();

  if(sitperValue == "CAS")
  {
    $('#div_regmat').show();
    $('#regimenMatrimonial_clave').attr("required", "required");
    $('#regimenMatrimonial_clave').attr("name", "F1_regimenMatrimonial_clave");

    @if(old('F1_regimenMatrimonial_clave'))
      $('#regimenMatrimonial_clave option[value="{{ old('F1_regimenMatrimonial_clave') }}"]').attr("selected", "selected");
    @endif
  }
  else
  {
    $('#div_regmat').hide();
    $("#regimenMatrimonial_clave").removeAttr("required");
    $("#regimenMatrimonial_clave").removeAttr("name");
    $('#regimenMatrimonial_clave option:selected').removeAttr('selected');


    $('#div_otro').hide();
    $("#otro").removeAttr("required");
    $("#otro").removeAttr("name");
  }
}



$("#regimenMatrimonial_clave").ready(mostrar_otro);
$("#regimenMatrimonial_clave").change(mostrar_otro);

function mostrar_otro()
{
  var regmatValue = $( "#regimenMatrimonial_clave" ).val();

  if(regmatValue == "OTR")
  {
    $('#div_otro').show();
    $('#especifiqueRegimen').attr("required", "required");
    $('#especifiqueRegimen').attr("name", "F1_especifiqueRegimen");
  }
  else
  {
    $('#div_otro').hide();
    $("#especifiqueRegimen").removeAttr("required");
    $("#especifiqueRegimen").removeAttr("name");
  }
}

@endsection
