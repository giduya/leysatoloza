<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class subformatoRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }





  public function messages()
  {
    return [
      /*DATOS CURRICULARES*/
      'escolaridadNivel.required' => 'Olvidaste agregar el nivel escolar.',
      'escolaridadNivel.exists' => 'El nivel escolar no existe en la lista.',
      'F3_carreraAreaConocimiento.required' => 'Olvidaste especificar tu carrera.',
      'F3_carreraAreaConocimiento.max' => 'La carrera solo puede tener 65 caracteres.',
      'F3_institucionEducativa_ubicacion.required' => 'Olvidaste indicar la ubicación.',
      'F3_institucionEducativa_ubicacion.exists' => 'La ubicación no está en la lista dada.',
      'F3_institucionEducativa_nombre.required' => 'Olvidaste indicar el nombre de la institución.',
      'F3_institucionEducativa_nombre.max' => 'El nombre de la institución no puede tener más de 65 caracteres.',
      'F3_estatus.required' => 'Olvidaste indicar el estatus de tus estudios.',
      'F3_estatus.exists' => 'El estatus de tus estudios no existe en la lista dada.',
      'F3_documentoObtenido.required' => 'El documento obtenido es obligatorio.',
      'F3_documentoObtenido.exists' => 'El documento obtenido no existe en la lista dada.',
      'F3_fechaObtencion.required' => 'Olvidaste agregar la fecha de obtención.',
      'F3_fechaObtencion.date' => 'La fecha de obtención no es válida.',

      /*DATOS EMPLEO*/
      'nombreEntePublico.required' => 'Olvidaste indicar el nombre del ente.',
      'nombreEntePublico.max' => 'El nombre del ente no puede tener más de 65 caracteres.',
      'nivelOrdenGobierno.required' => 'Olvidaste indicar el nivel del ente.',
      'nivelOrdenGobierno.exists' => 'El nivel del mercado no existe en la lista dada.',
      'F4_ambitoPublico.required' => 'Olvidaste indicar el ámbito del ente.',
      'F4_ambitoPublico.exists' => 'El ámbito del ente no existe en la lista dada.',
      'F4_areaAdscripcion.required' => 'Olvidaste indicar el area de adscripción.',
      'F4_areaAdscripcion.max' => 'El area de adscripción no puede tener más de 65 caracteres.',
      'empleoCargoComision.required' => 'Olvidaste indicar el empleo.',
      'empleoCargoComision.max' => 'El empleo no puede tener más de 65 caracteres.',
      'nivelEmpleoCargoComision.required' => 'Olvidaste indicar el nivel del empleo.',
      'nivelEmpleoCargoComision.max' => 'El nivel del empleo no puede tener más de 65 caracteres.',
      'F4_funcionPrincipal.required' => 'Olvidaste indicar la función desemepeñada.',
      'F4_funcionPrincipal.max' => 'La función desempeñada no debe tener más de 65 caracteres.',
      'F4_fechaTomaPosesion.required' => 'Olvidaste indicar la fecha de ingreso.',
      'F4_fechaTomaPosesion.date' => 'El dato ingresado no es una fecha válida.',
      'F4_contratadoPorHonorarios.required' => 'Olvidaste indicar si estas contratado por honorario.',
      'F4_contratadoPorHonorarios.boolean' => 'Debes indicar SÍ/NO.',
      'F4_telefonoOficina_lada.required_with' => 'Olvidaste indicar la lada.',
      'F4_telefonoOficina_lada.exists' => 'La lada no existe en la lista dada.',
      'F4_telefonoOficina_telefono.required' => 'Olvidaste indicar el número de oficina',
      'F4_telefonoOficina_telefono.digits_between' => 'El número de oficina debe tener 10 dígitos numéricos.',
      'F4_telefonoOficina_extension.digits_between' => 'La extensión telefónica no puede tener más de 4 caracteres.',
      'F4_pais.required' => 'Olvidaste agregar el país.',
      'F4_pais.exists' => 'El país no existe en la lista dada.',
      'entidadFederativa.required_if' => 'Olvidaste agregar la entidad.',
      'entidadFederativa.required_with' => 'La entidad debe ir junto con el país y municipio.',
      'entidadFederativa.exists' => 'La entidad no existe en la lista dada.',
      'municipioAlcaldia.required_if' => 'Olvidaste agregar el municipio.',
      'municipioAlcaldia.required_with' => 'El municipio debe ir con el país y la entidad.',
      'municipioAlcaldia.exists' => 'El municipio no existe en la lista dada.',
      'F4_coloniaLocalidad.required_if' => 'Olvidaste agregar la colonia.',
      'F4_coloniaLocalidad.required_with' => 'La colonia debe ir con el municipio y la entidad.',
      'F4_coloniaLocalidad.exists' => 'La colonia no existe en la lista.',
      'F4_estadoProvincia.required_unless' => 'Olvidaste agregar el estado/provincia.',
      'F4_estadoProvincia.max' => 'El estado/provincia no puede tener más de 65 caracteres.',
      'F4_ciudadLocalidad.required_unless' => 'La ciudad/localidad es obligatorio.',
      'F4_ciudadLocalidad.max' => 'La ciudad/localidad no puede tenes más de 65 caracteres.',
      'F4_calle.required' => 'Olvidaste agregar la calle.',
      'F4_calle.max' => 'La calle no puede tener más de 65 caracteres.',
      'F4_numeroExterior.required' => 'Olvidaste agregar tu número exterior.',
      'F4_numeroExterior.alpha_num' => 'El número exterior no puede tener símbolos como: !-#$%&.',
      'F4_numeroExterior.min' => 'El número exterior debe tener al menos un caracter.',
      'F4_numeroExterior.max' => 'El número exterior debe tener máximo 6 caracteres.',
      'F4_numeroInterior.alpha_num' => 'El número interior no puede tener símbolos como: !-#$%&.',
      'F4_numeroInterior.max' => 'El número interior debe tener máximo 5 caracteres.',
      'F4_numeroInterior.min' => 'El número interior debe tener al menos un caracter.',
      'F4_codigoPostal.required' => 'Olvidaste agregar código postal.',
      'F4_codigoPostal.min' => 'El código postal debe tener al menos 3 caracteres.',
      'F4_codigoPostal.max' => 'El código postal debe tener máximo 9 caracteres.',

      /* EXPERIENCIA LABORAL */
      'F5_ambitoSector_clave.required' => 'Olvidaste indicar el sector.',
      'F5_ambitoSector_clave.exists' => 'El sector no existe en la lista dada.',
      'F5_especifiqueAmbito.required_if' => 'Olvidaste especificar el ámbito.',
      'F5_especifiqueAmbito.max' => 'El ámbito no puede tener más de 65 caracteres.',
      'F5_nombreEnte.required' => 'Olvidaste indicar el nombre del ente.',
      'F5_nombreEnte.max' => 'El nombre del ente no puede tener más de 65 caracteres.',
      'F5_rfc.required_unless' => 'Olvidaste indicar el RFC.',
      'F5_rfc.min' => 'El RFC debe tener 12 caracteres para personas morales.',
      'F5_rfc.max' => 'El RFC debe tener 12 caracteres para personas morales.',
      'F5_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'F5_area.required' => 'Olvidaste indicar el area de adscripción.',
      'F5_area.max' => 'El area de adscripción no puede tener más de 65 caracteres.',
      'F5_empleoCargoComision.required' => 'Olvidaste indicar el nivel del empleo.',
      'F5_empleoCargoComision.max' => 'El nivel del empleo no puede tener más de 65 caracteres.',
      'F5_sector_clave.required_unless' => 'Olvidaste indicar el sector.',
      'F5_sector_clave.exists' => 'El sector no existe en la lista dada.',
      'F5_otro.required_if' => 'Olvidaste especificar el sector.',
      'F5_otro.max' => 'El sector no puede tener más de 65 caracteres.',
      'F5_fechaIngreso.required' => 'Olvidaste indicar la fecha de ingreso.',
      'F5_fechaIngreso.date' => 'El dato ingresado no es una fecha válida.',
      'F5_fechaEgreso.required' => 'Olvidaste indicar la fecha de ingreso.',
      'F5_fechaEgreso.date' => 'El dato ingresado no es una fecha válida.',
      'F5_ubicacion.required' => 'Olvidaste indicar la ubicación.',
      'F5_ubicacion.exists' => 'La ubicación no existe en la lista dada.',

      /* DATOS PAREJA */
      'F5_ambitoSector_clave.required' => 'Olvidaste indicar el sector.',
      'F5_ambitoSector_clave.exists' => 'El sector no existe en la lista dada.',
      'F5_especifiqueAmbito.required_if' => 'Olvidaste especificar el ámbito.',
      'F5_especifiqueAmbito.max' => 'El ámbito no puede tener más de 65 caracteres.',
      'F5_nombreEnte.required' => 'Olvidaste indicar el nombre del ente.',
      'F5_nombreEnte.max' => 'El nombre del ente no puede tener más de 65 caracteres.',
      'F5_rfc.required_unless' => 'Olvidaste indicar el RFC.',
      'F5_rfc.min' => 'El RFC debe tener 12 caracteres para personas morales.',
      'F5_rfc.max' => 'El RFC debe tener 12 caracteres para personas morales.',
      'F5_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'F5_area.required' => 'Olvidaste indicar el area de adscripción.',
      'F5_area.max' => 'El area de adscripción no puede tener más de 65 caracteres.',
      'F5_empleoCargoComision.required' => 'Olvidaste indicar el nivel del empleo.',
      'F5_empleoCargoComision.max' => 'El nivel del empleo no puede tener más de 65 caracteres.',
      'F5_sector_clave.required_unless' => 'Olvidaste indicar el sector.',
      'F5_sector_clave.exists' => 'El sector no existe en la lista dada.',
      'F5_otro.required_if' => 'Olvidaste especificar el sector.',
      'F5_otro.max' => 'El sector no puede tener más de 65 caracteres.',
      'F5_fechaIngreso.required' => 'Olvidaste indicar la fecha de ingreso.',
      'F5_fechaIngreso.date' => 'El dato ingresado no es una fecha válida.',
      'F5_fechaEgreso.required' => 'Olvidaste indicar la fecha de ingreso.',
      'F5_fechaEgreso.date' => 'El dato ingresado no es una fecha válida.',
      'F5_ubicacion.required' => 'Olvidaste indicar la ubicación.',
      'F5_ubicacion.exists' => 'La ubicación no existe en la lista dada.',

      /* DEPENDIENTES ECONÓMICOS*/


      /* CUENTAS BANCARIAS*/
      'tipoInversion_clave.required' => 'Este campo es obligatorio.',
      'tipoInversion_clave.exists' => 'Por favor seleccione una opción...',
      'subTipoInversion_clave.required' => 'Este campo es obligatorio.',
      'subTipoInversion_clave.exists' => 'Por favor seleccione una opción...',
      'titular_clave.required' => 'Este campo es obligatorio.',
      'titular_clave.exists' => 'Por favor seleccione una opción...',
      'numeroCuentaContrato.required' => 'Este campo es obligatorio.',
      'numeroCuentaContrato.max' => 'Este campo no debe tener más de 100 caracteres.',
      'tercero_tipoPersona.required' => 'Este campo es obligatorio.',
      'tercero_tipoPersona.exists' => 'Por favor seleccione una opción...',
      'tercero_nombreRazonSocial.required' => 'Este campo es obligatorio.',
      'tercero_nombreRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      'extranjero.required' => 'Este campo es obligatorio.',
      'extranjero.exists' => 'Por favor seleccione una opción...',
      'institucionRazonSocial.required' => 'Este campo es obligatorio.',
      'institucionRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      'saldoSituacionActual_valor.numeric' => 'Este campo es numerico.',
      'saldoSituacionActual_valor.required' => 'Este campo es obligatorio.',
      'saldoSituacionActual_moneda.required' => 'Este campo es obligatorio.',
      'saldoSituacionActual_moneda.exists' => 'Por favor seleccione una opción...',
      'rfc.max' => 'Este campo no debe tener más de 13 caracteres.',

      /* ADEUDOS / PASIVOS */
      'titular.required' => 'Este campo es obligatorio.',
      'titular.exists' => 'Por favor seleccione una opción...',
      'tipoAdeudo.required' => 'Este campo es obligatorio.',
      'tipoAdeudo.exists' => 'Por favor seleccione una opción...',
      'numeroCuentaContrato.required' => 'Este campo es obligatorio.',
      'numeroCuentaContrato.max' => 'Este campo no debe tener más de 20 caracteres.',
      'fechaAdquisicion.required' => 'Este campo es obligatorio.',
      'fechaAdquisicion.date' => 'Seleccione una fecha.',
      'montoOriginal_valor.required' => 'Este campo es obligatorio.',
      'montoOriginal_valor.max' => 'Este campo no debe tener más de 10 caracteres.',
      'montoOriginal_moneda.required' => 'Este campo es obligatorio.',
      'montoOriginal_moneda.exists' => 'Por favor seleccione una opción...',
      'saldoInsolutoFechaConclusion_valor.required' => 'Este campo es obligatorio.',
      'saldoInsolutoFechaConclusion_valor.max' => 'Este campo no debe tener más de 10 caracteres.',
      'saldoInsolutoFechaConclusion_moneda.required' => 'Este campo es obligatorio.',
      'saldoInsolutoFechaConclusion_moneda.exists' =>  'Por favor seleccione una opción...',
      'tercero_tipoPersona.exists' => 'Por favor seleccione una opción...',
      'tercero_nombreRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      'tipoPersona.required' => 'Este campo es obligatorio.',
      'tipoPersona.exists' => 'Por favor seleccione una opción...',
      'nombreRazonSocial.required' => 'Este campo es obligatorio.',
      'nombreRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',

      /* PRESTAMOS DE TERCEROS */
      'F15_tipoOperacion.required' => 'Olvidaste indicar el tipo de operación.',
      'F15_tipoOperacion.exists' => 'El tipo de operación no es válido.',

      'F15_tipoVehiculo_clave.required' => 'Olvidaste indicar el tipo de vehículo.',
      'F15_tipoVehiculo_clave.exists' => 'El tipo de vehículo no existe en la lista dada.',
      'F15_especifiqueTipo.required_if' => 'Olvidaste especificar.',
      'F15_especifiqueTipo.max' => 'La especificación no puede tener más de 65 caracteres.',
      'F15_marca.required' => 'Olvidaste indicar la marca.',
      'F15_marca.max' => 'La marca no puede tener más de 65 caracteres.',
      'F15_modelo.required' => 'Olvidaste indicar el modelo.',
      'F15_modelo.max' => 'El modelo no puede tener más de 65 caracteres.',
      'F15_anio.required' => 'Olvidaste indicar el año.',
      'F15_anio.integer' => 'El año no es un número válido.',
      'F15_anio.digits_between' => 'El año debe tener 4 dígitos.',
      'F15_numeroSerieRegistro.required' => 'Olvidaste indicar el número de serie.',
      'F15_numeroSerieRegistro.max' => 'El número de serie no puede tener más de 65 caracteres.',

      'F15_tipoInmueble_clave.required' => 'Olvidaste indicar el tipo de inmueble.',
      'F15_tipoInmueble_clave.exists' => 'El tipo de inmueble no existe en la lista dada.',

      'F15_pais.required' => 'Olvidaste agregar el país.',
      'F15_pais.exists' => 'El país no existe en la lista dada.',
      'F15_entidadFederativa_clave.required_if' => 'Olvidaste agregar la entidad.',
      'F15_entidadFederativa_clave.required_with' => 'La entidad debe ir junto con el país y municipio.',
      'F15_entidadFederativa_clave.exists' => 'La entidad no existe en la lista dada.',
      'F15_municipioAlcaldia_clave.required_if' => 'Olvidaste agregar el municipio.',
      'F15_municipioAlcaldia_clave.required_with' => 'El municipio debe ir con el país y la entidad.',
      'F15_municipioAlcaldia_clave.exists' => 'El municipio no existe en la lista dada.',
      'F15_coloniaLocalidad.required_if' => 'Olvidaste agregar la colonia.',
      'F15_coloniaLocalidad.required_with' => 'La colonia debe ir con el municipio y la entidad.',
      'F15_coloniaLocalidad.exists' => 'La colonia no existe en la lista.',
      'F15_estadoProvincia.required_unless' => 'Olvidaste agregar el estado/provincia.',
      'F15_estadoProvincia.max' => 'El estado/provincia no puede tener más de 65 caracteres.',
      'F15_ciudadLocalidad.required_unless' => 'La ciudad/localidad es obligatorio.',
      'F15_ciudadLocalidad.max' => 'La ciudad/localidad no puede tenes más de 65 caracteres.',
      'F15_calle.required' => 'Olvidaste agregar la calle.',
      'F15_numeroExterior.required' => 'Olvidaste agregar tu número exterior.',
      'F15_calle.max' => 'La calle no puede tener más de 65 caracteres.',
      'F15_numeroExterior.alpha_num' => 'El número exterior no puede tener símbolos como: !-#$%&.',
      'F15_numeroExterior.min' => 'El número exterior debe tener al menos un caracter.',
      'F15_numeroExterior.max' => 'El número exterior debe tener máximo 6 caracteres.',
      'F15_numeroInterior.alpha_num' => 'El número interior no puede tener símbolos como: !-#$%&.',
      'F15_numeroInterior.max' => 'El número interior debe tener máximo 5 caracteres.',
      'F15_numeroInterior.min' => 'El número interior debe tener al menos un caracter.',
      'F15_codigoPostal.required' => 'Olvidaste agregar código postal.',
      'F15_codigoPostal.min' => 'El código postal debe tener al menos 3 caracteres.',
      'F15_codigoPostal.max' => 'El código postal debe tener máximo 9 caracteres.',
      'F15_tipoDuenoTitular.required' => 'Olvidaste indicar el tipo de persona del titular.',
      'F15_tipoDuenoTitular.exists' => 'El tipo de persona no existe en la lista dada,',
      'F15_nombreTitular.max' => 'El nombre del titular no puede tener más de 65 caracteres.',
      'F15_nombreTitular.required' => 'Olvidaste indicar el nombre del titular.',
      'F15_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'F15_rfc.size' => 'El RFC no puede tener más de 13 caracteres si es persona física y 12 si es moral.',
      'F15_relacionConTitular.required' => 'Olvidaste indicar la relación con el titular.',
      'F15_relacionConTitular.max' => 'La relación con el titular no puede tener más de 65 caracteres.',

      /* PARTICIPACIONES */
      'F16_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F16_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F16_tipoRelacion.required' => 'Olvidaste agregar el tipo de relación.',
      'F16_tipoRelacion.exists' => 'El participante no existe en la lista dada.',
      'F16_porcentajeParticipacion.required' => 'Olvidaste agregar el porcentaje.',
      'F16_porcentajeParticipacion.numeric' => 'El porcentaje debe ser un número.',
      'F16_porcentajeParticipacion.max' => 'El porcentaje máximo es 100.',
      'F16_tipoParticipacion_clave.required' => 'Olvidaste agregar el tipo de participación.',
      'F16_tipoParticipacion_clave.exists' => 'El tipo de participación no existe en la lista.',
      'F16_especifiqueParticipacion.required_if' => 'Olvidaste especificar la participación.',
      'F16_especifiqueParticipacion.max' => 'El tipo de participación solo puede tener 65 caracteres.',
      'F16_nombreEmpresaSociedadAsociacion.required' => 'Olvidaste agregar el nombre de la empresa o sociedad.',
      'F16_nombreEmpresaSociedadAsociacion.max' => 'El nombre de empresa no puede tener más de 65 caracteres.',
      'F16_rfc.required' => 'Olvidaste agregar el RFC.',
      'F16_rfc.min' => 'El RFC no puede tener menos de 12 caracteres.',
      'F16_rfc.max' => 'El RFC no puede tener más de 12 caracteres.',
      'F16_sector_clave.required' => 'Olvidaste seleccionar el sector.',
      'F16_sector_clave.exists' => 'El sector no existe en la lista dada.',
      'F16_especifiqueSector.required_if' => 'Olvidaste especificar el sector.',
      'F16_especifiqueSector.max' => 'El sector no puede tener más de 65 caracteres.',
      'F16_pais.required' => 'Olvidaste seleccionar el país.',
      'F16_pais.exists' => 'El país seleccionado no existe en la lista dada.',
      'F16_entidadFederativa_clave.exists' => 'El estado no existe en la lista dada.',
      'F16_entidadFederativa_clave.required_if' => 'Olvidaste agregar el estado.',
      'F16_recibeRemuneracion.boolean' => 'Debes indicar un SÍ/NO.',
      'F16_recibeRemuneracion.required' => 'Olvidaste indicar si recibiste remuneración.',
      'F16_montoMensual_valor.required_if' => 'Olvidaste agregar el monto.',
      'F16_montoMensual_valor.max' => 'El monto no puede tener más de 20 caracteres.',
      'F16_montoMensual_moneda.exists' => 'La moneda no existe en la lista dada.',
      'F16_montoMensual_moneda.required_if' => 'Olvidaste seleccionar una moneda.',

      /*DECISIONES*/
      'F17_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F17_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F17_tipoRelacion.required' => 'Olvidaste agregar el tipo de relación.',
      'F17_tipoRelacion.exists' => 'El tipo de relación no existe en la lista dada.',
      'F17_puestoRol.required' => 'Olvidaste agregar el rol.',
      'F17_puestoRol.max' => 'El rol no puede tener más de 65 caracteres.',
      'F17_fechaInicioParticipacion.required' => 'Olvidaste agregar la fecha de inicio.',
      'F17_fechaInicioParticipacion.date' => 'La fecha de inicio no es una fecha válida.',
      'F17_tipoInstitucion_clave.required' => 'Olvidaste agregar el tipo de institución.',
      'F17_tipoInstitucion_clave.exists' => 'El tipo de institución no existe en la lista dada.',
      'F17_nombreInstitucion.required' => 'Olvidaste agregar el nombre de la institución.',
      'F17_nombreInstitucion.max' => 'El nombre de la institución no debe tener más de 65 caracteres.',
      'F17_especifiqueInstitucion.required_if' => 'Olvidaste agregar la institución.',
      'F17_especifiqueInstitucion.max' => 'La institución no puede tener más de 65 caracteres.',
      'F17_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'F17_rfc.min' => 'El RFC debe tener mínimo 12 caracteres.',
      'F17_rfc.max' => 'El RFC debe tener máximo 12 caracteres.',
      'F17_pais.required' => 'Olvidaste agregar el país.',
      'F17_pais.exists' => 'El país no existe en la lista dada.',
      'F17_entidadFederativa_clave.required_if' => 'Olvidaste agregar el estado.',
      'F17_entidadFederativa_clave.exists' => 'El estado no existe en la lista dada.',
      'F17_recibeRemuneracion.required' => 'Olvidaste indicar si recibes remuneración.',
      'F17_recibeRemuneracion.boolean' => 'Indica con un SÍ/NO si recibes remuneración.',
      'F17_montoMensual_valor.required_if' => 'Olvidaste agregar el monto.',
      'F17_montoMensual_valor.max' => 'El monto no puede tener más de 20 caracteres.',
      'F17_montoMensual_moneda.required_if' => 'Olvidaste agregar la moneda.',
      'F17_montoMensual_moneda.exists' => 'La moneda no existe en la lista dada.',

      /* APOYOS PUBLICOS */
      'F18_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F18_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F18_beneficiarioPrograma_clave.required' => 'Olvidaste indicar tu beneficiario.',
      'F18_beneficiarioPrograma_clave.exists' => 'El beneficiario no existe en la lista dada.',
      'F18_especifiqueBeneficiario.required_if' => 'Olvidaste especificar el beneficiario.',
      'F18_especifiqueBeneficiario.max' => 'El beneficiario no puede tener más de 65 caracteres.',
      'F18_tipoApoyo_clave.required' => 'Olvidaste indicar el tipo de apoyo.',
      'F18_tipoApoyo_clave.exists' => 'El tipo de apoyo no aparece en la lista dada.',
      'F18_especifiqueApoyo.required_if' => 'Olvidaste agregar el apoyo.',
      'F18_especifiqueApoyo.max' => 'El apoyo no puede tener más de 65 caracteres.',
      'F18_nombrePrograma.required' => 'Olvidaste agregar el nombre del programa.',
      'F18_nombrePrograma.max' => 'El nombre del programa no puede tener más de 65 caracteres.',
      'F18_formaRecepcion.required' => 'Olvidaste agregar la forma de recepción.',
      'F18_formaRecepcion.exists' => 'La forma de recepción no existe en la lista dada.',
      'F18_especifiqueEspecie.required_if' => 'Olvidaste especificar la especie.',
      'F18_especifiqueEspecie.max' => 'La especie no puede tener más de 65 caracteres.',
      'F18_montoApoyoMensual_valor.required_if' => 'Olvidaste indicar el monto del apoyo.',
      'F18_montoApoyoMensual_valor.max' => 'El monto del apoyo no puede tener más de 20 caracteres.',
      'F18_montoApoyoMensual_moneda.required_if' => 'Olvidaste agregar la moneda del apoyo.',
      'F18_montoApoyoMensual_moneda.exists' => 'La moneda no existe en la lista dada.',
      'F18_nivelOrdenGobierno.required' => 'Olvidaste indicar el nivel de gobierno.',
      'F18_nivelOrdenGobierno.exists' => 'El nivel de gobierno no existe en la lista dada.',
      'F18_institucionOtorgante.required' => 'Olvidaste agregar el instituto que da el apoyo.',
      'F18_institucionOtorgante.max' => 'El instituto no puede tener más de 65 caracteres.',

      /* REPRESENTACIONES */
      'F19_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F19_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F19_tipoRelacion.required' => 'Olvidaste agregar quien está relacionado.',
      'F19_tipoRelacion.exists' => 'El relacionado no existe en la lista dada.',
      'F19_tipoRepresentacion.required' => 'Olvidaste indicar el tipo de representación.',
      'F19_tipoRepresentacion.exists' => 'El tipo de representación indicado no existe.',
      'F19_fechaInicioRepresentacion.required' => 'Olvidaste indicar la fecha de inicio de representación.',
      'F19_fechaInicioRepresentacion.date' => 'La fecha de inicio de la representación es incorrecta.',
      'F19_tipoPersona.required' => 'El tipo de persona del representante ó representado es obligatatorio.',
      'F19_tipoPersona.exists' => 'El tipo de persona del representante ó representado no existe en la lista dada.',
      'F19_nombreRazonSocial.required' => 'El nombre o razón social del representante ó representado es obligatorio.',
      'F19_nombreRazonSocial.max' => 'El nombre o razón social del representante ó representado no puede tener más de 65 caracteres.',
      'F19_rfc.required' => 'El RFC del representante ó representado es obligatorio.',
      'F19_rfc.alpha_num' => 'El RFC del representante ó representado debe ser alfanumérico.',
      'F19_rfc.min' => 'El RFC del representante ó representado debe tener 12 caracteres cuando es persona física y 13 si es moral.',
      'F19_rfc.max' => 'El RFC del representante ó representado debe tener 12 caracteres cuando es persona física y 13 si es moral.',
      'F19_pais.required' => 'El país del representante o representado es obligatorio.',
      'F19_pais.exists' => 'El país del representante o representado no existe en la lista dada.',
      'F19_entidadFederativa_clave.required_if' => 'El estado del representante o representado es obligatorio.',
      'F19_entidadFederativa_clave.exists' => 'El estado del representante o representado no existe en la lista dada.',
      'F19_sector_clave.required' => 'El sector del representante ó representado es obligatorio.',
      'F19_sector_clave.exists' => 'El sector del representante ó representado no existe en la lista dada.',
      'F19_especifiqueSector.required_if' => 'Olvidaste especificar el sector.',
      'F19_especifiqueSector.max' => 'El sector no puede tener más de 65 caracteres.',
      'F19_recibeRemuneracion.required' => 'Olvidaste indicar si tienes alguna remuneración.',
      'F19_recibeRemuneracion.boolean' => 'Debes indicar Sí ó No.',
      'F19_montoMensual_valor.required_if' => 'El monto de la remuneración es obligatorio.',
      'F19_montoMensual_valor.max' => 'El monto no puede tener más de 20 caracteres.',
      'F19_montoMensual_moneda.required_if' => 'Olvidaste indicar la moneda.',
      'F19_montoMensual_moneda.exists' => 'La moneda indicada no existe en la lista dada.',

      /*CLIENTES*/
      'F20_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F20_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F20_tipoRelacion.required' => 'Olvidaste indicar quien esta relacionado con la representación.',
      'F20_tipoRelacion.exists' => 'El relacionado con la representación no existe en la lista dada.',
      'F20_realizaActividadLucrativa.required' => 'Olvidaste indicar si realizas alguna actividad lucrativa.',
      'F20_realizaActividadLucrativa.boolean' => 'Debes indicar SÍ/NO realizas alguna actividad lucrativa.',
      'F20_tipoRelacion.required' => 'Debes indicar quien se relaciona con el cliente.',
      'F20_tipoRelacion.exists' => 'La persona indicada no existe en la lista dada.',
      'F20_clientePrincipal_tipoPersona.required' => 'El tipo de persona del cliente es obligatorio.',
      'F20_clientePrincipal_tipoPersona.exists' => 'El tipo de persona del cliente no existe.',
      'F20_empresa_nombreEmpresaServicio.required' => 'El nombre del cliente es obligatorio.',
      'F20_empresa_nombreEmpresaServicio.max' => 'El nombre del cliente no debe tener más de 190 caracteres.',
      'F20_empresa_rfc.required' => 'El RFC del cliente es obligatorio.',
      'F20_empresa_rfc.alpha_num' => 'El RFC del cliente debe ser alfanumérico.',
      'F20_empresa_rfc.min' => 'El RFC debe tener 12 caracteres cuando es persona moral y 13 cuando es física.',
      'F20_empresa_rfc.max' => 'El RFC debe tener 12 caracteres cuando es persona moral y 13 cuando es física.',
      'F20_sector_clave.required' => 'El sector productivo es obligatorio.',
      'F20_sector_clave.exists' => 'El sector no existe en la lista.',
      'F20_especifiqueSector.required_if' => 'Debes especificar el sector.',
      'F20_especifiqueSector.max' => 'El sector debe tener 65 caracteres máximo.',
      'F20_clientePrincipal_nombreRazonSocial.required' => 'El nombre del cliente es obligatorio.',
      'F20_clientePrincipal_nombreRazonSocial.max' => 'El nombre del cliente no debe tener más de 65 caracteres.',
      'F20_clientePrincipal_rfc.alpha_num' => 'El RFC del cliente debe ser alfanumérico.',
      'F20_clientePrincipal_rfc.size' => 'El RFC del cliente debe ser de 13 caracteres si es persona física y 12 si es moral.',
      'F20_pais_clave.required' => 'El país es obligatorio',
      'F20_pais_clave.exists' => 'El país no existe en la lista dada.',
      'F20_entidadFederativa_clave.exists' => 'El estado es obligatorio.',
      'F20_entidadFederativa_clave.required_if' => 'La entidad federativa es obligatoria.',
      'F20_montoAproximadoGanancia_valor.required' => 'El monto de la ganancia es obligatorio.',
      'F20_montoAproximadoGanancia_valor.max' => 'El monto de la ganancia no puede tener más de 20 caracteres.',
      'F20_montoAproximadoGanancia_moneda.required' => 'La moneda de la ganancia es obligatorio.',
      'F20_montoAproximadoGanancia_moneda.exists' => 'La moneda de la ganancia no existe en la lista.',

      /*BENEFICIOS PRIVADOS*/
      'F21_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F21_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F21_tipoRelacion.required' => 'Olvidaste indicar quien esta relacionado con la representación.',
      'F21_tipoRelacion.exists' => 'El relacionado con la representación no existe en la lista dada.',
      'F21_tipoBeneficio_clave.required' => 'El tipo de beneficio es obligatorio.',
      'F21_tipoBeneficio_clave.exists' => 'El tipo de beneficio no existe en la lista dada.',
      'F21_especifiqueTipo.required_if' => 'Debes especificar el tipo de beneficio.',
      'F21_especifiqueTipo.max' => 'El tipo de beneficio debe tener menos de 65 caracteres.',
      'F21_sector_clave.required' => 'El sector es obligatorio.',
      'F21_sector_clave.exists' => 'El sector no existe en la lista dada.',
      'F21_especifiqueSector.required_if' => 'El sector es obligatorio.',
      'F21_especifiqueSector.max' => 'El sector no debe tener más de 65 caracteres.',
      'F21_beneficiario_clave.required' => 'El beneficiario es obligatorio.',
      'F21_beneficiario_clave.exists' => 'El beneficiario no existe en la lista dada.',
      'F21_especifiqueBeneficiario.required_if' => 'El tipo de beneficiario es obligatorio.',
      'F21_especifiqueBeneficiario.max' => 'El beneficiario no puede tener más de 65 caracteres',
      'F21_especifiqueBeneficiario.required_if' => 'El beneficiario es obligatorio.',
      'F21_especifiqueBeneficiario.max' => 'El beneficiario no debe tener más de 65 caracteres.',
      'F21_formaRecepcion.required' => 'La forma de recepción es obligatoria.',
      'F21_formaRecepcion.exists' => 'La forma de recepción no existe en la lista dada.',
      'F21_especifiqueBeneficio.max' => 'El tipo de beneficio no debe tener más de 65 caracteres.',
      'F21_especifiqueBeneficio.required_if' => 'El tipo de beneficio es obligatorio.',
      'F21_montoMensualAproximado_valor.required_if' => 'El monto mensual es obligatorio.',
      'F21_montoMensualAproximado_valor.max' => 'El monto mensual no debe tener más de 20 cifras.',
      'F21_montoMensualAproximado_moneda.required_if' => 'El tipo de moneda es obligatorio.',
      'F21_montoMensualAproximado_moneda.exists' => 'El tipo de moneda no existe en la lista dada.',
      'F21_otorgante_tipoPersona.required' => 'El tipo de persona del otorgante es obligatorio.',
      'F21_otorgante_tipoPersona.exists' => 'El tipo de persona no existe en la lista dada.',
      'F21_otorgante_nombreRazonSocial.required' => 'El nombre del otorgante es obligatorio.',
      'F21_otorgante_nombreRazonSocial.max' => 'El nombre no debe tener más de 65 caracteres.',
      'F21_otorgante_rfc.alpha_num' => 'El RFC del otorgante debe ser alfanumérico.',
      'F21_otorgante_rfc.size' => 'El RFC del otorgante debe tener 12 caracteres si es persona moral y 13 si es persona física.',

      /*FIDEICOMISOS*/
      'F22_tipoOperacion.required' => 'El tipo de operación es obligatorio.',
      'F22_tipoOperacion.exists' => 'El tipo de operación no existe en la lista dada.',
      'F22_tipoRelacion.required' => 'Olvidaste indicar quien esta relacionado con la representación.',
      'F22_tipoRelacion.exists' => 'El relacionado con la representación no existe en la lista dada.',
      'F22_tipoParticipacion.required' => 'El tipo de participación seleccionado no existe en la lista.',
      'F22_tipoFideicomiso.required' => 'El tipo de fideicomiso seleccionado no existe en la lista.',
      'F22_tipoRelacion.exists' => 'El tipo de relación seleccionado no existe en la lista.',
      'F22_tipoParticipacion.exists' => 'El tipo de participación seleccionado no existe en la lista.',
      'F22_tipoFideicomiso.exists' => 'El tipo de fideicomiso seleccionado no existe en la lista.',
      'F22_rfcFideicomiso.alpha_num' => 'El RFC del fideicomiso debe ser alfanumérico.',
      'F22_rfcFideicomiso.size' => 'El RFC del fideicomiso debe tener 12 caracteres.',
      'F22_tipoFideicomiso.required' => 'El tipo de fideicomiso seleccionado no existe en la lista.',
      'F22_tipoRelacion.exists' => 'El tipo de relación seleccionado no existe en la lista.',
      'F22_sector_clave.required' => 'Olvidaste agregar el sector.',
      'F22_sector_clave.exists' => 'El sector seleccionado no existe.',
      'F22_especifiqueSector.required_if' => 'Olvidaste especificar el sector.',
      'F22_especifiqueSector.max' => 'El sector solo puede tener 65 caracteres.',
      'F22_extranjero.required' => 'La ubicación es obligatoria.',
      'F22_extranjero.exists' => 'La ubicación seleccionada no existe.',
      'F22_fiduciario_nombreRazonSocial.required_if' => 'El nombre ó razón social del fiduciario es obligatorio.',
      'F22_fiduciario_nombreRazonSocial.max' => 'El nombre ó razón social del fiduciario no puede tener más de 65 caracteres.',
      'F22_fiduciario_rfc.alpha_num' => 'El RFC del fiduciario debe ser alfanumérico.',
      'F22_fiduciario_rfc.min' => 'El RFC del fiduciario debe tener 12 caracteres si es persona moral y 13 si es física',
      'F22_fiduciario_rfc.max' => 'El RFC del fiduciario debe tener 12 caracteres si es persona moral y 13 si es física',
      'F22_fideicomitente_tipoPersona.required_if' => 'El tipo de persona en fideicomitente es obligatorio.',
      'F22_fideicomitente_tipoPersona.exists' => 'El tipo de persona en fideicomitente no existe.',
      'F22_fideicomitente_nombreRazonSocial.required_if' => 'El nombre del fideicomitente es obligatorio.',
      'F22_fideicomitente_nombreRazonSocial.max' => 'El nombre del fideicomitente no debe tener más de 65 caracteres',
      'F22_fideicomitente_tipoPersona.required_if' => 'El tipo de persona del fideicomitente es obligatorio.',
      'F22_fideicomitente_tipoPersona.exists' => 'El tipo de persona del fideicomitente no existe.',
      'F22_fideicomitente_nombreRazonSocial.required_if' => 'El nombre o razón social del fideicomitente es obligatorio.',
      'F22_fideicomitente_nombreRazonSocial.max' => 'El nombre o razón social del fideicomitente no puede tener más de 65 caracteres.',
      'F22_fideicomitente_rfc.required_if' => 'El RFC del fideicomitente es obligatorio.',
      'F22_fideicomitente_rfc.alphanum' => 'El RFC del fideicomitente debe ser alfanumérico.',
      'F22_fideicomitente_rfc.min' => 'El RFC del fideicomitente debe tener 12 caracteres cuando es persona moral y 13 en personas físicas.',
      'F22_fideicomitente_rfc.max' => 'El RFC del fideicomitente debe tener 12 caracteres cuando es persona moral y 13 en personas físicas.',
      'F22_fideicomisario_tipoPersona.required_if' => 'El tipo de persona del fideicomisario es obligatorio.',
      'F22_fideicomisario_tipoPersona.exists' => 'El tipo de persona del fideicomisario no existe.',
      'F22_fideicomisario_nombreRazonSocial.required_if' => 'El nombre o razón social del fideicomisario es obligatorio.',
      'F22_fideicomisario_nombreRazonSocial.max' => 'El nombre o razón social del fideicomisario no puede tener más de 65 caracteres.',
      'F22_fideicomisario_rfc.required_if' => 'El RFC del fideicomisario es obligatorio.',
      'F22_fideicomisario_rfc.alphanum' => 'El RFC del fideicomisario debe ser alfanumérico.',
      'F22_fideicomisario_rfc.min' => 'El RFC del fideicomisario debe tener 12 caracteres cuando es persona moral y 13 en personas físicas.',
      'F22_fideicomisario_rfc.max' => 'El RFC del fideicomisario debe tener 12 caracteres cuando es persona moral y 13 en personas físicas.',
    ];
  }


  public function rules()
  {

    if($this->method() == "GET")
    {
    	return [];
    }


    if($this->method() == "POST")
    {

      switch($this->route()->formato_slug)
      {
        case "datos_curriculares":
          return [
            'escolaridadNivel' => 'required|exists:catalogos.nivel,clave',
            'F3_carreraAreaConocimiento' => 'required|max:65',
            'F3_institucionEducativa_ubicacion' => 'required|exists:catalogos.extranjero,clave',
            'F3_institucionEducativa_nombre' => 'required|max:65',
            'F3_estatus' => 'required|exists:catalogos.estatus,clave',
            'F3_documentoObtenido' => 'required|exists:catalogos.documentoObtenido,clave',
            'F3_fechaObtencion' => 'required|date',
          ];
        break;
        case "datos_empleo":
          return [
            'nombreEntePublico' => 'required|max:65',
            'nivelOrdenGobierno' => 'required|exists:catalogos.nivelOrdenGobierno,clave',
            'F4_ambitoPublico' => 'required|exists:catalogos.ambitoPublico,clave',
            'F4_areaAdscripcion' => 'required|max:65',
            'empleoCargoComision' => 'required|max:65',
            'nivelEmpleoCargoComision' => 'required|max:65',
            'F4_funcionPrincipal' => 'required|max:65',
            'F4_fechaTomaPosesion' => 'required|date',
            'F4_contratadoPorHonorarios' => 'required|boolean',
            'F4_telefonoOficina_lada' => 'required_with:F4_telefonoOficina_telefono|exists:catalogos.paises,LADA',
            'F4_telefonoOficina_telefono' => 'required|digits_between:10,10',
            'F4_telefonoOficina_extension' => 'digits_between:1,4',
            'F4_pais' => 'required|exists:catalogos.paises,ISO2',
            'entidadFederativa' => 'required_if:F4_pais,MX|required_with:municipioAlcaldia,F4_coloniaLocalidad|nullable|integer|exists:catalogos.inegi,Cve_Ent',
            'municipioAlcaldia' => 'required_if:F4_pais,MX|required_with:entidadFederativa,F4_coloniaLocalidad|nullable|integer|exists:catalogos.inegi,Cve_Mun',
            'F4_coloniaLocalidad' => 'required_if:F4_pais,MX|required_with:entidadFederativa,municipioAlcaldia|nullable|exists:catalogos.inegi,Nom_Loc',
            'F4_estadoProvincia' => 'required_unless:F4_pais,MX|max:65',
            'F4_ciudadLocalidad' => 'required_unless:F4_pais,MX|max:65',
            'F4_calle' => 'required|max:65',
            'F4_numeroExterior' => 'required|alpha_num|min:1|max:6',
            'F4_numeroInterior' => 'nullable|alpha_num|min:1|max:5',
            'F4_codigoPostal' => 'required|min:3|max:9',
          ];
        break;
        case "experiencia_laboral":
          return[
            'F5_ambitoSector_clave' => 'required|exists:catalogos.ambitosector,clave',
            'F5_especifiqueAmbito' => 'required_if:F5_ambitoSector_clave,OTR|max:65',
            'F5_nombreEnte' => 'required|max:65',
            'F5_rfc' => 'required_unless:F5_ambitoSector_clave,PUB|nullable|min:12|max:12|alpha_num',
            'F5_area' => 'required|max:65',
            'F5_empleoCargoComision' => 'required|max:65',
            'F5_sector_clave' => 'required_unless:F5_ambitoSector_clave,PUB|nullable|exists:catalogos.sector,clave',
            'F5_otro' => 'required_if:F5_sector_clave,OTRO|max:65',
            'F5_fechaIngreso' => 'required|date',
            'F5_fechaEgreso' => 'required|date',
            'F5_ubicacion' => 'required|exists:catalogos.extranjero,clave',
          ];
        break;
        case "dependientes_economicos":
          return[

            /*
             'nombre' => 'alpha|required|max:100',
             'primerApellido' => 'alpha|required|max:100',
             'segundoApellido' => 'nullable|alpha|max:100',
             'fechaNacimiento' => 'required|date',
             'rfc' => 'nullable|size:13',
             'parentesco' => 'required|exists:catalogos.parentescorelacion,clave',
             'extranjero' => 'required|boolean',
             'curp' => 'required_if:extranjero,0|size:18',
             'habitaDomicilioDeclarante' => 'required|boolean',
             'lugarDondeReside' => 'required_if:habitaDomicilioDeclarante,0',
             'pais' => 'required_if:lugarDondeReside,0',
             #'entidadFederativa_clave' ='required_if:lugarDondeReside,1|exists:catalogos.inegi,Cve_Ent',
             #'municipioAlcaldia_clave' ='required_if:lugarDondeReside,1|exists:catalogos.inegi,Cve_Mun',
             #'coloniaLocalidad_select' ='required_if:lugarDondeReside,1|exists:catalogos.inegi,Nom_Loc',
             'estadoProvincia' => 'required_if:lugarDondeReside,0|max:150',
             'ciudadLocalidad' => 'required_if:lugarDondeReside,0|max:150',
             'calle' => 'required_unless:lugarDondeReside,2|max:150',
             'numeroExterior' => 'required_unless:lugarDondeReside,2|max:10',
             'numeroInterior' => 'nullable|max:5',
             'codigoPostal' => 'required_unless:lugarDondeReside,2|max:7',
             'actividadLaboral' => 'required|max:100',
             'nivelOrdenGobierno' => 'required_if:actividadLaboral,PUB|exists:catalogos.nivelOrdenGobierno,valor',
             'ambitoPublico' => 'required_if:actividadLaboral,PUB|exists:catalogos.ambitoPublico,valor',
             'nombreEntePublico' => 'required_if:actividadLaboral,PUB|max:100',
             'areaAdscripcion' => 'required_if:actividadLaboral,PUB|max:100',
             'empleoCargoComision' => 'required_if:actividadLaboral,PUB|max:100',
             'funcionPrincipal' => 'required_if:actividadLaboral,PUB|max:150',
             'monto_mensual_valor' => 'required|numeric',
             'monto_mensual_moneda' => 'required|exists:catalogos.tipomoneda,clave',
             'fechaIngreso' => 'required|date',
             'nombreEmpresaSociedadAsociacion' => 'required_if:actividadLaboral,PRI|max:150',
             'empleoCargo' => 'required_if:actividadLaboral,PRI|max:150',
             'proveedorContratistaGobierno' => 'required_if:actividadLaboral,PRI|boolean',
             'sector' => 'required_if:actividadLaboral,PRI|exists:catalogos.sector,clave',
             'rfc_empresa' => 'nullable|size:12',
             'fechaIngreso' => 'required_if:actividadLaboral,PRI|date',
             'salario' => 'required_if:actividadLaboral,PRI|numeric',
             'salario_moneda' => 'required_if:actividadLaboral,PRI|exists:catalogos.tipomoneda,clave', */
           ];
        break;
        case "ingresos_netos":
          return [ ];
        break;
        case "bienes_inmuebles":
          return [ ];
        break;
        case "vehiculos":
          return [ ];
        break;
        case "bienes_muebles":
          return [ ];
        break;
        case "cuentas_bancarias":
          if($this->tercero_tipoPersona == "MORAL")
          {
            $rfcCuenta = 'nullable|alpha_num|size:12';
          }
          else
          {
            $rfcCuenta = 'nullable|alpha_num|size:13';
          }
          return [ /*
          'tipoInversion_clave' => 'required|exists:catalogos.tipoinversion,clave',
          'subTipoInversion_clave' => 'required|exists:catalogos.subtipoinversion,clave',
          'titular_clave' => 'required|exists:catalogos.titularbien,clave',
          'numeroCuentaContrato' => 'required|max:100',
          'tercero_tipoPersona' => 'required|exists:catalogos.tipopersona,clave',
          'tercero_nombreRazonSocial' => 'required|max:150',
          'tercero_rfc' => $rfcCuenta,
          'extranjero' => 'required|exists:catalogos.extranjero,clave',
          'institucionRazonSocial' => 'required|max:150',
          'saldoSituacionActual_valor' => 'numeric|required',
          'saldoSituacionActual_moneda' => 'required|exists:catalogos.tipomoneda_2,ISO4217',*/
          ];
        break;
        case "adeudos_pasivos":
         if($this->tercero_tipoPersona == "MORAL")
            {
              $rfcAdeudos = 'nullable|alpha_num|size:12';
            }
         else
            {
              $rfcAdeudos = 'nullable|alpha_num|size:13';
            }
        return[ /*
            'titular_clave' => 'required|exists:catalogos.titulares,clave',
            'tipoAdeudo_clave' => 'required|exists:catalogos.tipoadeudo,clave',
            'numeroCuentaContrato' => 'required|max:100',
            'fechaAdquisicion' => 'required|date',
            'montoOriginal_valor' => 'required|max:20',
            'montoOriginal_moneda' => 'required|exists:catalogos.tipomoneda_2,ISO4217',
            'saldoInsolutoFechaConclusion_valor' => 'required|max:20',
            'saldoInsolutoFechaConclusion_moneda' => 'required|exists:catalogos.tipomoneda_2,ISO4217',
            'tercero_tipoPersona' => 'exists:catalogos.tipopersona,clave',
            'tercero_nombreRazonSocial' => 'max:150',
            'tercero_rfc' => $rfcAdeudos,
            'tipoPersona' => 'required|exists:catalogos.tipopersona,clave',
            'nombreRazonSocial' => 'required|max:150',
            'rfc' => $rfcAdeudos,
            'pais' => 'required:exists:catalogos.paises,ESPANOL',*/
          ];
        break;
        case "prestamos_terceros":
          if($this->F15_tipoDuenoTitular == "MORAL")
          {
            $rfc = 'size:12';
          }
          else
          {
            $rfc = 'size:13';
          }

          if(!empty($this->F15_tipoInmueble_clave))
          {
            return
            [
              'F15_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
              'F15_tipoInmueble_clave' =>'required|exists:catalogos.tipoinmueble,clave',
              'F15_especifiqueTipo' => 'required_if:F15_tipo_clave,OTRO|max:65',
              'F15_pais' => 'required|exists:catalogos.paises,ISO2',
              'F15_entidadFederativa_clave' => 'required_if:F15_pais,MX|required_with:F15_municipioAlcaldia_clave,F15_coloniaLocalidad|nullable|exists:catalogos.inegi,Cve_Ent',
              'F15_municipioAlcaldia_clave' => 'required_if:F15_pais,MX|required_with:F15_entidadFederativa_clave,F15_coloniaLocalidad|nullable|exists:catalogos.inegi,Cve_Mun',
              'F15_coloniaLocalidad'        => 'required_if:F15_pais,MX|required_with:F15_entidadFederativa_clave,F15_municipioAlcaldia_clave|nullable|exists:catalogos.inegi,Nom_Loc',
              'F15_estadoProvincia'         => 'required_unless:F15_pais,MX|max:65',
              'F15_ciudadLocalidad'         => 'required_unless:F15_pais,MX|max:65',
              'F15_calle'                   => 'required|max:65',
              'F15_numeroExterior' => 'required|alpha_num|min:1|max:6',
              'F15_numeroInterior' => 'nullable|alpha_num|min:1|max:5',
              'F15_codigoPostal' => 'required|min:3|max:9',

              'F15_tipoDuenoTitular' => 'required|exists:catalogos.tipopersona,clave',
              'F15_nombreTitular' => 'required|max:65',
              'F15_rfc' => 'nullable|alpha_num|'.$rfc,
              'F15_relacionConTitular' => 'required|max:65',
            ];
          }
          else
          {
            return
            [
              'F15_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
              'F15_tipoVehiculo_clave' => 'required|exists:catalogos.tipovehiculo,clave',
              'F15_especifiqueTipo' => 'required_if:F15_tipo_clave,OTRO|max:65',
              'F15_pais' => 'required|exists:catalogos.paises,ISO2',
              'F15_entidadFederativa_clave' => 'required_if:F15_pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
              'F15_marca' => 'required|max:65',
              'F15_modelo' => 'required|max:65',
              'F15_anio' => 'required|integer|digits_between:4,4',
              'F15_numeroSerieRegistro' => 'required|max:65',
              'F15_tipoDuenoTitular' => 'required|exists:catalogos.tipopersona,clave',
              'F15_nombreTitular' => 'required|max:65',
              'F15_rfc' => 'nullable|alpha_num|'.$rfc,
              'F15_relacionConTitular' => 'required|max:65',
            ];
          }
        break;
        case "participaciones":
          return [
            'F16_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F16_tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
            'F16_porcentajeParticipacion' => 'required|numeric|max:100',
            'F16_tipoParticipacion_clave' => 'required|exists:catalogos.tipoparticipacion,clave',
            'F16_especifiqueParticipacion' => 'required_if:F16_tipoParticipacion_clave,OTRO|max:65',
            'F16_nombreEmpresaSociedadAsociacion' => 'required|max:65',
            'F16_rfc' => 'required|min:12|max:12',
            'F16_sector_clave' => 'required|exists:catalogos.sector,clave',
            'F16_especifiqueSector' => 'required_if:F16_sector_clave,OTRO|max:65',
            'F16_pais' => 'required|exists:catalogos.paises,ISO2',
            'F16_entidadFederativa_clave' => 'required_if:F16_pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
            'F16_recibeRemuneracion' => 'required|boolean',
            'F16_montoMensual_valor' => 'required_if:F16_recibeRemuneracion,1|max:20',
            'F16_montoMensual_moneda' => 'required_if:F16_recibeRemuneracion,1|exists:catalogos.tipomoneda,clave',
          ];
        break;
        case "decisiones":
          return [
            'F17_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F17_tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
            'F17_puestoRol' => 'required|max:65',
            'F17_fechaInicioParticipacion' => 'required|date',
            'F17_tipoInstitucion_clave' => 'required|exists:catalogos.tipoinstitucion,clave',
            'F17_nombreInstitucion' => 'required|max:65',
            'F17_especifiqueInstitucion' => 'required_if:F17_tipoInstitucion_clave,OTRO|max:65',
            'F17_rfc' => 'alpha_num|min:12|max:12',
            'F17_pais' => 'required|exists:catalogos.paises,ISO2',
            'F17_entidadFederativa_clave' => 'required_if:F17_pais,MX|nullable|exists:catalogos.inegi,Cve_Ent',
            'F17_recibeRemuneracion' => 'required|boolean',
            'F17_montoMensual_valor' => 'required_if:F17_recibeRemuneracion,1|max:20',
            'F17_montoMensual_moneda' => 'required_if:F17_recibeRemuneracion,1|exists:catalogos.tipomoneda,clave',
          ];
        break;
        case "apoyos_publicos":
          return [
            'F18_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F18_beneficiarioPrograma_clave' => 'required|exists:catalogos.beneficiarios,clave',
            'F18_especifiqueBeneficiario' => 'required_if:F18_beneficiarioPrograma_clave,OTRO|max:65',
            'F18_tipoApoyo_clave' => 'required|exists:catalogos.tipoapoyo,clave',
            'F18_especifiqueApoyo' => 'required_if:F18_beneficiarioPrograma_clave,OTRO|max:65',
            'F18_nombrePrograma' => 'required|max:65',
            'F18_formaRecepcion' => 'required|exists:catalogos.formarecepcion,valor',
            'F18_especifiqueEspecie' => 'required_if:F18_formaRecepcion,ESPECIE|max:65',
            'F18_montoApoyoMensual_valor' => 'required_if:F18_formaRecepcion,MONETARIO|max:20',
            'F18_montoApoyoMensual_moneda' => 'required_if:F18_formaRecepcion,MONETARIO|exists:catalogos.tipomoneda,clave',
            'F18_nivelOrdenGobierno' => 'required|exists:catalogos.nivelOrdenGobierno,valor',
            'F18_institucionOtorgante' => 'required|max:65',
          ];
        break;
        case "representaciones":
          return [
            'F19_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F19_tipoRelacion' => 'required|exists:catalogos.tipoRelacion,valor',
            'F19_tipoRepresentacion' => 'required|exists:catalogos.tiporepresentacion,valor',
            'F19_fechaInicioRepresentacion' => 'required|date',
            'F19_tipoPersona' => 'required|exists:catalogos.tipoPersona,valor',
            'F19_nombreRazonSocial' => 'required|max:65',
            'F19_rfc' => 'required|alpha_num|min:12|max:13',
            'F19_pais' => 'required|exists:catalogos.paises,ISO2',
            'F19_entidadFederativa_clave' => 'required_if:F19_pais,MX|exists:catalogos.inegi,Cve_Ent',
            'F19_sector_clave' => 'required|exists:catalogos.sector,clave',
            'F19_especifiqueSector' => 'required_if:F19_sector_clave,OTRO|max:65',
            'F19_recibeRemuneracion' => 'required|boolean',
            'F19_montoMensual_valor' => 'required_if:F19_recibeRemuneracion,1|max:20',
            'F19_montoMensual_moneda' => 'required_if:F19_recibeRemuneracion,1|exists:catalogos.tipomoneda,clave',
          ];
        break;
        case "clientes":
          if($this->clientePrincipal_tipoPersona == "MORAL")
          {
            $clientePrincipal_rfc = 'nullable|alpha_num|size:12';
          }
          else
          {
            $clientePrincipal_rfc = 'nullable|alpha_num|size:13';
          }
          return [
            'F20_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F20_realizaActividadLucrativa' => 'required|boolean',
            'F20_tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
            'F20_clientePrincipal_tipoPersona' => 'required|exists:catalogos.tipoPersona,clave',
            'F20_empresa_nombreEmpresaServicio' => 'required|max:191',
            'F20_empresa_rfc' => 'nullable|alpha_num|min:12|max:13',
            'F20_sector_clave' => 'required|exists:catalogos.sector,clave',
            'F20_especifiqueSector' => 'required_if:F20_sector_clave,OTRO|max:65',
            'F20_clientePrincipal_nombreRazonSocial' => 'required|max:65',
            'F20_clientePrincipal_rfc' => $clientePrincipal_rfc,
            'F20_pais_clave' => 'required|exists:catalogos.paises,ISO2',
            'F20_entidadFederativa_clave' => 'nullable|exists:catalogos.inegi,Cve_Ent|required_if:F20_pais_clave,MX',
            'F20_montoAproximadoGanancia_valor' => 'required|max:20',
            'F20_montoAproximadoGanancia_moneda' => 'required|exists:catalogos.tipomoneda,clave',
          ];
        break;
        case "beneficios_privados":
          if($this->F21_otorgante_tipoPersona == "MORAL")
          {
            $otorgante_rfc = 'nullable|alpha_num|size:12';
          }
          else
          {
            $otorgante_rfc = 'nullable|alpha_num|size:13';
          }
          return [
            'F21_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F21_tipoBeneficio_clave' => 'required|exists:catalogos.tipobeneficio,clave',
            'F21_especifiqueTipo' => 'required_if:F21_tipoBeneficio_clave,O|max:65',
            'F21_sector_clave' => 'required|exists:catalogos.sector,clave',
            'F21_especifiqueSector' => 'required_if:F21_sector_clave,OTRO|max:65',
            'F21_beneficiario_clave' => 'required|exists:catalogos.beneficiarios,clave',
            'F21_especifiqueBeneficiario' => 'required_if:F21_beneficiario_clave,OTRO|max:65',
            'F21_formaRecepcion' => 'required|exists:catalogos.formarecepcion,valor',
            'F21_especifiqueBeneficio' => 'max:65|required_if:F21_formaRecepcion,ESPECIE',
            'F21_montoMensualAproximado_valor' => 'required_if:F21_formaRecepcion,MONETARIO|max:20',
            'F21_montoMensualAproximado_moneda' => 'required_if:F21_formaRecepcion,MONETARIO|exists:catalogos.tipomoneda,clave',
            'F21_otorgante_tipoPersona' => 'required|exists:catalogos.tipoPersona,valor',
            'F21_otorgante_nombreRazonSocial' => 'required|max:65',
            'F21_otorgante_rfc' => $otorgante_rfc,
          ];
        break;
        case "fideicomisos":
          return [
            'F22_tipoOperacion' => 'required|exists:catalogos.tipoOperacion,clave',
            'F22_tipoRelacion' => 'required|exists:catalogos.tipoRelacion,clave',
            'F22_tipoParticipacion' => 'required|exists:catalogos.tipoParticipacionFideicomiso,clave',
            'F22_tipoFideicomiso' => 'required|exists:catalogos.tipoFideicomiso,clave',
            'F22_rfcFideicomiso' => 'nullable|alpha_num|size:12',
            'F22_sector_clave' => 'required|exists:catalogos.sector,clave',
            'F22_extranjero' => 'required|exists:catalogos.extranjero,clave',
            'F22_especifiqueSector' => 'required_if:F22_sector_clave,OTRO|max:65',
            'F22_fiduciario_nombreRazonSocial' => 'required_if:F22_tipoParticipacion,FIDUCIARIO|max:65',
            'F22_fiduciario_rfc' => 'nullable|alpha_num|min:12|max:13',
            'F22_fideicomitente_tipoPersona' => 'nullable|required_if:F22_tipoParticipacion,FIDEICOMITENTE|exists:catalogos.tipoPersona,clave',
            'F22_fideicomitente_nombreRazonSocial' => 'nullable|required_if:F22_tipoParticipacion,FIDEICOMITENTE|max:65',
            'F22_fideicomitente_rfc' => 'nullable|required_if:F22_tipoParticipacion,FIDEICOMITENTE|alphanum|min:12|max:13',
            'F22_fideicomisario_tipoPersona' => 'nullable|required_if:F22_tipoParticipacion,FIDEICOMISARIO|exists:catalogos.tipoPersona,clave',
            'F22_fideicomisario_nombreRazonSocial' => 'nullable|required_if:F22_tipoParticipacion,FIDEICOMISARIO|max:65',
            'F22_fideicomisario_rfc' => 'nullable|required_if:F22_tipoParticipacion,FIDEICOMISARIO|alphanum|min:12|max:13',
          ];
        break;
      }
    }

  }//rules

}
