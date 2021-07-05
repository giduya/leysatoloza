<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_participaciones extends Model
{
  use HasFactory;

  protected $table="L21_participaciones";

  protected $fillable = ['declaracion_id','F16_tipoOperacion','F16_tipoRelacion','F16_porcentajeParticipacion','F16_tipoParticipacion_clave','F16_especifiqueParticipacion','F16_nombreEmpresaSociedadAsociacion','F16_rfc','F16_sector_clave','F16_especifiqueSector','F16_pais','F16_entidadFederativa_clave','F16_recibeRemuneracion','F16_montoMensual_valor','F16_montoMensual_moneda',];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF16TipoParticipacionClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoParticipacion($clave);

    $this->attributes['F16_tipoParticipacion_clave'] = $array->clave;
    $this->attributes['F16_tipoParticipacion_valor'] = $array->valor;
  }

  public function setF16EspecifiqueParticipacionAttribute($clave)
  {
    if($this->attributes['F16_tipoParticipacion_clave'] == "OTRO")
    {
      $this->attributes['F16_especifiqueParticipacion'] = $clave;
    }
    else
    {
      $this->attributes['F16_especifiqueParticipacion'] = null;
    }
  }

  public function setF16MontoMensualValorAttribute($clave)
  {
    if($this->attributes['F16_recibeRemuneracion'] == 1)
    {
      if(!empty($clave))
      {
        $valor = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);

        if(is_int($valor))
        {
          $this->attributes['F16_montoMensual_valor'] = $valor;
        }
        else
        {
          $this->attributes['F16_montoMensual_valor'] = 0;
        }
      }
      else
      {
        $this->attributes['F16_montoMensual_valor'] = null;
      }
    }
  }

  public function setF16MontoMensualMonedaAttribute($clave)
  {
    if($this->attributes['F16_recibeRemuneracion'] == 1)
    {
      $this->attributes['F16_montoMensual_moneda'] = $clave;
    }
    else
    {
      $this->attributes['F16_montoMensual_moneda'] = null;
    }
  }

  public function setF16EntidadFederativaClaveAttribute($clave)
  {
    if($this->attributes['F16_pais'] == "MX")
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['F16_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['F16_entidadFederativa_valor'] = $array->Nom_Ent;
    }
  }

  public function setF16SectorClaveAttribute($clave)
  {
    $array = $this->catalogo->sector($clave);

    $this->attributes['F16_sector_clave'] = $array->clave;
    $this->attributes['F16_sector_valor'] = $array->valor;
  }

  public function setF16EspecifiqueSectorAttribute($clave)
  {
    if($this->attributes['F16_sector_clave'] == "OTRO")
    {
      $this->attributes['F16_especifiqueSector'] = $clave;
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
        $table->increments('F16_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F16_tipoOperacion')->nullable()->default(null);

        $table->string('F16_tipoRelacion')->nullable()->default(null);
        $table->integer('F16_porcentajeParticipacion')->nullable()->default(null);
        $table->string('F16_tipoParticipacion_clave')->nullable()->default(null);
        $table->string('F16_tipoParticipacion_valor')->nullable()->default(null);
        $table->string('F16_especifiqueParticipacion')->nullable()->default(null);

        $table->string('F16_nombreEmpresaSociedadAsociacion',100)->nullable()->default(null);
        $table->string('F16_rfc',13)->nullable()->default(null);
        $table->string('F16_sector_clave')->nullable()->default(null);
        $table->string('F16_sector_valor')->nullable()->default(null);
        $table->string('F16_especifiqueSector')->nullable()->default(null);

        $table->string('F16_pais',2)->nullable()->default(null);
        $table->string('F16_entidadFederativa_clave',3)->nullable()->default(null);
        $table->string('F16_entidadFederativa_valor')->nullable()->default(null);

        $table->boolean('F16_recibeRemuneracion')->default(false);

        $table->float('F16_montoMensual_valor',15,2)->unsigned()->nullable()->default(null);
        $table->string('F16_montoMensual_moneda')->nullable()->default('MXN');

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
