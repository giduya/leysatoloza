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
              DOMICILIO DEL DECLARANTE
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">
                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde radicas actualmente?:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-4">
                        <label for="F2_pais">País: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('F2_pais') is-invalid @enderror" id="F2_pais" name="F2_pais" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('F2_pais') == $pais->ISO2)
                            selected
                            @elseif($declaracion->F2_pais == $pais->ISO2 and old('F2_pais') == null)
                            selected
                            @elseif(old('F2_pais') == null and $declaracion->F2_pais == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('F2_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F2_entidadFederativa">
                        <label for="F2_entidadFederativa_clave">Estado: <code>*</code></label>
                        <select class="form-control @error('F2_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F2_entidadFederativa_clave" name="F2_entidadFederativa_clave" autofocus>
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('F2_entidadFederativa_clave'))
                              selected
                            @else
                              @if($entidad->Cve_Ent == $declaracion->F2_entidadFederativa_clave and empty(old('F2_entidadFederativa_clave')))
                                selected
                                @else
                              @endif
                            @endif
                            >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('F2_entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F2_municipioAlcaldia">
                        <label for="F2_municipioAlcaldia_clave">Municipio: <code>*</code></label>
                        <select class="form-control @error('F2_municipioAlcaldia_clave') is-invalid @enderror" id="F2_municipioAlcaldia_clave" name="F2_municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                          <option value="">Seleccionar:</option>
                          @if(old('F2_entidadFederativa_clave'))
                            @foreach($declaracion->catalogo->inegiAlcaldias(old('F2_entidadFederativa_clave')) as $alcaldia)
                            <option value="{{ $alcaldia->Cve_Mun }}"
                              @if($alcaldia->Cve_Mun == old('F2_municipioAlcaldia_clave'))
                                selected
                              @endif
                              >
                              {{ $alcaldia->Nom_Mun }}
                            </option>
                            @endforeach
                          @else
                            @foreach($declaracion->catalogo->inegiAlcaldias($declaracion->F2_entidadFederativa_clave) as $alcaldia)
                            <option value="{{ $alcaldia->Cve_Mun }}"
                              @if($alcaldia->Cve_Mun == $declaracion->F2_municipioAlcaldia_clave)
                                selected
                              @endif
                              >
                              {{ $alcaldia->Nom_Mun }}
                            </option>
                            @endforeach
                          @endif
                        </select>
                        @error('F2_municipioAlcaldia_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F2_coloniaLocalidad">
                        <label for="F2_coloniaLocalidad">Colonia: <code>*</code></label>
                        <select class="form-control @error('F2_coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F2_coloniaLocalidad" name="F2_coloniaLocalidad">
                          <option value="">Seleccionar:</option>
                          @if(old('F2_entidadFederativa_clave'))

                            @if(old('F2_municipioAlcaldia_clave'))

                                @foreach($declaracion->catalogo->inegiLocalidades(old('F2_entidadFederativa_clave'),old('F2_municipioAlcaldia_clave')) as $colonia)
                                <option value="{{ $colonia->Nom_Loc }}"
                                  @if($colonia->Nom_Loc == old('F2_coloniaLocalidad'))
                                    selected
                                  @endif
                                  >
                                  {{ $colonia->Nom_Loc }}
                                </option>
                                @endforeach

                            @endif

                          @else

                            @foreach($declaracion->catalogo->inegiLocalidades($declaracion->F2_entidadFederativa_clave,$declaracion->F2_municipioAlcaldia_clave) as $colonia)
                            <option value="{{ $colonia->Nom_Loc }}"
                              @if($colonia->Nom_Loc == $declaracion->F2_coloniaLocalidad)
                                selected
                              @endif
                              >
                              {{ $colonia->Nom_Loc }}
                            </option>
                            @endforeach

                          @endif
                        </select>
                        @error('F2_coloniaLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F2_estadoProvincia">
                        <label for="F2_estadoProvincia">Estado/Provincia: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F2_estadoProvincia') is-invalid @enderror" id="F2_estadoProvincia" name="F2_estadoProvincia" placeholder="" value="@if(old('F2_estadoProvincia')){{ old('F2_estadoProvincia') }}@else{{ $declaracion->F2_estadoProvincia }}@endif" maxlength="65">
                        @error('F2_estadoProvincia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F2_ciudadLocalidad">
                        <label for="F2_ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F2_ciudadLocalidad') is-invalid @enderror" id="F2_ciudadLocalidad" name="F2_ciudadLocalidad" placeholder="" value="@if(old('F2_ciudadLocalidad')){{ old('F2_ciudadLocalidad') }}@else{{ $declaracion->F2_ciudadLocalidad }}@endif" maxlength="65">
                        @error('F2_ciudadLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="F2_calle">Calle: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F2_calle') is-invalid @enderror" id="F2_calle" name="F2_calle" placeholder="" value="@if(old('F2_calle')){{ old('F2_calle') }}@else{{ $declaracion->F2_calle }}@endif" maxlength="65" required>
                        @error('F2_calle')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F2_numeroExterior">Número exterior: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F2_numeroExterior') is-invalid @enderror" id="F2_numeroExterior" name="F2_numeroExterior" placeholder="" value="@if(old('F2_numeroExterior')){{ old('F2_numeroExterior') }}@else{{ $declaracion->F2_numeroExterior }}@endif" maxlength="6" required>
                        @error('F2_numeroExterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F2_numeroInterior">Número interior: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F2_numeroInterior') is-invalid @enderror" id="F2_numeroInterior" name="F2_numeroInterior" placeholder="" value="@if(old('F2_numeroInterior')){{ old('F2_numeroInterior') }}@else{{ $declaracion->F2_numeroInterior }}@endif" maxlength="6">
                        @error('F2_numeroInterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F2_codigoPostal">Código postal: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F2_codigoPostal') is-invalid @enderror" id="F2_codigoPostal" name="F2_codigoPostal" placeholder="" value="@if(old('F2_codigoPostal')){{ old('F2_codigoPostal') }}@else{{ $declaracion->F2_codigoPostal }}@endif" maxlength="7" required >
                        @error('F2_codigoPostal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <p>&nbsp;</p>

                    <fieldset>
                      <legend>
                        <h4 class="mb-3">
                          <label for="F2_aclaracionesObservaciones">
                            Aclaraciones / Observaciones:
                          </label>
                        </h4>
                      </legend>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <textarea tabindex="{{ ++$tabindex }}" class="form-control" id="F2_aclaracionesObservaciones" rows="7" name="F2_aclaracionesObservaciones" placeholder="">@if(old('F2_aclaracionesObservaciones')){{ old('F2_aclaracionesObservaciones') }}@else{{ $declaracion->F2_aclaracionesObservaciones }}@endif</textarea>
                        </div>
                      </div>
                    </fieldset>

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

$(document).ready(function(){

  $("#F2_pais").ready(mostrar_mexico);
  $("#F2_pais").change(mostrar_mexico);

  $("#F2_entidadFederativa_clave").change(mostrar_alcaldias);
  $("#F2_municipioAlcaldia_clave").change(mostrar_localidades);
  $("#F2_coloniaLocalidad").change(mostrar_cp);


  function mostrar_mexico()
  {
    var paisValue = $("#F2_pais").val();

    if(paisValue == "MX")
    {
      $('#div_F2_entidadFederativa').show();
      $('#div_F2_municipioAlcaldia').show();
      $('#div_F2_coloniaLocalidad').show();

      $('#div_F2_estadoProvincia').hide();
      $('#div_F2_ciudadLocalidad').hide();

      $('#F2_entidadFederativa_clave').attr("required","required");
      $('#F2_municipioAlcaldia_clave').attr("required","required");
      $('#F2_coloniaLocalidad').attr("required","required");
      $('#F2_entidadFederativa_clave').attr("name","F2_entidadFederativa_clave");
      $('#F2_municipioAlcaldia_clave').attr("name","F2_municipioAlcaldia_clave");
      $('#F2_coloniaLocalidad').attr("name","F2_coloniaLocalidad");
      $('#F2_codigoPostal').attr("readonly","readonly");

      $('#F2_estadoProvincia').removeAttr("name");
      $('#F2_ciudadLocalidad').removeAttr("name");
      $('#F2_estadoProvincia').removeAttr("required");
      $('#F2_ciudadLocalidad').removeAttr("required");
    }
    else
    {
      $('#div_F2_entidadFederativa').hide();
      $('#div_F2_municipioAlcaldia').hide();
      $('#div_F2_coloniaLocalidad').hide();

      $('#div_F2_estadoProvincia').show();
      $('#div_F2_ciudadLocalidad').show();

      $('#F2_estadoProvincia').attr("required","required");
      $('#F2_ciudadLocalidad').attr("required","required");
      $('#F2_estadoProvincia').attr("name","F2_estadoProvincia");
      $('#F2_ciudadLocalidad').attr("name","F2_ciudadLocalidad");

      $("#F2_entidadFederativa_clave").removeAttr("name");
      $('#F2_municipioAlcaldia_clave').removeAttr("name");
      $('#F2_coloniaLocalidad').removeAttr("name");
      $("#F2_entidadFederativa_clave").removeAttr("required");
      $('#F2_municipioAlcaldia_clave').removeAttr("required");
      $('#F2_coloniaLocalidad').removeAttr("required");

      $('#F2_codigoPostal').removeAttr("readonly");
      $('#F2_codigoPostal').attr("maxlength","13");
    }
  }



  function mostrar_alcaldias()
  {
    var entidadValue = $("#F2_entidadFederativa_clave").val();

    $('#F2_municipioAlcaldia_clave').find('option').not(':first').remove();

    $.ajax({
      url: '../../catalogo/getAlcaldias/'+entidadValue,
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

            $("#F2_municipioAlcaldia_clave").append(option);
            $('#F2_coloniaLocalidad').find('option').not(':first').remove();
          }
        }
      }
    });
  };



  function mostrar_localidades()
  {
    var entidadValue = $("#F2_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F2_municipioAlcaldia_clave").val();

    $('#F2_coloniaLocalidad').find('option').not(':first').remove();

    $.ajax({
      url: '../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
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
            $("#F2_coloniaLocalidad").append(option);
          }
        }
      }
    });
  }



  function mostrar_cp()
  {
    var entidadValue = $("#F2_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F2_municipioAlcaldia_clave").val();
    var localidadValue = $("#F2_coloniaLocalidad").val();

    $.ajax({
      url: '../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
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
            $("#F2_codigoPostal").val(cp);
            $("#F2_codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }//////

});
@endsection
