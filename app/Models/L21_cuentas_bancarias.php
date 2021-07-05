<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_cuentas_bancarias extends Model
{
  use HasFactory;

  protected $table="L21_cuentas_bancarias";

  protected $fillable = ['declaracion_id','F13_tipoOperacion','F13_tipoInversion_clave','F13_tipoInversion_valor','F13_subTipoInversion_clave','F13_subTipoInversion_valor','F13_titular_clave','F13_titular_valor','F13_tercero_tipoPersona','F13_tercero_nombreRazonSocial','F13_tercero_rfc','F13_numeroCuentaContrato','F13_pais','F13_institucionRazonSocial','F13_rfc','F13_saldoSituacionActual_valor','F13_saldoSituacionActual_moneda'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF13TipoInversionClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoInversion($clave);

    $this->attributes['F13_tipoInversion_clave'] = $array->clave;
    $this->attributes['F13_tipoInversion_valor'] = $array->valor;
  }

  public function setF13SubTipoInversionClaveAttribute($clave)
  {
    $array = $this->catalogo->subtipoInversion($clave);

    $this->attributes['F13_subTipoInversion_clave'] = $array->clave;
    $this->attributes['F13_subTipoInversion_valor'] = $array->valor;
  }

 public function setF13TitularClaveAttribute($clave)
  {
    $array = $this->catalogo->titularBien($clave);

    $this->attributes['F13_titular_clave'] = $array->clave;
    $this->attributes['F13_titular_valor'] = $array->valor;
  }


  public function setF13SaldoSituacionActualValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F13_saldoSituacionActual_valor'] = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F13_saldoSituacionActual_valor'] = null;
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
        $table->increments('F13_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');

        $table->string('F13_tipoOperacion')->nullable()->default(null);

        $table->string('F13_tipoInversion_clave')->nullable()->default(null);
        $table->string('F13_tipoInversion_valor')->nullable()->default(null);

        $table->string('F13_subTipoInversion_clave')->nullable()->default(null);
        $table->string('F13_subTipoInversion_valor')->nullable()->default(null);

        $table->string('F13_titular_clave')->nullable()->default(null);
        $table->string('F13_titular_valor')->nullable()->default(null);

        $table->string('F13_tercero_tipoPersona')->nullable()->default(null);
        $table->string('F13_tercero_nombreRazonSocial')->nullable()->default(null);
        $table->string('F13_tercero_rfc')->nullable()->default(null);
        $table->string('F13_numeroCuentaContrato')->nullable()->default(null);

        $table->string('F13_pais')->nullable()->default(null);
        $table->string('F13_institucionRazonSocial')->nullable()->default(null);
        $table->string('F13_rfc')->nullable()->default(null);

        $table->float('F13_saldoSituacionActual_valor',15,2)->nullable()->default(null);
        $table->string('F13_saldoSituacionActual_moneda')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
