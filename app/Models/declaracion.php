<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use App\Models\catalogo;


class declaracion extends Model
{
  use HasFactory;

  protected $table = 'L21_declaraciones';

  protected $ini = 'INICIAL';

  protected $mod = 'MODIFICACIÓN';

  protected $con = 'CONCLUSIÓN';

  public $ley_actual = 'L21';

  protected $fillable = ['tipo',

  'nombres','primerApellido','segundoApellido','F1_paisNacimiento','F1_nacionalidad','F1_curp','F1_rfc_rfc','F1_rfc_homoClave','F1_correoElectronico_institucional','F1_correoElectronico_personal','F1_telefono_casa_lada','F1_telefono_casa','F1_telefono_celularPersonal_lada','F1_telefono_celularPersonal','F1_situacionPersonalEstadoCivil_clave','F1_situacionPersonalEstadoCivil_valor','F1_regimenMatrimonial_clave','F1_regimenMatrimonial_valor','F1_especifiqueRegimen','F1_aclaracionesObservaciones',

  'F2_pais','F2_entidadFederativa_clave','F2_municipioAlcaldia_clave','F2_coloniaLocalidad','F2_estadoProvincia','F2_ciudadLocalidad','F2_calle','F2_numeroExterior','F2_numeroInterior','F2_codigoPostal','F2_aclaracionesObservaciones',

  'F3_aclaracionesObservaciones',

  'F4_ninguno','F4_aclaracionesObservaciones',

  'F5_ninguno','F5_aclaracionesObservaciones',

  'F6_ninguno','F6_tipoOperacion','F6_nombres','F6_primerApellido','F6_segundoApellido','F6_fechaNacimiento','F6_rfc','F6_relacionConDeclarante','F6_ciudadanoExtranjero','F6_curp','F6_lugarDondeReside','F6_esDependienteEconomico','F6_habitaDomicilioDeclarante','F6_lugarDondeReside','F6_pais','F6_entidadFederativa_clave','F6_entidadFederativa_valor','F6_municipioAlcaldia_clave','F6_municipioAlcaldia_valor','F6_coloniaLocalidad','F6_estadoProvincia','F6_ciudadLocalidad','F6_calle','F6_numeroExterior','F6_numeroInterior','F6_codigoPostal','F6_actividadLaboral_clave','F6_actividadLaboral_valor','F6_actividadLaboral_nivelOrdenGobierno','F6_actividadLaboral_ambitoPublico','F6_actividadLaboral_nombreEnte','F6_actividadLaboral_rfc','F6_actividadLaboralSPub_area','F6_actividadLaboralSPub_empleoCargoComision','F6_actividadLaboralSPub_funcionPrincipal','F6_salarioMensualNeto_valor','F6_salarioMensualNeto_moneda','F6_fechaIngreso','F6_sector_clave','F6_sector_valor','F6_proveedorContratistaGobierno','F6_aclaracionesObservaciones',

  'F7_ninguno',
  'F7_aclaracionesObservaciones',

  'F8_remuneracionMCPub_valor',
  'F8_remuneracionMCPub_moneda',
  'F8_otrosIngMTot_valor',
  'F8_otrosIngMTot_moneda',
  'F8_actIndCEmp_remuneracionTo_valor',
  'F8_actIndCEmp_remuneracionTo_moneda',
  'F8_actIndCEmp_actv_remuneracion_valor',
  'F8_actIndCEmp_actv_remuneracion_moneda',
  'F8_actIndCEmp_actv_nombreRazonSocial',
  'F8_actIndCEmp_actv_tipoNegocio',
  'F8_actvFin_remuneracionTo_valor',
  'F8_actvFin_remuneracionTo_moneda',
  'F8_actvFin_actv_remuneracion_valor',
  'F8_actvFin_actv_remuneracion_moneda',
  'F8_actvFin_actv_tipoInstrumento_clave',
  'F8_actvFin_actv_tipoInstrumento_valor',
  'F8_servPro_remuneracionTo_valor',
  'F8_servPro_remuneracionTo_moneda',
  'F8_servPro_serv_remuneracion_valor',
  'F8_servPro_serv_remuneracion_moneda',
  'F8_servPro_serv_tipoServicio',
  'F8_otrosIng_remuneracionTo_valor',
  'F8_otrosIng_remuneracionTo_moneda',
  'F8_otrosIng_Ing_remuneracion_valor',
  'F8_otrosIng_Ing_remuneracion_moneda',
  'F8_otrosIng_Ing_tipoingreso',
  'F8_ingMenNDec_valor',
  'F8_ingMenNDec_moneda',
  'F8_ingMenNPDep_valor',
  'F8_ingMenNPDep_moneda',
  'F8_totalIngMNetos_valor',
  'F8_totalIngMNetos_moneda',
  'F8_aclaracionesObservaciones',

  'F9_ninguno',
  'F9_aclaracionesObservaciones',

  'F10_servidorPublicoAnioAnterior',
  'F10_fechaIngreso',
  'F10_fechaConclusion',
  'F10_remuneracionNeCaPu_valor',
  'F10_remuneracionNeCaPu_moneda',
  'F10_otrosIngTot_valor',
  'F10_otrosIngTot_moneda',
  'F10_actInd_remuneracionTo_valor',
  'F10_actInd_remuneracionTo_moneda',
  'F10_actInd_act_remuneracion_valor',
  'F10_actInd_act_remuneracion_moneda',
  'F10_actInd_act_nombreRazonSocial',
  'F10_actInd_act_tipoNegocio',
  'F10_actFin_remuneracionTo_valor',
  'F10_actFin_remuneracionTo_moneda',
  'F10_actFin_act_remuneracion_valor',
  'F10_actFin_act_remuneracion_moneda',
  'F10_actFin_act_tipoInstrumento_clave',
  'F10_actFin_act_tipoInstrumento_valor',
  'F10_servPro_remuneracionTo_valor',
  'F10_servPro_remuneracionTo_moneda',
  'F10_servPro_serv_remuneracion_valor',
  'F10_servPro_serv_remunercion_moneda',
  'F10_servPro_serv_tipoServicio',
  'F10_enjBien_remuneracionTo_valor',
  'F10_enjBien_remuneracionTo_moneda',
  'F10_enjBien_bien_remuneracion_valor',
  'F10_enjBien_bien_remuneracion_moneda',
  'F10_enjBien_bien_tipoBienEnajenado',
  'F10_otrIng_remuneracionTo_valor',
  'F10_otrIng_remuneracionTo_moneda',
  'F10_otrIng_ing_remuneracion_valor',
  'F10_otrIng_ing_remuneracion_moneda',
  'F10_otrIng_ing_tipoingreso',
  'F10_ingNAD_valor',
  'F10_ingNAD_moneda',
  'F10_ingNAPD_valor',
  'F10_ingNAPD_moneda',
  'F10_totalINA_valor',
  'F10_totalINA_moneda',
  'F10_aclaracionesObservaciones',

  /*VEHICULOS*/
  'F11_ninguno',
  'F11_aclaracionesObservaciones',

  /*BIENES MUEBLES*/
  'F12_ninguno',
  'F12_aclaracionesObservaciones',

  /*INVERSIONES*/
  'F13_ninguno',
  'F13_aclaracionesObservaciones',

  /*ADEUDOS*/
  'F14_ninguno',
  'F14_aclaracionesObservaciones',

  /*PRESTAMOS*/
  'F15_ninguno',
  'F15_aclaracionesObservaciones',

  /*PARTICIPACIONES*/
  'F16_ninguno',
  'F16_aclaracionesObservaciones',

  /*TOMA DECISIONES*/
  'F17_ninguno',
  'F17_aclaracionesObservaciones',

  /*APOYOS*/
  'F18_ninguno',
  'F18_aclaracionesObservaciones',

  /*REPRESENTACIÓN*/
  'F19_ninguno',
  'F19_aclaracionesObservaciones',

  /*CLIENTES PRINCIPALES*/
  'F20_ninguno',
  'F20_aclaracionesObservaciones',

  /*BENEFICIOS PRIVADOS*/
  'F21_ninguno',
  'F21_aclaracionesObservaciones',

  /*FIDEICOMISOS*/
  'F22_ninguno',
  'F22_aclaracionesObservaciones',

  ];

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// SETTERS
	/////////////////////////////////////////////////////////////////////////////////
  public function settipoAttribute($tipo){
		$this->attributes['tipo'] = $tipo;
		$this->attributes['username'] = \Auth::user()->username;
		$this->attributes['ley'] = $this->ley_actual;
	}

