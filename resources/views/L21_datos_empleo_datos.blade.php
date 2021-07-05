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
              @if($declaracion->inicial == true)
              Datos Empleo, Cargo o Comisión que Inicia
              @endif
              @if($declaracion->modificacion == true)
              Datos Empleo, Cargo o Comisión Actual
              @endif
              @if($declaracion->conclusion == true)
              Datos Empleo, Cargo o Comisión que Concluye
              @endif
              <br>
              <small>  </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="F4_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del ente público:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nombreEntePublico"> Nombre: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreEntePublico') is-invalid @enderror" id="nombreEntePublico" name="nombreEntePublico" value="@if(old('nombreEntePublico')){{ old('nombreEntePublico') }}@endif" required maxlength="65">
                        @error('nombreEntePublico')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="nivelOrdenGobierno">Nivel: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelOrdenGobierno() as $gobierno)
                          <option value="{{ $gobierno->clave }}"
                            @if($gobierno->clave == old('nivelOrdenGobierno'))
                            selected
                            @endif
                          >
                            {{ $gobierno->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('nivelOrdenGobierno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F4_ambitoPublico">Ámbito: 🌐 <code>*</code></label>
                        <select class="form-control @error('F4_ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F4_ambitoPublico" name="F4_ambitoPublico" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->ambitoPublico() as $publico)
                          <option value="{{ $publico->clave }}"
                            @if($publico->clave == old('F4_ambitoPublico'))
                            selected
                            @endif
                          >
                            {{ $publico->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F4_ambitoPublico')
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
                      <h4 class="mb-3">Datos del cargo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F4_areaAdscripcion"> Área: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_areaAdscripcion') is-invalid @enderror" id="F4_areaAdscripcion" name="F4_areaAdscripcion" value="@if(old('F4_areaAdscripcion')){{ old('F4_areaAdscripcion') }}@endif" required maxlength="65">
                        @error('F4_areaAdscripcion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="empleoCargoComision">Empleo o puesto: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="empleoCargoComision" name="empleoCargoComision" value="@if(old('empleoCargoComision')){{ old('empleoCargoComision') }}@endif" maxlength="65" required>
                        @error('empleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="nivelEmpleoCargoComision">Nivel: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nivelEmpleoCargoComision') is-invalid @enderror" id="nivelEmpleoCargoComision" name="nivelEmpleoCargoComision" value="@if(old('nivelEmpleoCargoComision')){{ old('nivelEmpleoCargoComision') }}@endif" maxlength="65" required>
                        @error('nivelEmpleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F4_funcionPrincipal">¿Cual es tu función?: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_funcionPrincipal') is-invalid @enderror" id="F4_funcionPrincipal" name="F4_funcionPrincipal" value="@if(old('F4_funcionPrincipal')){{ old('F4_funcionPrincipal') }}@endif" maxlength="65" required>
                        @error('F4_funcionPrincipal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-md-4 mb-3">
                        <label for="F4_fechaTomaPosesion">Fecha de ingreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_fechaTomaPosesion') is-invalid @enderror" id="F4_fechaTomaPosesion" name="F4_fechaTomaPosesion" value="@if(old('F4_fechaTomaPosesion')){{ old('F4_fechaTomaPosesion') }}@endif" required>
                        <code>Aproximada</code>
                        @error('F4_fechaTomaPosesion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F4_contratadoPorHonorarios">¿Contrato por honorarios? 🌐 <code>*</code></label>
                        <select class="form-control @error('F4_contratadoPorHonorarios') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F4_contratadoPorHonorarios" name="F4_contratadoPorHonorarios" required>
                          <option value="">Seleccione...</option>
                          <option value="0"
                            @if(0 == old('F4_contratadoPorHonorarios'))
                            selected
                            @endif
                          >
                            NO
                          </option>
                          <option value="1"
                            @if(1 == old('F4_contratadoPorHonorarios'))
                            selected
                            @endif
                            >
                            SÍ
                          </option>
                        </select>
                        @error('F4_contratadoPorHonorarios')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Teléfonos de contacto:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F4_telefonoOficina_lada">Lada + Teléfono de oficina: 🌐 <code>*</code></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F4_telefonoOficina_lada') is-invalid @enderror" id="F4_telefonoOficina_lada" name="F4_telefonoOficina_lada" >
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}"
                              @if(old('F4_telefonoOficina_lada') == $pais->LADA)
                              selected
                              @elseif($declaracion->F4_telefonoOficina_lada == $pais->LADA and old('F4_telefonoOficina_lada') == null)
                              selected
                              @elseif(old('F4_telefonoOficina_lada') == null and $declaracion->F4_telefonoOficina_lada == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('F4_telefonoOficina_telefono') is-invalid @enderror" id="F4_telefonoOficina_telefono" name="F4_telefonoOficina_telefono" value="@if(old('F4_telefonoOficina_telefono')){{ old('F4_telefonoOficina_telefono') }}@else{{ $declaracion->F4_telefonoOficina_telefono }}@endif" minlength="10" maxlength="10" required>
                          @error('F4_telefonoOficina_lada')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('F4_telefonoOficina_telefono')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F4_telefonoOficina_extension"> Extensión: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_telefonoOficina_extension') is-invalid @enderror" id="F4_telefonoOficina_extension" name="F4_telefonoOficina_extension" value="@if(old('F4_telefonoOficina_extension')){{ old('F4_telefonoOficina_extension') }}@endif" maxlength="4">
                        @error('F4_telefonoOficina_extension')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>


                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Domicilio de empleo:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-4">
                        <label for="F4_pais">País: 🌐 <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F4_pais') is-invalid @enderror" id="F4_pais" name="F4_pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('F4_pais') == $pais->ISO2)
                            selected
                            @elseif($pais->default == true)
                             selected
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F4_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="entidadFederativa">Estado: 🌐 <code>*</code></label>
                        <select class="form-control @error('entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa" name="entidadFederativa">
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('entidadFederativa'))
                              selected
                            @else
                            @endif
                            >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('entidadFederativa')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_municipioAlcaldia">
                        <label for="municipioAlcaldia">Municipio: 🌐 <code>*</code></label>
                        <select class="form-control @error('municipioAlcaldia') is-invalid @enderror" id="municipioAlcaldia" name="municipioAlcaldia" tabindex="{{ ++$tabindex }}">
                          <option value="">Seleccionar:</option>
                          @if(old('entidadFederativa'))
                            @foreach($declaracion->catalogo->inegiAlcaldias(old('entidadFederativa')) as $alcaldia)
                            <option value="{{ $alcaldia->Cve_Mun }}"
                              @if($alcaldia->Cve_Mun == old('municipioAlcaldia'))
                                selected
                              @endif
                              >
                              {{ $alcaldia->Nom_Mun }}
                            </option>
                            @endforeach
                          @else

                          @endif
                        </select>
                        @error('municipioAlcaldia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F4_coloniaLocalidad">
                        <label for="F4_coloniaLocalidad">Colonia: 🌐 <code>*</code></label>
                        <select class="form-control @error('F4_coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F4_coloniaLocalidad" name="F4_coloniaLocalidad" required>
                          <option value="">Seleccionar:</option>
                          @if(old('entidadFederativa'))

                            @if(old('municipioAlcaldia'))

                                @foreach($declaracion->catalogo->inegiLocalidades(old('entidadFederativa'),old('municipioAlcaldia')) as $colonia)
                                <option value="{{ $colonia->Nom_Loc }}"
                                  @if($colonia->Nom_Loc == old('F4_coloniaLocalidad'))
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
                        @error('F4_coloniaLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F4_estadoProvincia">
                        <label for="F4_estadoProvincia">Estado/Provincia: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_estadoProvincia') is-invalid @enderror" id="F4_estadoProvincia" name="F4_estadoProvincia" placeholder="" @if(old('F4_estadoProvincia')) value="{{ old('F4_estadoProvincia') }}" @else @endif maxlength="65">
                        @error('F4_estadoProvincia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F4_ciudadLocalidad">
                        <label for="F4_ciudadLocalidad">Ciudad/Localidad: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_ciudadLocalidad') is-invalid @enderror" id="F4_ciudadLocalidad" name="F4_ciudadLocalidad" placeholder="" @if(old('F4_ciudadLocalidad')) value="{{ old('F4_ciudadLocalidad') }}" @else @endif maxlength="65">
                        @error('F4_ciudadLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="F4_calle">Calle: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_calle') is-invalid @enderror" id="F4_calle" name="F4_calle" placeholder="" @if(old('F4_calle')) value="{{ old('F4_calle') }}" @else @endif maxlength="65" required>
                        @error('F4_calle')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F4_numeroExterior"> Número exterior: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_numeroExterior') is-invalid @enderror" id="F4_numeroExterior" name="F4_numeroExterior" placeholder="" @if(old('F4_numeroExterior')) value="{{ old('F4_numeroExterior') }}" @else @endif maxlength="6" required>
                        @error('F4_numeroExterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F4_numeroInterior">Número interior: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_numeroInterior') is-invalid @enderror" id="F4_numeroInterior" name="F4_numeroInterior" placeholder="" @if(old('F4_numeroInterior')) value="{{ old('F4_numeroInterior') }}" @else @endif maxlength="6">
                        @error('F4_numeroInterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F4_codigoPostal">Código postal: 🌐<code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F4_codigoPostal') is-invalid @enderror" id="F4_codigoPostal" name="F4_codigoPostal" placeholder="" @if(old('F4_codigoPostal')) value="{{ old('F4_codigoPostal') }}" @else @endif maxlength="7" required >
                        @error('F4_codigoPostal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

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
<!--**********************************
Content body end
***********************************-->
@endsection





@section('script')

$(document).ready(function(){

  $("#F4_pais").ready(mostrar_mexico);
  $("#F4_pais").change(mostrar_mexico);

  $("#entidadFederativa").change(mostrar_alcaldias);
  $("#municipioAlcaldia").change(mostrar_localidades);
  $("#F4_coloniaLocalidad").change(mostrar_cp);


  function mostrar_mexico()
  {
    var paisValue = $("#F4_pais").val();

    if(paisValue == "MX")
    {
      $('#div_entidadFederativa').show();
      $('#div_municipioAlcaldia').show();
      $('#div_F4_coloniaLocalidad').show();

      $('#div_F4_estadoProvincia').hide();
      $('#div_F4_ciudadLocalidad').hide();

      $('#entidadFederativa').attr("required","required");
      $('#municipioAlcaldia').attr("required","required");
      $('#F4_coloniaLocalidad').attr("required","required");
      $('#entidadFederativa').attr("name","entidadFederativa");
      $('#municipioAlcaldia').attr("name","municipioAlcaldia");
      $('#F4_coloniaLocalidad').attr("name","F4_coloniaLocalidad");
      $('#F4_codigoPostal').attr("readonly","readonly");

      $('#F4_estadoProvincia').removeAttr("name");
      $('#F4_ciudadLocalidad').removeAttr("name");
      $('#F4_estadoProvincia').removeAttr("required");
      $('#F4_ciudadLocalidad').removeAttr("required");
    }
    else
    {
      $('#div_entidadFederativa').hide();
      $('#div_municipioAlcaldia').hide();
      $('#div_F4_coloniaLocalidad').hide();

      $('#div_F4_estadoProvincia').show();
      $('#div_F4_ciudadLocalidad').show();

      $('#F4_estadoProvincia').attr("required","required");
      $('#F4_ciudadLocalidad').attr("required","required");
      $('#F4_estadoProvincia').attr("name","F4_estadoProvincia");
      $('#F4_ciudadLocalidad').attr("name","F4_ciudadLocalidad");

      $("#entidadFederativa").removeAttr("name");
      $('#municipioAlcaldia').removeAttr("name");
      $('#F4_coloniaLocalidad').removeAttr("name");
      $("#entidadFederativa").removeAttr("required");
      $('#municipioAlcaldia').removeAttr("required");
      $('#F4_coloniaLocalidad').removeAttr("required");

      $('#F4_codigoPostal').removeAttr("readonly");
      $('#F4_codigoPostal').attr("maxlength","13");
    }
  }



  function mostrar_alcaldias()
  {
    var entidadValue = $("#entidadFederativa").val();

    $('#municipioAlcaldia').find('option').not(':first').remove();

    $.ajax({
      url: '../../../catalogo/getAlcaldias/'+entidadValue,
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

            $("#municipioAlcaldia").append(option);
            $('#F4_coloniaLocalidad').find('option').not(':first').remove();
          }
        }
      }
    });
  };



  function mostrar_localidades()
  {
    var entidadValue = $("#entidadFederativa").val();
    var alcaldiaValue = $("#municipioAlcaldia").val();

    $('#F4_coloniaLocalidad').find('option').not(':first').remove();

    $.ajax({
      url: '../../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
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
            $("#F4_coloniaLocalidad").append(option);
          }
        }
      }
    });
  }



  function mostrar_cp()
  {
    var entidadValue = $("#entidadFederativa").val();
    var alcaldiaValue = $("#municipioAlcaldia").val();
    var localidadValue = $("#F4_coloniaLocalidad").val();

    $.ajax({
      url: '../../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
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
            $("#F4_codigoPostal").val(cp);
            $("#F4_codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }//////

});
@endsection
