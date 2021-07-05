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
              PRÉSTAMO O COMODATO POR TERCEROS
              <br>
              <small>Situación Actual</small>
            </h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="F15_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  @if(Route::current()->parameters()['opcion'] == "inmueble")

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Inmueble:</h4></legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="F15_tipoInmueble_clave">Tipo de inmueble: 🌐 <code>*</code></label>
                        <select class="form-control @error('F15_tipoInmueble_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F15_tipoInmueble_clave" name="F15_tipoInmueble_clave" autofocus required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInmueble() as $inmueble)
                          <option value="{{ $inmueble->clave }}"
                            @if($inmueble->clave == old('F15_tipoInmueble_clave'))
                            selected
                            @endif
                          >
                            {{ $inmueble->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_tipoInmueble_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especificaTipo">
                        <label for="F15_especifiqueTipo">Especifica: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_especifiqueTipo') is-invalid @enderror" id="F15_especifiqueTipo" name="F15_especifiqueTipo" @if(old('F15_especifiqueTipo')) value="{{ old('F15_especifiqueTipo') }}" @endif maxlength="65" required >
                        @error('F15_especifiqueTipo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>

                    <p>&nbsp;</p>

                  </fieldset>


                  <fieldset>
                    <legend><h4 class="mb-3">Ubicación del Inmueble</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-4">
                        <label for="F15_pais">País: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F15_pais') is-invalid @enderror" id="F15_pais" name="F15_pais" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('pais') == $pais->ISO2)
                            selected
                            @elseif($declaracion->F2_pais == $pais->ISO2 and old('F19_pais') == null)
                           selected
                           @elseif(old('F19_pais') == null and $declaracion->F19_pais == null)
                            @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F15_entidadFederativa">
                        <label for="F15_entidadFederativa_clave">Entidad Federativa: <code>*</code></label>
                        <select class="form-control @error('F15_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F15_entidadFederativa_clave" name="F15_entidadFederativa_clave" >
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('F15_entidadFederativa_clave'))
                              selected
                            @else
                            @endif
                            >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F15_municipioAlcaldia">
                        <label for="F15_municipioAlcaldia_clave">Municipio/Alcaldía: <code>*</code></label>
                        <select class="form-control @error('F15_municipioAlcaldia_clave') is-invalid @enderror" id="F15_municipioAlcaldia_clave" name="F15_municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                          <option value="">Seleccionar:</option>
                          @if(old('F15_entidadFederativa_clave'))
                            @foreach($declaracion->catalogo->inegiAlcaldias(old('F15_entidadFederativa_clave')) as $alcaldia)
                            <option value="{{ $alcaldia->Cve_Mun }}"
                              @if($alcaldia->Cve_Mun == old('F15_municipioAlcaldia_clave'))
                                selected
                              @endif
                              >
                              {{ $alcaldia->Nom_Mun }}
                            </option>
                            @endforeach
                          @else

                          @endif
                        </select>
                        @error('F15_municipioAlcaldia_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F15_coloniaLocalidad">
                        <label for="F15_coloniaLocalidad">Colonia o Localidad: <code>*</code></label>
                        <select class="form-control @error('F15_coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F15_coloniaLocalidad" name="F15_coloniaLocalidad">
                          <option value="">Seleccionar:</option>
                          @if(old('F15_entidadFederativa_clave'))

                            @if(old('F15_municipioAlcaldia_clave'))

                              @foreach($declaracion->catalogo->inegiLocalidades(old('F15_entidadFederativa_clave'),old('F15_municipioAlcaldia_clave')) as $colonia)
                              <option value="{{ $colonia->Nom_Loc }}"
                                @if($colonia->Nom_Loc == old('F15_coloniaLocalidad'))
                                  selected
                                @endif
                              >
                                {{ $colonia->Nom_Loc }}
                              </option>
                              @endforeach

                            @endif

                          @else
                          @endif
                        </select>
                        @error('F15_coloniaLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F15_estadoProvincia">
                        <label for="F15_estadoProvincia">Estado/Provincia: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_estadoProvincia') is-invalid @enderror" id="F15_estadoProvincia" name="F15_estadoProvincia" placeholder="" @if(old('F15_estadoProvincia')) value="{{ old('F15_estadoProvincia') }}" @else @endif maxlength="65">
                        @error('F15_estadoProvincia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F15_ciudadLocalidad">
                        <label for="F15_ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_ciudadLocalidad') is-invalid @enderror" id="F15_ciudadLocalidad" name="F15_ciudadLocalidad" placeholder="" @if(old('F15_ciudadLocalidad')) value="{{ old('F15_ciudadLocalidad') }}" @else @endif maxlength="65">
                        @error('F15_ciudadLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3" id="div_F15_calle">
                        <label for="F15_calle">Calle: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_calle') is-invalid @enderror" id="F15_calle" name="F15_calle" placeholder="" @if(old('F15_calle')) value="{{ old('F15_calle') }}" @else value="" @endif maxlength="65" required="required">
                        @error('F15_calle')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_exterior">
                        <label for="F15_numeroExterior">Número Exterior: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_numeroExterior') is-invalid @enderror" id="F15_numeroExterior" name="F15_numeroExterior" placeholder="" @if(old('F15_numeroExterior')) value="{{ old('F15_numeroExterior') }}" @else @endif maxlength="6" required>
                        @error('F15_numeroExterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_interior">
                        <label for="F15_numeroInterior">Número Interior: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_numeroInterior') is-invalid @enderror" id="F15_numeroInterior" name="F15_numeroInterior" placeholder="" @if(old('F15_numeroInterior')) value="{{ old('F15_numeroInterior') }}" @else @endif maxlength="6">
                        @error('F15_numeroInterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_cp">
                        <label for="F15_codigoPostal">Código Postal: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_codigoPostal') is-invalid @enderror" id="F15_codigoPostal" name="F15_codigoPostal" placeholder="" @if(old('F15_codigoPostal')) value="{{ old('F15_codigoPostal') }}" @else @endif maxlength="7" required="required" >
                        @error('F15_codigoPostal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  @else

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="F15_tipoVehiculo_clave">Tipo de Vehículo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F15_tipoVehiculo_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F15_tipoVehiculo_clave" name="F15_tipoVehiculo_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoVehiculo() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F15_tipoVehiculo_clave'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_tipoVehiculo_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especificaTipo">
                        <label for="F15_especifiqueTipo">Especifica: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_especifiqueTipo') is-invalid @enderror" id="F15_especifiqueTipo" name="F15_especifiqueTipo" @if(old('F15_especifiqueTipo')) value="{{ old('F15_especifiqueTipo') }}" @endif maxlength="65" required >
                        @error('F15_especifiqueTipo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F15_marca">Marca: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_marca') is-invalid @enderror" id="F15_marca" name="F15_marca" @if(old('F15_marca')) value="{{ old('F15_marca') }}" @endif maxlength="65" required>
                        @error('F15_marca')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F15_modelo">Modelo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_modelo') is-invalid @enderror" id="F15_modelo" name="F15_modelo" @if(old('F15_modelo')) value="{{ old('F15_modelo') }}" @endif maxlength="65" required>
                        @error('F15_modelo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F15_anio">Año: 🌐 <code>*</code></label>
                        <input type="number" step="1" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_anio') is-invalid @enderror" id="F15_anio" name="F15_anio" @if(old('F15_anio')) value="{{ old('F15_anio') }}" @endif required>
                        @error('F15_anio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="F15_numeroSerieRegistro">No. Serie / Registro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_numeroSerieRegistro') is-invalid @enderror" id="F15_numeroSerieRegistro" name="F15_numeroSerieRegistro" @if(old('F15_numeroSerieRegistro')) value="{{ old('F15_numeroSerieRegistro') }}" @endif maxlength="65" required>
                        @error('F15_numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-4">
                        <label for="F15_pais">País de registro: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F15_pais') is-invalid @enderror" id="F15_pais" name="F15_pais" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('pais') == $pais->ISO2)
                            selected
                            @elseif($declaracion->F2_pais == $pais->ISO2 and old('F19_pais') == null)
                           selected
                           @elseif(old('F19_pais') == null and $declaracion->F19_pais == null)
                            @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F15_entidadFederativa">
                        <label for="F15_entidadFederativa_clave">Entidad Federativa: <code>*</code></label>
                        <select class="form-control @error('F15_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F15_entidadFederativa_clave" name="F15_entidadFederativa_clave" >
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('F15_entidadFederativa_clave'))
                            selected
                            @else
                            @endif
                          >
                          {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                  </fieldset>

                  @endif

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Dueño o Titular:</h4></legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="F15_tipoDuenoTitular">
                          Tipo persona: 🌐 <code>*</code>
                        </label>
                        <select class="form-control @error('F15_tipoDuenoTitular') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F15_tipoDuenoTitular" name="F15_tipoDuenoTitular" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F15_tipoDuenoTitular'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F15_tipoDuenoTitular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="F15_nombreTitular">
                          Nombre del titular: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_nombreTitular') is-invalid @enderror" id="F15_nombreTitular" name="F15_nombreTitular" @if(old('F15_nombreTitular')) value="{{ old('F15_nombreTitular') }}" @endif maxlength="65" required>
                        @error('F15_nombreTitular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F15_rfc">
                          RFC: 🌐
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_rfc') is-invalid @enderror" id="F15_rfc" name="F15_rfc" @if(old('F15_rfc')) value="{{ old('F15_rfc') }}" @endif maxlength="13" minlength="12" >
                        @error('F15_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                        <label for="F15_relacionConTitular">
                          Relación con el titular: <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F15_relacionConTitular') is-invalid @enderror" id="F15_relacionConTitular" name="F15_relacionConTitular" @if(old('F15_relacionConTitular')) value="{{ old('F15_relacionConTitular') }}" @endif maxlength="65" required>
                        <small>¿Que relación tiene el declarante con el dueño del bien? Ejemplo: Amigo</small>
                        @error('F15_relacionConTitular')
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

$(document).ready(function()
{

  $("#F15_tipoInmueble_clave").ready(mostrar_otro);
  $("#F15_tipoInmueble_clave").change(mostrar_otro);

  $("#F15_tipoVehiculo_clave").ready(mostrar_otro);
  $("#F15_tipoVehiculo_clave").change(mostrar_otro);

  function mostrar_otro()
  {
    @if(Route::current()->parameters()['opcion'] == "inmueble")

    var otroValue = $("#F15_tipoInmueble_clave").val();

    @else

    var otroValue = $("#F15_tipoVehiculo_clave").val();

    @endif

    if(otroValue == "OTRO")
    {
      $('#div_especificaTipo').show();
      $('#F15_especifiqueTipo').attr("required","required");
    }
    else
    {
      $('#div_especificaTipo').hide();
      $('#F15_especifiqueTipo').removeAttr("required");
    }
  }

  $("#F15_tipoDuenoTitular").ready(largo_rfc);
  $("#F15_tipoDuenoTitular").change(largo_rfc);

  function largo_rfc()
  {
    var personaValue = $("#F15_tipoDuenoTitular").val();

    if(personaValue == "MORAL")
    {
      $('#F15_rfc').attr("maxlength","12");
      $('#F15_rfc').attr("minlength","12");
    }
    else
    {
      $('#F15_rfc').attr("maxlength","13");
      $('#F15_rfc').attr("minlength","13");
    }
  }


  $("#F15_pais").ready(mostrar_mexico);
  $("#F15_pais").change(mostrar_mexico);

  function mostrar_mexico()
  {
    var paisValue = $("#F15_pais").val();

    if(paisValue == "")
    {
      $('#div_F15_entidadFederativa').hide();
      $('#div_F15_municipioAlcaldia').hide();
      $('#div_F15_coloniaLocalidad').hide();
      $("#F15_entidadFederativa_clave").removeAttr("required");
      $('#F15_municipioAlcaldia_clave').removeAttr("required");
      $('#F15_coloniaLocalidad').removeAttr("required");

      $('#div_F15_estadoProvincia').hide();
      $('#div_F15_ciudadLocalidad').hide();
      $('#F15_estadoProvincia').removeAttr("required","required");
      $('#F15_ciudadLocalidad').removeAttr("required","required");

      $('#F15_codigoPostal').removeAttr("readonly","readonly");

      $('#div_exterior').hide();
      $('#div_interior').hide();
    }
    else if(paisValue == "MX")
    {
      $('#div_F15_entidadFederativa').show();
      $('#div_F15_municipioAlcaldia').show();
      $('#div_F15_coloniaLocalidad').show();

      $('#div_F15_estadoProvincia').hide();
      $('#div_F15_ciudadLocalidad').hide();

      $('#F15_entidadFederativa_clave').attr("required","required");
      $('#F15_municipioAlcaldia_clave').attr("required","required");
      $('#F15_coloniaLocalidad').attr("required","required");

      $('#F15_estadoProvincia').removeAttr("required","required");
      $('#F15_ciudadLocalidad').removeAttr("required","required");

      $('#F15_codigoPostal').attr("readonly","readonly");

      $("#F15_entidadFederativa_clave").change(mostrar_alcaldias);
      $("#F15_municipioAlcaldia_clave").change(mostrar_localidades);
      $("#F15_coloniaLocalidad").change(mostrar_cp);
    }
    else
    {
      $('#div_F15_entidadFederativa').hide();
      $('#div_F15_municipioAlcaldia').hide();
      $('#div_F15_coloniaLocalidad').hide();
      $("#F15_entidadFederativa_clave").removeAttr("required");
      $('#F15_municipioAlcaldia_clave').removeAttr("required");
      $('#F15_coloniaLocalidad').removeAttr("required");

      $('#div_F15_estadoProvincia').show();
      $('#div_F15_ciudadLocalidad').show();
      $('#F15_estadoProvincia').attr("required","required");
      $('#F15_ciudadLocalidad').attr("required","required");

      $('#F15_codigoPostal').removeAttr("readonly");
      $('#F15_codigoPostal').attr("maxlength","13");
    }
  }



  function mostrar_alcaldias()
  {
    var entidadValue = $("#F15_entidadFederativa_clave").val();
    $('#F15_municipioAlcaldia_clave').find('option').not(':first').remove();

    $.ajax({
      url: '/../../../../catalogo/getAlcaldias/'+entidadValue,
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
          for(var i=0; i<len; i++ )
          {
            var id = response[i].Cve_Mun;
            var nombre = response[i].Nom_Mun;
            var entidad = response[i].Cve_Ent;
            var option = "<option value='"+id+"'>"+nombre+"</option>";

            $("#F15_municipioAlcaldia_clave").append(option);
            $('#F15_coloniaLocalidad').find('option').not(':first').remove();
          }
        }
      }
    });
  };


  function mostrar_localidades()
  {
    var entidadValue = $("#F15_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F15_municipioAlcaldia_clave").val();

    $('#F15_coloniaLocalidad').find('option').not(':first').remove();

    $.ajax({
      url: '/../../../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
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
            $("#F15_coloniaLocalidad").append(option);
          }
        }
      }
    });
  }


  function mostrar_cp()
  {
    var entidadValue = $("#F15_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F15_municipioAlcaldia_clave").val();
    var localidadValue = $("#F15_coloniaLocalidad").val();

    $.ajax({
      url: '/../../../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
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
            $("#F15_codigoPostal").val(cp);
            $("#F15_codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }


});
@endsection