  public function setF1SituacionPersonalEstadoCivilClaveAttribute($clave)
  {
    $array = $this->catalogo->estadoCivil($clave);

    $this->attributes['F1_situacionPersonalEstadoCivil_clave'] = $array->clave;
    $this->attributes['F1_situacionPersonalEstadoCivil_valor'] = $array->valor;
  }

  public function setF1RegimenMatrimonialClaveAttribute($clave)
  {
    if($this->F1_situacionPersonalEstadoCivil_clave == "CAS")
    {
      $array = $this->catalogo->regimenMatrimonial($clave);

      $this->attributes['F1_regimenMatrimonial_clave'] = $array->clave;
      $this->attributes['F1_regimenMatrimonial_valor'] = $array->valor;
    }
    else
    {
      $this->attributes['F1_regimenMatrimonial_clave'] = null;
      $this->attributes['F1_regimenMatrimonial_valor'] = null;
      $this->attributes['F1_especifiqueRegimen'] = null;
    }
  }

  public function setF1EspecifiqueRegimenAttribute($valor)
  {
    if($this->F1_regimenMatrimonial_clave == "OTR")
    {
      $this->attributes['F1_especifiqueRegimen'] = $valor;
    }
    else
    {
      $this->attributes['F1_especifiqueRegimen'] = null;
    }
  }

