<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_dependientes_economicos extends Model
{
  use HasFactory;

  protected $table="L21_dependientes_economicos";

  protected $fillable = ['declaracion_id','F7_tipoOperacion','F7_nombre','F7_primerApellido','F7_segundoApellido','F7_fechaNacimiento','F7_rfc','F7_parentescoRelacion_clave','F7_parentescoRelacion_valor','F7_extranjero','F7_curp','F7_habitaDomicilioDeclarante','F7_lugarDondeReside','F7_calle','F7_numeroExterior','F7_numeroInterior','F7_coloniaLocalidad','F7_municipioAlcaldia_clave','F7_municipioAlcaldia_valor','F7_entidadFederativa_clave','F7_entidadFederativa_valor','F7_codigoPostal','F7_ciudadLocalidad','F7_estadoProvincia','F7_pais','F7_actividadLaboral_clave','F7_actividadLaboral_valor','F7_nivelOrdenGobierno','F7_ambitoPublico','F7_nombreEnte','F7_rfcEnte','F7_areaAdscripcion','F7_empleoCargo','F7_funcionPrincipal','F7_fechaIngresoEmpleo','F7_salarioMensualNeto_valor','F7_salarioMensualNeto_moneda','F7_proveedorContratistaGobierno','F7_sector_clave','F7_sector_valor'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF7SalarioMensualNetoValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F7_salarioMensualNeto_valor'] = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F7_salarioMensualNeto_valor'] = null;
    }
  }


  /////////////////////// CREO TABLA
  /////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->increments('F7_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F7_tipoOperacion')->nullable()->default(null);
        $table->string('F7_nombre')->nullable()->default(null);
        $table->string('F7_primerApellido')->nullable()->default(null);
        $table->string('F7_segundoApellido')->nullable()->default(null);
        $table->date('F7_fechaNacimiento')->nullable()->default(null);
        $table->string('F7_rfc')->nullable()->default(null);
        $table->string('F7_parentescoRelacion_clave')->nullable()->default(null);
        $table->string('F7_parentescoRelacion_valor')->nullable()->default(null);
        $table->boolean('F7_extranjero')->default(0);
        $table->string('F7_curp')->nullable()->default(null);
        $table->boolean('F7_habitaDomicilioDeclarante')->default(0);

        $table->string('F7_lugarDondeReside')->nullable()->default(null);
        $table->string('F7_calle')->nullable()->default(null);
        $table->string('F7_numeroExterior')->nullable()->default(null);
        $table->string('F7_numeroInterior')->nullable()->default(null);
        $table->string('F7_coloniaLocalidad')->nullable()->default(null);
        $table->string('F7_municipioAlcaldia_clave')->nullable()->default(null);
        $table->string('F7_municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('F7_entidadFederativa_clave')->nullable()->default(null);
        $table->string('F7_entidadFederativa_valor')->nullable()->default(null);
        $table->string('F7_codigoPostal')->nullable()->default(null);
        $table->string('F7_ciudadLocalidad')->nullable()->default(null);
        $table->string('F7_estadoProvincia')->nullable()->default(null);
        $table->string('F7_pais')->nullable()->default(null);

        $table->string('F7_actividadLaboral_clave')->nullable()->default(null);
        $table->string('F7_actividadLaboral_valor')->nullable()->default(null);
        $table->string('F7_nivelOrdenGobierno')->nullable()->default(null)->nullable()->default(null);
        $table->string('F7_ambitoPublico')->nullable()->default(null);
        $table->string('F7_nombreEnte')->nullable()->default(null);
        $table->string('F7_rfcEnte')->nullable()->default(null);
        $table->string('F7_areaAdscripcion')->nullable()->default(null);
        $table->string('F7_empleoCargo')->nullable()->default(null);
        $table->string('F7_funcionPrincipal')->nullable()->default(null);
        $table->date('F7_fechaIngresoEmpleo')->nullable()->default(null);

        $table->float('F7_salarioMensualNeto_valor',15,2)->nullable()->default(null);
        $table->string('F7_salarioMensualNeto_moneda')->nullable()->default(null);

        $table->boolean('F7_proveedorContratistaGobierno')->default(0);

        $table->string('F7_sector_clave')->nullable()->default(null);
        $table->string('F7_sector_valor')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
