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
              FIDEICOMISOS
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="F22_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset id="fieldset_F22_participacion">
                    <legend><h4 class="mb-3">¿Qué participación hay en el fideicomiso?:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F22_tipoRelacion">¿Quién participa en el fideicomiso?: 🌐 <code>*</code></label>
                        <select class="form-control @error('F22_tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_tipoRelacion" name="F22_tipoRelacion" required autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->clave }}"
                            @if($relacion->clave == old('F22_tipoRelacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_tipoRelacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F22_tipoParticipacion">Tipo de participación: 🌐 <code>*</code></label>
                        <select class="form-control @error('F22_tipoParticipacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_tipoParticipacion" name="F22_tipoParticipacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoParticipacionFideicomiso() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F22_tipoParticipacion'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_tipoParticipacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset >

                  <p>&nbsp;</p>

                  <fieldset id="fieldset_F22_datos">
                    <legend><h4 class="mb-3">Datos del fideicomiso:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F22_tipoFideicomiso">Tipo: 🌐 <code>*</code></label>
                        <select class="form-control @error('F22_tipoFideicomiso') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_tipoFideicomiso" name="F22_tipoFideicomiso" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoFideicomiso() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F22_tipoFideicomiso'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_tipoFideicomiso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="F22_rfcFideicomiso">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_rfcFideicomiso') is-invalid @enderror" id="F22_rfcFideicomiso" name="F22_rfcFideicomiso" @if(old('F22_rfcFideicomiso')) value="{{ old('F22_rfcFideicomiso') }}"@endif maxlength="12" minlength="12">
                        @error('F22_rfcFideicomiso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_sector">
                        <label for="F22_sector_clave">Sector: 🌐 <code>*</code></label>
                        <select class="form-control @error('F22_sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_sector_clave" name="F22_sector_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->sector() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F22_sector_clave'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_sector_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_F22_especifiqueSector">
                        <label for="F22_especifiqueSector">Otro sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_especifiqueSector') is-invalid @enderror" id="F22_especifiqueSector" name="F22_especifiqueSector" @if(old('F22_especifiqueSector')) value="{{ old('F22_especifiqueSector') }}" @endif maxlength="65">
                        @error('F22_especifiqueSector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-md-4 mb-3">
                        <label for="F22_extranjero">Ubicación: 🌐 <code>*</code></label>
                        <select class="form-control @error('F22_extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_extranjero" name="F22_extranjero" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $localizacion)
                          <option value="{{ $localizacion->clave }}"
                            @if($localizacion->clave == old('F22_extranjero'))
                            selected
                            @endif
                            >
                            {{ $localizacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_extranjero')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <p>&nbsp;</p>
                  </fieldset>



                  <fieldset id="fieldset_F22_fiduciario">
                    <legend>
                      <h4 class="mb-3">
                        Datos del fiduciario:
                        <small>
                        <br>
                        El fiduciario es una persona física o moral que ha sido designada como responsable de administrar el dinero, propiedades y patrimonio de otra persona, es decir, está encargada de gestionar sus bienes.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="F22_fiduciario_nombreRazonSocial">Nombre o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_fiduciario_nombreRazonSocial') is-invalid @enderror" id="F22_fiduciario_nombreRazonSocial" name="F22_fiduciario_nombreRazonSocial" @if(old('F22_fiduciario_nombreRazonSocial')) value="{{ old('F22_fiduciario_nombreRazonSocial') }}" @endif maxlength="65">
                        @error('F22_fiduciario_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F22_fiduciario_rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_fiduciario_rfc') is-invalid @enderror" id="F22_fiduciario_rfc" name="F22_fiduciario_rfc" @if(old('F22_fiduciario_rfc')) value="{{ old('F22_fiduciario_rfc') }}" @endif maxlength="13" minlength="12">
                        @error('F22_fiduciario_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                     <p>&nbsp;</p>
                  </fieldset>



                  <fieldset id="fieldset_F22_fideicomitente">
                    <legend>
                      <h4 class="mb-3">
                        Datos del fideicomitente:
                        <small>
                          <br>
                          El fideicomitente es la persona física o moral que establece un fideicomiso, es decir, que entrega ciertos bienes a otra persona, para que los administre y utilice de acuerdo con un fin determinado. Sólo pueden hacerlo aquellas personas físicas o morales que legalmente puedan gestionar los bienes.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="F22_fideicomitente_tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('F22_fideicomitente_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_fideicomitente_tipoPersona" name="F22_fideicomitente_tipoPersona" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F22_fideicomitente_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_fideicomitente_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F22_fideicomitente_nombreRazonSocial">Nombre o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_fideicomitente_nombreRazonSocial') is-invalid @enderror" id="F22_fideicomitente_nombreRazonSocial" name="F22_fideicomitente_nombreRazonSocial" @if(old('F22_fideicomitente_nombreRazonSocial')) value="{{ old('F22_fideicomitente_nombreRazonSocial') }}" @endif maxlength="65" >
                        @error('F22_fideicomitente_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F22_fideicomitente_rfc">RFC: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_fideicomitente_rfc') is-invalid @enderror" id="F22_fideicomitente_rfc" name="F22_fideicomitente_rfc" @if(old('F22_fideicomitente_rfc')) value="{{ old('F22_fideicomitente_rfc') }}" @endif maxlength="13" minlength="12">
                        @error('F22_fideicomitente_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                    <p>&nbsp;</p>
                  </fieldset>


                  <fieldset id="fieldset_F22_fideicomisario">
                    <legend>
                      <h4 class="mb-3">
                        Datos del fideicomisario:
                        <br>
                        <small>
                          El fideicomisario es el beneficiario que fue nombrado en el contrato de fideicomiso. Puede ser una persona física o moral, que recibirá bienes, valores o recursos cuando se cumplan las condiciones establecidas.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="F22_fideicomisario_tipoPersona">
                          Tipo de persona: 🌐 <code>*</code>
                        </label>
                        <select class="form-control @error('F22_fideicomisario_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F22_fideicomisario_tipoPersona" name="F22_fideicomisario_tipoPersona">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('F22_fideicomisario_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F22_fideicomisario_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="F22_fideicomisario_nombreRazonSocial">
                          Nombre o razón social: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_fideicomisario_nombreRazonSocial') is-invalid @enderror" id="F22_fideicomisario_nombreRazonSocial" name="F22_fideicomisario_nombreRazonSocial" @if(old('F22_fideicomisario_nombreRazonSocial')) value="{{ old('F22_fideicomisario_nombreRazonSocial') }}" @endif maxlength="65">
                        @error('F22_fideicomisario_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="F22_fideicomisario_rfc">
                          RFC: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F22_fideicomisario_rfc') is-invalid @enderror" id="F22_fideicomisario_rfc" name="F22_fideicomisario_rfc" @if(old('F22_fideicomisario_rfc')) value="{{ old('F22_fideicomisario_rfc') }}" @endif>
                        @error('F22_fideicomisario_rfc')
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
@endsection


@section('script')
$("#F22_sector_clave").ready(mostrar_sect);
$("#F22_sector_clave").change(mostrar_sect);

function mostrar_sect()
{
  var sectValue = $("#F22_sector_clave").val();

  if(sectValue == "OTRO")
  {
    $('#div_F22_especifiqueSector').show();
    $('#F22_especifiqueSector').attr("required", "required");
  }
  else
  {
    $('#div_F22_especifiqueSector').hide();
    $("#F22_especifiqueSector").removeAttr("required");
  }
}


$("#F22_fideicomitente_tipoPersona").ready(largo_rfc);
$("#F22_fideicomitente_tipoPersona").change(largo_rfc);

$("#F22_fideicomisario_tipoPersona").ready(largo_rfc);
$("#F22_fideicomisario_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var cValue = $("#F22_fideicomitente_tipoPersona").val();
  var dValue = $("#F22_fideicomisario_tipoPersona").val();

  if(cValue == "MORAL")
  {
    $('#F22_fideicomitente_rfc').attr("maxlength","12");
    $('#F22_fideicomitente_rfc').attr("minlength","12");
  }
  else
  {
    $('#F22_fideicomitente_rfc').attr("maxlength","13");
    $('#F22_fideicomitente_rfc').attr("minlength","13");
  }

  if(dValue == "MORAL")
  {
    $('#F22_fideicomisario_rfc').attr("maxlength","12");
    $('#F22_fideicomisario_rfc').attr("minlength","12");
  }
  else
  {
    $('#F22_fideicomisario_rfc').attr("maxlength","13");
    $('#F22_fideicomisario_rfc').attr("minlength","13");
  }
}

$("#F22_tipoParticipacion").ready(mostrar_part);
$("#F22_tipoParticipacion").change(mostrar_part);

function mostrar_part()
{
  var partValue = $("#F22_tipoParticipacion").val();

  if(partValue == "")
  {
    $('#fieldset_F22_fiduciario').hide();
    $('#fieldset_F22_fideicomitente').hide();
    $('#fieldset_F22_fideicomisario').hide();

    $('#F22_fiduciario_nombreRazonSocial').removeAttr("required");
    $('#F22_fiduciario_rfc').removeAttr("required");

    $('#F22_fideicomitente_tipoPersona').removeAttr("required");
    $('#F22_fideicomitente_nombreRazonSocial').removeAttr("required");
    $('#F22_fideicomitente_rfc').removeAttr("required");

    $('#F22_fideicomisario_tipoPersona').removeAttr("required");
    $('#F22_fideicomisario_nombreRazonSocial').removeAttr("required");
    $('#F22_fideicomisario_rfc').removeAttr("required");
  }
  if(partValue == "FIDUCIARIO")
  {
    $('#fieldset_F22_fiduciario').show();
    $('#fieldset_F22_fideicomitente').hide();
    $('#fieldset_F22_fideicomisario').hide();

    $('#F22_fiduciario_nombreRazonSocial').attr("required","required");
    $('#F22_fiduciario_rfc').attr("required","required");

    $('#F22_fideicomitente_tipoPersona').removeAttr("required");
    $('#F22_fideicomitente_nombreRazonSocial').removeAttr("required");
    $('#F22_fideicomitente_rfc').removeAttr("required");

    $('#F22_fideicomisario_tipoPersona').removeAttr("required");
    $('#F22_fideicomisario_nombreRazonSocial').removeAttr("required");
    $('#F22_fideicomisario_rfc').removeAttr("required");
  }
  else if(partValue == "FIDEICOMITENTE")
  {
    $('#fieldset_F22_fideicomitente').show();
    $('#fieldset_F22_fiduciario').hide();
    $('#fieldset_F22_fideicomisario').hide();

    $('#F22_fiduciario_nombreRazonSocial').removeAttr("required");
    $('#F22_fiduciario_rfc').removeAttr("required");

    $('#F22_fideicomitente_tipoPersona').attr("required","required");
    $('#F22_fideicomitente_nombreRazonSocial').attr("required","required");
    $('#F22_fideicomitente_rfc').attr("required","required");

    $('#F22_fideicomisario_tipoPersona').removeAttr("required");
    $('#F22_fideicomisario_nombreRazonSocial').removeAttr("required");
    $('#F22_fideicomisario_rfc').removeAttr("required");
  }
  else if(partValue == "FIDEICOMISARIO")
  {
   $('#fieldset_F22_fideicomisario').show();
   $('#fieldset_F22_fideicomitente').hide();
    $('#fieldset_F22_fiduciario').hide();

    $('#F22_fiduciario_nombreRazonSocial').removeAttr("required");
    $('#F22_fiduciario_rfc').removeAttr("required");

    $('#F22_fideicomitente_tipoPersona').removeAttr("required");
    $('#F22_fideicomitente_nombreRazonSocial').removeAttr("required");
    $('#F22_fideicomitente_rfc').removeAttr("required");

    $('#F22_fideicomisario_tipoPersona').attr("required","required");
    $('#F22_fideicomisario_nombreRazonSocial').attr("required","required");
    $('#F22_fideicomisario_rfc').attr("required","required");
  }
  else if(partValue == "COMITE_TECNICO")
  {
   $('#fieldset_F22_fiduciario').hide();
   $('#fieldset_F22_fideicomitente').hide();
   $('#fieldset_F22_fideicomisario').hide();

   $('#F22_fiduciario_nombreRazonSocial').removeAttr("required");
   $('#F22_fiduciario_rfc').removeAttr("required");

   $('#F22_fideicomitente_tipoPersona').removeAttr("required");
   $('#F22_fideicomitente_nombreRazonSocial').removeAttr("required");
   $('#F22_fideicomitente_rfc').removeAttr("required");

   $('#F22_fideicomisario_tipoPersona').removeAttr("required");
   $('#F22_fideicomisario_nombreRazonSocial').removeAttr("required");
   $('#F22_fideicomisario_rfc').removeAttr("required");
  }
}
@endsection
