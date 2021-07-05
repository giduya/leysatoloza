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
              Datos Curriculares del Declarante
              <br>
              <small> </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="F3_tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">¿Qué estudiaste?:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="escolaridadNivel">Nivel: 🌐 <code>*</code></label>
                        <select class="form-control @error('escolaridadNivel') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="escolaridadNivel" name="escolaridadNivel" autofocus required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivel() as $nivel)
                          <option value="{{ $nivel->clave }}"
                            @if($nivel->clave == old('escolaridadNivel'))
                            selected
                            @endif
                          >
                          {{ $nivel->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('escolaridadNivel')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="F3_carreraAreaConocimiento">Carrera o área de conocimiento: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F3_carreraAreaConocimiento') is-invalid @enderror" id="F3_carreraAreaConocimiento" name="F3_carreraAreaConocimiento" value="@if(old('F3_carreraAreaConocimiento')){{ old('F3_carreraAreaConocimiento') }}@endif" required maxlength="65">
                        @error('F3_carreraAreaConocimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F3_institucionEducativa_ubicacion">Ubicación del instituto: 🌐 <code>*</code></label>
                        <select class="form-control @error('F3_institucionEducativa_ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F3_institucionEducativa_ubicacion" name="F3_institucionEducativa_ubicacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $localizacion)
                          <option value="{{ $localizacion->clave }}"
                            @if($localizacion->clave == old('F3_institucionEducativa_ubicacion'))
                            selected
                            @endif
                          >
                          {{ $localizacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F3_institucionEducativa_ubicacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="F3_institucionEducativa_nombre">Institución educativa: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('F3_institucionEducativa_nombre') is-invalid @enderror" id="F3_institucionEducativa_nombre" name="F3_institucionEducativa_nombre" value="@if(old('F3_institucionEducativa_nombre')){{ old('F3_institucionEducativa_nombre') }}@endif" required maxlength="65">
                        @error('F3_institucionEducativa_nombre')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="F3_estatus">Estatus: 🌐 <code>*</code></label>
                        <select class="form-control @error('F3_estatus') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F3_estatus" name="F3_estatus" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->estatus() as $estatus)
                          <option value="{{ $estatus->valor }}"
                          @if($estatus->valor == old('F3_estatus'))
                          selected
                          @endif
                          >
                          {{ $estatus->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F3_estatus')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="F3_documentoObtenido">Documento obtenido: 🌐 <code>*</code></label>
                        <select class="form-control @error('F3_documentoObtenido') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F3_documentoObtenido" name="F3_documentoObtenido" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->documentoObtenido() as $documento)
                          <option value="{{ $documento->clave }}"
                          @if($documento->valor == old('F3_documentoObtenido'))
                          selected
                          @endif
                          >
                          {{ $documento->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('F3_documentoObtenido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="F3_fechaObtencion">Fecha del documento 🌐 <code>*</code> </label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('F3_fechaObtencion') is-invalid @enderror" id="F3_fechaObtencion" name="F3_fechaObtencion" value="@if(old('F3_fechaObtencion')){{ old('F3_fechaObtencion') }}@endif" required>
                        @error('F3_fechaObtencion')
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
$("#escolaridadNivel").ready(area);
$("#escolaridadNivel").change(area);

function area()
{
  var nivelValue = $("#escolaridadNivel" ).val();

  if(nivelValue == "PRI")
  {
    $('#F3_carreraAreaConocimiento').attr("value", "EDUCACIÓN BÁSICA");
    $('#F3_carreraAreaConocimiento').attr("readonly", "readonly");
    $("#F3_documentoObtenido option[value='TITULO']").remove();
  }
  if(nivelValue == "SEC")
  {
    $('#F3_carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA");
    $('#F3_carreraAreaConocimiento').attr("readonly", "readonly");
    $("#F3_documentoObtenido option[value='TITULO']").remove();
  }
  if(nivelValue == "BCH")
  {
    $('#F3_carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA SUPERIOR");
    $('#F3_carreraAreaConocimiento').attr("readonly", "readonly");
  }
  if(nivelValue == "CTC" || nivelValue == "LIC")
  {
    $('#F3_carreraAreaConocimiento').attr("value", "");
    $('#F3_carreraAreaConocimiento').attr("placeholder", "¿Cual es tu carrera? ");
    $('#F3_carreraAreaConocimiento').removeAttr("readonly");
  }
  if(nivelValue == "MAE" || nivelValue == "ESP" || nivelValue == "DOC")
  {
    $('#F3_carreraAreaConocimiento').attr("value", "");
    $('#F3_carreraAreaConocimiento').attr("placeholder", "¿En que te especializaste?");
    $('#F3_carreraAreaConocimiento').removeAttr("readonly");
  }
  if(0 === nivelValue.length)
  {
    $('#F3_carreraAreaConocimiento').removeAttr("readonly");
    $('#F3_carreraAreaConocimiento').removeAttr("value");
    $('#F3_carreraAreaConocimiento').removeAttr("placeholder");
  }
}
@endsection
