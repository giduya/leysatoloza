<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_bienes_inmuebles extends Model
{
  use HasFactory;

  protected $table="L21_bienes_inmuebles";

  protected $fillable = ['declaracion_id','F10_tipoOperacion','F10_tipoInmueble_clave','F10_tipoInmueble_valor','F10_especifiqueInmueble','F10_titular_clave','F10_titular_valor','F10_porcentajePropiedad','superficieTerreno','F10_superficieTerreno_unidad','superficieConstruccion','F10_superficieConstruccion_unidad','F10_tercero_tipoPersona','F10_tercero_nombreRazonSocial','F10_tercero_rfc','F10_transmisor_tipoPersona','F10_transmisor_nombreRazonSocial','F10_transmisor_rfc','F10_relacion_clave','F10_relacion_valor','F10_especifiqueRelacion','F10_formaAdquisicion_clave','F10_formaAdquisicion_valor','F10_formaPago','valorAdquisicion','F10_valorAdquisicion_moneda','F10_fechaAdquisicion','F10_datoIdentificacion','F10_valorConformeA','F10_pais','F10_entidadFederativa_clave','F10_entidadFederativa_valor','F10_municipioAlcaldia_clave','F10_municipioAlcaldia_valor','F10_coloniaLocalidad','F10_estadoProvincia','F10_ciudadLocalidad','F10_calle','F10_numeroExterior','F10_numeroInterior','F10_codigoPostal','F10_motivoBaja_clave','F10_motivoBaja_valor','F10_especifiqueBaja'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF10TipoInmuebleClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoInmueble($clave);

    $this->attributes['F10_tipoInmueble_clave'] = $array->clave;
    $this->attributes['F10_tipoInmueble_valor'] = $array->valor;
  }

  public function setF10EspecifiqueInmuebleAttribute($clave)
  {
    if($this->attributes['F10_tipoInmueble_clave'] == "OTRO")
    {
      $this->attributes['F10_especifiqueInmueble'] = $clave;
    }
  }

  public function setF10TitularClaveAttribute($clave)
  {
    $array = $this->catalogo->titularBien($clave);

    $this->attributes['F10_titular_clave'] = $array->clave;
    $this->attributes['F10_titular_valor'] = $array->valor;
  }

  public function setF10RelacionClaveAttribute($clave)
  {
    $array = $this->catalogo->parentescoRelacion($clave);

    $this->attributes['F10_relacion_clave'] = $array->clave;
    $this->attributes['F10_relacion_valor'] = $array->valor;
  }

  public function setF10EspecifiqueRelacionAttribute($clave)
  {
    if($this->attributes['F10_relacion_clave'] == "OTRO")
    {
      $this->attributes['F10_especifiqueRelacion'] = $clave;
    }
  }

  public function setF10SuperficieConstruccionUnidadAttribute($clave)
  {
    $array = $this->catalogo->unidadmedida($clave);

    $this->attributes['F10_superficieConstruccion_unidad'] = $array->clave;
  }

  public function setF10FormaAdquisicionClaveAttribute($clave)
  {
    $array = $this->catalogo->formaAdquisicion($clave);

    $this->attributes['F10_formaAdquisicion_clave'] = $array->clave;
    $this->attributes['F10_formaAdquisicion_valor'] = $array->valor;
  }

  public function setF10FormaPagoAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F10_formaPago'] = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F10_formaPago'] = null;
    }
  }

  public function setF10EntidadFederativaClaveAttribute($clave)
  {
    if($this->attributes['F10_pais'] == "MX")
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['F10_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['F10_entidadFederativa_valor'] = $array->Nom_Ent;
    }
  }

  public function setF10EntidadAttribute($clave)
  {
    if($this->attributes['F10_pais'] == "MX")
    {
      $this->attributes['F10_entidadFederativa_clave'] = $clave;
    }
  }

