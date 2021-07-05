<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class formatoRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }





  public function messages()
  {
    return [
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DATOS GENERALES
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						'nombres.required'    => 'Olvidaste agregar tu nombre.',
						'nombres.max'			    => 'El nombre no puede tener más de 65 letras.',
            'primerApellido.required'	=> 'El primer apellido es obligatorio.',
            'primerApellido.max'	=> 'El primer apellido no puede tener más de 65 letras.',
            'segundoApellido.max' => 'El segundo apellido no puede tener más de 65 letras.',
            'F1_paisNacimiento.required'	=> 'El país de nacimiento es obligatorio.',
            'F1_paisNacimiento.exists'	=> 'El país de nacimiento no existe en la lista proporcionada.',
            'F1_nacionalidad.required'	=> 'La nacionalidad es obligatoria.',
            'F1_nacionalidad.exists'	=> 'La nacionalidad no existe en la lista proporcionada.',
            'F1_curp.required' => 'El CURP es obligatorio.',
            'F1_curp.size' => 'El CURP debe tener 18 caracteres.',
            'F1_curp.alpha_num' => 'El CURP debe contener letras y números únicamente.',
            'F1_rfc_rfc.required' => 'El RFC es obligatorio.',
            'F1_rfc_rfc.size' => 'El RFC debe tener 10 caracteres.',
            'F1_rfc_rfc.alpha_num' => 'El RFC debe contener letras y números únicamente.',
            'F1_rfc_homoClave.required' => 'La homoclave es obligatoria.',
            'F1_rfc_homoClave.size' => 'La homoclave debe tener 3 caracteres.',
            'F1_rfc_homoClave.alpha_num' => 'La homoclave debe contener letras y números únicamente.',
            'F1_correoElectronico_institucional.email' => 'El correo institucional no es válido.',
            'F1_correoElectronico_institucional.max' => 'El correo institucional no puede tener mas de 65 caracteres.',
            'F1_correoElectronico_personal.email' => 'El correo personal ingresado no es válido.',
            'F1_correoElectronico_personal.max' => 'El correo personal no puede tener mas de 65 caracteres.',
            'F1_telefono_casa_lada.required_with' => 'La lada es obligatoria con el teléfono de casa.',
            'F1_telefono_casa_lada.exists' => 'La lada no existe en la lista.',
            'F1_telefono_casa.digits_between' => 'El número de casa debe tener 10 dígitos numéricos.',
            'F1_telefono_celularPersonal_lada.required_with' => 'La lada es obligatoria con el teléfono celular.',
            'F1_telefono_celularPersonal_lada.exists' => 'La lada no existe en la lista.',
            'F1_telefono_celularPersonal.digits_between' => 'El número de celular debe tener 10 dígitos numéricos.',
            'F1_situacionPersonalEstadoCivil_clave.required'	=> 'La situación personal es obligatoria.',
            'F1_situacionPersonalEstadoCivil_clave.exists'	=> 'La situación personal no existe en la lista.',
            'F1_regimenMatrimonial_clave.required_if' => 'El régimen matrimonial es obligatorio si eres casado/a.',
            'F1_regimenMatrimonial_clave.exists'	=> 'El régimen matrimonial no existe en la lista.',
            'F1_especifiqueRegimen.required_if' => 'El campo otro es obligatorio si eres casado/a y tu régimen matrimonial es otro.',
            'F1_especifiqueRegimen.max' => 'El campo "otro" no puede tener más de 65 caracteres.',

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DOMICILIO DECLARANTE
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            'F2_pais.required' => 'Olvidaste agregar el país.',
            'F2_pais.exists' => 'El país no existe en la lista dada.',
            'F2_entidadFederativa_clave.required_if' => 'Olvidaste agregar la entidad.',
            'F2_entidadFederativa_clave.required_with' => 'La entidad debe ir junto con el país y municipio.',
            'F2_entidadFederativa_clave.exists' => 'La entidad no existe en la lista dada.',
            'F2_municipioAlcaldia_clave.required_if' => 'Olvidaste agregar el municipio.',
            'F2_municipioAlcaldia_clave.required_with' => 'El municipio debe ir con el país y la entidad.',
            'F2_municipioAlcaldia_clave.exists' => 'El municipio no existe en la lista dada.',
            'F2_coloniaLocalidad.required_if' => 'Olvidaste agregar la colonia.',
            'F2_coloniaLocalidad.required_with' => 'La colonia debe ir con el municipio y la entidad.',
            'F2_coloniaLocalidad.exists' => 'La colonia no existe en la lista.',
            'F2_estadoProvincia.required_unless' => 'Olvidaste agregar el estado/provincia.',
            'F2_estadoProvincia.max' => 'El estado/provincia no puede tener más de 65 caracteres.',
            'F2_ciudadLocalidad.required_unless' => 'La ciudad/localidad es obligatorio.',
            'F2_ciudadLocalidad.max' => 'La ciudad/localidad no puede tenes más de 65 caracteres.',
            'F2_calle.required' => 'Olvidaste agregar la calle.',
            'F2_calle.max' => 'La calle no puede tener más de 65 caracteres.',
            'F2_numeroExterior.required' => 'Olvidaste agregar tu número exterior.',
            'F2_numeroExterior.alpha_num' => 'El número exterior no puede tener símbolos como: !-#$%&.',
            'F2_numeroExterior.min' => 'El número exterior debe tener al menos un caracter.',
            'F2_numeroExterior.max' => 'El número exterior debe tener máximo 6 caracteres.',
            'F2_numeroInterior.alpha_num' => 'El número interior no puede tener símbolos como: !-#$%&.',
            'F2_numeroInterior.max' => 'El número interior debe tener máximo 5 caracteres.',
            'F2_numeroInterior.min' => 'El número interior debe tener al menos un caracter.',
            'F2_codigoPostal.required' => 'Olvidaste agregar código postal.',
            'F2_codigoPostal.min' => 'El código postal debe tener al menos 3 caracteres.',
            'F2_codigoPostal.max' => 'El código postal debe tener máximo 9 caracteres.',

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DATOS PAREJA
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            'F6_ninguno.required' => 'Olvidaste indicar si tienes pareja.',
            'F6_ninguno.boolean' => 'Debes indicar con un SÍ/NO.',
            'F6_nombres.required' => 'El nombre es obligatorio.',
            'F6_nombres.max' => 'El nombre no puede tener más de 65 letras.',
            'F6_primerApellido.required' => 'El primer apellido es obligatorio.',
            'F6_primerApellido.max' => 'El primer apellido no puede tener más de 65 letras.',
            'F6_segundoApellido.max' => 'El segundo apellido no puede tener más de 65 letras.',
            'F6_fechaNacimiento.required' => 'La fecha de nacimiento es oligatoria.',
            'F6_fechaNacimiento.date' => 'La fecha de nacimiento no es una fecha.',
            'F6_curp.alpha_num' => 'El CURP debe tener letras y numeros.',////
            'F6_curp.size' => 'El CURP debe tener 18 caracteres.',////
            'F6_curp.required' => 'El CURP es obligatorio.',
            'F6_rfc.required' => 'El RFC de la pareja es obligatorio.',
            'F6_rfc.min' => 'El RFC debe tener mínimo 13 caracteres.',
            'F6_rfc.max' => 'El RFC debe tener máximo 13 letras.',
            'F6_rfc.alpha_num' => 'El RFC debe tener letras y numeros.',
            'F6_relacionConDeclarante.required' => 'La relación con el declarante es obligatoria.',
            'F6_relacionConDeclarante.exists' => 'La relación con el declarante no existe en la lista.',
            'F6_esDependienteEconomico.required' => 'Olvidaste indicar si es tu dependiente económico.',
            'F6_esDependienteEconomico.boolean' => 'La opción seleccionada en dependiente económico no existe.',
            'F6_ciudadanoExtranjero.required' => 'Olvidaste indicar si tu pareja es extranjera.',
            'F6_ciudadanoExtranjero.boolean' => 'La opción seleccionada en pareja extranjera no existe.',
            'F6_habitaDomicilioDeclarante.required' => 'Olvidaste indicar si tu pareja habita en tu domicilio.',
            'F6_habitaDomicilioDeclarante.boolean' => 'La opción seleccionada en donde habita tu pareja no existe.',
            'F6_lugarDondeReside.in' => 'La opción indicada no es válida, en domicilio de la pareja.',
            'F6_pais.required_without' => 'Olvidaste agregar el país.',
            'F6_pais.exists' => 'El país no existe en la lista dada.',
            'F6_entidadFederativa_clave.required_if' => 'Olvidaste agregar la entidad.',
            'F6_entidadFederativa_clave.required_with' => 'La entidad debe ir junto con el país y municipio.',
            'F6_entidadFederativa_clave.exists' => 'La entidad no existe en la lista dada.',
            'F6_municipioAlcaldia_clave.required_if' => 'Olvidaste agregar el municipio.',
            'F6_municipioAlcaldia_clave.required_with' => 'El municipio debe ir con el país y la entidad.',
            'F6_municipioAlcaldia_clave.exists' => 'El municipio no existe en la lista dada.',
            'F6_coloniaLocalidad.required_if' => 'Olvidaste agregar la colonia.',
            'F6_coloniaLocalidad.required_with' => 'La colonia debe ir con el municipio y la entidad.',
            'F6_coloniaLocalidad.exists' => 'La colonia no existe en la lista.',
            'F6_estadoProvincia.required_unless' => 'Olvidaste agregar el estado/provincia.',
            'F6_estadoProvincia.max' => 'El estado/provincia no puede tener más de 65 caracteres.',
            'F6_ciudadLocalidad.required_unless' => 'Olvidaste agregar la ciudad/localidad.',
            'F6_ciudadLocalidad.max' => 'La ciudad/localidad no puede tenes más de 65 caracteres.',
            'F6_calle.required_without' => 'Olvidaste agregar la calle.',
            'F6_calle.max' => 'La calle no puede tener más de 65 caracteres.',
            'F6_numeroExterior.required_without' => 'Olvidaste agregar tu número exterior.',
            'F6_numeroExterior.alpha_num' => 'El número exterior no puede tener símbolos como: !-#$%&.',
            'F6_numeroExterior.min' => 'El número exterior debe tener al menos un caracter.',
            'F6_numeroExterior.max' => 'El número exterior debe tener máximo 6 caracteres.',
            'F6_numeroInterior.alpha_num' => 'El número interior no puede tener símbolos como: !-#$%&.',
            'F6_numeroInterior.max' => 'El número interior debe tener máximo 5 caracteres.',
            'F6_numeroInterior.min' => 'El número interior debe tener al menos un caracter.',
            'F6_codigoPostal.required_without' => 'Olvidaste agregar código postal.',
            'F6_codigoPostal.min' => 'El código postal debe tener al menos 3 caracteres.',
            'F6_codigoPostal.max' => 'El código postal debe tener máximo 9 caracteres.',
            'F6_actividadLaboral_clave.required' => 'Olvidaste indicar el sector de la actividad laboral de la pareja.',
            'F6_actividadLaboral_clave.exists' => 'El sector de la actividad laboral de la pareja no existe en la lista dada.',
            'F6_especifiqueActividad.required_if' => 'Olvidaste indicar el sector de la actividad laboral.',
            'F6_especifiqueActividad.max' => 'El sector de la actividad solo puede tener 65 caracteres.',
            'F6_actividadLaboral_nombreEnte.required_unless' => 'Olvidaste agregar el nombre de la institución.',
            'F6_actividadLaboral_nombreEnte.max' => 'El nombre de la institución no puede tener más de 65 caracteres.',
            'F6_actividadLaboralSPub_area.required_unless' => 'Olvidaste agregar el área laboral.',
            'F6_actividadLaboralSPub_area.max' => 'El nombre del área laboral no puede tener más de 65 caracteres.',
            'F6_actividadLaboralSPub_empleoCargoComision.required_unless' => 'Olvidaste agregar el empleo.',
            'F6_actividadLaboralSPub_empleoCargoComision.max' => 'El empleo no puede tener más de 65 caracteres.',
            'F6_actividadLaboralSPub_funcionPrincipal.required_unless' => 'Olvidaste agregar la función principal.',
            'F6_actividadLaboralSPub_funcionPrincipal.max' => 'La función principal no puede tener más de 65 caracteres.',
            'F6_fechaIngreso.required_unless' => 'Olvidaste agregar la fecha de ingreso.',
            'F6_fechaIngreso.date' => 'La fecha de ingreso no es válida.',
            'F6_actividadLaboral_rfc.required_if' => 'El RFC laboral es obligatorio.',
            'F6_actividadLaboral_rfc.min' => 'El RFC laboral debe tener mínimo 12 caracteres.',
            'F6_actividadLaboral_rfc.max' => 'El RFC laboral debe tener máximo 12 caracteres.',
            'F6_actividadLaboral_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
            'F6_sector_clave.required_if' => 'Olvidaste indicar el sector privado.',
            'F6_sector_clave.exists' => 'El sector privado no existe en la lista dada.',
            'F6_otro.required_if' => 'Olvidaste especificar el sector privado.',
            'F6_otro.max' => 'El sector no puede tener más de 65 caracteres.',
            'F6_proveedorContratistaGobierno.required_if' => 'Olvidaste indicar si es contratista de gobierno.',
            'F6_proveedorContratistaGobierno.boolean' => 'Debes indicar si es o no contratista de gobierno.',
            'F6_actividadLaboral_nivelOrdenGobierno.required_if' => 'Olvidaste indicar el nivel de gobierno.',
            'F6_actividadLaboral_nivelOrdenGobierno.exists' => 'El nivel de gobierno no existe en la lista dada.',
            'F6_actividadLaboral_ambitoPublico.required_if' => 'Olvidaste indicar el ámbito público.',
            'F6_actividadLaboral_ambitoPublico.exists' => 'El ámbito público no existe en la lista dada.',
            'F6_salarioMensualNeto_valor.required_unless' => 'Olvidaste agregar el sueldo de tu pareja.',
            'F6_salarioMensualNeto_valor.max' => 'El sueldo no puede tener más de 20 caracteres.',
            'F6_salarioMensualNeto_moneda.required_unless' => 'Olvidaste indicar el tipo de moneda.',
            'F6_salarioMensualNeto_moneda.exists' => 'El tipo de moneda no existe en la lista dada.',
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DATOS EMPLEO
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            /* DATOS PAREJA */
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fechaNacimiento.date' => 'Escoja una fecha.',
            'rfc.size' => 'Este campo debe ser de 13 caracteres.',
            'relacionConDeclarante.required' => 'La relación con el declarante es obligatoria.',
            'relacionConDeclarante.exists' => 'Por favor seleccione una opción...',
            'ciudadanoExtranjero.required' => 'Este campo es obligatorio.',
            'ciudadanoExtranjero.boolean' => 'Por favor seleccione una opción...',
            'curp.required_if' => 'Este campo es obligatorio.',
            'esDependienteEconomico.required' => 'Indque si es dependiente económico.',
            'esDependienteEconomico.boolean' => 'Por favor seleccione una opción...',
            'habitaDomicilioDeclarante.required' => 'Indique si habita el mismo domicilio.',
            'habitaDomicilioDeclarante.boolean' => 'Por favor seleccione una opción...',
            'lugarDondeReside.required_if' => '¿En dónde reside?.',
            'lugarDondeReside.exists' => 'Por favor seleccione una opción...',
            'pais.required_if' =>'Indique el país.',
            'domicilioMexico_calle.required_if' => 'Indique la calle.',
            'domicilioMexico_numeroExterior.max' => 'Este campo debe ser de 10 caracteres.',
            'domicilioMexico_numeroExterior.required' => 'Indique el número exterior.',
            'domicilioMexico_numeroInterior.max' => 'Este campo debe ser de 5 caracteres.',
            'domicilioMexico_codigoPostal.required_if' => 'Indique el código postal en México.',
            'domicilioMexico_codigoPostal.max' => 'Este campo debe ser de un máximo de 7 caracteres.',
            #'entidadFederativa_clave' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Cve_Ent',
            #'municipioAlcaldia_clave' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Cve_Mun',
            #'coloniaLocalidad' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Nom_Loc',
            'domicilioExtranjero_estadoProvincia.required_if' => 'Indique la provincia.',
            'domicilioExtranjero_ciudadLocalidad.required_if' => 'Indique la ciudad/localidad.',
            'domicilioExtranjero_calle.required_if' => 'Indique la calle.',
            'domicilioExtranjero_calle.max' =>  'Este campo no debe tener más de 100 caracteres.',
            'domicilioExtranjero_numeroExterior.required_if' => 'Indique el número exterior.',
            'domicilioExtranjero_numeroExterior.max' => 'Este campo no debe tener más de 10 caracteres.',
            'domicilioExtranjero_numeroInterior.max' => 'Este campo no debe tener más de 5 caracteres.',
            'domicilioExtranjero_codigoPostal.required_if' => 'Indique el código postal.',
            'domicilioExtranjero_codigoPostal.max' =>  'Este campo no debe tener más de 7 caracteres.',
            'actividadLaboral_clave.required' => 'Escoja la actividad laboral.',
            'actividadLaboral_clave.exists' => 'Por favor seleccione una opción...',
            'publico_nivelOrdenGobierno.required_if' => 'Indique el nivel de gobierno.',
            'publico_nivelOrdenGobierno.exists' => 'Por favor seleccione una opción...',
            'publico_ambitoPublico.required_if' => 'Escoja el ámbito público.',
            'publico_ambitoPublico.exists' => 'Por favor seleccione una opción...',
            'publico_nombreEntePublico.required_if' => 'Indique el nombre del ente público.',
            'publico_nombreEntePublico.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_areaAdscripcion.required_if' => 'Indique el área de Adscripción.',
            'publico_areaAdscripcion.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_empleoCargoComision.required_if' => 'Indique el empleo/cargo.',
            'publico_empleoCargoComision.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_funcionPrincipal.required_if' => 'Indique la función principal.',
            'publico_funcionPrincipal.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_salarioMensualNeto_valor.required_if' =>'Indique el salario mensual.',
            'publico_salarioMensualNeto_valor.numeric' => "En este campo solo se aceptan numeros",
            'publico_salarioMensualNeto_valor.max' => 'Este campo no debe tener más de 10 caracteres.',
            'publico_salarioMensualNeto_moneda.required_if' =>'Escoja la moneda.',
            'publico_salarioMensualNeto_moneda.exists' => 'Por favor seleccione una opción...',
            'publico_fechaIngreso.required_if' => 'Escoja una fecha.',
            'publico_fechaIngreso.date' => 'Escoja una fecha.',
            'privado_nombreEmpresaSociedadAsociacion.required_if' => 'Nombre de la empresa.',
            'privado_nombreEmpresaSociedadAsociacion.max' => 'Este campo no debe tener más de 100 caracteres.',
            'privado_empleoCargoComision.required_if' => 'Indique el cargo.',
            'privado_empleoCargoComision.max' => 'Este campo no debe tener más de 100 caracteres.',
            'privado_rfc.size' => 'Este campo debe ser de 12 caracteres.',
            'privado_fechaIngreso.required_if' => 'Indique la fecha de ingreso.',
            'privado_fechaIngreso.date' => 'Escoja una fecha.',
            'sector_clave.required_if' => 'Seleccione el sector.',
            'sector_clave.exists' => 'Por favor seleccione una opción...',
            'privado_salarioMensualNeto_valor.required_if' => 'Indique el salario mensual.',
            'privado_salarioMensualNeto_valor.numeric' =>"En este campo solo se aceptan numeros",
            'privado_salarioMensualNeto_moneda.required_if' => 'Indique la moneda.',
            'privado_salarioMensualNeto_moneda.exists' => 'Por favor seleccione una opción...',
            'privado_proveedorContratistaGobierno.required_if' => 'Indique si es contratista.',
            'privado_proveedorContratistaGobierno.boolean' => 'Por favor seleccione una opción...',
            'aclaracionesObservaciones.max' => 'Este campo no debe tener más de 1000 caracteres.',
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// FIDEICOMISO
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            'F22_ninguno.boolean' => 'El campo "ninguno" debe ser verdaro o falso.',
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
      switch($this->route()->parameters()['formato_slug'])
      {
        case "datos_generales":
          return
            [
              'nombres' => 'required|max:65',
              'primerApellido' => 'required|max:65',
              'segundoApellido' => 'max:65',
              'F1_paisNacimiento' => 'required|exists:catalogos.paises,ISO2',
              'F1_nacionalidad' => 'required|exists:catalogos.paises,ISO2',
              'F1_curp' => 'required|size:18|alpha_num',
              'F1_rfc_rfc' => 'required|size:10|alpha_num',
              'F1_rfc_homoClave' => 'required|size:3|alpha_num',
              'F1_correoElectronico_institucional' => 'nullable|email|max:65',
              'F1_correoElectronico_personal' => 'nullable|email|max:65',
              'F1_telefono_casa_lada' => 'required_with:F1_telefono_casa|exists:catalogos.paises,LADA',
              'F1_telefono_casa' => 'nullable|digits_between:10,10',
              'F1_telefono_celularPersonal_lada' => 'required_with:F1_telefono_celularPersonal|exists:catalogos.paises,LADA',
              'F1_telefono_celularPersonal' => 'nullable|digits_between:10,10',
              'F1_situacionPersonalEstadoCivil_clave' => 'required|exists:catalogos.estadocivil,clave',
              'F1_regimenMatrimonial_clave' => 'required_if:F1_situacionPersonalEstadoCivil_clave,CAS|exists:catalogos.regimenmatrimonial,clave',
              'F1_especifiqueRegimen' => 'required_if:F1_regimenMatrimonial_clave,OTR|max:65',
            ];
        break;
        case "domicilio_declarante":
          return
            [
              'F2_pais' => 'required|exists:catalogos.paises,ISO2',
              'F2_entidadFederativa_clave' => 'required_if:F2_pais,MX|required_with:F2_municipioAlcaldia_clave,F2_coloniaLocalidad|nullable|integer|exists:catalogos.inegi,Cve_Ent',
              'F2_municipioAlcaldia_clave' => 'required_if:F2_pais,MX|required_with:F2_entidadFederativa_clave,F2_coloniaLocalidad|nullable|integer|exists:catalogos.inegi,Cve_Mun',
              'F2_coloniaLocalidad'        => 'required_if:F2_pais,MX|required_with:F2_entidadFederativa_clave,F2_municipioAlcaldia_clave|nullable|exists:catalogos.inegi,Nom_Loc',
              'F2_estadoProvincia'         => 'required_unless:F2_pais,MX|max:65',
              'F2_ciudadLocalidad'         => 'required_unless:F2_pais,MX|max:65',
              'F2_calle'                   => 'required|max:65',
              'F2_numeroExterior' => 'required|alpha_num|min:1|max:6',
              'F2_numeroInterior' => 'nullable|alpha_num|min:1|max:5',
              'F2_codigoPostal' => 'required|min:3|max:9',
            ];
        case "datos_curriculares":
          return [];
        break;
          case "datos_pareja":

              $unless = null;

              if(empty($this->F6_lugarDondeReside))
              {
                if($this->F6_lugarDondeReside != "MX")
                {
                  $unless = 'required_unless:F6_pais,MX|';
                }
              }

            return [
              'F6_ninguno' => 'required|boolean',
              'F6_nombres' => 'required|max:65',
              'F6_primerApellido' => 'required|max:65',
              'F6_segundoApellido' => 'max:65',
              'F6_fechaNacimiento' => 'required|date',
              'F6_curp' => 'required|size:18|alpha_num',
              'F6_rfc' => 'required|min:13|max:13|alpha_num',
              'F6_relacionConDeclarante' => 'required|exists:catalogos.relacioncondeclarante,clave',
              'F6_esDependienteEconomico' => 'required|boolean',
              'F6_ciudadanoExtranjero' => 'required|boolean',
              'F6_habitaDomicilioDeclarante' => 'required|boolean',
              'F6_lugarDondeReside' => 'nullable|in:SE_DESCONOCE',
              'F6_pais' => 'required_without:F6_lugarDondeReside|exists:catalogos.paises,ISO2',
              'F6_entidadFederativa_clave' => 'required_if:F6_pais,MX|required_with:F6_municipioAlcaldia_clave,F6_coloniaLocalidad|nullable|exists:catalogos.inegi,Cve_Ent',
              'F6_municipioAlcaldia_clave' => 'required_if:F6_pais,MX|required_with:F6_entidadFederativa_clave,F6_coloniaLocalidad|nullable|exists:catalogos.inegi,Cve_Mun',
              'F6_coloniaLocalidad'        => 'required_if:F6_pais,MX|required_with:F6_entidadFederativa_clave,F6_municipioAlcaldia_clave|nullable|exists:catalogos.inegi,Nom_Loc',
              'F6_estadoProvincia'         => 'nullable|'.$unless.'max:65',
              'F6_ciudadLocalidad'         => 'nullable|'.$unless.'max:65',
              'F6_calle'                   => 'required_without:F6_lugarDondeReside|max:65',
              'F6_numeroExterior' => 'nullable|required_without:F6_lugarDondeReside|alpha_num|min:1|max:6',
              'F6_numeroInterior' => 'nullable|alpha_num|min:1|max:5',
              'F6_codigoPostal' => 'nullable|required_without:F6_lugarDondeReside|min:3|max:9',
              'F6_actividadLaboral_clave' => 'required|exists:catalogos.actividadlaboral,clave',
              'F6_especifiqueActividad' => 'required_if:F6_actividadLaboral_clave,OTRO|max:65',
              'F6_actividadLaboral_nombreEnte' => 'required_unless:F6_actividadLaboral_clave,NIN|max:65',
              'F6_actividadLaboralSPub_area' => 'required_unless:F6_actividadLaboral_clave,NIN|max:65',
              'F6_actividadLaboralSPub_empleoCargoComision' => 'required_unless:F6_actividadLaboral_clave,NIN|max:65',
              'F6_actividadLaboralSPub_funcionPrincipal' => 'required_unless:F6_actividadLaboral_clave,NIN|max:65',
              'F6_fechaIngreso' => 'nullable|required_unless:F6_actividadLaboral_clave,NIN|date',
              'F6_actividadLaboral_rfc' => 'nullable|required_if:F6_actividadLaboral_clave,PRI|min:12|max:12|alpha_num',
              'F6_sector_clave' => 'nullable|required_if:F6_actividadLaboral_clave,PRI|exists:catalogos.sector,clave',
              'F6_otro' => 'nullable|required_if:F6_sector_clave,OTRO|max:65',
              'F6_proveedorContratistaGobierno' => 'nullable|required_if:F6_actividadLaboral_clave,PRI|boolean',
              'F6_actividadLaboral_nivelOrdenGobierno' => 'nullable|required_if:F6_actividadLaboral_clave,PUB|exists:catalogos.nivelOrdenGobierno,clave',
              'F6_actividadLaboral_ambitoPublico' => 'nullable|required_if:F6_actividadLaboral_clave,PUB|exists:catalogos.ambitoPublico,clave',
              'F6_salarioMensualNeto_valor' => 'required_unless:F6_actividadLaboral_clave,NIN|max:20',
              'F6_salarioMensualNeto_moneda' => 'required_unless:F6_actividadLaboral_clave,NIN|exists:catalogos.tipomoneda,clave',
            ];
          break;

          case "prestamos_terceros":
            return [];
          break;
          case "participaciones":
            return [];
          break;
          case "decisiones":
            return [];
          break;
          case "apoyos_publicos":
            return [];
          break;
          case "clientes":
            return [];
          break;
          case "fideicomisos":
            return [
              'F22_ninguno' => 'boolean',
            ];
          break;
        default:
          return [];
      }
    }

  }//rules

}