  public function setF2EntidadFederativaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiEntidades($clave);

    $this->attributes['F2_entidadFederativa_clave'] = $array->Cve_Ent;
    $this->attributes['F2_entidadFederativa_valor'] = $array->Nom_Ent;
  }


  public function setF2MunicipioAlcaldiaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiAlcaldias($this->F2_entidadFederativa_clave,$clave);

    $this->attributes['F2_municipioAlcaldia_clave'] = $array->Cve_Mun;
    $this->attributes['F2_municipioAlcaldia_valor'] = $array->Nom_Mun;
  }

  public function setF6SalarioMensualNetoValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F6_salarioMensualNeto_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F6_salarioMensualNeto_valor'] = null;
    }
  }


  public function setF8RemuneracionMCPubValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_remuneracionMCPub_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_remuneracionMCPub_valor'] = null;
    }
  }

  public function setF8OtrosIngMTotValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_otrosIngMTot_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_otrosIngMTot_valor'] = null;
    }
  }

  public function setF8_actIndCEmpRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_actIndCEmp_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_actIndCEmp_remuneracionTo_valor'] = null;
    }
  }

  public function setF8ActIndCEmpActvRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_actIndCEmp_actv_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_actIndCEmp_actv_remuneracion_valor'] = null;
    }
  }

  public function setF8ActvFinRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_actvFin_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_actvFin_remuneracionTo_valor'] = null;
    }
  }

  public function setF8ActvFinActvRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_actvFin_actv_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_actvFin_actv_remuneracion_valor'] = null;
    }
  }

  public function setF8ActvFinActvTipoInstrumentoValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_actvFin_actv_tipoInstrumento_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_actvFin_actv_tipoInstrumento_valor'] = null;
    }
  }

  public function setF8ServProRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_servPro_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_servPro_remuneracionTo_valor'] = null;
    }
  }

  public function setF8ServProServRemuneracionRalorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_servPro_serv_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_servPro_serv_remuneracion_valor'] = null;
    }
  }

  public function setF8OtrosIngRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_otrosIng_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_otrosIng_remuneracionTo_valor'] = null;
    }
  }

  public function setF8OtrosIngIngRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_otrosIng_Ing_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_otrosIng_Ing_remuneracion_valor'] = null;
    }
  }

  public function setF8IngMenNDecValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_ingMenNDec_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_ingMenNDec_valor'] = null;
    }
  }

  public function setF8IngMenNPDepValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F8_ingMenNPDep_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F8_ingMenNPDep_valor'] = null;
    }
  }

  public function settotalIngresosNetosAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['totalIngresosNetos'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['totalIngresosNetos'] = null;
    }
  }

  public function F9ServidorPublicoAnioAnterior($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_servidorPublicoAnioAnterior'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_servidorPublicoAnioAnterior'] = null;
    }
  }

  public function setF9RemuneracionNeCaPuValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_remuneracionNeCaPu_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_remuneracionNeCaPu_valor'] = null;
    }
  }

  public function setF9OtrosIngTotValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_otrosIngTot_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_otrosIngTot_valor'] = null;
    }
  }

  public function setF9ActIndRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_actInd_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_actInd_remuneracionTo_valor'] = null;
    }
  }

  public function setF9ActIndActRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_actInd_act_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_actInd_act_remuneracion_valor'] = null;
    }
  }

  public function setF9ActFinRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_actFin_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_actFin_remuneracionTo_valor'] = null;
    }
  }

  public function setF9ActFinActRemuneracion_valorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_actFin_act_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_actFin_act_remuneracion_valor'] = null;
    }
  }

  public function setF9ServProRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_servPro_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_servPro_remuneracionTo_valor'] = null;
    }
  }

  public function setF9ServProServRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_servPro_serv_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_servPro_serv_remuneracion_valor'] = null;
    }
  }

  public function F9EnjBienRemuneracionToValor($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_enjBien_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_enjBien_remuneracionTo_valor'] = null;
    }
  }

  public function setF9EnjBienBienRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_enjBien_bien_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_enjBien_bien_remuneracion_valor'] = null;
    }
  }

  public function setF9OtrIngRemuneracionToValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_otrIng_remuneracionTo_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_otrIng_remuneracionTo_valor'] = null;
    }
  }

  public function setF9OtrIngIngRemuneracionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_otrIng_ing_remuneracion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_otrIng_ing_remuneracion_valor'] = null;
    }
  }

  public function setF9IngNADValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_ingNAD_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_ingNAD_valor'] = null;
    }
  }

  public function setF9IngNAPDValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_ingNAPD_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_ingNAPD_valor'] = null;
    }
  }

  public function setF9TotalINAValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F9_totalINA_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F9_totalINA_valor'] = null;
    }
  }




  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// GETTERS
	/////////////////////////////////////////////////////////////////////////////////
  public function getfilasAttribute()
  {
    return $this->modelo::where('declaracion_id','=',$this->id)->get();
  }



  public function getformatosAttribute()
  {
    return catalogo::formatos($this->ley);
  }



  public function getInicialAttribute()
  {
    if($this->tipo == $this->ini)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function getModificacionAttribute()
  {
    if($this->tipo == $this->mod)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function getConclusionAttribute()
  {
    if($this->tipo == $this->con)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function getFirmadaAttribute()
  {
    if($this->estatus == "Firmada")
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// FUNCIONES
	/////////////////////////////////////////////////////////////////////////////////
  public function vista($slug = null)
  {
    if(is_null($slug))
    {
      $formato = declaracion_formato::where('declaracion_id','=',$this->id)->where('estatus','=',0)
                                                                           ->orderby('formato_id','ASC')
                                                                           ->first();
      if(is_null($formato))
      {
        return "../";
      }
    }
    else
    {
      $formato = declaracion_formato::where('formato_slug','=',$slug)->where('declaracion_id','=',$this->id)
                                                                     ->first();

    }

    return $formato->formato_slug;
  }



  public function crear_formatos()
  {
    $formatos = catalogo::formatos($this->ley_actual);

    foreach($formatos as $formato)
    {
      declaracion_formato::create(['formato_id' => $formato->id, 'formato_slug' => $formato->slug,'declaracion_id' => $this->id]);
    }
  }

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
			\Schema::create($this->table, function(Blueprint $table)
			{
        $table->increments('id');
        $table->string('username',13);
        $table->enum('tipo', [$this->ini,$this->mod,$this->con])->default($this->ini);
        $table->enum('estatus', ['Pendiente','Firmada'])->default('Pendiente');
        $table->string('ley',3)->default('L21');



        /*FORMATOS L21 DATOS GENERALES*/
        $table->string('nombres')->nullable()->default(null);
        $table->string('primerApellido',50)->nullable()->default(null);
        $table->string('segundoApellido',50)->nullable()->default(null);
        $table->string('F1_paisNacimiento',2)->nullable()->default($this->catalogo->paises('default')->ISO2);
        $table->string('F1_nacionalidad',2)->nullable()->default($this->catalogo->paises('default')->ISO2);
        $table->string('F1_curp',18)->nullable()->default(null);
        $table->string('F1_rfc_rfc',10)->nullable()->default(null);
        $table->string('F1_rfc_homoClave',3)->nullable()->default(null);
        $table->string('F1_correoElectronico_institucional',75)->nullable()->default(null);
        $table->string('F1_correoElectronico_personal',75)->nullable()->default(null);
        $table->string('F1_telefono_casa_lada',5)->nullable()->default(null);
        $table->string('F1_telefono_casa',10)->nullable()->default(null);
        $table->string('F1_telefono_celularPersonal_lada',5)->nullable()->default(null);
        $table->string('F1_telefono_celularPersonal',10)->nullable()->default(null);
        $table->string('F1_situacionPersonalEstadoCivil_clave',3)->nullable()->default(null);
        $table->string('F1_situacionPersonalEstadoCivil_valor',50)->nullable()->default(null);
        $table->string('F1_regimenMatrimonial_clave',3)->nullable()->default(null);
        $table->string('F1_regimenMatrimonial_valor',50)->nullable()->default(null);
        $table->string('F1_especifiqueRegimen',50)->nullable()->default(null);
        $table->mediumText('F1_aclaracionesObservaciones')->nullable()->default(null);
        /*FIN FORMATOS L21 DATOS GENERALES*/


        /*FORMATOS L21 DOMICILIO DECLARANTE*/
        $table->string('F2_pais',2)->nullable()->default(null);
        $table->string('F2_entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('F2_entidadFederativa_valor')->nullable()->default(null);
        $table->string('F2_municipioAlcaldia_clave',4)->nullable()->default(null);
        $table->string('F2_municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('F2_coloniaLocalidad')->nullable()->default(null);
        $table->string('F2_estadoProvincia')->nullable()->default(null);
        $table->string('F2_ciudadLocalidad')->nullable()->default(null);
        $table->string('F2_calle')->nullable()->default(null);
        $table->string('F2_numeroExterior',6)->nullable()->default(null);
        $table->string('F2_numeroInterior',5)->nullable()->default(null);
        $table->string('F2_codigoPostal',7)->nullable()->default(null);
        $table->mediumText('F2_aclaracionesObservaciones')->nullable()->default(null);
        /*FIN L21 DOMICILIO DECLARANTE*/


        /*FORMATOS L21 DATOS CURRICUALRES*/
        $table->mediumText('F3_aclaracionesObservaciones')->nullable()->default(null);
        /*FIN L21 DATOS CURRICULARES*/


        /*FORMATOS L21 DATOS EMPLEO*/
        $table->mediumText('F4_aclaracionesObservaciones')->nullable()->default(null);
        /*FIN L21 DATOS EMPLEO*/


        /*FORMATOS L21 EXPERIENCIA LABORAL*/
        $table->boolean('F5_ninguno')->default(false);
        $table->mediumText('F5_aclaracionesObservaciones')->nullable()->default(null);
        /*FIN L21 EXPERIENCIA LABORAL*/


        /*FORMATOS L21 DATOS PAREJA*/
        $table->boolean('F6_ninguno')->default(false);
        $table->string('F6_tipoOperacion')->nullable()->default("AGREGAR");
        $table->string('F6_nombres')->nullable()->default(null);
        $table->string('F6_primerApellido')->nullable()->default(null);
        $table->string('F6_segundoApellido')->nullable()->default(null);
        $table->date('F6_fechaNacimiento')->nullable()->default(null);
        $table->string('F6_curp',18)->nullable()->default(null);
        $table->string('F6_rfc',13)->nullable()->default(null);
        $table->string('F6_relacionConDeclarante')->nullable()->default(null);
        $table->boolean('F6_esDependienteEconomico')->nullable()->default(null);
        $table->boolean('F6_ciudadanoExtranjero')->nullable()->default(null);
        $table->boolean('F6_habitaDomicilioDeclarante')->nullable()->default(false);
        $table->string('F6_lugarDondeReside')->nullable()->default("SE_DESCONOCE");
        $table->string('F6_pais',2)->nullable()->default(null);
        $table->string('F6_entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('F6_entidadFederativa_valor')->nullable()->default(null);
        $table->string('F6_municipioAlcaldia_clave',4)->nullable()->default(null);
        $table->string('F6_municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('F6_coloniaLocalidad')->nullable()->default(null);
        $table->string('F6_estadoProvincia')->nullable()->default(null);
        $table->string('F6_ciudadLocalidad')->nullable()->default(null);
        $table->string('F6_calle')->nullable()->default(null);
        $table->string('F6_numeroExterior',5)->nullable()->default(null);
        $table->string('F6_numeroInterior',4)->nullable()->default(null);
        $table->string('F6_codigoPostal',7)->nullable()->default(null);
        $table->string('F6_actividadLaboral_clave')->nullable()->default(null);
        $table->string('F6_actividadLaboral_valor')->nullable()->default(null);
        $table->string('F6_actividadLaboral_nivelOrdenGobierno')->nullable()->default(null);
        $table->string('F6_actividadLaboral_ambitoPublico')->nullable()->default(null);
        $table->string('F6_actividadLaboral_nombreEnte')->nullable()->default(null);
        $table->string('F6_actividadLaboral_rfc',13)->nullable()->default(null);
        $table->string('F6_actividadLaboralSPub_area')->nullable()->default(null);
        $table->string('F6_actividadLaboralSPub_empleoCargoComision')->nullable()->default(null);
        $table->string('F6_actividadLaboralSPub_funcionPrincipal')->nullable()->default(null);
        $table->float('F6_salarioMensualNeto_valor',15,2)->nullable()->default(null);
        $table->string('F6_salarioMensualNeto_moneda')->nullable()->default(null);
        $table->date('F6_fechaIngreso')->nullable()->default(null);
        $table->string('F6_sector_clave')->nullable()->default(null);
        $table->string('F6_sector_valor')->nullable()->default(null);
        $table->string('F6_otro')->nullable()->default(null);
        $table->boolean('F6_proveedorContratistaGobierno')->nullable()->default(null);
        $table->mediumText('F6_aclaracionesObservaciones')->nullable()->default(null);
        /*FIN L21 DATOS PAREJA*/


        /*FORMATOS L21 DEPENDIENTES ECONOMICOS*/
        $table->boolean('F7_ninguno')->default(false);
        $table->mediumText('F7_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 DEPENDIENTES ECONOMICOS*/


        /*FORMATOS L21 INGRESOS*/
        $table->float('F8_remuneracionMCPub_valor',15,2)->nullable()->default(null);
        $table->string('F8_remuneracionMCPub_moneda')->nullable()->default(null);
        $table->float('F8_otrosIngMTot_valor',15,2)->nullable()->default(null);
        $table->string('F8_otrosIngMTot_moneda')->nullable()->default(null);
        $table->float('F8_actIndCEmp_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F8_actIndCEmp_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F8_actIndCEmp_actv_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F8_actIndCEmp_actv_remuneracion_moneda')->nullable()->default(null);
        $table->string('F8_actIndCEmp_actv_nombreRazonSocial')->nullable()->default(null);
        $table->string('F8_actIndCEmp_actv_tipoNegocio')->nullable()->default(null);
        $table->float('F8_actvFin_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F8_actvFin_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F8_actvFin_actv_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F8_actvFin_actv_remuneracion_moneda')->nullable()->default(null);
        $table->string('F8_actvFin_actv_tipoInstrumento_clave')->nullable()->default(null);
        $table->string('F8_actvFin_actv_tipoInstrumento_valor',15,2)->nullable()->default(null);
        $table->float('F8_servPro_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F8_servPro_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F8_servPro_serv_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F8_servPro_serv_remuneracion_moneda')->nullable()->default(null);
        $table->string('F8_servPro_serv_tipoServicio')->nullable()->default(null);
        $table->float('F8_otrosIng_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F8_otrosIng_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F8_otrosIng_Ing_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F8_otrosIng_Ing_remuneracion_moneda')->nullable()->default(null);
        $table->string('F8_otrosIng_Ing_tipoingreso')->nullable()->default(null);
        $table->float('F8_ingMenNDec_valor',15,2)->nullable()->default(null);
        $table->string('F8_ingMenNDec_moneda')->nullable()->default(null);
        $table->float('F8_ingMenNPDep_valor',15,2)->nullable()->default(null);
        $table->string('F8_ingMenNPDep_moneda')->nullable()->default(null);
        $table->float('totalIngresosNetos',15,2)->nullable()->default(null);
        $table->string('F8_totalIngMNetos_moneda')->nullable()->default(null);
        $table->mediumText('F8_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 INGRESOS*/



        /*FORMATOS L21 ACTIVIDAD ANTERIOR*/
        $table->boolean('F9_servidorPublicoAnioAnterior')->default(0);
        $table->date('F9_fechaIngreso')->nullable()->default(null);
        $table->date('F9_fechaConclusion')->nullable()->default(null);
        $table->float('F9_remuneracionNeCaPu_valor',15,2)->nullable()->default(null);
        $table->string('F9_remuneracionNeCaPu_moneda')->nullable()->default(null);
        $table->float('F9_otrosIngTot_valor',15,2)->nullable()->default(null);
        $table->string('F9_otrosIngTot_moneda')->nullable()->default(null);
        $table->float('F9_actInd_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F9_actInd_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F9_actInd_act_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F9_actInd_act_remuneracion_moneda')->nullable()->default(null);
        $table->string('F9_actInd_act_nombreRazonSocial')->nullable()->default(null);
        $table->string('F9_actInd_act_tipoNegocio')->nullable()->default(null);
        $table->float('F9_actFin_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F9_actFin_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F9_actFin_act_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F9_actFin_act_remuneracion_moneda')->nullable()->default(null);
        $table->string('F9_actFin_act_tipoInstrumento_clave')->nullable()->default(null);
        $table->string('F9_actFin_act_tipoInstrumento_valor')->nullable()->default(null);
        $table->float('F9_servPro_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F9_servPro_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F9_servPro_serv_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F9_servPro_serv_remunercion_moneda')->nullable()->default(null);
        $table->string('F9_servPro_serv_tipoServicio')->nullable()->default(null);
        $table->float('F9_enjBien_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F9_enjBien_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F9_enjBien_bien_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F9_enjBien_bien_remuneracion_moneda')->nullable()->default(null);
        $table->string('F9_enjBien_bien_tipoBienEnajenado')->nullable()->default(null);
        $table->float('F9_otrIng_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('F9_otrIng_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('F9_otrIng_ing_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('F9_otrIng_ing_remuneracion_moneda')->nullable()->default(null);
        $table->string('F9_otrIng_ing_tipoingreso')->nullable()->default(null);
        $table->float('F9_ingNAD_valor',15,2)->nullable()->default(null);
        $table->string('F9_ingNAD_moneda')->nullable()->default(null);
        $table->float('F9_ingNAPD_valor',15,2)->nullable()->default(null);
        $table->string('F9_ingNAPD_moneda')->nullable()->default(null);
        $table->float('F9_totalINA_valor',15,2)->nullable()->default(null);
        $table->string('F9_totalINA_moneda')->nullable()->default(null);
        $table->mediumText('F9_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 ACTIVIDAD ANTERIOR*/


        /*FORMATOS L21 BIENES INMUEBLES*/
        $table->boolean('F10_ninguno')->default(false);
        $table->mediumText('F10_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 BIENES INMUEBLES*/


        /*FORMATOS L21 VEHICULOS*/
        $table->boolean('F11_ninguno')->default(false);
        $table->mediumText('F11_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 VEHICULOS*/


        /*FORMATOS L21 BIENES MUEBLES*/
        $table->boolean('F12_ninguno')->default(false);
        $table->mediumText('F12_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 BIENES MUEBLES*/


        /*FORMATOS L21 CUENTAS BANCARIAS*/
        $table->boolean('F13_ninguno')->default(false);
        $table->mediumText('F13_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 CUENTAS BANCARIAS*/


        /*FORMATOS L21 ADEUDOS PASIVOS*/
        $table->boolean('F14_ninguno')->default(false);
        $table->mediumText('F14_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 ADEUDOS PASIVOS*/


        /*FORMATOS L21 PRESTAMOS TERCEROS*/
        $table->boolean('F15_ninguno')->default(false);
        $table->mediumText('F15_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 PRESTAMOS TERCEROS*/


        /*FORMATOS L21 PARTICIPACIONES*/
        $table->boolean('F16_ninguno')->default(false);
        $table->mediumText('F16_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 PARTICIPACIONES*/


        /*FORMATOS L21 DECISIONES*/
        $table->boolean('F17_ninguno')->default(false);
        $table->mediumText('F17_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 DECISIONES*/


        /*FORMATOS L21 APOYOS PÚBLICOS*/
        $table->boolean('F18_ninguno')->default(false);
        $table->mediumText('F18_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 APOYOS PUBLICOS*/


        /*FORMATOS L21 REPRESENTACIONES*/
        $table->boolean('F19_ninguno')->default(false);
        $table->mediumText('F19_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 REPRESENTACIONES*/


        /*FORMATOS L21 CLIENTES*/
        $table->boolean('F20_ninguno')->default(false);
        $table->mediumText('F20_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 CLIENTES*/


        /*FORMATOS L21 BENEFICIOS PRIVADOS*/
        $table->boolean('F21_ninguno')->default(false);
        $table->mediumText('F21_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 BENEFICIOS PRIVADOS*/


        /*FORMATOS L21 FIDEICOMISOS*/
        $table->boolean('F22_ninguno')->default(false);
        $table->mediumText('F22_aclaracionesObservaciones')->nullable()->default(null);
        /*FORMATOS L21 FIDEICOMISOS*/

        $table->timestamps();
				$table->engine = 'InnoDB';
			});
		}//if schema table usuarios exist
  }

}
