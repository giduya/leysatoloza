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
              ¿TE DESEMPEÑASTE COMO SERVIDOR PÚBLICO EN EL AÑO INMEDIATO ANTERIOR?
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">
                Ingresos netos, recibidos durante el tiempo en el que se desempeñó como servidor público en el año inmediato anterior.
                <p>&nbsp;</p>

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label for="F09_servidorPublicoAnioAnterior">¿Te desesmpeñaste cómo servidor público el año inmediato anterior? 🌐 <code>*</code></label>
                      <select class="form-control @error('F09_servidorPublicoAnioAnterior') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F09_servidorPublicoAnioAnterior" name="F09_servidorPublicoAnioAnterior">
                        <option value="">Seleccione...</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                      </select>
                      @error('F09_servidorPublicoAnioAnterior')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <p>&nbsp;</p>

                  <fieldset id="fieldset_anterior">
                    <legend><h4 class="mb-3">Datos del Cargo Anterior:</h4></legend>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="F09_fechaIngreso">Fecha de Ingreso: 🌐 <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('F09_fechaIngreso') is-invalid @enderror" id="F09_fechaIngreso" name="F09_fechaIngreso"  value="@if(old('F09_fechaIngreso')){{ old('F09_fechaIngreso') }}@endif" maxlength="10" required="required">
                          @error('F09_fechaIngreso')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                          <label for="fechaConclusion">Fecha de Conclusión: 🌐 <code>*</code></label>
                          <input type="date" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('fechaConclusion') is-invalid @enderror" id="fechaConclusion" name="fechaConclusion" value="@if(old('fechaConclusion')){{ old('fechaConclusion') }}@endif" maxlength="10" required="required">
                          @error('fechaConclusion')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </fieldset>

                    <p>&nbsp;</p>

                    <fieldset id="fieldset_remuneracion">

                      <div class="form-group row">
                        <label for="remuneracionNetaCargoPublico_valor" class="col-sm-4 col-form-label">
                          I. Remuneración Anual neta del declarante por su cargo público: 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('remuneracionNetaCargoPublico_valor') is-invalid @enderror" id="remuneracionNetaCargoPublico_valor" name="remuneracionNetaCargoPublico_valor" value="@if(old('remuneracionNetaCargoPublico_valor')){{ old('remuneracionNetaCargoPublico_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('remuneracionNetaCargoPublico_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('remuneracionNetaCargoPublico_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="remuneracionNetaCargoPublico_moneda" name="remuneracionNetaCargoPublico_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('remuneracionNetaCargoPublico_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('remuneracionNetaCargoPublico_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('remuneracionNetaCargoPublico_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="otrosIngresosTotal_valor" class="col-sm-4 col-form-label">
                          II. Otros ingresos del declarante (Suma del II.1 al II.5)🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('otrosIngresosTotal_valor') is-invalid @enderror" id="otrosIngresosTotal_valor" name="otrosIngresosTotal_valor" value="@if(old('otrosIngresosTotal_valor')){{ old('otrosIngresosTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('otrosIngresosTotal_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('otrosIngresosTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otrosIngresosTotal_moneda" name="otrosIngresosTotal_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('otrosIngresosTotal_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('otrosIngresosTotal_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('otrosIngresosTotal_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="actividadIndustialComercialEmpresarial_remuneracionTotal_valor" class="col-sm-4 col-form-label">
                        II.1 Por actividad industrial, comercial y/o empresarial 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('actividadIndustialComercialEmpresarial_remuneracionTotal_valor') is-invalid @enderror" id="actividadIndustialComercialEmpresarial_remuneracionTotal_valor" name="actividadIndustialComercialEmpresarial_remuneracionTotal_valor" value="@if(old('actividadIndustialComercialEmpresarial_remuneracionTotal_valor')){{ old('actividadIndustialComercialEmpresarial_remuneracionTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('actividadIndustialComercialEmpresarial_remuneracionTotal_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('actividadIndustialComercialEmpresarial_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="actividadIndustialComercialEmpresarial_remuneracionTotal_moneda" name="actividadIndustialComercialEmpresarial_remuneracionTotal_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('actividadIndustialComercialEmpresarial_remuneracionTotal_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('actividadIndustialComercialEmpresarial_remuneracionTotal_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('actividadIndustialComercialEmpresarial_remuneracionTotal_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="actividadFinanciera_remuneracionTotal_valor" class="col-sm-4 col-form-label">
                        II.2 Por actividad financiera (rendimientos o ganancias) (después de impuestos) 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('actividadFinanciera_remuneracionTotal_valor') is-invalid @enderror" id="actividadFinanciera_remuneracionTotal_valor" name="actividadFinanciera_remuneracionTotal_valor" value="@if(old('actividadFinanciera_remuneracionTotal_valor')){{ old('actividadFinanciera_remuneracionTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('actividadFinanciera_remuneracionTotal_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('actividadFinanciera_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="actividadFinanciera_remuneracionTotal_moneda" name="actividadFinanciera_remuneracionTotal_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('actividadFinanciera_remuneracionTotal_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('actividadFinanciera_remuneracionTotal_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('actividadFinanciera_remuneracionTotal_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="serviciosProfesionales_remuneracionTotal_valor" class="col-sm-4 col-form-label">
                        II.3 Por servicios profesionales, consejos, consultorías y / o asesorías 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('serviciosProfesionales_remuneracionTotal_valor') is-invalid @enderror" id="serviciosProfesionales_remuneracionTotal_valor" name="serviciosProfesionales_remuneracionTotal_valor" value="@if(old('serviciosProfesionales_remuneracionTotal_valor')){{ old('serviciosProfesionales_remuneracionTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('serviciosProfesionales_remuneracionTotal_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('serviciosProfesionales_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="serviciosProfesionales_remuneracionTotal_moneda" name="serviciosProfesionales_remuneracionTotal_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('serviciosProfesionales_remuneracionTotal_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('serviciosProfesionales_remuneracionTotal_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('serviciosProfesionales_remuneracionTotal_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="enajenacionBienes_remuneracionTotal_valor" class="col-sm-4 col-form-label">
                        II.4 Por enajenación de bienes (después de impuestos) 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('enajenacionBienes_remuneracionTotal_valor') is-invalid @enderror" id="enajenacionBienes_remuneracionTotal_valor" name="enajenacionBienes_remuneracionTotal_valor" value="@if(old('enajenacionBienes_remuneracionTotal_valor')){{ old('enajenacionBienes_remuneracionTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('enajenacionBienes_remuneracionTotal_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('enajenacionBienes_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="enajenacionBienes_remuneracionTotal_moneda" name="enajenacionBienes_remuneracionTotal_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('enajenacionBienes_remuneracionTotal_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('enajenacionBienes_remuneracionTotal_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('enajenacionBienes_remuneracionTotal_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="otrosIngresos_remuneracionTotal_valor" class="col-sm-4 col-form-label">
                        II.5 Otros ingresos no considerados anteriormente 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('otrosIngresos_remuneracionTotal_valor') is-invalid @enderror" id="otrosIngresos_remuneracionTotal_valor" name="otrosIngresos_remuneracionTotal_valor" value="@if(old('otrosIngresos_remuneracionTotal_valor')){{ old('otrosIngresos_remuneracionTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('otrosIngresos_remuneracionTotal_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('otrosIngresos_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otrosIngresos_remuneracionTotal_moneda" name="otrosIngresos_remuneracionTotal_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('otrosIngresos_remuneracionTotal_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('otrosIngresos_remuneracionTotal_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('otrosIngresos_remuneracionTotal_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="ingresoNetoAnualDeclarante_valor" class="col-sm-4 col-form-label">
                        A. Ingreso anual neto del declarante (suma del numeral I y II) 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoNetoAnualDeclarante_valor') is-invalid @enderror" id="ingresoNetoAnualDeclarante_valor" name="ingresoNetoAnualDeclarante_valor" value="@if(old('ingresoNetoAnualDeclarante_valor')){{ old('ingresoNetoAnualDeclarante_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('ingresoNetoAnualDeclarante_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('ingresoNetoAnualDeclarante_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoNetoAnualDeclarante_moneda" name="ingresoNetoAnualDeclarante_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('ingresoNetoAnualDeclarante_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('ingresoNetoAnualDeclarante_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('ingresoNetoAnualDeclarante_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="ingresoNetoAnualParejaDependiente_valor" class="col-sm-4 col-form-label">
                        B. Ingreso anual neto de la pareja y/o dependientes económicos 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoNetoAnualParejaDependiente_valor') is-invalid @enderror" id="ingresoNetoAnualParejaDependiente_valor" name="ingresoNetoAnualParejaDependiente_valor" value="@if(old('ingresoNetoAnualParejaDependiente_valor')){{ old('ingresoNetoAnualParejaDependiente_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('ingresoNetoAnualParejaDependiente_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('ingresoNetoAnualParejaDependiente_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoNetoAnualParejaDependiente_moneda" name="ingresoNetoAnualParejaDependiente_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('ingresoNetoAnualParejaDependiente_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('ingresoNetoAnualParejaDependiente_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('ingresoNetoAnualParejaDependiente_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="totalIngresosNetosAnuales_valor" class="col-sm-4 col-form-label">
                        Total de ingresos anuales netos percibidos por el declarante, pareja y / o dependientes económicos 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('totalIngresosNetosAnuales_valor') is-invalid @enderror" id="totalIngresosNetosAnuales_valor" name="totalIngresosNetosAnuales_valor" value="@if(old('totalIngresosNetosAnuales_valor')){{ old('totalIngresosNetosAnuales_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('totalIngresosNetosAnuales_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('totalIngresosNetosAnuales_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="totalIngresosNetosAnuales_moneda" name="totalIngresosNetosAnuales_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('totalIngresosNetosAnuales_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('totalIngresosNetosAnuales_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('totalIngresosNetosAnuales_moneda')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                    </fieldset>

                    <legend>
                      <h4 class="mb-3">
                        <label for="aclaracionesObservaciones">
                          Aclaraciones / Observaciones:
                        </label>
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <textarea tabindex="8" class="form-control" id="F09_aclaracionesObservaciones" rows="7" name="F09_aclaracionesObservaciones" placeholder="">@if(old('F09_aclaracionesObservaciones')){{ old('F09_aclaracionesObservaciones') }}@else{{$declaracion->F09_aclaracionesObservaciones }}@endif</textarea>
                      </div>
                    </div>
                  </fieldset>

                  <button tabindex="16" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

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

$("#F09_servidorPublicoAnioAnterior").ready(mostrartodo)
$("#F09_servidorPublicoAnioAnterior").change(mostrartodo)

function mostrartodo()
{
  var todoValue = $("#F09_servidorPublicoAnioAnterior").val();

  if (todoValue == 1)
  {
    $('#fieldset_anterior').show();
    $('#fieldset_remuneracion').show();  }
  else
  {
   $('#fieldset_anterior').hide(); 
   $('#fieldset_remuneracion').hide();
  }
}



@endsection
