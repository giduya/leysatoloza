<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_prestamos_terceros extends Model
{
  use HasFactory;

  protected $table="L21_prestamos_terceros";

  protected $fillable = ['declaracion_id','F15_tipoOperacion','F15_tipoInmueble_clave','F15_tipoInmueble_valor','F15_especifiqueTipoInmueble','F15_pais','F15_entidadFederativa_clave','F15_entidadFederativa_valor','F15_municipioAlcaldia_clave','F15_municipioAlcaldia_valor','F15_calle','F15_numeroExterior','F15_numeroInterior','F15_coloniaLocalidad','F15_codigoPostal','F15_ciudadLocalidad','F15_estadoProvincia','F15_tipoVehiculo_clave','F15_tipoVehiculo_valor','F15_especifiqueTipoVehiculo','F15_marca','F15_modelo','F15_anio','F15_numeroSerieRegistro','F15_tipoDuenoTitular','F15_nombreTitular','F15_rfc','F15_relacionConTitular'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF15TipoInmuebleClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoInmueble($clave);

    $this->attributes['F15_tipoInmueble_clave'] = $array->clave;
    $this->attributes['F15_tipoInmueble_valor'] = $array->valor;
  }

  public function setF15EspecifiqueTipoInmuebleAttribute($clave)
  {
    if($this->attributes['F15_tipoInmueble_clave'] == "OTRO")
    {
      $this->attributes['F15_especifiqueTipoInmueble'] = $clave;
    }
  }

  public function setF15EntidadFederativaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiEntidades($clave);
    $this->attributes['F15_entidadFederativa_clave'] = $array->Cve_Ent;
    $this->attributes['F15_entidadFederativa_valor'] = $array->Nom_Ent;
  }

  public function setF15EntidadAttribute($clave)
  {
    if($this->attributes['F15_pais'] == "MX")
    {
      $this->attributes['F15_entidadFederativa_clave'] = $clave;
    }
  }

  public function setF15MunicipioAlcaldiaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiAlcaldias($this->F15_entidadFederativa_clave,$clave);
    $this->attributes['F15_municipioAlcaldia_clave'] = $array->Cve_Mun;
    $this->attributes['F15_municipioAlcaldia_valor'] = $array->Nom_Mun;
  }

/*  public function setF15MunicipioAlcaldiaAttribute($clave)
  {
    if($this->attributes['F15_pais'] == "MX")
    {
      $this->attributes['F15_municipioAlcaldia_clave'] = $clave;
    }
  }*/
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// CREO TABLA
  /////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->increments('F15_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F15_tipoOperacion',10)->default('AGREGAR');

        $table->string('F15_tipoInmueble_clave')->nullable()->default(null);
        $table->string('F15_tipoInmueble_valor')->nullable()->default(null);
        $table->string('F15_especifiqueTipoInmueble')->nullable()->default(null);

        $table->string('F15_pais',2)->nullable()->default(null);
        $table->string('F15_entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('F15_entidadFederativa_valor')->nullable()->default(null);
        $table->string('F15_municipioAlcaldia_clave',4)->nullable()->default(null);
        $table->string('F15_municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('F15_calle')->nullable()->default(null);
        $table->string('F15_numeroExterior',6)->nullable()->default(null);
        $table->string('F15_numeroInterior',5)->nullable()->default(null);
        $table->string('F15_coloniaLocalidad')->nullable()->default(null);
        $table->string('F15_codigoPostal',7)->nullable()->default(null);
        $table->string('F15_ciudadLocalidad')->nullable()->default(null);
        $table->string('F15_estadoProvincia')->nullable()->default(null);

        $table->string('F15_tipoVehiculo_clave')->nullable()->default(null);
        $table->string('F15_tipoVehiculo_valor')->nullable()->default(null);
        $table->string('F15_especifiqueTipoVehiculo')->nullable()->default(null);

        $table->string('F15_marca')->nullable()->default(null);
        $table->string('F15_modelo')->nullable()->default(null);
        $table->string('F15_anio',)->nullable()->default(null);
        $table->string('F15_numeroSerieRegistro')->nullable()->default(null);
        $table->string('F15_tipoDuenoTitular')->nullable()->default(null);
        $table->string('F15_nombreTitular')->nullable()->default(null);
        $table->string('F15_rfc',13)->nullable()->default(null);
        $table->string('F15_relacionConTitular')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
