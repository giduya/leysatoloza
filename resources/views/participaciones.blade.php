@extends('layouts.app')

@section('content')
 <!--**********************************
    Content body start
***********************************-->
  <div class="content-body">
    <div class="container-fluid">

      @include('layouts.alert')

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 order-md-1">

                  <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                    @csrf

                    <fieldset>
                      <legend>


                        <div class="pull-right">
                          <button type="button" class="btn btn-rounded btn-primary">
                            <span class="btn-icon-left text-primary">
                              <i class="fa fa-plus color-info">
                              </i>
                            </span>AGREGAR
                          </button>
                        </div>

                        <h4 class="mb-3">
                          Participación en empresas, sociedades o asociaciones (Hasta los 2 últimos años)
                        </h4>

                      </legend>

                      <p>&nbsp;</p>



                      <div class="table-responsive">
                        <table class="table table-responsive-md">
                          <thead>
                            <tr>
                              <th style="width:50px;">
                                <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                  <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                  <label class="custom-control-label" for="checkAll"></label>
                                </div>
                              </th>
                              <th><strong>NO.</strong></th>
                              <th><strong>TIPO OPERACIÓN</strong></th>
                              <th><strong>TIPO PARTICIPACIÓN</strong></th>
                              <th><strong>NOMBRE EMPRESA, SOCIEDAD O ASOCIACIÓN</strong></th>
                              <th><strong>OPCIONES</strong></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                  <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                  <label class="custom-control-label" for="customCheckBox2"></label>
                                </div>
                              </td>
                              <td><strong>1</strong></td>
                              <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">AGREGAR</span></div></td>
                              <td>PARTICIPACIÓN</td>
                              <td>AYUNTAMIENTO DIGITAL</td>
                              <td>
                                <div class="d-flex">
                                  <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                  <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>


                          </tbody>
                        </table>
                      </div>









                    </fieldset>

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
                          <textarea tabindex="8" class="form-control" id="aclaracionesObservaciones" rows="7" name="aclaracionesObservaciones" placeholder=""></textarea>
                          <div class="invalid-feedback">
                          </div>
                        </div>
                      </div>
                    </fieldset>

                    <button tabindex="9" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

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
