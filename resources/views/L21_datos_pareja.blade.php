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
              DATOS DE LA  PAREJA
              <br>
              <small></small>
            </h4>
          </div>
          <div class="card-body">

            <p>&nbsp;</p>

            <div class="row">
              <div class="col-md-12 order-md-1">
                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="F6_tipoOperacion" type="hidden" value="{{$declaracion->F6_tipoOperacion }}">

                  <label for="F6_ninguno" class="col-sm-12 col-form-label">
                    <input type="hidden" name="F6_ninguno" value="0">
                    <input type="checkbox" tabindex="{{ ++$tabindex }}" value="1" class="form-control @error('F6_ninguno') is-invalid @enderror" name="F6_ninguno" id="F6_ninguno" @if($declaracion->F6_ninguno == 1 or old('F6_ninguno') == 1) checked @endif>
                    NINGUNO
                    @error('F6_ninguno')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </label>

                  <p>&nbsp;</p>

                  <div id="form">
                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          Datos generales de la persona:
                        </h4>
                      </legend>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="F6_nombres">Nombre(s): <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('F6_nombres') is-invalid @enderror" id="F6_nombres" name="F6_nombres" value="@if(old('F6_nombres')){{ old('F6_nombres') }}@else{{ $declaracion->F6_nombres }}@endif" maxlength="65">
                          @error('F6_nombres')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_primerApellido">Primer apellido: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_primerApellido') is-invalid @enderror" id="F6_primerApellido" name="F6_primerApellido" placeholder="" value="@if(old('F6_primerApellido')){{ old('F6_primerApellido') }}@else{{ $declaracion->F6_primerApellido }}@endif" maxlength="65">
                          @error('F6_primerApellido')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_segundoApellido">Segundo apellido: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_segundoApellido') is-invalid @enderror" id="F6_segundoApellido" name="F6_segundoApellido" placeholder="" value="@if(old('F6_segundoApellido')){{ old('F6_segundoApellido') }}@else{{ $declaracion->F6_segundoApellido }}@endif" maxlength="65">
                          @error('F6_segundoApellido')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="F6_fechaNacimiento">Fecha de Nacimiento: <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_fechaNacimiento') is-invalid @enderror" id="F6_fechaNacimiento" name="F6_fechaNacimiento" value="@if(old('F6_fechaNacimiento')){{ old('F6_fechaNacimiento') }}@else{{ $declaracion->F6_fechaNacimiento }}@endif">
                          @error('F6_fechaNacimiento')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="F6_curp">CURP: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_curp') is-invalid @enderror" id="F6_curp" name="F6_curp" placeholder="" value="@if(old('F6_curp')){{ old('F6_curp') }}@else{{ $declaracion->F6_curp }}@endif" maxlength="18" minLength="18">
                          @error('F6_curp')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="F6_rfc">RFC: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_rfc') is-invalid @enderror" id="F6_rfc" name="F6_rfc" placeholder="" value="@if(old('F6_rfc')){{ old('F6_rfc') }}@else{{ $declaracion->F6_rfc }}@endif" maxlength="13" minLength="13">
                          @error('F6_rfc')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F6_relacionConDeclarante">Relación con el declarante: <code>*</code></label>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F6_relacionConDeclarante') is-invalid @enderror" id="F6_relacionConDeclarante" name="F6_relacionConDeclarante">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->relacionConDeclarante() as $parentesco)
                            <option value="{{ $parentesco->clave }}"
                              @if(old('F6_relacionConDeclarante') == $parentesco->clave)
                                selected
                              @elseif($declaracion->F6_relacionConDeclarante == $parentesco->clave and old('F6_relacionConDeclarante') == null)
                                selected
                              @endif
                            >
                              {{ $parentesco->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_relacionConDeclarante')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="F6_esDependienteEconomico">¿Es dependiente económico? <code>*</code></label>
                          <select class="form-control @error('F6_esDependienteEconomico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_esDependienteEconomico" name="F6_esDependienteEconomico">
                            <option value="0"
                            @if(old('F6_esDependienteEconomico') == "0")
                              selected
                            @elseif($declaracion->F6_esDependienteEconomico == "0" and old('F6_esDependienteEconomico') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F6_esDependienteEconomico') == "1")
                              selected
                            @elseif($declaracion->F6_esDependienteEconomico == "1" and old('F6_esDependienteEconomico') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F6_esDependienteEconomico')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F6_ciudadanoExtranjero">¿Es ciudadano extranjero? <code>*</code></label>
                          <select class="form-control @error('F6_ciudadanoExtranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_ciudadanoExtranjero" name="F6_ciudadanoExtranjero">
                            <option value="0"
                            @if(old('F6_ciudadanoExtranjero') == "0")
                              selected
                            @elseif($declaracion->F6_ciudadanoExtranjero == "0" and old('F6_ciudadanoExtranjero') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F6_ciudadanoExtranjero') == "1")
                              selected
                            @elseif($declaracion->F6_ciudadanoExtranjero == "1" and old('F6_ciudadanoExtranjero') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F6_ciudadanoExtranjero')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="F6_habitaDomicilioDeclarante">¿Habita en el domicilio del declarante? <code>*</code></label>
                          <select class="form-control @error('F6_habitaDomicilioDeclarante') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_habitaDomicilioDeclarante" name="F6_habitaDomicilioDeclarante">
                            <option value="0"
                            @if(old('F6_habitaDomicilioDeclarante') == "0")
                              selected
                            @elseif($declaracion->F6_habitaDomicilioDeclarante == "0" and old('F6_habitaDomicilioDeclarante') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F6_habitaDomicilioDeclarante') == "1")
                              selected
                            @elseif($declaracion->F6_habitaDomicilioDeclarante == "1" and old('F6_habitaDomicilioDeclarante') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F6_habitaDomicilioDeclarante')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <p>&nbsp;</p>
                    </fieldset>

                    <fieldset>
                      <legend>
                        <h4 class="mb-3">Domicilio de la pareja:</h4>
                      </legend>
                      <div class="row">
                        <label for="F6_lugarDondeReside" class="col-sm-12 col-form-label">
                          <input type="checkbox" tabindex="{{ ++$tabindex }}" value="SE_DESCONOCE" class="form-control @error('F6_lugarDondeReside') is-invalid @enderror" name="F6_lugarDondeReside" id="F6_lugarDondeReside" @if(old('F6_lugarDondeReside') == "SE_DESCONOCE") checked  @endif>
                          Mantener privado el domicilio de mi pareja
                          @error('F6_lugarDondeReside')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </label>
                      </div>

                      <div class="row" id="domicilio" style="margin-top:20px;">
                        <div class="col-md-4 mb-3">
                          <label for="F6_pais">¿Dónde radica?:</label>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F6_pais') is-invalid @enderror" id="F6_pais" name="F6_pais">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}"
                              @if(old('F6_pais') == $pais->ISO2)
                              selected
                              @elseif($declaracion->F6_pais == $pais->ISO2 and old('F6_pais') == null)
                              selected
                              @elseif(old('F6_pais') == null and $declaracion->F6_pais == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_pais')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F6_entidadFederativa_clave">
                          <label for="F6_entidadFederativa_clave">Estado:</label>
                          <select class="form-control @error('F6_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_entidadFederativa_clave" name="F6_entidadFederativa_clave">
                            <option value="">Seleccionar:</option>
                            @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                            <option value="{{ $entidad->Cve_Ent }}"
                              @if($entidad->Cve_Ent == old('F6_entidadFederativa_clave'))
                                selected
                              @else
                                @if($entidad->Cve_Ent == $declaracion->F6_entidadFederativa_clave and empty(old('F6_entidadFederativa_clave')))
                                  selected
                                @else
                              @endif
                            @endif
                            >
                              {{ $entidad->Nom_Ent }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_entidadFederativa_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F6_municipioAlcaldia_clave">
                          <label for="F6_municipioAlcaldia_clave">Municipio/Alcaldía:</label>
                          <select class="form-control @error('F6_municipioAlcaldia_clave') is-invalid @enderror" id="F6_municipioAlcaldia_clave" name="F6_municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                            <option value="">Seleccionar:</option>
                            @if(old('F6_entidadFederativa_clave'))
                              @foreach($declaracion->catalogo->inegiAlcaldias(old('F6_entidadFederativa_clave')) as $alcaldia)
                              <option value="{{ $alcaldia->Cve_Mun }}"
                                @if($alcaldia->Cve_Mun == old('F6_municipioAlcaldia_clave'))
                                  selected
                                @endif
                              >
                                {{ $alcaldia->Nom_Mun }}
                              </option>
                              @endforeach
                            @else
                              @foreach($declaracion->catalogo->inegiAlcaldias($declaracion->F6_entidadFederativa_clave) as $alcaldia)
                                <option value="{{ $alcaldia->Cve_Mun }}"
                                  @if($alcaldia->Cve_Mun == $declaracion->F6_municipioAlcaldia_clave)
                                    selected
                                  @endif
                                >
                                  {{ $alcaldia->Nom_Mun }}
                                </option>
                              @endforeach
                            @endif
                          </select>
                          @error('F6_municipioAlcaldia_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F6_coloniaLocalidad">
                          <label for="F6_coloniaLocalidad">Colonia o Localidad:</label>
                          <select class="form-control @error('F6_coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_coloniaLocalidad" name="F6_coloniaLocalidad">
                            <option value="">Seleccionar:</option>
                            @if(old('F6_entidadFederativa_clave'))
                              @if(old('F6_municipioAlcaldia_clave'))
                                @foreach($declaracion->catalogo->inegiLocalidades(old('F6_entidadFederativa_clave'),old('F6_municipioAlcaldia_clave')) as $colonia)
                                  <option value="{{ $colonia->Nom_Loc }}"
                                    @if($colonia->Nom_Loc == old('F6_coloniaLocalidad'))
                                      selected
                                    @endif
                                  >
                                    {{ $colonia->Nom_Loc }}
                                  </option>
                                @endforeach
                              @endif
                            @else
                              @foreach($declaracion->catalogo->inegiLocalidades($declaracion->F6_entidadFederativa_clave,$declaracion->F6_municipioAlcaldia_clave) as $colonia)
                              <option value="{{ $colonia->Nom_Loc }}"
                                @if($colonia->Nom_Loc == $declaracion->F6_coloniaLocalidad)
                                  selected
                                @endif
                              >
                                {{ $colonia->Nom_Loc }}
                              </option>
                              @endforeach
                            @endif
                          </select>
                          @error('F6_coloniaLocalidad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F6_estadoProvincia">
                          <label for="F6_estadoProvincia">Estado/Provincia: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_estadoProvincia') is-invalid @enderror" id="F6_estadoProvincia" name="F6_estadoProvincia" placeholder="" value="@if(old('F6_estadoProvincia')){{ old('F6_estadoProvincia') }}@else{{ $declaracion->F6_estadoProvincia }}@endif" maxlength="65">
                          @error('F6_estadoProvincia')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F6_ciudadLocalidad">
                          <label for="F6_ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_ciudadLocalidad') is-invalid @enderror" id="F6_ciudadLocalidad" name="F6_ciudadLocalidad" placeholder="" value="@if(old('F6_ciudadLocalidad')){{ old('F6_ciudadLocalidad') }}@else{{ $declaracion->F6_ciudadLocalidad }}@endif" maxlength="65">
                          @error('F6_ciudadLocalidad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                          <label for="F6_calle">Calle:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_calle') is-invalid @enderror" id="F6_calle" name="F6_calle" placeholder="" value="@if(old('F6_calle')){{ old('F6_calle') }}@else{{ $declaracion->F6_calle }}@endif" maxlength="65">
                          @error('F6_calle')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_numeroExterior">Número Exterior:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_numeroExterior') is-invalid @enderror" id="F6_numeroExterior" name="F6_numeroExterior" placeholder="" value="@if(old('F6_numeroExterior')){{ old('F6_numeroExterior') }}@else{{ $declaracion->F6_numeroExterior }}@endif" maxlength="6">
                          @error('F6_numeroExterior')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_numeroInterior">Número Interior: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_numeroInterior') is-invalid @enderror" id="F6_numeroInterior" name="F6_numeroInterior" placeholder="" value="@if(old('F6_numeroInterior')){{ old('F6_numeroInterior') }}@else{{ $declaracion->F6_numeroInterior }}@endif" maxlength="6">
                          @error('F6_numeroInterior')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_codigoPostal">Código Postal:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_codigoPostal') is-invalid @enderror" id="F6_codigoPostal" name="F6_codigoPostal" placeholder="" value="@if(old('F6_codigoPostal')){{ old('F6_codigoPostal') }}@else{{ $declaracion->F6_codigoPostal }}@endif" maxlength="7">
                          @error('F6_codigoPostal')
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
                        <h4 class="mb-3">Actividad laboral de la pareja:</h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F6_actividadLaboral_clave">Sector en el que labora:</label>
                          <select class="form-control @error('F6_actividadLaboral_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_actividadLaboral_clave" name="F6_actividadLaboral_clave" >
                            @foreach($declaracion->catalogo->actividadLaboral() as $actividad)
                            <option value="{{ $actividad->clave }}"
                              @if(old('F6_actividadLaboral_clave') == $actividad->clave)
                                selected
                              @elseif($declaracion->F6_actividadLaboral_clave == $actividad->clave and old('F6_actividadLaboral_clave') == null)
                                @if($actividad->clave == $declaracion->F6_actividadLaboral_clave) selected @endif
                              @endif
                            >
                              {{ $actividad->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_actividadLaboral_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3 otr">
                          <label for="F6_especifiqueActividad">Especifique el sector 🌐 <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_especifiqueActividad') is-invalid @enderror" id="F6_especifiqueActividad" name="F6_especifiqueActividad" value="@if(old('F6_especifiqueActividad')){{ old('F6_especifiqueActividad') }}@endif" maxlength="65">
                          @error('F6_especifiqueActividad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </fieldset>

                    <p>&nbsp;</p>

                    <fieldset class="sector">
                      <legend>
                        <h4 class="mb-3">
                          Actividad en
                          <span class="pub">el sector público:</span>
                          <span class="prv">el sector privado:</span>
                          <span class="otr">otro sector:</span>
                        </h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-8 mb-3">
                          <label for="F6_actividadLaboral_nombreEnte">
                            <span class="pub">Nombre ente público:</span>
                            <span class="prv">Nombre empresa:</span>
                            <span class="otr">Nombre asociación:</span>
                            🌐 <code>*</code>
                          </label>

                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_actividadLaboral_nombreEnte') is-invalid @enderror" id="F6_actividadLaboral_nombreEnte" name="F6_actividadLaboral_nombreEnte" value="@if(old('F6_actividadLaboral_nombreEnte')){{ old('F6_actividadLaboral_nombreEnte') }}@else{{ $declaracion->F6_actividadLaboral_nombreEnte }}@endif" maxlength="65">
                          @error('F6_actividadLaboral_nombreEnte')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 pub" id="div_F6_actividadLaboral_nivelOrdenGobierno">
                          <label for="F6_actividadLaboral_nivelOrdenGobierno">Nivel de gobierno: <code>*</code></label>
                          <select class="form-control @error('F6_actividadLaboral_nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_actividadLaboral_nivelOrdenGobierno" name="F6_actividadLaboral_nivelOrdenGobierno" maxlength="65">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->nivelOrdenGobierno() as $nivel)
                            <option value="{{ $nivel->clave }}"
                              @if(old('F6_actividadLaboral_nivelOrdenGobierno') == $nivel->clave)
                                selected
                              @elseif($declaracion->F6_actividadLaboral_nivelOrdenGobierno == $nivel->clave and old('F6_actividadLaboral_nivelOrdenGobierno') == null)
                                @if($nivel->clave == $declaracion->F6_actividadLaboral_nivelOrdenGobierno) selected @endif
                              @endif
                              >
                              {{ $nivel->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_actividadLaboral_nivelOrdenGobierno')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 pub">
                          <label for="F6_actividadLaboral_ambitoPublico">Ámbito público: <code>*</code></label>
                          <select class="form-control @error('F6_actividadLaboral_ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_actividadLaboral_ambitoPublico" name="F6_actividadLaboral_ambitoPublico" >
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->ambitoPublico() as $ambito)
                            <option value="{{ $ambito->clave }}"
                              @if(old('F6_actividadLaboral_ambitoPublico') == $ambito->clave)
                                selected
                              @elseif($declaracion->F6_actividadLaboral_ambitoPublico == $ambito->clave and old('F6_actividadLaboral_ambitoPublico') == null)
                                @if($ambito->clave == $declaracion->F6_actividadLaboral_ambitoPublico) selected @endif
                              @endif
                              >
                              {{ $ambito->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_actividadLaboral_ambitoPublico')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 prv">
                          <label for="F6_actividadLaboral_rfc">RFC: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_actividadLaboral_rfc') is-invalid @enderror" id="F6_actividadLaboral_rfc" name="F6_actividadLaboral_rfc" value="@if(old('F6_actividadLaboral_rfc')){{ old('F6_actividadLaboral_rfc') }}@else{{ $declaracion->F6_actividadLaboral_rfc }}@endif" maxlength="12" minLength="12">
                          @error('F6_actividadLaboral_rfc')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_actividadLaboralSPub_area">Área: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_actividadLaboralSPub_area') is-invalid @enderror" id="F6_actividadLaboralSPub_area" name="F6_actividadLaboralSPub_area" value="@if(old('F6_actividadLaboralSPub_area')){{ old('F6_actividadLaboralSPub_area') }}@else{{ $declaracion->F6_actividadLaboralSPub_area }}@endif" maxlength="65" >
                          @error('F6_actividadLaboralSPub_area')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_actividadLaboralSPub_empleoCargoComision">Empleo: <code>*</code> </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_actividadLaboralSPub_empleoCargoComision') is-invalid @enderror" id="F6_actividadLaboralSPub_empleoCargoComision" name="F6_actividadLaboralSPub_empleoCargoComision" value="@if(old('F6_actividadLaboralSPub_empleoCargoComision')){{ old('F6_actividadLaboralSPub_empleoCargoComision') }}@else{{ $declaracion->F6_actividadLaboralSPub_empleoCargoComision }}@endif" maxlength="65" >
                          @error('F6_actividadLaboralSPub_empleoCargoComision')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 prv">
                          <label for="F6_sector_clave">Sector: <code>*</code></label>
                          <select class="form-control @error('F6_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_sector_clave" name="F6_sector_clave" >
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->sector() as $actividad)
                            <option value="{{ $actividad->clave }}"
                              @if(old('F6_sector_clave') == $actividad->clave)
                                selected
                              @elseif($declaracion->F6_sector_clave == $actividad->clave and old('F6_sector_clave') == null)
                                @if($actividad->clave == $declaracion->F6_sector_clave) selected @endif
                              @endif
                              >
                              {{ $actividad->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_sector_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_otro">
                          <label for="F6_otro">Otro sector: 🌐 <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_otro') is-invalid @enderror" id="F6_otro" name="F6_otro" value="@if(old('F6_otro')){{ old('F6_otro') }}@endif" max="65">
                          @error('F6_otro')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_actividadLaboralSPub_funcionPrincipal">Función principal: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_actividadLaboralSPub_funcionPrincipal') is-invalid @enderror" id="F6_actividadLaboralSPub_funcionPrincipal" name="F6_actividadLaboralSPub_funcionPrincipal" value="@if(old('F6_actividadLaboralSPub_funcionPrincipal')){{ old('F6_actividadLaboralSPub_funcionPrincipal') }}@else{{ $declaracion->F6_actividadLaboralSPub_funcionPrincipal }}@endif" maxlength="65">
                          @error('F6_actividadLaboralSPub_funcionPrincipal')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F6_fechaIngreso">Fecha Ingreso: <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F6_fechaIngreso') is-invalid @enderror" id="F6_fechaIngreso" name="F6_fechaIngreso" value="@if(old('F6_fechaIngreso')){{ old('F6_fechaIngreso') }}@else{{ $declaracion->F6_fechaIngreso }}@endif">
                          @error('F6_fechaIngreso')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 prv">
                          <label for="F6_proveedorContratistaGobierno">Proveedor de gobierno: <code>*</code></label>
                          <select class="form-control @error('F6_proveedorContratistaGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_proveedorContratistaGobierno" name="F6_proveedorContratistaGobierno" >
                            <option value="">Seleccione...</option>
                            <option value="0"
                            @if(old('F6_proveedorContratistaGobierno') == "0")
                              selected
                            @elseif($declaracion->F6_proveedorContratistaGobierno == "0" and old('F6_proveedorContratistaGobierno') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F6_proveedorContratistaGobierno') == "1")
                              selected
                            @elseif($declaracion->F6_proveedorContratistaGobierno == "1" and old('F6_proveedorContratistaGobierno') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F6_proveedorContratistaGobierno')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <p>&nbsp;</p>
                    </fieldset>

                    <fieldset class="sector">
                      <legend>
                        <h4 class="mb-3">Ingresos de la pareja:</h4>
                      </legend>
                      <div class="row">
                        <label for="F6_salarioMensualNeto_valor" class="col-sm-4 col-form-label">
                          Salario mensual neto <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F6_salarioMensualNeto_valor') is-invalid @enderror" id="F6_salarioMensualNeto_valor" name="F6_salarioMensualNeto_valor" @if(old('F6_salarioMensualNeto_valor')) value="@money(old('F6_salarioMensualNeto_valor'))" @else value="@money($declaracion->F6_salarioMensualNeto_valor)" @endif maxlength="20" style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('F6_salarioMensualNeto_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('F6_salarioMensualNeto_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F6_salarioMensualNeto_moneda" name="F6_salarioMensualNeto_moneda">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $moneda)
                            <option value="{{ $moneda->clave }}"
                              @if(old('F6_salarioMensualNeto_moneda') == $moneda->clave)
                                selected
                              @elseif($declaracion->F6_salarioMensualNeto_moneda == $moneda->clave and old('F6_salarioMensualNeto_moneda') == null)
                                selected
                              @elseif(old('F6_salarioMensualNeto_moneda') == null and $declaracion->F6_salarioMensualNeto_moneda == null)
                                @if($moneda->default == true) selected @endif
                              @endif
                            >
                            {{ $moneda->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('F6_salarioMensualNeto_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <p>&nbsp;</p>

                    </fieldset>
                  </div>

                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          <label for="F6_aclaracionesObservaciones">
                            Aclaraciones / Observaciones:
                          </label>
                        </h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <textarea tabindex="{{ ++$tabindex }}" class="form-control" id="F6_aclaracionesObservaciones" rows="7" name="F6_aclaracionesObservaciones" placeholder="">@if(old('F6_aclaracionesObservaciones')){{ old('F6_aclaracionesObservaciones') }}@else{{ $declaracion->F6_aclaracionesObservaciones }}@endif</textarea>
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

$(document).ready(function(){

  $("#F6_ninguno").ready(mostrar_fields);
  $("#F6_ninguno").change(mostrar_fields);

  function mostrar_fields()
  {
    if($("#F6_ninguno").is(':checked'))
    {
      $('#form').hide();
      $("#F6_nombres").removeAttr("required");
      $("#F6_primerApellido").removeAttr("required");
      $("#F6_fechaNacimiento").removeAttr("required");
      $("#F6_curp").removeAttr("required");
      $("#F6_rfc").removeAttr("required");
      $("#F6_relacionConDeclarante").removeAttr("required");
      $("#F6_esDependienteEconomico").removeAttr("required");
      $("#F6_ciudadanoExtranjero").removeAttr("required");
      $("#F6_habitaDomicilioDeclarante").removeAttr("required");

      $("#F6_lugarDondeReside").removeAttr("required");
      $("#F6_lugarDondeReside").removeAttr("name");

      $("#F6_pais").removeAttr("required");

      $("#F6_entidadFederativa_clave").removeAttr("required");
      $("#F6_municipioAlcaldia_clave").removeAttr("required");
      $("#F6_coloniaLocalidad").removeAttr("required");

      $("#F6_estadoProvincia").removeAttr("required");
      $("#F6_ciudadLocalidad").removeAttr("required");

      $("#F6_calle").removeAttr("required");
      $("#F6_numeroExterior").removeAttr("required");
      $("#F6_codigoPostal").removeAttr("required");

      $('#F6_actividadLaboral_clave').removeAttr('required');
      $('#F6_especifiqueActividad').removeAttr('required');

      $('#F6_actividadLaboral_nombreEnte').removeAttr('required');
      $('#F6_actividadLaboralSPub_area').removeAttr('required');
      $('#F6_actividadLaboralSPub_empleoCargoComision').removeAttr('required');
      $('#F6_actividadLaboralSPub_funcionPrincipal').removeAttr("required");
      $('#F6_fechaIngreso').removeAttr("required");

      $('#F6_actividadLaboral_ambitoPublico').removeAttr('required');
      $('#F6_actividadLaboral_nivelOrdenGobierno').removeAttr("required");

      $('#F6_actividadLaboral_rfc').removeAttr('required');
      $('#F6_sector_clave').removeAttr('required');
      $("#F6_otro").removeAttr("required");
      $('#F6_proveedorContratistaGobierno').removeAttr('required');

      $('#F6_salarioMensualNeto_valor').removeAttr('required');
      $('#F6_salarioMensualNeto_moneda').removeAttr('required');
    }
    else
    {
      $('#form').show();
      $("#F6_nombres").attr("required", "required");
      $("#F6_primerApellido").attr("required", "required");
      $("#F6_fechaNacimiento").attr("required", "required");
      $("#F6_curp").attr("required", "required");
      $("#F6_rfc").attr("required", "required");
      $("#F6_relacionConDeclarante").attr("required", "required");
      $("#F6_esDependienteEconomico").attr("required", "required");
      $("#F6_ciudadanoExtranjero").attr("required", "required");
      $("#F6_habitaDomicilioDeclarante").attr("required", "required");

      $("#F6_lugarDondeReside").ready(mostrar_domicilio);
      $("#F6_lugarDondeReside").change(mostrar_domicilio);

      $("#F6_actividadLaboral_clave").ready(ambito);
      $("#F6_actividadLaboral_clave").change(ambito);

      $("#F6_sector_clave").ready(otro);
      $("#F6_sector_clave").change(otro);
    }
  }



  function ambito()
  {
    var ambitoValue = $("#F6_actividadLaboral_clave").val();

    if(ambitoValue == "PRI")
    {
      $('.sector').show();
      $('.prv').show();
      $('.pub').hide();
      $('.otr').hide();

      $('#F6_actividadLaboral_nombreEnte').attr('required',"required");
      $('#F6_actividadLaboralSPub_area').attr('required',"required");
      $('#F6_actividadLaboralSPub_empleoCargoComision').attr('required',"required");
      $('#F6_actividadLaboralSPub_funcionPrincipal').attr('required',"required");
      $('#F6_fechaIngreso').attr('required',"required");

      $('#F6_especifiqueActividad').removeAttr('required');

      $('#F6_actividadLaboral_rfc').attr('required',"required");
      $('#F6_sector_clave').attr('required',"required");
      $('#F6_proveedorContratistaGobierno').attr('required',"required");

      $('#F6_actividadLaboral_nivelOrdenGobierno').removeAttr('required');
      $('#F6_actividadLaboral_ambitoPublico').removeAttr('required');

      $('#F6_salarioMensualNeto_valor').attr('required',"required");
      $('#F6_salarioMensualNeto_moneda').attr('required',"required");
    }
    if(ambitoValue == "PUB")
    {
      $('.sector').show();
      $('.prv').hide();
      $('.pub').show();
      $('.otr').hide();

      $('#F6_actividadLaboral_nombreEnte').attr('required',"required");
      $('#F6_actividadLaboralSPub_area').attr('required',"required");
      $('#F6_actividadLaboralSPub_empleoCargoComision').attr('required',"required");
      $('#F6_actividadLaboralSPub_funcionPrincipal').attr('required',"required");
      $('#F6_fechaIngreso').attr('required',"required");

      $('#F6_especifiqueActividad').removeAttr('required');

      $('#F6_actividadLaboral_nivelOrdenGobierno').attr('required',"required");
      $('#F6_actividadLaboral_ambitoPublico').attr('required',"required");

      $('#F6_actividadLaboral_rfc').removeAttr('required');
      $('#F6_sector_clave').removeAttr('required');
      $('#F6_proveedorContratistaGobierno').removeAttr('required');

      $('#F6_salarioMensualNeto_valor').attr('required',"required");
      $('#F6_salarioMensualNeto_moneda').attr('required',"required");
    }
    if(ambitoValue == "OTRO")
    {
      $('.sector').show();
      $('.prv').hide();
      $('.pub').hide();
      $('.otr').show();

      $('#F6_actividadLaboral_nombreEnte').attr('required',"required");
      $('#F6_actividadLaboralSPub_area').attr('required',"required");
      $('#F6_actividadLaboralSPub_empleoCargoComision').attr('required',"required");
      $('#F6_actividadLaboralSPub_funcionPrincipal').attr('required',"required");
      $('#F6_fechaIngreso').attr('required',"required");

      $('#F6_especifiqueActividad').attr('required',"required");

      $('#F6_actividadLaboral_rfc').removeAttr('required');
      $('#F6_sector_clave').removeAttr('required');
      $('#F6_proveedorContratistaGobierno').removeAttr('required');

      $('#F6_actividadLaboral_nivelOrdenGobierno').removeAttr("required");
      $('#F6_actividadLaboral_ambitoPublico').removeAttr('required');

      $('#F6_salarioMensualNeto_valor').attr('required',"required");
      $('#F6_salarioMensualNeto_moneda').attr('required',"required");
    }
    if(ambitoValue == "NIN")
    {
      $('.sector').hide();
      $('.otr').hide();

      $('#F6_actividadLaboral_nombreEnte').removeAttr('required');
      $('#F6_actividadLaboralSPub_area').removeAttr('required');
      $('#F6_actividadLaboralSPub_empleoCargoComision').removeAttr('required');
      $('#F6_actividadLaboralSPub_funcionPrincipal').removeAttr("required");
      $('#F6_fechaIngreso').removeAttr("required");

      $('#F6_especifiqueActividad').removeAttr('required');

      $('#F6_actividadLaboral_ambitoPublico').removeAttr('required');
      $('#F6_actividadLaboral_nivelOrdenGobierno').removeAttr("required");

      $('#F6_actividadLaboral_rfc').removeAttr('required');
      $('#F6_sector_clave').removeAttr('required');
      $('#F6_proveedorContratistaGobierno').removeAttr('required');

      $('#F6_salarioMensualNeto_valor').removeAttr('required');
      $('#F6_salarioMensualNeto_moneda').removeAttr('required');
    }
  }



  function mostrar_domicilio()
  {
    if($("#F6_lugarDondeReside").is(':checked'))
    {
      $('#domicilio').hide();

      $("#F6_pais").removeAttr("name");

      $("#F6_entidadFederativa_clave").removeAttr("required");
      $("#F6_municipioAlcaldia_clave").removeAttr("required");
      $("#F6_coloniaLocalidad").removeAttr("required");

      $("#F6_estadoProvincia").removeAttr("required");
      $("#F6_ciudadLocalidad").removeAttr("required");

      $("#F6_calle").removeAttr("required");
      $("#F6_numeroExterior").removeAttr("required");
      $("#F6_codigoPostal").removeAttr("required");
    }
    else
    {
      $('#domicilio').show();

      $("#F6_pais").attr("name","F6_pais");

      $("#F6_pais").attr("required", "required");
      $("#F6_calle").attr("required", "required");
      $("#F6_numeroExterior").attr("required", "required");
      $("#F6_codigoPostal").attr("required", "required");

      $("#F6_pais").ready(mostrar_pais);
      $("#F6_pais").change(mostrar_pais);
    }
  }



  function otro()
  {
    var sectorValue = $("#F6_sector_clave").val();

    if(sectorValue == "OTRO")
    {
      $('#div_otro').show();
      $("#F6_otro").attr("required", "required");
    }
    else
    {
      $('#div_otro').hide();
      $("#F6_otro").removeAttr("required");
    }
  }



  function mostrar_pais()
  {
    var paisValue = $("#F6_pais").val();

    if($("#F6_ninguno").not(':checked'))
    {
      if($("#F6_lugarDondeReside").not(':checked'))
      {
        $('#F6_pais').attr("name","F6_pais");

        if(paisValue == "MX")
        {
          $('#div_F6_entidadFederativa_clave').show();
          $('#div_F6_municipioAlcaldia_clave').show();
          $('#div_F6_coloniaLocalidad').show();

          $('#div_F6_estadoProvincia').hide();
          $('#div_F6_ciudadLocalidad').hide();

          $('#F6_entidadFederativa_clave').attr("required","required");
          $('#F6_municipioAlcaldia_clave').attr("required","required");
          $('#F6_coloniaLocalidad').attr("required","required");
          $('#F6_codigoPostal').attr("readonly","readonly");
        }
        else
        {
          $('#div_F6_entidadFederativa_clave').hide();
          $('#div_F6_municipioAlcaldia_clave').hide();
          $('#div_F6_coloniaLocalidad').hide();

          $("#F6_entidadFederativa_clave").removeAttr("required");
          $('#F6_municipioAlcaldia_clave').removeAttr("required");
          $('#F6_coloniaLocalidad').removeAttr("required");

          $('#div_F6_estadoProvincia').show();
          $('#div_F6_ciudadLocalidad').show();

          $('#F6_estadoProvincia').attr("required","required");
          $('#F6_ciudadLocalidad').attr("required","required");

          $('#F6_codigoPostal').removeAttr("readonly");
          $('#F6_codigoPostal').attr("maxlength","13");
        }
      }
      else
      {
        if($("#F6_lugarDondeReside").is(':checked'))
        {
          $('#F6_pais').removeAttr("name");
        }
      }
    }
  }




  $("#F6_entidadFederativa_clave").change(mostrar_alcaldias);
  $("#F6_municipioAlcaldia_clave").change(mostrar_localidades);
  $("#F6_coloniaLocalidad").change(mostrar_cp);

  function mostrar_alcaldias()
  {
    var entidadValue = $("#F6_entidadFederativa_clave").val();

    $('#F6_municipioAlcaldia_clave').find('option').not(':first').remove();

    $.ajax({
      url: '../../../../catalogo/getAlcaldias/'+entidadValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {
          for(var i=0; i<len; i++)
          {
            var id = response[i].Cve_Mun;
            var nombre = response[i].Nom_Mun;
            var entidad = response[i].Cve_Ent;
            var option = "<option value='"+id+"'>"+nombre+"</option>";

            $("#F6_municipioAlcaldia_clave").append(option);
            $('#F6_coloniaLocalidad').find('option').not(':first').remove();
          }
        }
      }
    });
  };

  function mostrar_localidades()
  {
    var entidadValue = $("#F6_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F6_municipioAlcaldia_clave").val();

    $('#coloniaLocalidad').find('option').not(':first').remove();

    $.ajax({
      url: '../../../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {
          for(var i=0; i<len; i++)
          {
            var nombre = response[i].Nom_Loc;
            var option = "<option value='"+nombre+"'>"+nombre+"</option>";
            $("#F6_coloniaLocalidad").append(option);
          }
        }
      }
    });
  }

  function mostrar_cp()
  {
    var entidadValue = $("#F6_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F6_municipioAlcaldia_clave").val();
    var localidadValue = $("#F6_coloniaLocalidad").val();

    $.ajax({
      url: '../../../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {
          for(var i=0; i<len; i++)
          {
            var cp = response[i].CP;
            $("#F6_codigoPostal").val(cp);
            $("#F6_codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }


});

@endsection
