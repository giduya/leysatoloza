@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <ul class="nav nav-pills review-tab">
          <li class="nav-item">
            <a href="{{ url('inicio') }}" class="nav-link @if(Route::current()->uri == "inicio") active @endif">
              Declarantes
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('configuracion') }}" class="nav-link @if(Route::current()->uri == "configuracion") active @endif" >
              Configuración
            </a>
          </li>
        </ul>
        <div class="tab-content">

          @if(Route::current()->uri == "inicio")
          <div id="navpills-1" class="tab-pane active">
            <div class="card review-table">
              <div class="table-responsive">
                <table class="table header-border verticle-middle">
                  <thead>
                    <tr>
                      <th scope="col">RFC</th>
                      <th scope="col">APELLIDO PATERNO</th>
                      <th scope="col">APELLIDO MATERNO</th>
                      <th scope="col">NOMBRES</th>
                      <th scope="col">OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endif

          @if(Route::current()->uri == "configuracion")
          <div id="navpills-2" class="tab-pane active">
            <div class="card">

              <p>&nbsp;</p>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 order-md-1">

                    <form action="{{ url('configuracion') }}" method="POST" autocomplete="off">
                      @csrf

                      <fieldset>
                        <legend>
                          <h4 class="mb-3">Datos del ente público:</h4>
                        </legend>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="ente"> Nombre ente público: 🌐 <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ente') is-invalid @enderror" id="ente" name="ente" @if(old('ente')) value="{{ old('ente') }}" @else value="{{ $config->ente }}" @endif required maxlength="65">
                            @error('ente')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="estado">Estado: 🌐 <code>*</code></label>
                            <select class="form-control @error('estado') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="estado" name="estado" autofocus>
                              <option value="">Seleccionar:</option>
                              @foreach($config->catalogo->inegiEntidades() as $entidad)
                              <option value="{{ $entidad->Cve_Ent }}"
                                @if($entidad->Cve_Ent == old('F2_entidadFederativa_clave'))
                                  selected
                                @elseif($entidad->Cve_Ent == $config->estado)
                                  selected
                                @endif
                                >
                                {{ $entidad->Nom_Ent }}
                              </option>
                              @endforeach
                            </select>
                            @error('estado')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="nivel">Nivel: 🌐 <code>*</code></label>
                            <select class="form-control @error('nivel') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivel" name="nivel" required>
                              <option value="">Seleccione...</option>
                              @foreach($config->catalogo->nivelOrdenGobierno() as $gobierno)
                              <option value="{{ $gobierno->clave }}"
                                @if($gobierno->valor == old('nivel'))
                                  selected
                                @elseif($config->nivel == $gobierno->clave)
                                  selected
                                @endif
                                >
                                {{ $gobierno->valor }}
                              </option>
                              @endforeach
                            </select>
                            @error('nivel')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="ambito">Ámbito: 🌐 <code>*</code></label>
                            <select class="form-control @error('ambito') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambito" name="ambito" required>
                              <option value="">Seleccione...</option>
                              @foreach($config->catalogo->ambitoPublico() as $publico)
                              <option value="{{ $publico->clave }}"
                                @if($publico->valor == old('ambito'))
                                  selected
                                @elseif($config->ambito == $publico->clave)
                                  selected
                                @endif
                                >
                                {{ $publico->valor }}
                              </option>
                              @endforeach
                            </select>
                            @error('ambito')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>

                      </fieldset>

                      <button tabindex="{{ ++$tabindex }}" class="btn btn-primary" type="submit">Siguiente</button>

                    </form>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                    <form action="{{ url('configuracion') }}" method="POST" autocomplete="off">
                      @csrf

                      <fieldset>
                        <legend>
                          <h4 class="mb-3">Administrador Fechas:</h4>
                          <h5>
                            <code>Aquí puedes ajustar las fechas de declaración de acuerdo a tu ley estatal.</code>
                          </h5>
                        </legend>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="inicial">Inicial: 🌐 <code>*</code></label>
                            <input type="number" tabindex="{{ ++$tabindex }}" class="form-control @error('inicial') is-invalid @enderror" id="inicial" name="inicial" @if(old('inicial')) value="{{ old('inicial') }}" @else value="{{ $config->inicial }}" @endif required maxleng="50">
                            @error('inicial')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="modificacion">Modificación: 🌐 <code>*</code></label>
                            <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('modificacion') is-invalid @enderror" id="modificacion" name="modificacion" @if(old('modificacion')) value="{{ old('modificacion') }}" @else value="{{ $config->modificacion }}" @endif required >
                            @error('inicial')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="ambito">Conclusión: 🌐 <code>*</code></label>
                            <select class="form-control @error('ambito') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambito" name="ambito" required>
                              <option value="">Seleccione...</option>
                              @foreach($config->catalogo->ambitoPublico() as $publico)
                              <option value="{{ $publico->clave }}"
                                @if($publico->valor == old('ambito'))
                                  selected
                                @elseif($config->ambito == $publico->clave)
                                  selected
                                @endif
                                >
                                {{ $publico->valor }}
                              </option>
                              @endforeach
                            </select>
                            @error('ambito')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>

                      </fieldset>

                      <button tabindex="{{ ++$tabindex }}" class="btn btn-primary" type="submit">Siguiente</button>

                    </form>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                    <form action="{{ url('configuracion') }}" method="POST" autocomplete="off">
                      @csrf

                      <fieldset>
                        <legend><h4 class="mb-3">Datos del contralor:</h4></legend>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label for="nombres">Nombre(s): 🌐 <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="" maxlength="65" required="required">
                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="apellido_paterno">Apellido paterno: 🌐</label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('apellido_paterno') is-invalid @enderror" id="apellido_paterno" name="apellido_paterno" placeholder="" value="A" maxlength="65">
                            @error('apellido_paterno')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="apellido_materno">Apellido materno: 🌐</label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('apellido_materno') is-invalid @enderror" id="apellido_materno" name="apellido_materno" placeholder="" value="A" maxlength="65">
                            @error('apellido_materno')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </fieldset>

                      <button tabindex="{{ ++$tabindex }}" class="btn btn-primary" type="submit">Siguiente</button>

                    </form>

                  </div>
                </div>

              </div>

            </div>
          </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
