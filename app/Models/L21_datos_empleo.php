<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_datos_empleo  extends Model
{
  use HasFactory;

  protected $table="L21_datos_empleo";

  protected $fillable = ['declaracion_id','F4_tipoOperacion','nombreEntePublico','nivelOrdenGobierno','F4_ambitoPublico','F4_areaAdscripcion','empleoCargoComision','nivelEmpleoCargoComision','F4_funcionPrincipal','F4_fechaTomaPosesion','F4_contratadoPorHonorarios','F4_telefonoOficina_telefono','F4_telefonoOficina_extension','F4_pais','entidadFederativa','F4_entidadFederativa_valor','municipioAlcaldia','F4_municipioAlcaldia_valor','F4_coloniaLocalidad','F4_estadoProvincia','F4_ciudadLocalidad','F4_calle','F4_numeroExterior','F4_numeroInterior','F4_codigoPostal','F4_cuentaConOtroCargoPublico',];

  protected $nullable = [];

  public $timestamps=false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setEntidadFederativaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiEntidades($clave);

    $this->attributes['entidadFederativa_clave'] = $array->Cve_Ent;
    $this->attributes['entidadFederativa_valor'] = $array->Nom_Ent;
  }


  public function setMunicipioAlcaldiaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiAlcaldias($this->entidadFederativa_clave,$clave);

    $this->attributes['municipioAlcaldia_clave'] = $array->Cve_Mun;
    $this->attributes['municipioAlcaldia_valor'] = $array->Nom_Mun;
  }

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA
	/////////////////////////////////////////////////////////////////////////////////

  public function Tabla(){

    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F4_tipoOperacion')->default("AGREGAR");
        $table->string('nombreEntePublico')->nullable()->default(null);
        $table->string('nivelOrdenGobierno')->nullable()->default(null);
        $table->string('F4_ambitoPublico')->nullable()->default(null);
        $table->string('F4_areaAdscripcion')->nullable()->default(null);
        $table->string('empleoCargoComision')->nullable()->default(null);
        $table->string('nivelEmpleoCargoComision')->nullable()->default(null);
        $table->string('F4_funcionPrincipal')->nullable()->default(null);
        $table->date('F4_fechaTomaPosesion')->nullable()->default(null);
        $table->boolean('F4_contratadoPorHonorarios')->nullable()->default(null);
        $table->string('F4_telefonoOficina_telefono',10)->nullable()->default(null);
        $table->string('F4_telefonoOficina_extension',5)->nullable()->default(null);

        $table->string('F4_pais',2)->nullable()->default(null);
        $table->string('entidadFederativa',2)->nullable()->default(null);
        $table->string('F4_entidadFederativa_valor')->nullable()->default(null);
        $table->string('municipioAlcaldia',4)->nullable()->default(null);
        $table->string('F4_municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('F4_coloniaLocalidad')->nullable()->default(null);
        $table->string('F4_estadoProvincia')->nullable()->default(null);
        $table->string('F4_ciudadLocalidad')->nullable()->default(null);
        $table->string('F4_calle')->nullable()->default(null);
        $table->string('F4_numeroExterior',5)->nullable()->default(null);
        $table->string('F4_numeroInterior',4)->nullable()->default(null);
        $table->string('F4_codigoPostal',7)->nullable()->default(null);

        $table->boolean('F4_cuentaConOtroCargoPublico')->default(false);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
