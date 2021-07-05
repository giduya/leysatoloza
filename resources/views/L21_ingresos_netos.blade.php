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
              INGRESOS NETOS DEL DECLARANTE, PAREJA Y / O DEPENDIENTES ECONÓMICOS
              <br>
              <small>(Entre el 01 de Enero y 31 de Diciembre del Año Anterior Inmediato)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <legend><h4 class="mb-3">Ingresos Netos</h4></legend>
                  </fieldset>

                  @if($declaracion->inicial == true)
                  <div class="form-group row">
                    <label for="F8_remuneracionMCPub_valor" class="col-sm-6 col-form-label">
                      I. Remuneración mensual neta del declarante por su cargo público (Por concepto de sueldos, honorarios, compensaciones, bonos y otras prestaciones) (Cantidades netas despues de impuestos): 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F8_remuneracionMCPub_valor') is-invalid @enderror" id="F8_remuneracionMCPub_valor" name="F8_remuneracionMCPub_valor" value="@if(old('F8_remuneracionMCPub_valor')){{ old('F8_remuneracionMCPub_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('F8_remuneracionMCPub_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('F8_remuneracionMCPub_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F8_remuneracionMCPub_moneda" name="F8_remuneracionMCPub_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('remuneracionMensualCargoPublico_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('F8_remuneracionMCPub_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('F8_remuneracionMCPub_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="F8_otrosIngMTot_valor" class="col-sm-6 col-form-label">
                      II. Otros ingresos del declarante (Suma del II.1 al II.4) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('F8_otrosIngMTot_valor') is-invalid @enderror" id="F8_otrosIngMTot_valor" name="F8_otrosIngMTot_valor" value="@if(old('F8_otrosIngMTot_valor')){{ old('F8_otrosIngMTot_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('F8_otrosIngMTot_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('F8_otrosIngMTot_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="F8_otrosIngMTot_moneda" name="F8_otrosIngMTot_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('F8_otrosIngMTot_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('otrosIngresosMensualesTotal_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('F8_otrosIngMTot_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif


                  @if($declaracion->modificacion == true)
                  <div class="form-group row">
                    <label for="remuneracionAnualCargoPublico_valor" class="col-sm-6 col-form-label">
                      I. Remuneración anual neta del declarante por su cargo público (Por concepto de sueldos, honorarios, compensaciones, bonos, aguinaldos y otras prestaciones) (Cantidades netas después de impuestos): 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('remuneracionAnualCargoPublico_valor') is-invalid @enderror" id="remuneracionAnualCargoPublico_valor" name="remuneracionAnualCargoPublico_valor" value="@if(old('remuneracionAnualCargoPublico_valor')){{ old('remuneracionAnualCargoPublico_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('remuneracionAnualCargoPublico_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('remuneracionAnualCargoPublico_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="remuneracionAnualCargoPublico_moneda" name="remuneracionAnualCargoPublico_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('remuneracionAnualCargoPublico_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('remuneracionAnualCargoPublico_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('remuneracionAnualCargoPublico_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="otrosIngresosAnualesTotal_valor" class="col-sm-6 col-form-label">
                      II. Otros ingresos del declarante (Suma del II.1 al II.4) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('otrosIngresosAnualesTotal_valor') is-invalid @enderror" id="otrosIngresosAnualesTotal_valor" name="otrosIngresosAnualesTotal_valor" value="@if(old('otrosIngresosAnualesTotal_valor')){{ old('otrosIngresosAnualesTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('otrosIngresosAnualesTotal_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('otrosIngresosAnualesTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otrosIngresosAnualesTotal_moneda" name="otrosIngresosAnualesTotal_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('otrosIngresosAnualesTotal_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('otrosIngresosAnualesTotal_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('otrosIngresosAnualesTotal_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif

                  @if($declaracion->modificacion == true)
                  <div class="form-group row">
                    <label for="remuneracionConclusionCargoPublicoo_valor" class="col-sm-6 col-form-label">
                      I. Remuneración al momento de conclusión del declarante por su cargo público (Por concepto de sueldos, honorarios, compensaciones, bonos, aguinaldos y otras prestaciones) (Cantidades netas después de impuestos): 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('remuneracionConclusionCargoPublicoo_valor') is-invalid @enderror" id="remuneracionConclusionCargoPublicoo_valor" name="remuneracionConclusionCargoPublicoo_valor" value="@if(old('remuneracionConclusionCargoPublicoo_valor')){{ old('remuneracionConclusionCargoPublicoo_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('remuneracionConclusionCargoPublicoo_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('remuneracionConclusionCargoPublicoo_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="remuneracionConclusionCargoPublicoo_moneda" name="remuneracionConclusionCargoPublicoo_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('remuneracionConclusionCargoPublicoo_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('remuneracionConclusionCargoPublicoo_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('remuneracionConclusionCargoPublicoo_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="otrosIngresosTotal_valor" class="col-sm-6 col-form-label">
                      II. Otros ingresos del declarante (Suma del II.1 al II.4) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
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
                  @endif






                  <div class="form-group row">
                    <label for="actividadIndustial_remuneracionTotal_valor" class="col-sm-6 col-form-label">
                      II.1 Por actividad industrial, comercial y / o empresarial (después de impuestos) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('actividadIndustial_remuneracionTotal_valor') is-invalid @enderror" id="actividadIndustial_remuneracionTotal_valor" name="actividadIndustial_remuneracionTotal_valor" value="@if(old('actividadIndustial_remuneracionTotal_valor')){{ old('actividadIndustial_remuneracionTotal_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('actividadIndustial_remuneracionTotal_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('actividadIndustial_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="actividadIndustial_remuneracionTotal_moneda" name="actividadIndustial_remuneracionTotal_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('actividadIndustial_remuneracionTotal_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('actividadIndustial_remuneracionTotal_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('actividadIndustial_remuneracionTotal_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="actividadFinanciera_remuneracionTotal_valor" class="col-sm-6 col-form-label">
                      II.2 Por actividad financiera (rendimientos o ganancias) (después de impuestos) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
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
                    <label for="serviciosProfesionales_remuneracionTotal_valor" class="col-sm-6 col-form-label">
                      II.3 Por servicios profesionales, consejos, consultorías y / o asesorías (después de impuestos) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
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


                  @if($declaracion->modificacion == true or $declaracion->conclusion)
                  <div class="form-group row">
                    <label for="enajenacionBienes_remuneracionTotal_valor" class="col-sm-6 col-form-label">
                      II.4 Por enajenación de bienes (después de impuestos) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
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
                  @endif


                  <div class="form-group row">
                    <label for="otrosIngresos_remuneracionTotal_valor" class="col-sm-6 col-form-label">
                      @if($declaracion->inicial == true)
                      II.4 Otros ingresos no considerados a los anteriores (después de impuestos) 🌐 <code>*</code>
                      @endif
                      @if($declaracion->modificacion == true or $declaracion->conclusion == true)
                      II.5 Otros ingresos no considerados a los anteriores (después de impuestos) 🌐 <code>*</code>
                      @endif
                    </label>
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
                      <select class="form-control @error('otrosIngresos_remuneracionTotal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otrosIngresos_remuneracionTotal_valor" name="otrosIngresos_remuneracionTotal_valor" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('otrosIngresos_remuneracionTotal_valor') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('otrosIngresos_remuneracionTotal_valor'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('otrosIngresos_remuneracionTotal_valor')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>




                  @if($declaracion->inicial == true)
                  <div class="form-group row">
                    <label for="ingresoMensualNetoDeclarante_valor" class="col-sm-6 col-form-label">
                      A. Ingreso mensual neto del declarante (Suma del numeral I y II) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoMensualNetoDeclarante_valor') is-invalid @enderror" id="ingresoMensualNetoDeclarante_valor" name="ingresoMensualNetoDeclarante_valor" value="@if(old('ingresoMensualNetoDeclarante_valor')){{ old('ingresoMensualNetoDeclarante_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('ingresoMensualNetoDeclarante_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('ingresoMensualNetoDeclarante_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoMensualNetoDeclarante_moneda" name="ingresoMensualNetoDeclarante_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('ingresoMensualNetoDeclarante_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('ingresoMensualNetoDeclarante_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('ingresoMensualNetoDeclarante_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="ingresoMensualNetoParejaDependiente_valor" class="col-sm-6 col-form-label">
                      B. Ingreso mensual neto de la pareja y/o dependientes económicos (Después de impuestos) <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoMensualNetoParejaDependiente_valor') is-invalid @enderror" id="ingresoMensualNetoParejaDependiente_valor" name="ingresoMensualNetoParejaDependiente_valor" value="@if(old('ingresoMensualNetoParejaDependiente_valor')){{ old('ingresoMensualNetoParejaDependiente_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('ingresoMensualNetoParejaDependiente_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('ingresoMensualNetoParejaDependiente_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoMensualNetoParejaDependiente_moneda" name="ingresoMensualNetoParejaDependiente_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('ingresoMensualNetoParejaDependiente_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('ingresoMensualNetoParejaDependiente_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('ingresoMensualNetoParejaDependiente_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="totalIngresosMensualesNetos_valor" class="col-sm-6 col-form-label">
                      C. Total de ingresos mensuales netos percibidos por el declarante, pareja y / o dependientes económicos (Suma de los apartados A y B)  🌐  <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('totalIngresosMensualesNetos_valor') is-invalid @enderror" id="totalIngresosMensualesNetos_valor" name="totalIngresosMensualesNetos_valor" value="@if(old('totalIngresosMensualesNetos_valor')){{ old('totalIngresosMensualesNetos_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('totalIngresosMensualesNetos_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('totalIngresosMensualesNetos_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="totalIngresosMensualesNetos_moneda" name="totalIngresosMensualesNetos_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('totalIngresosMensualesNetos_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('totalIngresosMensualesNetos_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('totalIngresosMensualesNetos_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif



                  @if($declaracion->modificacion == true)
                  <div class="form-group row">
                    <label for="ingresoAnualNetoDeclarante_valor" class="col-sm-6 col-form-label">
                      A. Ingreso anual neto del declarante (Suma del numeral I y II) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoAnualNetoDeclarante_valor') is-invalid @enderror" id="ingresoAnualNetoDeclarante_valor" name="ingresoAnualNetoDeclarante_valor" value="@if(old('ingresoAnualNetoDeclarante_valor')){{ old('ingresoAnualNetoDeclarante_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('ingresoAnualNetoDeclarante_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('ingresoAnualNetoDeclarante_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoAnualNetoDeclarante_moneda" name="ingresoAnualNetoDeclarante_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('ingresoAnualNetoDeclarante_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('ingresoAnualNetoDeclarante_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('ingresoAnualNetoDeclarante_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="ingresoAnualNetoParejaDependiente_valor" class="col-sm-6 col-form-label">
                      B. Ingreso anual neto de la pareja y/o dependientes económicos (Después de impuestos) <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoMensualNetoParejaDependiente_valor') is-invalid @enderror" id="ingresoMensualNetoParejaDependiente_valor" name="ingresoMensualNetoParejaDependiente_valor" value="@if(old('ingresoMensualNetoParejaDependiente_valor')){{ old('ingresoMensualNetoParejaDependiente_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('ingresoMensualNetoParejaDependiente_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('ingresoMensualNetoParejaDependiente_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoMensualNetoParejaDependiente_moneda" name="ingresoMensualNetoParejaDependiente_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('ingresoMensualNetoParejaDependiente_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('ingresoMensualNetoParejaDependiente_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('ingresoMensualNetoParejaDependiente_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="totalIngresosAnualesNetos_valor" class="col-sm-6 col-form-label">
                      C. Total de ingresos anuales netos percibidos por el declarante, pareja y / o dependientes económicos (Suma de los apartados A y B) <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('totalIngresosAnualesNetos_valor') is-invalid @enderror" id="totalIngresosAnualesNetos_valor" name="totalIngresosAnualesNetos_valor" value="@if(old('totalIngresosAnualesNetos_valor')){{ old('totalIngresosAnualesNetos_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('totalIngresosAnualesNetos_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('totalIngresosAnualesNetos_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="totalIngresosAnualesNetos_moneda" name="totalIngresosAnualesNetos_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('totalIngresosAnualesNetos_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('totalIngresosAnualesNetos_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('totalIngresosAnualesNetos_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif



                  @if($declaracion->conclusion == true)
                  <div class="form-group row">
                    <label for="ingresoAnualNetoDeclarante_valor" class="col-sm-6 col-form-label">
                      A. Ingreso anual neto del declarante (Suma del numeral I y II) 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoAnualNetoDeclarante_valor') is-invalid @enderror" id="ingresoAnualNetoDeclarante_valor" name="ingresoAnualNetoDeclarante_valor" value="@if(old('ingresoAnualNetoDeclarante_valor')){{ old('ingresoAnualNetoDeclarante_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('ingresoAnualNetoDeclarante_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('ingresoAnualNetoDeclarante_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoAnualNetoDeclarante_moneda" name="ingresoAnualNetoDeclarante_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('ingresoAnualNetoDeclarante_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('ingresoAnualNetoDeclarante_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('ingresoAnualNetoDeclarante_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="ingresoAnualNetoParejaDependiente_valor" class="col-sm-6 col-form-label">
                      B. Ingreso anual neto de la pareja y/o dependientes económicos (Después de impuestos) <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('ingresoMensualNetoParejaDependiente_valor') is-invalid @enderror" id="ingresoMensualNetoParejaDependiente_valor" name="ingresoMensualNetoParejaDependiente_valor" value="@if(old('ingresoMensualNetoParejaDependiente_valor')){{ old('ingresoMensualNetoParejaDependiente_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('ingresoMensualNetoParejaDependiente_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('ingresoMensualNetoParejaDependiente_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ingresoMensualNetoParejaDependiente_moneda" name="ingresoMensualNetoParejaDependiente_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('ingresoMensualNetoParejaDependiente_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('ingresoMensualNetoParejaDependiente_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('ingresoMensualNetoParejaDependiente_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="totalIngresosAnualesNetos_valor" class="col-sm-6 col-form-label">
                      C. Total de ingresos anuales netos percibidos por el declarante, pareja y / o dependientes económicos (Suma de los apartados A y B) <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('totalIngresosAnualesNetos_valor') is-invalid @enderror" id="totalIngresosAnualesNetos_valor" name="totalIngresosAnualesNetos_valor" value="@if(old('totalIngresosAnualesNetos_valor')){{ old('totalIngresosAnualesNetos_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('totalIngresosAnualesNetos_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control @error('totalIngresosAnualesNetos_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="totalIngresosAnualesNetos_moneda" name="totalIngresosAnualesNetos_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('totalIngresosAnualesNetos_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('totalIngresosAnualesNetos_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('totalIngresosAnualesNetos_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif







                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        <label for="aclaracionesObservaciones">
                          Aclaraciones / Observaciones:
                        </label>
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <textarea tabindex="{{ ++$tabindex }}" class="form-control" id="F8_aclaracionesObservaciones" rows="7" name="F8_claracionesObservaciones" placeholder="">@if(old('F8_aclaracionesObservaciones')){{ old('F8_aclaracionesObservaciones') }}@else{{ $declaracion->F8_aclaracionesObservaciones }}@endif</textarea>
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

@endsection



@section('script')

@endsection
