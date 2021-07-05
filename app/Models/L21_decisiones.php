<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_decisiones extends Model
{
  use HasFactory;

  protected $table="L21_decisiones";

  protected $fillable = ['declaracion_id','F17_tipoOperacion','F17_tipoRelacion','F17_puestoRol','F17_fechaInicioParticipacion','F17_tipoInstitucion_clave','F17_especifiqueInstitucion','F17_nombreInstitucion','F17_rfc','F17_pais','F17_entidadFederativa_clave','F17_recibeRemuneracion','F17_montoMensual_valor','F17_montoMensual_moneda',];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF17TipoInstitucionClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoInstitucion($clave);

    $this->attributes['F17_tipoInstitucion_clave'] = $array->clave;
    $this->attributes['F17_tipoInstitucion_valor'] = $array->valor;
  }

  public function setF17EspecifiqueInstitucionAttribute($clave)
  {
    if($this->attributes['F17_tipoInstitucion_clave'] == "OTRO")
    {
      $this->attributes['F17_especifiqueInstitucion'] = $clave;
    }
  }

  public function setF17EntidadFederativaClaveAttribute($clave)
  {
    if($this->attributes['F17_pais'] == "MX")
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['F17_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['F17_entidadFederativa_valor'] = $array->Nom_Ent;
    }
  }

  public function setF17MontoMensualValorAttribute($clave)
  {
    if($this->attributes['F17_recibeRemuneracion'] == 1)
    {
      if(!empty($clave))
      {
        $valor = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);

        if(is_int($valor))
        {
          $this->attributes['F17_montoMensual_valor'] = $valor;
        }
        else
        {
          $this->attributes['F17_montoMensual_valor'] = 0;
        }
      }
      else
      {
        $this->attributes['F17_montoMensual_valor'] = null;
      }
    }
  }

  public function setF17MontoMensualMonedaAttribute($clave)
  {
    if($this->attributes['F17_recibeRemuneracion'] == 1)
    {
      $this->attributes['F17_montoMensual_moneda'] = $clave;
    }
    else
    {
      $this->attributes['F17_montoMensual_moneda'] = null;
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
        $table->increments('F17_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');

        $table->string('F17_tipoOperacion')->nullable()->default(null);

        $table->string('F17_tipoRelacion')->nullable()->default(null);
        $table->string('F17_puestoRol')->nullable()->default(null);
        $table->date('F17_fechaInicioParticipacion')->nullable()->default(null);

        $table->string('F17_tipoInstitucion_clave')->nullable()->default(null);
        $table->string('F17_tipoInstitucion_valor')->nullable()->default(null);
        $table->string('F17_especifiqueInstitucion')->nullable()->default(null);
        $table->string('F17_nombreInstitucion')->nullable()->default(null);
        $table->string('F17_rfc')->nullable()->default(null);
        $table->string('F17_pais',2)->nullable()->default(null);
        $table->string('F17_entidadFederativa_clave')->nullable()->default(null);
        $table->string('F17_entidadFederativa_valor')->nullable()->default(null);

        $table->boolean('F17_recibeRemuneracion')->default(false);
        $table->float('F17_montoMensual_valor',15,2)->nullable()->default(null);
        $table->string('F17_montoMensual_moneda')->nullable()->default('MXN');

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }
}
