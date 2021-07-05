<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_representaciones extends Model
{
  use HasFactory;

  protected $table="L21_representaciones";

  protected $fillable = ['declaracion_id','F19_tipoOperacion','F19_tipoRelacion','F19_tipoRepresentacion','F19_fechaInicioRepresentacion','F19_tipoPersona','F19_nombreRazonSocial','F19_rfc','F19_recibeRemuneracion','F19_montoMensual_valor','F19_montoMensual_moneda','F19_entidadFederativa_clave','F19_entidadFederativa_valor','F19_pais','F19_sector_clave','F19_sector_valor','F19_especifiqueSector'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF19SectorClaveAttribute($clave)
  {
    $array = $this->catalogo->sector($clave);

    $this->attributes['F19_sector_clave'] = $array->clave;
    $this->attributes['F19_sector_valor'] = $array->valor;
  }

  public function setF19EspecifiqueSectorAttribute($clave)
  {
    if($this->attributes['F19_sector_clave'] == "OTRO")
    {
      $this->attributes['F19_especifiqueSector'] = $clave;
    }
  }

  public function setF19EntidadFederativaClaveAttribute($clave)
  {
    if($this->attributes['F19_pais'] == "MX")
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['F19_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['F19_entidadFederativa_valor'] = $array->Nom_Ent;
    }
  }

  public function setF19MontoMensualValorAttribute($clave)
  {
    if($this->attributes['F19_recibeRemuneracion'] == 1)
    {
      if(!empty($clave))
      {
        $valor = filter_var($clave, FILTER_SANITIZE_NUMBER_INT);

        if(is_int($valor))
        {
          $this->attributes['F19_montoMensual_valor'] = $valor;
        }
        else
        {
          $this->attributes['F19_montoMensual_valor'] = 0;
        }
      }
      else
      {
        $this->attributes['F19_montoMensual_valor'] = null;
      }
    }
  }

  public function setF19MontoMensualMonedaAttribute($clave)
  {
    if($this->attributes['F19_recibeRemuneracion'] == 1)
    {
      $this->attributes['F19_montoMensual_moneda'] = $clave;
    }
    else
    {
      $this->attributes['F19_montoMensual_moneda'] = null;
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
        $table->increments('F19_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');

        $table->string('F19_tipoOperacion')->nullable()->default(null);
        $table->string('F19_tipoRelacion')->nullable()->default(null);
        $table->string('F19_tipoRepresentacion')->nullable()->default(null);
        $table->date('F19_fechaInicioRepresentacion','Y-m-d')->nullable()->default(null);
        $table->string('F19_tipoPersona')->nullable()->default(null);
        $table->string('F19_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('F19_rfc',13)->nullable()->default(null);
        $table->boolean('F19_recibeRemuneracion')->default(false);

        $table->float('F19_montoMensual_valor',15,2)->nullable()->default(null);
        $table->string('F19_montoMensual_moneda',3)->nullable()->default(null);

        $table->string('F19_entidadFederativa_clave')->nullable()->default(null);
        $table->string('F19_entidadFederativa_valor')->nullable()->default(null);

        $table->string('F19_pais',2)->nullable()->default(null);

        $table->string('F19_sector_clave')->nullable()->default(null);
        $table->string('F19_sector_valor')->nullable()->default(null);
        $table->string('F19_especifiqueSector')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
