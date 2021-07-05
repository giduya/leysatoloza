<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_bienes_muebles extends Model
{
  use HasFactory;

  protected $table="L21_bienes_muebles";

  protected $fillable = ['declaracion_id','F12_tipoOperacion','F12_titular_clave','F12_titular_valor','F12_tipoBien_clave','F12_tipoBien_valor','F12_especifiqueBien','F12_transmisor_tipoPersona','F12_transmisor_nombreRazonSocial','F12_transmisor_rfc','F12_relacion_clave','F12_relacion_valor','F12_especifiqueRelacion','F12_tercero_tipoPersona','F12_tercero_nombreRazonSocial','F12_tercero_rfc','F12_descripcionGeneralBien','F12_formaAdquisicion_clave','F12_formaAdquisicion_valor','F12_formaPago','F12_valorAdquisicion_valor','F12_valorAdquisicion_moneda','F12_fechaAdquisicion','F12_motivoBaja_clave','F12_motivoBaja_valor'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF12TitularClaveAttribute($clave)
  {
    $array = $this->catalogo->titularBien($clave);

    $this->attributes['F12_titular_clave'] = $array->clave;
    $this->attributes['F12_titular_valor'] = $array->valor;
  }

  public function setF12TipoBienClaveAttribute($clave)
  {
    $array = $this->catalogo->tipobienbienesmueble($clave);

    $this->attributes['F12_tipoBien_clave'] = $array->clave;
    $this->attributes['F12_tipoBien_valor'] = $array->valor;
  }

  public function setF12EspecifiqueBienAttribute($clave)
  {
    if($this->attributes['F12_tipoBien_clave'] == "OTRO")
    {
      $this->attributes['F12_especifiqueBien'] = $clave;
    }
  }

  public function setF12RelacionClaveAttribute($clave)
  {
    $array = $this->catalogo->parentescoRelacion($clave);

    $this->attributes['F12_relacion_clave'] = $array->clave;
    $this->attributes['F12_relacion_valor'] = $array->valor;
  }

  public function setF12EspecifiqueRelacionAttribute($clave)
  {
    if($this->attributes['F12_relacion_clave'] == "OTRO")
    {
      $this->attributes['F12_especifiqueRelacion'] = $clave;
    }
  }

  public function setF12FormaAdquisicionClaveAttribute($clave)
  {
    $array = $this->catalogo->formaadquisicion($clave);

    $this->attributes['F12_formaAdquisicion_clave'] = $array->clave;
    $this->attributes['F12_formaAdquisicion_valor'] = $array->valor;
  }

  public function setF12ValorAdquisicionValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F12_valorAdquisicion_valor'] = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F12_valorAdquisicion_valor'] = null;
    }
  }

  public function setF12ValorAdquisicionMonedaAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F12_valorAdquisicion_moneda'] = $clave;
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
        $table->increments('F12_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');

        $table->string('F12_tipoOperacion')->nullable()->default(null);

        $table->string('F12_titular_clave')->nullable()->default(null);
        $table->string('F12_titular_valor')->nullable()->default(null);

        $table->string('F12_tipoBien_clave')->nullable()->default(null);
        $table->string('F12_tipoBien_valor')->nullable()->default(null);
        $table->string('F12_especifiqueBien')->nullable()->default(null);

        $table->string('F12_transmisor_tipoPersona')->nullable()->default(null);
        $table->string('F12_transmisor_nombreRazonSocial')->nullable()->default(null);
        $table->string('F12_transmisor_rfc')->nullable()->default(null);

        $table->string('F12_relacion_clave')->nullable()->default(null);
        $table->string('F12_relacion_valor')->nullable()->default(null);
        $table->string('F12_especifiqueRelacion')->nullable()->default(null);

        $table->string('F12_tercero_tipoPersona')->nullable()->default(null);
        $table->string('F12_tercero_nombreRazonSocial')->nullable()->default(null);
        $table->string('F12_tercero_rfc')->nullable()->default(null);

        $table->string('F12_descripcionGeneralBien')->nullable()->default(null);

        $table->string('F12_formaAdquisicion_clave')->nullable()->default(null);
        $table->string('F12_formaAdquisicion_valor')->nullable()->default(null);

        $table->string('F12_formaPago')->nullable()->default(null);

        $table->float('F12_valorAdquisicion_valor',15,2)->nullable()->default(null);
        $table->string('F12_valorAdquisicion_moneda')->nullable()->default(null);

        $table->date('F12_fechaAdquisicion')->nullable()->default(null);

        $table->string('F12_motivoBaja_clave')->nullable()->default(null);
        $table->string('F12_motivoBaja_valor')->nullable()->default(null);


        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
