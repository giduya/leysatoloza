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
              <small>
                @if($declaracion->inicial == true)
                 Situación Actual
                @endif
              </small>
              <small>
                @if($declaracion->inicial == true)
                Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior
                @endif
              </small>
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
                      <div class="form-group col-md-4 mb-3">
                        <label for="F10_tipoInmueble_clave">Tipo de Inmueble: <code>*</code></label>
                        <select class="form-control @error('tipoInmueble_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_tipoInmueble_clave" name="F10_tipoInmueble_clave">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInmueble() as $inmueble)
                          <option value="{{ $inmueble->clave }}"
                            @if($inmueble->clave == old('F10_tipoInmueble_clave'))
                            selected
                            @endif
                            >
                            {{ $inmueble->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_tipoInmueble_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueInmueble">
                      <label for="F10_especifiqueInmueble">Especifica el Inmueble: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_especifiqueInmueble') is-invalid @enderror" id="F10_especifiqueInmueble" name="F10_especifiqueInmueble" value="@if(old('F10_especifiqueInmueble')){{ old('F10_especifiqueInmueble') }}@endif" maxlength="65" required>
                      @error('F10_especifiqueInmueble')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div> {{--row--}}


                      <div class="row">
                        <div class="form-group col-md-6 mb-3">
                          <label for="F10_titular_clave">Titular del bien: <code>*</code></label>
                          <select class="form-control @error('F10_titular_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_titular_clave" name="F10_titular_clave" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->titularBien() as $titular)
                            <option value="{{ $titular->clave }}"
                              @if($titular->clave == old('F10_titular_clave'))
                              selected
                              @endif
                              >
                              {{ $titular->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F10_titular_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                      <div class="col-md-6 mb-3">
                        <label for="F10_porcentajePropiedad"> Porcentaje de Propiedad: 🌐 <code>*</code></label>
                        <input type="number" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_porcentajePropiedad') is-invalid @enderror" id="F10_porcentajePropiedad" name="F10_porcentajePropiedad" value="@if(old('F10_porcentajePropiedad')){{ old('F10_porcentajePropiedad') }}@endif" min="0" max=100 required>
                        @error('F10_porcentajePropiedad')
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
                      <h4 class="mb-3">Relación con el Transmisor</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F10_relacion_clave">Relación del Transmisor: <code>*</code></label>
                        <select class="form-control @error('F10_relacion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_relacion_clave" name="F10_relacion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->parentescoRelacion() as $parentesco)
                          <option value="{{ $parentesco->clave }}"
                            @if($parentesco->clave == old('F10_relacion_clave'))
                            selected
                            @endif
                            >
                            {{ $parentesco->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_relacion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueRelacion">
                        <label for="F10_especifiqueRelacion">Especifica la relación: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_especifiqueRelacion') is-invalid @enderror" id="F10_especifiqueRelacion" name="F10_especifiqueRelacion" value="@if(old('F10_especifiqueRelacion')){{ old('F10_especifiqueRelacion') }}@endif" maxlength="65" required>
                        @error('F10_especifiqueRelacion')
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
                      <h4 class="mb-3">Datos del Tercero:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F10_tercero_tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_tercero_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_tercero_tipoPersona" name="F10_tercero_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('persona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F10_tercero_nombreRazonSocial"> Nombre del Transmisor: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_tercero_nombreRazonSocial') is-invalid @enderror" id="F10_tercero_nombreRazonSocial" name="F10_tercero_nombreRazonSocial" value="@if(old('F10_tercero_nombreRazonSocial')){{ old('F10_tercero_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F10_tercero_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F10_tercero_rfc"> RFC: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_tercero_rfc') is-invalid @enderror" id="F10_tercero_rfc" name="F10_tercero_rfc" value="@if(old('F10_tercero_rfc')){{ old('F10_tercero_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('F10_tercero_rfc')
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
                      <h4 class="mb-3">Datos del Transmisor:</h4>
                    </legend>

                    <div class="row">

                      <div class="col-md-4 mb-3">
                        <label for="F10_transmisor_tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_transmisor_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_transmisor_tipoPersona" name="F10_transmisor_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tpersona)
                          <option value="{{ $tpersona->valor }}"
                            @if($tpersona->valor == old('tpersona'))
                            selected
                            @endif
                            >
                            {{ $tpersona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_transmisor_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F10_transmisor_nombreRazonSocial"> Nombre del Transmisor: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_transmisor_nombreRazonSocial') is-invalid @enderror" id="F10_transmisor_nombreRazonSocial" name="F10_transmisor_nombreRazonSocial" value="@if(old('F10_transmisor_nombreRazonSocial')){{ old('F10_transmisor_nombreRazonSocial') }}@endif" maxlength="65" required>
                        @error('F10_transmisor_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F10_transmisor_rfc"> RFC: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_transmisor_rfc') is-invalid @enderror" id="F10_transmisor_rfc" name="F10_transmisor_rfc" value="@if(old('F10_transmisor_rfc')){{ old('F10_transmisor_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('F10_transmisor_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>


                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Terreno:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="superficieTerreno">Superficie del Terreno: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('superficieTerreno') is-invalid @enderror" id="superficieTerreno" name="superficieTerreno" value="@if(old('superficieTerreno')){{ old('superficieTerreno') }}@endif" maxlength="65" required>
                        @error('superficieTerreno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F10_superficieTerreno_unidad">Unidad: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_superficieTerreno_unidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_superficieTerreno_unidad" name="F10_superficieTerreno_unidad" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->unidadmedida() as $medida)
                          <option value="{{ $medida->clave }}"
                            @if($medida->clave == old('persona'))
                            selected
                            @endif
                            >
                            {{ $medida->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_superficieTerreno_unidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="superficieConstruccion">Superficie de Construcción: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('superficieConstruccion') is-invalid @enderror" id="superficieConstruccion" name="superficieConstruccion" value="@if(old('superficieConstruccion')){{ old('superficieConstruccion') }}@endif" maxlength="65" required>
                        @error('superficieConstruccion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F10_superficieConstruccion_unidad">Unidad: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_superficieConstruccion_unidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_superficieConstruccion_unidad" name="F10_superficieConstruccion_unidad" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->unidadmedida() as $smedida)
                          <option value="{{ $smedida->clave }}"
                            @if($smedida->clave == old('smedida'))
                            selected
                            @endif
                            >
                            {{ $smedida->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_superficieConstruccion_unidad')
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
                      <h4 class="mb-3">Datos de Adquisición del Bien Inmueble</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="F10_formaAdquisicion_clave">Forma de Adquisición: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_formaAdquisicion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_formaAdquisicion_clave" name="F10_formaAdquisicion_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaAdquisicion() as $adquisicion)
                          <option value="{{ $adquisicion->clave }}"
                            @if($adquisicion->clave == old('adquisicion'))
                            selected
                            @endif
                            >
                            {{ $adquisicion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_formaAdquisicion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F10_formaPago">Forma de Pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_formaPago" name="F10_formaPago" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formapago() as $pago)
                          <option value="{{ $pago->clave }}"
                            @if($pago->clave == old('F10_formaPago'))
                            selected
                            @endif
                            >
                            {{ $pago->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" id="div_valorAdquisicion">
                      <div class="col-md-6 mb-3">
                        <label for="F10_valorAdquisicion_valor">Valor de Adquisición: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F10_valorAdquisicion_valor') is-invalid @enderror" id="F10_valorAdquisicion_valor" name="F10_valorAdquisicion_valor" value="@if(old('F10_valorAdquisicion_valor')){{ old('F10_valorAdquisicion_valor') }}@endif"  maxlength="20" style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('F10_valorAdquisicion_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="F10_valorAdquisicion_moneda"> Moneda: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_valorAdquisicion_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_valorAdquisicion_moneda" name="F10_valorAdquisicion_moneda" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('valorAdquisicion_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('valorAdquisicion_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('F10_valorAdquisicion_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="F10_valorConformeA">Valor conforme a: 🌐 <code>*</code></label>
                        <select class="form-control @error('F10_valorConformeA') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_valorConformeA" name="F10_valorConformeA" required>
                        <option value="">Seleccione...</option>
                        <option value="ESCRITURA PÚBLICA">ESCRITURA PÚBLICA</option>
                        <option value="SENTENCIA">SENTENCIA</option>
                        <option value="CONTRATO">CONTRATO</option>
                        </select>
                          @error('F10_valorConformeA')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F10_datoIdentificacion"> Dato de Identificación: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_datoIdentificacion') is-invalid @enderror" id="F10_datoIdentificacion" name="F10_datoIdentificacion" value="@if(old('F10_datoIdentificacion')){{ old('F10_datoIdentificacion') }}@endif" maxlength="65" required>
                        @error('F10_datoIdentificacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F10_fechaAdquisicion"> Fecha de Adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_fechaAdquisicion') is-invalid @enderror" id="F10_fechaAdquisicion" name="F10_fechaAdquisicion" value="@if(old('F10_fechaAdquisicion')){{ old('F10_fechaAdquisicion') }}@endif">
                        @error('F10_fechaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                    <p>&nbsp;</p>

                    <fieldset>

                      <legend><h4 class="mb-3">Domicilio del Bien Inmueble</h4></legend>

                      <div class="row">
                        <div class="col-md-4 mb-4" id="div_pais">
                          <label for="F10_pais">País: <code>*</code></label>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('F10_pais') is-invalid @enderror" id="F10_pais" name="F10_pais" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}"
                              @if(old('pais') == $pais->ISO2)
                              selected
                              @elseif($pais->default == true)
                              selected
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                            </option>
                            @endforeach
                          </select>
                          @error('F10_pais')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F10_entidadFederativa">
                          <label for="F10_entidadFederativa_clave">Entidad Federativa: <code>*</code></label>
                          <select class="form-control @error('F10_entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_entidadFederativa_clave" name="F10_entidadFederativa_clave">
                            <option value="">Seleccionar:</option>
                            @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                            <option value="{{ $entidad->Cve_Ent }}"
                              @if($entidad->Cve_Ent == old('entidadFederativa_clave'))
                                selected
                              @else
                              @endif
                              >
                              {{ $entidad->Nom_Ent }}
                            </option>
                            @endforeach
                          </select>
                          @error('F10_entidadFederativa_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F10_municipioAlcaldia">
                          <label for="F10_municipioAlcaldia_clave">Municipio/Alcaldía: <code>*</code></label>
                          <select class="form-control @error('F10_municipioAlcaldia_clave') is-invalid @enderror" id="F10_municipioAlcaldia_clave" name="F10_municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                            <option value="">Seleccionar:</option>
                            @if(old('entidadFederativa_clave'))
                              @foreach($declaracion->catalogo->inegiAlcaldias(old('entidadFederativa_clave')) as $alcaldia)
                              <option value="{{ $alcaldia->Cve_Mun }}"
                                @if($alcaldia->Cve_Mun == old('municipioAlcaldia_clave'))
                                  selected
                                @endif
                                >
                                {{ $alcaldia->Nom_Mun }}
                              </option>
                              @endforeach
                            @else

                            @endif
                          </select>
                          @error('F10_municipioAlcaldia_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F10_coloniaLocalidad">
                          <label for="F10_coloniaLocalidad">Colonia o Localidad: <code>*</code></label>
                          <select class="form-control @error('coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_coloniaLocalidad" name="F10_coloniaLocalidad">
                            <option value="">Seleccionar:</option>
                            @if(old('entidadFederativa_clave'))

                              @if(old('municipioAlcaldia_clave'))

                                  @foreach($declaracion->catalogo->inegiLocalidades(old('entidadFederativa_clave'),old('municipioAlcaldia_clave')) as $colonia)
                                  <option value="{{ $colonia->Nom_Loc }}"
                                    @if($colonia->Nom_Loc == old('coloniaLocalidad'))
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
                          @error('F10_coloniaLocalidad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F10_estadoProvincia">
                          <label for="F10_estadoProvincia">Estado/Provincia: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_estadoProvincia') is-invalid @enderror" id="F10_estadoProvincia" name="F10_estadoProvincia" placeholder="" value="@if(old('F10_estadoProvincia')){{ old('F10_estadoProvincia') }}@else @endif" maxlength="65">
                          @error('F10_estadoProvincia')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_F10_ciudadLocalidad">
                          <label for="F10_ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_ciudadLocalidad') is-invalid @enderror" id="F10_ciudadLocalidad" name="F10_ciudadLocalidad" placeholder="" value="@if(old('F10_ciudadLocalidad')){{ old('F10_ciudadLocalidad') }}@else @endif" maxlength="65">
                          @error('F10_ciudadLocalidad')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-8 mb-3" id="div_F10_calle">
                          <label for="F10_calle">Calle: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_calle') is-invalid @enderror" id="F10_calle" name="F10_calle" placeholder="" value="@if(old('F10_calle')){{ old('F10_calle') }}@else @endif" maxlength="65" required>
                          @error('F10_calle')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_exterior">
                          <label for="F10_numeroExterior">Número Exterior: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_numeroExterior') is-invalid @enderror" id="F10_numeroExterior" name="F10_numeroExterior" placeholder="" value="@if(old('F10_numeroExterior')){{ old('F10_numeroExterior') }}@else @endif" maxlength="6" required>
                          @error('F10_numeroExterior')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_interior">
                          <label for="F10_numeroInterior">Número Interior: </label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_numeroInterior') is-invalid @enderror" id="F10_numeroInterior" name="F10_numeroInterior" placeholder="" value="@if(old('F10_numeroInterior')){{ old('F10_numeroInterior') }}@else @endif" maxlength="6">
                          @error('F10_numeroInterior')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="div_cp">
                          <label for="F10_codigoPostal">Código Postal: <code>*</code></label>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_codigoPostal') is-invalid @enderror" id="F10_codigoPostal" name="F10_codigoPostal" placeholder="" value="@if(old('F10_codigoPostal')){{ old('F10_codigoPostal') }}@else @endif" maxlength="7" required >
                          @error('F10_codigoPostal')
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
                        <h4 class="mb-3">Motivo de Baja</h4>
                      </legend>
                      <div class="row" >
                        <div class="col-md-6 mb-3">
                          <label for="F10_motivoBaja_clave">Motivo de Baja 🌐 <code>*</code></label>
                          <select class="form-control @error('F10_motivoBaja_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F10_motivoBaja_clave" name="F10_motivoBaja_clave">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->motivobaja() as $baja)
                            <option value="{{ $baja->clave }}"
                              @if($baja->clave == old('F10_motivoBaja_clave'))
                              selected
                              @endif
                              >
                              {{ $baja->valor }}
                            </option>
                            @endforeach
                          </select>
                          @error('F10_motivoBaja_clave')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3" id="div_especifiqueBaja">
                        <label for="F10_especifiqueBaja">Especifica el motivo de baja: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F10_especifiqueBaja') is-invalid @enderror" id="F10_especifiqueBaja" name="F10_especifiqueBaja" value="@if(old('F10_especifiqueBaja')){{ old('F10_especifiqueBaja') }}@endif" maxlength="65" >
                       @error('F10_especifiqueBaja')
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


$("#F10_tipoInmueble_clave").ready(mostrar_inmueble);
$("#F10_tipoInmueble_clave").change(mostrar_inmueble);

function mostrar_inmueble()
{
  var inmuebleValue = $("#F10_tipoInmueble_clave").val();

  if(inmuebleValue == "OTRO")
  {
    $('#div_especifiqueInmueble').show();
    $('#F10_especifiqueInmueble').attr("required","required");
  }
  else
  {
    $('#div_especifiqueInmueble').hide();
    $('#F10_especifiqueInmueble').removeAttr("required");
  }
}

$("#F10_relacion_clave").ready(tiporelacion);
$("#F10_relacion_clave").change(tiporelacion);

 function tiporelacion()
{
  var relValue = $("#F10_relacion_clave").val();

  if(relValue == "OTRO")
  {
    $('#div_especifiqueRelacion').show();
    $('#F10_especifiqueRelacion').attr("required","required");
  }
  else
  {
    $('#div_especifiqueRelacion').hide();
    $('#F10_especifiqueRelacion').removeAttr("required");
  }
}

$("#F10_formaPago").ready(pago);
$("#F10_formaPago").change(pago);

function pago()
{
  var pagoValue = $("#F10_formaPago").val();

  if(pagoValue == "NO APLICA")
  {
    $('#div_valorAdquisicion').hide();
    $('#F10_valorAdquisicion_valor').removeAttr("required");
    $('#F10_valorAdquisicion_moneda').removeAttr("required");
  }
  else if (pagoValue == "")
  {
    $('#div_valorAdquisicion').hide();
    $('#F10_valorAdquisicion_valor').removeAttr("required");
    $('#F10_valorAdquisicion_moneda').removeAttr("required");
  }
  else
  {
    $('#div_valorAdquisicion').show();
    $('#F10_valorAdquisicion_valor').attr("required","required");
    $('#F10_valorAdquisicion_moneda').attr("required","required");
  }
}

$(document).ready(function(){

  $("#F10_pais").ready(mostrar_mexico);
  $("#F10_pais").change(mostrar_mexico);

  $("#F10_entidadFederativa_clave").change(mostrar_alcaldias);
  $("#F10_municipioAlcaldia_clave").change(mostrar_localidades);
  $("#F10_coloniaLocalidad").change(mostrar_cp);


  function mostrar_mexico()
  {
    var paisValue = $("#F10_pais").val();

    if(paisValue == "")
    {
     $('#div_F10_entidadFederativa').hide();
     $('#div_F10_municipioAlcaldia').hide();
     $('#div_F10_coloniaLocalidad').hide();

     $('#div_F10_estadoProvincia').hide();
     $('#div_F10_ciudadLocalidad').hide();
     $('#div_F10_calle').hide();
     $('#div_exterior').hide();
     $('#div_interior').hide();
     $('#div_cp').hide();
    }
    else if(paisValue == "MX")
    {
      $('#div_F10_entidadFederativa').show();
      $('#div_F10_municipioAlcaldia').show();
      $('#div_F10_coloniaLocalidad').show();
      $('#div_F10_calle').show();
      $('#div_exterior').show();
      $('#div_interior').show();
      $('#div_cp').show();

      $('#div_F10_estadoProvincia').hide();
      $('#div_F10_ciudadLocalidad').hide();

      $('#F10_entidadFederativa_clave').attr("required","required");
      $('#F10_municipioAlcaldia_clave').attr("required","required");
      $('#F10_coloniaLocalidad').attr("required","required");
      $('#F10_entidadFederativa_clave').attr("name","F10_entidadFederativa_clave");
      $('#F10_municipioAlcaldia_clave').attr("name","F10_municipioAlcaldia_clave");
      $('#F10_coloniaLocalidad').attr("name","F10_coloniaLocalidad");
      $('#F10_codigoPostal').attr("readonly","readonly");

      $('#F10_estadoProvincia').removeAttr("name");
      $('#F10_ciudadLocalidad').removeAttr("name");
      $('#F10_estadoProvincia').removeAttr("required");
      $('#F10_ciudadLocalidad').removeAttr("required");
    }
    else
    {
      $('#div_F10_entidadFederativa').hide();
      $('#div_F10_municipioAlcaldia').hide();
      $('#div_F10_coloniaLocalidad').hide();

      $('#div_F10_estadoProvincia').show();
      $('#div_F10_ciudadLocalidad').show();

      $('#F10_estadoProvincia').attr("required","required");
      $('#F10_ciudadLocalidad').attr("required","required");
      $('#F10_estadoProvincia').attr("name","F10_estadoProvincia");
      $('#F10_ciudadLocalidad').attr("name","F10_ciudadLocalidad");

      $("#F10_entidadFederativa_clave").removeAttr("name");
      $('#F10_municipioAlcaldia_clave').removeAttr("name");
      $('#F10_coloniaLocalidad').removeAttr("name");
      $("#F10_entidadFederativa_clave").removeAttr("required");
      $('#F10_municipioAlcaldia_clave').removeAttr("required");
      $('#F10_coloniaLocalidad').removeAttr("required");

      $('#F10_codigoPostal').removeAttr("readonly");
      $('#F10_codigoPostal').attr("maxlength","13");
    }
  }



  function mostrar_alcaldias()
  {
    var entidadValue = $("#F10_entidadFederativa_clave").val();
    $('#F10_municipioAlcaldia_clave').find('option').not(':first').remove();

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

          for(var i=0; i<len; i++)
          {
            var id = response[i].Cve_Mun;
            var nombre = response[i].Nom_Mun;
            var entidad = response[i].Cve_Ent;
            var option = "<option value='"+id+"'>"+nombre+"</option>";

            $("#F10_municipioAlcaldia_clave").append(option);
            $('#F10_coloniaLocalidad').find('option').not(':first').remove();
          }
        }
      }
    });
  };



  function mostrar_localidades()
  {
    var entidadValue = $("#F10_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F10_municipioAlcaldia_clave").val();

    $('#F10_coloniaLocalidad').find('option').not(':first').remove();

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
            $("#F10_coloniaLocalidad").append(option);
          }
        }
      }
    });
  }



  function mostrar_cp()
  {
    var entidadValue = $("#F10_entidadFederativa_clave").val();
    var alcaldiaValue = $("#F10_municipioAlcaldia_clave").val();
    var localidadValue = $("#F10_coloniaLocalidad").val();

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
            $("#F10_codigoPostal").val(cp);
            $("#F10_codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }//////

});

$("#F10_transmisor_tipoPersona").ready(largo_rfc);
$("#F10_transmisor_tipoPersona").change(largo_rfc);

$("#F10_tercero_tipoPersona").ready(largo_rfc);
$("#F10_tercero_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcTransmisorValue = $("#F10_transmisor_tipoPersona").val();
  var rfcTerceroValue = $("#F10_tercero_tipoPersona").val();

  if(rfcTransmisorValue == "MORAL")
  {
    $('#F10_transmisor_rfc').attr("maxlength","12");
    $('#F10_transmisor_rfc').attr("minlength","12");
  }
  else
  {
    $('#F10_transmisor_rfc').attr("maxlength","13");
    $('#F10_transmisor_rfc').attr("minlength","13");
  }

    if(rfcTerceroValue == "MORAL")
  {
    $('#F10_tercero_rfc').attr("maxlength","12");
    $('#F10_tercero_rfc').attr("minlength","12");
  }
  else
  {
    $('#F10_tercero_rfc').attr("maxlength","13");
    $('#F10_tercero_rfc').attr("minlength","13");
  }

}

$("#F10_motivoBaja_clave").ready(baja);
$("#F10_motivoBaja_clave").change(baja);

function baja()
{
  var bajaValue = $("#F10_motivoBaja_clave").val();

  if(bajaValue == "OTRO")
  {
    $('#div_especifiqueBaja').show();
    $('#F10_especifiqueBaja').attr("required","required");
  }
  else
  {
    $('#div_especifiqueBaja').hide();
    $('#F10_especifiqueBaja').removeAttr("required");
  }
}




@endsection
