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
              DATOS DEL DEPENDIENTE ECONÓMICO
              <br>
              <small></small>
            </h4>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-12 order-md-1">
                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="F7_tipoOperacion" type="hidden" value="{{$declaracion->F7_tipoOperacion }}">

                  <div id="form">
                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          Datos generales de la persona:
                        </h4>
                      </legend>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="F7_nombres">Nombre(s): <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('F7_nombres') is-invalid @enderror" id="F7_nombres" name="F7_nombres" value="@if(old('F7_nombres')){{ old('F7_nombres') }}@else{{ $declaracion->F7_nombres }}@endif" maxlength="65" required="required">
                          @error('F7_nombres')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_primerApellido">Primer apellido: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_primerApellido') is-invalid @enderror" id="F7_primerApellido" name="F7_primerApellido" placeholder="" value="@if(old('F7_primerApellido')){{ old('F7_primerApellido') }}@else{{ $declaracion->F7_primerApellido }}@endif" maxlength="65" required="required">
                          @error('F7_primerApellido')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_segundoApellido">Segundo apellido: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_segundoApellido') is-invalid @enderror" id="F7_segundoApellido" name="F7_segundoApellido" placeholder="" value="@if(old('F7_segundoApellido')){{ old('F7_segundoApellido') }}@else{{ $declaracion->F7_segundoApellido }}@endif" maxlength="65">
                          @error('F7_segundoApellido')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="F7_fechaNacimiento">Fecha de Nacimiento: <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_fechaNacimiento') is-invalid @enderror" id="F7_fechaNacimiento" name="F7_fechaNacimiento" value="@if(old('F7_fechaNacimiento')){{ old('F7_fechaNacimiento') }}@else{{ $declaracion->F7_fechaNacimiento }}@endif" required="required">
                          @error('F7_fechaNacimiento')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="F7_curp">CURP:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_curp') is-invalid @enderror" id="F7_curp" name="F7_curp" placeholder="(opcional)" value="@if(old('F7_curp')){{ old('F7_curp') }}@else{{ $declaracion->F7_curp }}@endif" maxlength="18" minLength="18">
                          @error('F7_curp')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="F7_rfc">RFC: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_rfc') is-invalid @enderror" id="F7_rfc" name="F7_rfc" placeholder="" value="@if(old('F7_rfc')){{ old('F7_rfc') }}@else{{ $declaracion->F7_rfc }}@endif" maxlength="13" minLength="12" required="required">
                          @error('F7_rfc')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F7_relacionConDeclarante">Relación con el declarante: <code>*</code></label>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F7_relacionConDeclarante') is-invalid @enderror" id="F7_relacionConDeclarante" name="F7_relacionConDeclarante" required="required">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->parentescorelacion() as $parentesco)
                            <option value="{{ $parentesco->clave }}"
                              @if(old('F7_relacionConDeclarante') == $parentesco->clave)
                                selected
                              @elseif($declaracion->F7_relacionConDeclarante == $parentesco->clave and old('F7_relacionConDeclarante') == null)
                                selected
                              @endif
                            >
                              {{ $parentesco->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_relacionConDeclarante')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="F7_esDependienteEconomico">¿Es dependiente económico? <code>*</code></label>
                          <select class="form-control @error('F7_esDependienteEconomico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_esDependienteEconomico" name="F7_esDependienteEconomico">
                            <option value="0"
                            @if(old('F7_esDependienteEconomico') == "0")
                              selected
                            @elseif($declaracion->F7_esDependienteEconomico == "0" and old('F7_esDependienteEconomico') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F7_esDependienteEconomico') == "1")
                              selected
                            @elseif($declaracion->F7_esDependienteEconomico == "1" and old('F7_esDependienteEconomico') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F7_esDependienteEconomico')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F7_ciudadanoExtranjero">¿Es ciudadano extranjero? <code>*</code></label>
                          <select class="form-control @error('F7_ciudadanoExtranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_ciudadanoExtranjero" name="F7_ciudadanoExtranjero">
                            <option value="0"
                            @if(old('F7_ciudadanoExtranjero') == "0")
                              selected
                            @elseif($declaracion->F7_ciudadanoExtranjero == "0" and old('F7_ciudadanoExtranjero') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F7_ciudadanoExtranjero') == "1")
                              selected
                            @elseif($declaracion->F7_ciudadanoExtranjero == "1" and old('F7_ciudadanoExtranjero') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F7_ciudadanoExtranjero')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="F7_habitaDomicilioDeclarante">¿Habita en el domicilio del declarante? <code>*</code></label>
                          <select class="form-control @error('F7_habitaDomicilioDeclarante') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_habitaDomicilioDeclarante" name="F7_habitaDomicilioDeclarante">
                            <option value="0"
                            @if(old('F7_habitaDomicilioDeclarante') == "0")
                              selected
                            @elseif($declaracion->F7_habitaDomicilioDeclarante == "0" and old('F7_habitaDomicilioDeclarante') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F7_habitaDomicilioDeclarante') == "1")
                              selected
                            @elseif($declaracion->F7_habitaDomicilioDeclarante == "1" and old('F7_habitaDomicilioDeclarante') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F7_habitaDomicilioDeclarante')
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
                        <h4 class="mb-3">Domicilio del dependiente económico:</h4>
                      </legend>
                      <div class="row">
                        <label for="F7_lugarDondeReside" class="col-sm-12 col-form-label">
                          <input type="checkbox" tabindex="{{ ++$tabindex }}" value="SE_DESCONOCE" class="form-control @error('F7_lugarDondeReside') is-invalid @enderror" name="F7_lugarDondeReside" id="F7_lugarDondeReside" @if($declaracion->F7_lugarDondeReside == "SE_DESCONOCE" or old('F7_lugarDondeReside') == "SE_DESCONOCE") checked  @endif>
                          Mantener privado el domicilio de mi pareja
                          <input type="hidden" id="F7_lugarDondeReside_hidden">
                          @error('F7_lugarDondeReside')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </label>
                      </div>

                      <div class="row" id="domicilio" style="margin-top:20px;">
                        <div class="col-md-4 mb-3">
                          <label for="F7_pais">¿Dónde radica?:</label>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F7_pais') is-invalid @enderror" id="F7_pais" name="F7_pais">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}"
                              @if(old('F7_pais') == $pais->ISO2)
                              selected
                              @elseif($declaracion->F7_pais == $pais->ISO2 and old('F7_pais') == null)
                              selected
                              @elseif(old('F7_pais') == null and $declaracion->F7_pais == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_pais')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F7_entidadFederativa_clave">
                          <label for="F7_entidadFederativa_clave">Estado:</label>
                          <select class="form-control @error('F7_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_entidadFederativa_clave" name="F7_entidadFederativa_clave">
                            <option value="">Seleccionar:</option>
                            @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                            <option value="{{ $entidad->Cve_Ent }}"
                              @if($entidad->Cve_Ent == old('F7_entidadFederativa_clave'))
                                selected
                              @else
                                @if($entidad->Cve_Ent == $declaracion->F7_entidadFederativa_clave and empty(old('F7_entidadFederativa_clave')))
                                  selected
                                @else
                              @endif
                            @endif
                            >
                              {{ $entidad->Nom_Ent }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_entidadFederativa_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F7_municipioAlcaldia_clave">
                          <label for="F7_municipioAlcaldia_clave">Municipio/Alcaldía:</label>
                          <select class="form-control @error('F7_municipioAlcaldia_clave') is-invalid @enderror" id="F7_municipioAlcaldia_clave" name="F7_municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                            <option value="">Seleccionar:</option>
                            @if(old('F7_entidadFederativa_clave'))
                              @foreach($declaracion->catalogo->inegiAlcaldias(old('F7_entidadFederativa_clave')) as $alcaldia)
                              <option value="{{ $alcaldia->Cve_Mun }}"
                                @if($alcaldia->Cve_Mun == old('F7_municipioAlcaldia_clave'))
                                  selected
                                @endif
                              >
                                {{ $alcaldia->Nom_Mun }}
                              </option>
                              @endforeach
                            @else
                              @foreach($declaracion->catalogo->inegiAlcaldias($declaracion->F7_entidadFederativa_clave) as $alcaldia)
                                <option value="{{ $alcaldia->Cve_Mun }}"
                                  @if($alcaldia->Cve_Mun == $declaracion->F7_municipioAlcaldia_clave)
                                    selected
                                  @endif
                                >
                                  {{ $alcaldia->Nom_Mun }}
                                </option>
                              @endforeach
                            @endif
                          </select>
                          @error('F7_municipioAlcaldia_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F7_coloniaLocalidad">
                          <label for="F7_coloniaLocalidad">Colonia o Localidad:</label>
                          <select class="form-control @error('F7_coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_coloniaLocalidad" name="F7_coloniaLocalidad">
                            <option value="">Seleccionar:</option>
                            @if(old('F7_entidadFederativa_clave'))
                              @if(old('F7_municipioAlcaldia_clave'))
                                @foreach($declaracion->catalogo->inegiLocalidades(old('F7_entidadFederativa_clave'),old('F7_municipioAlcaldia_clave')) as $colonia)
                                  <option value="{{ $colonia->Nom_Loc }}"
                                    @if($colonia->Nom_Loc == old('F7_coloniaLocalidad'))
                                      selected
                                    @endif
                                  >
                                    {{ $colonia->Nom_Loc }}
                                  </option>
                                @endforeach
                              @endif
                            @else
                              @foreach($declaracion->catalogo->inegiLocalidades($declaracion->F7_entidadFederativa_clave,$declaracion->F7_municipioAlcaldia_clave) as $colonia)
                              <option value="{{ $colonia->Nom_Loc }}"
                                @if($colonia->Nom_Loc == $declaracion->F7_coloniaLocalidad)
                                  selected
                                @endif
                              >
                                {{ $colonia->Nom_Loc }}
                              </option>
                              @endforeach
                            @endif
                          </select>
                          @error('F7_coloniaLocalidad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F7_estadoProvincia">
                          <label for="F7_estadoProvincia">Estado/Provincia: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_estadoProvincia') is-invalid @enderror" id="F7_estadoProvincia" name="F7_estadoProvincia" placeholder="" value="@if(old('F7_estadoProvincia')){{ old('F7_estadoProvincia') }}@else{{ $declaracion->F7_estadoProvincia }}@endif" maxlength="65">
                          @error('F7_estadoProvincia')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F7_ciudadLocalidad">
                          <label for="F7_ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_ciudadLocalidad') is-invalid @enderror" id="F7_ciudadLocalidad" name="F7_ciudadLocalidad" placeholder="" value="@if(old('F7_ciudadLocalidad')){{ old('F7_ciudadLocalidad') }}@else{{ $declaracion->F7_ciudadLocalidad }}@endif" maxlength="65">
                          @error('F7_ciudadLocalidad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                          <label for="F7_calle">Calle:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_calle') is-invalid @enderror" id="F7_calle" name="F7_calle" placeholder="" value="@if(old('F7_calle')){{ old('F7_calle') }}@else{{ $declaracion->F7_calle }}@endif" maxlength="65">
                          @error('F7_calle')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_numeroExterior">Número Exterior:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_numeroExterior') is-invalid @enderror" id="F7_numeroExterior" name="F7_numeroExterior" placeholder="" value="@if(old('F7_numeroExterior')){{ old('F7_numeroExterior') }}@else{{ $declaracion->F7_numeroExterior }}@endif" maxlength="6">
                          @error('F7_numeroExterior')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_numeroInterior">Número Interior: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_numeroInterior') is-invalid @enderror" id="F7_numeroInterior" name="F7_numeroInterior" placeholder="" value="@if(old('F7_numeroInterior')){{ old('F7_numeroInterior') }}@else{{ $declaracion->F7_numeroInterior }}@endif" maxlength="6">
                          @error('F7_numeroInterior')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_codigoPostal">Código Postal:</label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_codigoPostal') is-invalid @enderror" id="F7_codigoPostal" name="F7_codigoPostal" placeholder="" value="@if(old('F7_codigoPostal')){{ old('F7_codigoPostal') }}@else{{ $declaracion->F7_codigoPostal }}@endif" maxlength="7">
                          @error('F7_codigoPostal')
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
                        <h4 class="mb-3">Actividad laboral del dependiente económico:</h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F7_actividadLaboral_clave">Sector en el que labora:</label>
                          <select class="form-control @error('F7_actividadLaboral_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_actividadLaboral_clave" name="F7_actividadLaboral_clave" >
                            @foreach($declaracion->catalogo->actividadLaboral() as $actividad)
                            <option value="{{ $actividad->clave }}"
                              @if(old('F7_actividadLaboral_clave') == $actividad->clave)
                                selected
                              @elseif($declaracion->F7_actividadLaboral_clave == $actividad->clave and old('F7_actividadLaboral_clave') == null)
                                @if($actividad->clave == $declaracion->F7_actividadLaboral_clave) selected @endif
                              @endif
                              >
                              {{ $actividad->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_actividadLaboral_clave')
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
                        <h4 class="mb-3">Sector <span class="prv">privado</span><span class="pub">público</span><span class="otr">social</span>:</h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-8 mb-3">
                          <label for="F7_actividadLaboral_nombreEnte">Nombre ente público: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_actividadLaboral_nombreEnte') is-invalid @enderror" id="F7_actividadLaboral_nombreEnte" name="F7_actividadLaboral_nombreEnte" value="@if(old('F7_actividadLaboral_nombreEnte')){{ old('F7_actividadLaboral_nombreEnte') }}@else{{ $declaracion->F7_actividadLaboral_nombreEnte }}@endif" required maxlength="65">
                          @error('F7_actividadLaboral_nombreEnte')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 pub" id="div_F7_actividadLaboral_nivelOrdenGobierno">
                          <label for="F7_actividadLaboral_nivelOrdenGobierno">Nivel de gobierno: <code>*</code></label>
                          <select class="form-control @error('F7_actividadLaboral_nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_actividadLaboral_nivelOrdenGobierno" name="F7_actividadLaboral_nivelOrdenGobierno" maxlength="65">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->nivelOrdenGobierno() as $nivel)
                            <option value="{{ $nivel->clave }}"
                              @if(old('F7_actividadLaboral_nivelOrdenGobierno') == $nivel->clave)
                                selected
                              @elseif($declaracion->F7_actividadLaboral_nivelOrdenGobierno == $nivel->clave and old('F7_actividadLaboral_nivelOrdenGobierno') == null)
                                @if($nivel->clave == $declaracion->F7_actividadLaboral_nivelOrdenGobierno) selected @endif
                              @endif
                              >
                              {{ $nivel->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_actividadLaboral_nivelOrdenGobierno')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 pub">
                          <label for="F7_actividadLaboral_ambitoPublico">Ámbito público: <code>*</code></label>
                          <select class="form-control @error('F7_actividadLaboral_ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_actividadLaboral_ambitoPublico" name="F7_actividadLaboral_ambitoPublico" >
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->ambitoPublico() as $ambito)
                            <option value="{{ $ambito->clave }}"
                              @if(old('F7_actividadLaboral_ambitoPublico') == $ambito->clave)
                                selected
                              @elseif($declaracion->F7_actividadLaboral_ambitoPublico == $ambito->clave and old('F7_actividadLaboral_ambitoPublico') == null)
                                @if($ambito->clave == $declaracion->F7_actividadLaboral_ambitoPublico) selected @endif
                              @endif
                              >
                              {{ $ambito->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_actividadLaboral_ambitoPublico')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 prv">
                          <label for="F7_actividadLaboral_rfc">RFC: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_actividadLaboral_rfc') is-invalid @enderror" id="F7_actividadLaboral_rfc" name="F7_actividadLaboral_rfc" value="@if(old('F7_actividadLaboral_rfc')){{ old('F7_actividadLaboral_rfc') }}@else{{ $declaracion->F7_actividadLaboral_rfc }}@endif" maxlength="12" minLength="12">
                          @error('F7_actividadLaboral_rfc')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_actividadLaboralSPub_area">Área: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_actividadLaboralSPub_area') is-invalid @enderror" id="F7_actividadLaboralSPub_area" name="F7_actividadLaboralSPub_area" value="@if(old('F7_actividadLaboralSPub_area')){{ old('F7_actividadLaboralSPub_area') }}@else{{ $declaracion->F7_actividadLaboralSPub_area }}@endif" maxlength="65" required>
                          @error('F7_actividadLaboralSPub_area')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_actividadLaboralSPub_empleoCargoComision">Empleo: <code>*</code> </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_actividadLaboralSPub_empleoCargoComision') is-invalid @enderror" id="F7_actividadLaboralSPub_empleoCargoComision" name="F7_actividadLaboralSPub_empleoCargoComision" value="@if(old('F7_actividadLaboralSPub_empleoCargoComision')){{ old('F7_actividadLaboralSPub_empleoCargoComision') }}@else{{ $declaracion->F7_actividadLaboralSPub_empleoCargoComision }}@endif" maxlength="65" required>
                          @error('F7_actividadLaboralSPub_empleoCargoComision')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 prv">
                          <label for="F7_sector_clave">Sector: <code>*</code></label>
                          <select class="form-control @error('F7_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_sector_clave" name="F7_sector_clave" >
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->sector() as $actividad)
                            <option value="{{ $actividad->clave }}"
                              @if(old('F7_sector_clave') == $actividad->clave)
                                selected
                              @elseif($declaracion->F7_sector_clave == $actividad->clave and old('F7_sector_clave') == null)
                                @if($actividad->clave == $declaracion->F7_sector_clave) selected @endif
                              @endif
                              >
                              {{ $actividad->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_sector_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_actividadLaboralSPub_funcionPrincipal">Función principal: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_actividadLaboralSPub_funcionPrincipal') is-invalid @enderror" id="F7_actividadLaboralSPub_funcionPrincipal" name="F7_actividadLaboralSPub_funcionPrincipal" value="@if(old('F7_actividadLaboralSPub_funcionPrincipal')){{ old('F7_actividadLaboralSPub_funcionPrincipal') }}@else{{ $declaracion->F7_actividadLaboralSPub_funcionPrincipal }}@endif" required maxlength="65">
                          @error('F7_actividadLaboralSPub_funcionPrincipal')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="F7_fechaIngreso">Fecha Ingreso: <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F7_fechaIngreso') is-invalid @enderror" id="F7_fechaIngreso" name="F7_fechaIngreso" value="@if(old('F7_fechaIngreso')){{ old('F7_fechaIngreso') }}@else{{ $declaracion->F7_fechaIngreso }}@endif" required>
                          @error('F7_fechaIngreso')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3 prv">
                          <label for="F7_proveedorContratistaGobierno">Proveedor de gobierno: <code>*</code></label>
                          <select class="form-control @error('F7_proveedorContratistaGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_proveedorContratistaGobierno" name="F7_proveedorContratistaGobierno" >
                            <option value="">Seleccione...</option>
                            <option value="0"
                            @if(old('F7_proveedorContratistaGobierno') == "0")
                              selected
                            @elseif($declaracion->F7_proveedorContratistaGobierno == "0" and old('F7_proveedorContratistaGobierno') == null)
                              selected
                            @endif
                            >NO</option>
                            <option value="1"
                            @if(old('F7_proveedorContratistaGobierno') == "1")
                              selected
                            @elseif($declaracion->F7_proveedorContratistaGobierno == "1" and old('F7_proveedorContratistaGobierno') == null)
                              selected
                            @endif
                            >SÍ</option>
                          </select>
                          @error('F7_proveedorContratistaGobierno')
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
                        <label for="F7_salarioMensualNeto_valor" class="col-sm-4 col-form-label">
                          Salario mensual neto <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F7_salarioMensualNeto_valor') is-invalid @enderror" id="F7_salarioMensualNeto_valor" name="F7_salarioMensualNeto_valor" @if(old('F7_salarioMensualNeto_valor')) value="@money(old('F7_salarioMensualNeto_valor'))" @else value="@money($declaracion->F7_salarioMensualNeto_valor)" @endif maxlength="20" style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('F7_salarioMensualNeto_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('F7_salarioMensualNeto_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F7_salarioMensualNeto_moneda" name="F7_salarioMensualNeto_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $moneda)
                            <option value="{{ $moneda->clave }}"
                              @if(old('F7_salarioMensualNeto_moneda') == $moneda->clave)
                                selected
                              @elseif($declaracion->F7_salarioMensualNeto_moneda == $moneda->clave and old('F7_salarioMensualNeto_moneda') == null)
                                selected
                              @elseif(old('F7_salarioMensualNeto_moneda') == null and $declaracion->F7_salarioMensualNeto_moneda == null)
                                @if($moneda->default == true) selected @endif
                              @endif
                            >
                            {{ $moneda->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('F7_salarioMensualNeto_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <p>&nbsp;</p>

                    </fieldset>
                  </div>

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

  $("#F7_lugarDondeReside").ready(mostrar_domc);
  $("#F7_lugarDondeReside").change(mostrar_domc);

  function mostrar_domc()
  {
    var paisValue = $("#F7_pais").val();

    if($("#F7_lugarDondeReside").is(':checked'))
    {
      $('#domicilio').hide();
      $("#F7_salarioMensualNeto_moneda").removeAttr("required");
    }
    else
    {
      $('#domicilio').show();
      $("#F7_salarioMensualNeto_moneda").attr("required","required");
      $('#F7_lugarDondeReside_hidden').removeAttr('value');

      $('#F7_lugarDondeReside_hidden').attr('name',"F7_lugarDondeReside");

      if(paisValue == "MX")
      {
        $('#F7_lugarDondeReside_hidden').attr('value',"MEXICO");
      }
      else if(empty(paisValue))
      {
        $('#F7_lugarDondeReside_hidden').attr('value',"EXTRANJERO");
      }
    }
  }


  $("#F7_ninguno").ready(mostrar_form);
  $("#F7_ninguno").change(mostrar_form);

  function mostrar_form()
  {
    if($("#F7_ninguno").is(':checked'))
    {
      $('#form').hide();
      $("#F7_rfc").removeAttr("required");
      $("#F7_relacionConDeclarante").removeAttr("required");
      $("#F7_salarioMensualNeto_valor").removeAttr("required");
      $("#F7_salarioMensualNeto_moneda").removeAttr("required");
    }
    else
    {
      $('#form').show();
      $("#F7_rfc").attr("required", "required");
      $("#F7_relacionConDeclarante").attr("required", "required");
      $("#F7_salarioMensualNeto_valor").attr("required", "required");
      $("#F7_salarioMensualNeto_moneda").attr("required", "required");
    }
  }

  $("#F7_actividadLaboral_clave").ready(mostrar_sector);
  $("#F7_actividadLaboral_clave").change(mostrar_sector);

  function mostrar_sector()
  {
    var actividadValue = $("#F7_actividadLaboral_clave").val();

    if(actividadValue == "PUB")
    {
      $('.sector').show();
      $('.pub').show();
      $('.otr').hide();
      $('.prv').hide();

      $('#F7_actividadLaboral_nivelOrdenGobierno').attr("required","required");
      $('#F7_actividadLaboral_ambitoPublico').attr("required","required");
      $('#F7_actividadLaboral_rfc').removeAttr("required");

      $('#F7_sector_clave').removeAttr("required");
      $('#F7_sector_clave').removeAttr("required");
    }
    else if(actividadValue == "PRI")
    {
      $('.sector').show();
      $('.pub').hide();
      $('.otr').hide();
      $('.prv').show();
      $('#F7_actividadLaboral_rfc').attr("required","required");
      $('#F7_sector_clave').attr("required","required");
    }
    else if(actividadValue == "OTR")
    {
      $('.sector').show();
      $('.pub').hide();
      $('.otr').show();
      $('.prv').hide();
    }
    else if(actividadValue == "NIN")
    {
      $('.sector').hide();
    }
  }


  $("#F7_pais").ready(mostrar_mexico);
  $("#F7_pais").change(mostrar_mexico);

  $("#F7_entidadFederativa_clave").change(mostrar_alcaldias);
  $("#F7_municipioAlcaldia_clave").change(mostrar_localidades);
  $("#F7_coloniaLocalidad").change(mostrar_cp);

  function mostrar_mexico()
  {
    var paisValue = $("#F7_pais").val();
    var paisValue = $("#F7_pais").val();

    if(paisValue == "MX")
    {
      $('#div_F7_entidadFederativa_clave').show();
      $('#div_F7_municipioAlcaldia_clave').show();
      $('#div_F7_coloniaLocalidad').show();

      $('#div_F7_estadoProvincia').hide();
      $('#div_F7_ciudadLocalidad').hide();

      $('#F7_entidadFederativa_clave').attr("name","F7_entidadFederativa_clave");
      $('#F7_municipioAlcaldia_clave').attr("name","F7_municipioAlcaldia_clave");
      $('#F7_coloniaLocalidad').attr("name","F7_coloniaLocalidad");
      $('#F7_codigoPostal').attr("readonly","readonly");

      $('#F7_estadoProvincia').removeAttr("name");
      $('#F7_ciudadLocalidad').removeAttr("name");
    }
    else
    {
      $('#div_F7_entidadFederativa_clave').hide();
      $('#div_F7_municipioAlcaldia_clave').hide();
      $('#div_F7_coloniaLocalidad').hide();

      $('#div_F7_estadoProvincia').show();
      $('#div_F7_ciudadLocalidad').show();

      $('#F7_estadoProvincia').attr("name","F7_estadoProvincia");
      $('#F7_ciudadLocalidad').attr("name","F7_ciudadLocalidad");

      $("#F7_entidadFederativa_clave").removeAttr("name");
      $('#F7_municipioAlcaldia_clave').removeAttr("name");
      $('#F7_coloniaLocalidad').removeAttr("name");
      $("#F7_entidadFederativa_clave").removeAttr("required");
      $('#F7_municipioAlcaldia_clave').removeAttr("required");
      $('#F7_coloniaLocalidad').removeAttr("required");

      $('#F7_codigoPostal').removeAttr("readonly");
      $('#F7_codigoPostal').attr("maxlength","13");
    }
  }

  function mostrar_alcaldias()
  {
    var entidadValue = $("#F7_entidadFederativa_clave").val();

    $('#F7_municipioAlcaldia_clave').find('option').not(':first').remove();

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

            $("#F7_municipioAlcaldia_clave").append(option);
            $('#F7_coloniaLocalidad').find('option').not(':first').remove();
          }
        }
      }
    });
  };

  function mostrar_localidades()
  {
    var entidadValue = $("#F7_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F7_municipioAlcaldia_clave").val();

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
            $("#F7_coloniaLocalidad").append(option);
          }
        }
      }
    });
  }

  function mostrar_cp()
  {
    var entidadValue = $("#F7_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F7_municipioAlcaldia_clave").val();
    var localidadValue = $("#F7_coloniaLocalidad").val();

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
            $("#F7_codigoPostal").val(cp);
            $("#F7_codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }//////

});

@endsection
