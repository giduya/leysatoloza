<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_clientes extends Model
{
  use HasFactory;

  protected $table="L21_clientes";

  protected $fillable = ['declaracion_id','F20_tipoOperacion','F20_realizaActividadLucrativa','F20_realizaActividadLucrativa','F20_tipoRelacion','F20_empresa_nombreEmpresaServicio','F20_empresa_rfc','F20_clientePrincipal_tipoPersona','F20_clientePrincipal_nombreRazonSocial','F20_clientePrincipal_rfc','F20_sector_clave','F20_sector_valor','F20_especifiqueSector','F20_pais_clave','F20_entidadFederativa_clave','F20_entidadFederativa_valor','F20_montoAproximadoGanancia_valor','F20_montoAproximadoGanancia_moneda'];

  protected $nullable = ['ubicacion_entidadFederativa','ubicacion_pais'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////

  public function setF20SectorClaveAttribute($clave)
  {
    $array = $this->catalogo->sector($clave);

    $this->attributes['F20_sector_clave'] = $array->clave;
    $this->attributes['F20_sector_valor'] = $array->valor;
  }

  public function setF20EspecifiqueSectorAttribute($clave)
  {
    if($this->attributes['F20_sector_clave'] == "OTRO")
    {
      $this->attributes['F20_especifiqueSector'] = $clave;
    }
  }

  public function setF20EntidadFederativaClaveAttribute($clave)
  {
    if($this->attributes['F20_pais_clave'] == "MX")
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['F20_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['F20_entidadFederativa_valor'] = $array->Nom_Ent;
    }
  }

  public function setF20MontoAproximadoGananciaValorAttribute($clave)
  {
    if(!empty($clave))
    {
      $valor = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);

      if(is_int($valor))
      {
        $this->attributes['F20_montoAproximadoGanancia_valor'] = $valor;
      }
      else
      {
        $this->attributes['F20_montoAproximadoGanancia_valor'] = 0;
      }
    }
    else
    {
      $this->attributes['F20_montoAproximadoGanancia_valor'] = null;
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
        $table->increments('F20_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F20_tipoOperacion')->nullable()->default(null);

        $table->boolean('F20_realizaActividadLucrativa')->nullable()->default(null);

        $table->string('F20_tipoRelacion')->nullable()->default(null);

        $table->string('F20_empresa_nombreEmpresaServicio',191)->nullable()->default(null);
        $table->string('F20_empresa_rfc',13)->nullable()->default(null);

        $table->string('F20_clientePrincipal_tipoPersona')->nullable()->default(null);
        $table->string('F20_clientePrincipal_nombreRazonSocial')->nullable()->default(null);
        $table->string('F20_clientePrincipal_rfc',13)->nullable()->default(null);

        $table->string('F20_sector_clave')->nullable()->default(null);
        $table->string('F20_sector_valor')->nullable()->default(null);
        $table->string('F20_especifiqueSector')->nullable()->default(null);

        $table->float('F20_montoAproximadoGanancia_valor',15,2)->nullable()->default(null);
        $table->string('F20_montoAproximadoGanancia_moneda',3)->nullable()->default(null);

        $table->string('F20_pais_clave')->nullable()->default(null);

        $table->string('F20_entidadFederativa_clave')->nullable()->default(null);
        $table->string('F20_entidadFederativa_valor')->nullable()->default(null);


        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