/*  public function setF10MunicipioAlcaldiaClaveAttribute($clave)
  {
    if($this->attributes['F10_pais'] == "MX")
    {
      $array = $this->catalogo->inegiAlcaldias($clave);

      $this->attributes['F10_municipioAlcaldia_clave'] = $array->Cve_Mun;
      $this->attributes['F10_municipioAlcaldia_valor'] = $array->Nom_Mun;
    }
  }

  public function setF10MunicipioAttribute($clave)
  {
    if($this->attributes['F10_pais'] == "MX")
    {
      $this->attributes['F10_municipioAlcaldia_clave'] = $clave;
    }
  }
*/

  public function setF10MotivoBajaClaveAttribute($clave)
  {
    if(!empty($clave))
    {
    $array = $this->catalogo->motivobaja($clave);

    $this->attributes['F10_motivoBaja_clave'] = $array->clave;
    $this->attributes['F10_motivoBaja_valor'] = $array->valor;
    }
    else
    {
      $this->attributes['F10_motivoBaja_clave'] = null;
    }
  }

  public function setF10EspecifiqueBajaAttribute($clave)
  {
    if($this->attributes['F10_motivoBaja_clave'] == "OTRO")
    {
      $this->attributes['F10_especifiqueBaja'] = $clave;
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
        $table->increments('F10_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F10_tipoOperacion')->nullable()->default(null);

        $table->string('F10_tipoInmueble_clave')->nullable()->default(null);
        $table->string('F10_tipoInmueble_valor')->nullable()->default(null);
        $table->string('F10_especifiqueInmueble')->nullable()->default(null);

        $table->string('F10_titular_clave')->nullable()->default(null);
        $table->string('F10_titular_valor')->nullable()->default(null);
        $table->string('F10_porcentajePropiedad')->nullable()->default(null);

        $table->string('superficieTerreno')->nullable()->default(null);
        $table->string('F10_superficieTerreno_unidad')->nullable()->default(null);

        $table->string('superficieConstruccion')->nullable()->default(null);
        $table->string('F10_superficieConstruccion_unidad')->nullable()->default(null);

        $table->string('F10_tercero_tipoPersona')->nullable()->default(null);
        $table->string('F10_tercero_nombreRazonSocial')->nullable()->default(null);
        $table->string('F10_tercero_rfc')->nullable()->default(null);

        $table->string('F10_transmisor_tipoPersona')->nullable()->default(null);
        $table->string('F10_transmisor_nombreRazonSocial')->nullable()->default(null);
        $table->string('F10_transmisor_rfc')->nullable()->default(null);

        $table->string('F10_relacion_clave')->nullable()->default(null);
        $table->string('F10_relacion_valor')->nullable()->default(null);
        $table->string('F10_especifiqueRelacion')->nullable()->default(null);

        $table->string('F10_formaAdquisicion_clave')->nullable()->default(null);
        $table->string('F10_formaAdquisicion_valor')->nullable()->default(null);

        $table->string('F10_formaAdquisicion_moneda')->nullable()->default(null);
        $table->string('F10_formaPago')->nullable()->default(null);

        $table->float('valorAdquisicion',15,2)->nullable()->default(null);
        $table->string('F10_valorAdquisicion_moneda')->nullable()->default(null);
        $table->date('F10_fechaAdquisicion')->nullable()->default(null);
        $table->string('F10_datoIdentificacion')->nullable()->default(null);
        $table->string('F10_valorConformeA')->nullable()->default(null);

        $table->string('F10_pais')->nullable()->default(null);
        $table->string('F10_entidadFederativa_clave')->nullable()->default(null);
        $table->string('F10_entidadFederativa_valor')->nullable()->default(null);
        $table->string('F10_municipioAlcaldia_clave')->nullable()->default(null);
        $table->string('F10_municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('F10_coloniaLocalidad')->nullable()->default(null);
        $table->string('F10_estadoProvincia')->nullable()->default(null);
        $table->string('F10_ciudadLocalidad')->nullable()->default(null);
        $table->string('F10_calle')->nullable()->default(null);
        $table->string('F10_numeroExterior')->nullable()->default(null);
        $table->string('F10_numeroInterior')->nullable()->default(null);
        $table->string('F10_codigoPostal')->nullable()->default(null);

        $table->string('F10_motivoBaja_clave')->nullable()->default(null);
        $table->string('F10_motivoBaja_valor')->nullable()->default(null);
        $table->string('F10_especifiqueBaja')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
