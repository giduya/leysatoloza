<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_adeudos_pasivos extends Model
{
  use HasFactory;

  protected $table="L21_adeudos_pasivos";

  protected $fillable = ['declaracion_id','F14_tipoOperacion','F14_titular_clave','F14_titular_valor','F14_tipoAdeudo_clave','F14_tipoAdeudo_valor','F14_tipo_otro','F14_numeroCuentaContrato','F14_fechaAdquisicion','F14_monto_valor','F14_monto_moneda','F14_saldoInsolutoSituacionActual_valor','F14_saldoInsolutoSituacionActual_moneda','F14_tercero_tipoPersona','F14_tercero_nombreRazonSocial','F14_tercero_rfc','F14_otorganteCredito_tipoPersona','F14_otorganteCredito_nombreInstitucion','F14_otorganteCredito_rfc','F14_pais'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF14TitularClaveAttribute($clave)
  {
    $array = $this->catalogo->titularBien($clave);

    $this->attributes['F14_titular_clave'] = $array->clave;
    $this->attributes['F14_titular_valor'] = $array->valor;
  }

  public function setF14TipoAdeudoClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoAdeudo($clave);

    $this->attributes['F14_tipoAdeudo_clave'] = $array->clave;
    $this->attributes['F14_tipoAdeudo_valor'] = $array->valor;
  }

  public function setF14TipoOtroAttribute($clave)
  {
    if($this->attributes['F14_tipoAdeudo_clave'] == "OTRO")
    {
      $this->attributes['F14_tipo_otro'] = $clave;
    }
  }

  public function setF14MontoValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F14_monto_valor'] = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F14_monto_valor'] = null;
    }
  }


  public function setF14SaldoInsolutoSituacionActualValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $this->attributes['F14_saldoInsolutoSituacionActual_valor'] = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);
    }
    else
    {
      $this->attributes['F14_saldoInsolutoSituacionActual_valor'] = null;
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
        $table->increments('F14_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');

        $table->string('F14_tipoOperacion')->default("AGREGAR");

        $table->string('F14_titular_clave')->nullable()->default(null);
        $table->string('F14_titular_valor')->nullable()->default(null);

        $table->string('F14_tipoAdeudo_clave')->nullable()->default(null);
        $table->string('F14_tipoAdeudo_valor',20)->nullable()->default(null);
        $table->string('F14_tipo_otro',100)->nullable()->default(null);

        $table->string('F14_numeroCuentaContrato',20)->nullable()->default(null);
        $table->date('F14_fechaAdquisicion')->nullable()->default(null);

        $table->float('F14_monto_valor',15,2)->nullable()->default(null);
        $table->string('F14_monto_moneda',3)->nullable()->default(null);

        $table->float('F14_saldoInsolutoSituacionActual_valor',15,2)->nullable()->default(null);
        $table->string('F14_saldoInsolutoSituacionActual_moneda',3)->nullable()->default(null);

        $table->string('F14_tercero_tipoPersona')->nullable()->default(null);
        $table->string('F14_tercero_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('F14_tercero_rfc',100)->nullable()->default(null);

        $table->string('F14_otorganteCredito_tipoPersona')->nullable()->default(null);
        $table->string('F14_otorganteCredito_nombreInstitucion',100)->nullable()->default(null);
        $table->string('F14_otorganteCredito_rfc',100)->nullable()->default(null);

        $table->string('F14_pais',2)->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
