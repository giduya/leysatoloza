@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="F5_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>

                    <legend><h4 class="mb-3">Experiencia laboral (últimos cinco empleos):</h4></legend>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F5_ambitoSector_clave">Sector en el que laboraste: 🌐 <code>*</code></label>
                        <select class="form-control @error('F5_ambitoSector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F5_ambitoSector_clave" name="F5_ambitoSector_clave" required>
                          @foreach($declaracion->catalogo->ambitoSector() as $ambito)
                          <option value="{{ $ambito->clave }}"
                            @if($ambito->clave == old('F5_ambitoSector_clave'))
                            selected
                            @endif
                            >
                            {{ $ambito->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F5_ambitoSector_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3 otr">
                        <label for="F5_especifiqueAmbito">Especifique el sector 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_especifiqueAmbito') is-invalid @enderror" id="F5_especifiqueAmbito" name="F5_especifiqueAmbito" value="@if(old('F5_especifiqueAmbito')){{ old('F5_especifiqueAmbito') }}@endif" maxlength="65">
                        @error('F5_especifiqueAmbito')
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
                          Experiencia laboral en
                          <span class="pub">el sector público:</span>
                          <span class="prv">el sector privado:</span>
                          <span class="otr">otro sector:</span>
                        </h4>
                      </legend>

                    <div class="row">
                      <div class="col-md-8 mb-3">
                        <label for="F5_nombreEnte">
                          <span class="pub">Nombre ente público:</span>
                          <span class="prv">Nombre empresa:</span>
                          <span class="otr">Nombre asociación:</span>
                          🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_nombreEnte') is-invalid @enderror" id="F5_nombreEnte" name="F5_nombreEnte" @if(old('F5_nombreEnte')) value="{{ old('F5_nombreEnte') }}" @endif required maxlength="65">
                        @error('F5_nombreEnte')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="F5_div_rfc">
                        <label for="F5_rfc">RFC: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_rfc') is-invalid @enderror" id="F5_rfc" name="F5_rfc" value="@if(old('F5_rfc')){{ old('F5_rfc') }}@endif" maxlength="12" minlength="12">
                        @error('F5_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 pub" id="div_nivelOrdenGobierno">
                        <label for="F5_nivelOrdenGobierno">Nivel de gobierno: 🌐 <code>*</code></label>
                        <select class="form-control @error('F5_nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F5_nivelOrdenGobierno" name="F5_nivelOrdenGobierno" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelOrdenGobierno() as $nivel)
                          <option value="{{ $nivel->valor }}"
                            @if($nivel->valor == old('F5_nivelOrdenGobierno'))
                            selected
                            @endif
                            >
                            {{ $nivel->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F5_nivelOrdenGobierno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 pub" id="div_ambitoPublico">
                        <label for="F5_ambitoPublico">Ámbito público: 🌐 <code>*</code></label>
                        <select class="form-control @error('F5_ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F5_ambitoPublico" name="F5_ambitoPublico" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->ambitoPublico() as $ambito)
                          <option value="{{ $ambito->valor }}"
                            @if($ambito->valor == old('F5_ambitoPublico'))
                            selected
                            @endif
                            >
                            {{ $ambito->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F5_ambitoPublico')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F5_area">Área: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_area') is-invalid @enderror" id="F5_area" name="F5_area" value="@if(old('F5_area')){{ old('F5_area') }}@endif" required maxlength="65">
                        @error('F5_area')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F5_empleoCargoComision">Cargo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_empleoCargoComision') is-invalid @enderror" id="F5_empleoCargoComision" name="F5_empleoCargoComision" value="@if(old('F5_empleoCargoComision')){{ old('F5_empleoCargoComision') }}@endif" required maxlength="65">
                        @error('F5_empleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3 pub" id="div_funcionPrincipal">
                        <label for="F5_funcionPrincipal">Función principal: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_funcionPrincipal') is-invalid @enderror" id="F5_funcionPrincipal" name="F5_funcionPrincipal" value="@if(old('F5_funcionPrincipal')){{ old('F5_funcionPrincipal') }}@endif" maxlenght="50">
                        @error('F5_funcionPrincipal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="F5_div_sector">
                        <label for="F5_sector_clave">Sector: 🌐 <code>*</code></label>
                        <select class="form-control @error('F5_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F5_sector_clave" name="F5_sector_clave" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->sector() as $sector)
                          <option value="{{ $sector->clave }}"
                            @if($sector->clave == old('F5_sector_clave'))
                            selected
                            @endif
                            >
                            {{ $sector->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F5_sector_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_otro">
                        <label for="F5_otro">Otro sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_otro') is-invalid @enderror" id="F5_otro" name="F5_otro" value="@if(old('F5_otro')){{ old('F5_otro') }}@endif">
                        @error('F5_otro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F5_fechaIngreso">Fecha ingreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_fechaIngreso') is-invalid @enderror" id="F5_fechaIngreso" name="F5_fechaIngreso" value="@if(old('F5_fechaIngreso')){{ old('F5_fechaIngreso') }}@endif" required>
                        <code>Aproximada</code>
                        @error('F5_fechaIngreso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F5_fechaEgreso">Fecha egreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F5_fechaEgreso') is-invalid @enderror" id="F5_fechaEgreso" name="F5_fechaEgreso" value="@if(old('F5_fechaEgreso')){{ old('F5_fechaEgreso') }}@endif" required>
                        <code>Aproximada</code>
                        @error('F5_fechaEgreso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F5_ubicacion">Ubicación: 🌐 <code>*</code></label>
                        <select class="form-control @error('F5_ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F5_ubicacion" name="F5_ubicacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $ubicacion)
                          <option value="{{ $ubicacion->clave }}"
                            @if($ubicacion->clave == old('F5_ubicacion'))
                            selected
                            @endif
                            >
                            {{ $ubicacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F5_ubicacion')
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
$("#F5_ambitoSector_clave").ready(ambito);
$("#F5_ambitoSector_clave").change(ambito);

function ambito()
{
  var ambitoValue = $("#F5_ambitoSector_clave").val();

  if(ambitoValue == "PRV")
  {
    $('.prv').show();
    $('.pub').hide();
    $('.otr').hide();
    $('#F5_div_rfc').show();
    $('#F5_div_sector').show();
    $('#F5_nivelOrdenGobierno').removeAttr('required');
    $('#F5_ambitoPublico').removeAttr('required');
    $('#F5_rfc').attr('required',"required");
    $('#F5_sector_clave').attr('required',"required");
    $('#F5_funcionPrincipal').removeAttr('required');
  }
  if(ambitoValue == "PUB")
  {
    $('.prv').hide();
    $('.pub').show();
    $('.otr').hide();
    $('#F5_div_rfc').hide();
    $('#F5_div_sector').hide();
    $('#F5_nivelOrdenGobierno').attr('required',"required");
    $('#F5_ambitoPublico').attr('required',"required");
    $('#F5_rfc').removeAttr('required');
    $('#F5_sector_clave').removeAttr('required');
    $('#F5_funcionPrincipal').attr('required',"required");
  }
  if(ambitoValue == "OTR")
  {
    $('.prv').hide();
    $('.pub').hide();
    $('.otr').show();
    $('#F5_div_rfc').show();
    $('#F5_div_sector').show();
    $('#F5_rfc').attr('required',"required");
    $('#F5_sector_clave').attr('required',"required");
    $('#F5_nivelOrdenGobierno').removeAttr('required');
    $('#F5_ambitoPublico').removeAttr('required');
    $('#F5_funcionPrincipal').removeAttr('required');
    $('#F5_sector_clave').attr('required',"required");
  }
  else
  {
    $('.otr').hide();
  }
}

$("#F5_sector_clave").ready(otro);
$("#F5_sector_clave").change(otro);

function otro()
{
  var sectorValue = $("#F5_sector_clave").val();

  if(sectorValue == "OTRO")
  {
    $('#div_otro').show();
  }
  else
  {
    $('#div_otro').hide();
  }
}

@endsection
