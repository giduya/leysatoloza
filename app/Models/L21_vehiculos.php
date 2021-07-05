<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_vehiculos extends Model
{
  use HasFactory;

  protected $table="L21_vehiculos";

  protected $fillable = ['declaracion_id','F11_tipoOpearcion','F11_tipoVehiculo_clave','F11_tipoVehiculo_valor','F11_especifiqueVehiculo','F11_titular_clave','F11_titular_valor','F11_transmisor_tipoPersona','F11_transmisor_nombreRazonSocial','F11_transmisor_rfc','F11_relacion_valor','F11_relacion_clave','F11_especifiqueRelacion','F11_marca','F11_modelo','F11_anio','F11_numeroSerieRegistro','F11_tercero_tipoPersona','F11_tercero_nombreRazonSocial','F11_tercero_rfc','F11_pais','F11_entidadFederativa_clave','F11_entidadFederativa_valor','F11_formaAdquisicion_clave','F11_formaAdquisicion_valor','F11_formaPago','F11_valorAdquisicion_valor','F11_valorAdquisicion_moneda','F11_fechaAdquisicion','F11_motivoBaja_clave','F11_motivoBaja_valor','F11_especifiqueBaja'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF11TitularClaveAttribute($clave)
  {
    $array = $this->catalogo->titularBien($clave);

    $this->attributes['F11_titular_clave'] = $array->clave;
    $this->attributes['F11_titular_valor'] = $array->valor;
  }

  public function setF11TipoVehiculoClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoVehiculo($clave);

    $this->attributes['F11_tipoVehiculo_clave'] = $array->clave;
    $this->attributes['F11_tipoVehiculo_valor'] = $array->valor;
  }

  public function setF11EspecifiqueVehiculoAttribute($clave)
  {
    if($this->attributes['F11_tipoVehiculo_clave'] == "OTRO")
    {
      $this->attributes['F11_especifiqueVehiculo'] = $clave;
    }
  }

  public function setF11RelacionClaveAttribute($clave)
  {
    $array = $this->catalogo->parentescoRelacion($clave);

    $this->attributes['F11_relacion_clave'] = $array->clave;
    $this->attributes['F11_relacion_valor'] = $array->valor;
  }

    public function setF11EspecifiqueRelacionAttribute($clave)
  {
    if($this->attributes['F11_relacion_clave'] == "OTRO")
    {
      $this->attributes['F11_especifiqueRelacion'] = $clave;
    }
  }

  public function setF11EntidadFederativaClaveAttribute($clave)
  {
    if($this->attributes['F11_pais'] == "MX")
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['F11_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['F11_entidadFederativa_valor'] = $array->Nom_Ent;
    }
  }

  public function setF11EntidadAttribute($clave)
  {
    if($this->attributes['F11_pais'] == "MX")
    {
      $this->attributes['F11_entidadFederativa_clave'] = $clave;
    }
  }

  public function setF11FormaAdquisicionClaveAttribute($clave)
  {
    $array = $this->catalogo->formaAdquisicion($clave);

    $this->attributes['F11_formaAdquisicion_clave'] = $array->clave;
    $this->attributes['F11_formaAdquisicion_valor'] = $array->valor;
  }

  public function setF11ValorAdquisicionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F11_valorAdquisicion_valor'] = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F11_valorAdquisicion_valor'] = null;
    }
  }


    public function setF10MotivoBajaClaveAttribute($clave)
  {
    if(!empty($clave))
    {
    $array = $this->catalogo->motivobaja($clave);

    $this->attributes['F11_motivoBaja_clave'] = $array->clave;
    $this->attributes['F11_motivoBaja_valor'] = $array->valor;
    }
    else
    {
      $this->attributes['F11_motivoBaja_clave'] = null;
    }
  }


  public function setF11EspecifiqueBajaAttribute($clave)
  {
    if($this->attributes['F11_motivoBaja_clave'] == "OTRO")
    {
      $this->attributes['F11_especifiqueBaja'] = $clave;
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
        $table->increments('F11_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F11_tipoOpearcion')->nullable()->default(null);

        $table->string('F11_tipoVehiculo_clave')->nullable()->default(null);
        $table->string('F11_tipoVehiculo_valor')->nullable()->default(null);
        $table->string('F11_especifiqueVehiculo')->nullable()->default(null);

        $table->string('F11_titular_clave')->nullable()->default(null);
        $table->string('F11_titular_valor')->nullable()->default(null);

        $table->string('F11_transmisor_tipoPersona')->nullable()->default(null);
        $table->string('F11_transmisor_nombreRazonSocial')->nullable()->default(null);
        $table->string('F11_transmisor_rfc')->nullable()->default(null);

        $table->string('F11_relacion_clave')->nullable()->default(null);
        $table->string('F11_relacion_valor')->nullable()->default(null);
        $table->string('F11_especifiqueRelacion')->nullable()->default(null);

        $table->string('F11_marca')->nullable()->default(null);
        $table->string('F11_modelo')->nullable()->default(null);
        $table->string('F11_anio')->nullable()->default(null);
        $table->string('F11_numeroSerieRegistro')->nullable()->default(null);

        $table->string('F11_tercero_tipoPersona')->nullable()->default(null);
        $table->string('F11_tercero_nombreRazonSocial')->nullable()->default(null);
        $table->string('F11_tercero_rfc')->nullable()->default(null);

        $table->string('F11_pais')->nullable()->default(null);

        $table->string('F11_entidadFederativa_clave')->nullable()->default(null);
        $table->string('F11_entidadFederativa_valor')->nullable()->default(null);

        $table->string('F11_formaAdquisicion_clave')->nullable()->default(null);
        $table->string('F11_formaAdquisicion_valor')->nullable()->default(null);
        $table->string('F11_formaPago')->nullable()->default(null);;

        $table->float('F11_valorAdquisicion_valor',15,2)->nullable()->default(null);
        $table->string('F11_valorAdquisicion_moneda')->nullable()->default(null);
        $table->date('F11_fechaAdquisicion')->nullable()->default(null);

        $table->string('F11_motivoBaja_clave')->nullable()->default(null);
        $table->string('F11_motivoBaja_valor')->nullable()->default(null);
        $table->string('F11_especifiqueBaja')->nullable()->default(null);
        

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
