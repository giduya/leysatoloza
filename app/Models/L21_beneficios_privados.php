<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_beneficios_privados extends Model
{
  use HasFactory;

  protected $table="L21_beneficios_privados";

  protected $fillable = ['declaracion_id','F21_tipoOperacion','F21_tipoBeneficio_clave','F21_tipoBeneficio_valor','F21_especifiqueTipo','F21_sector_clave','F21_sector_valor','F21_especifiqueSector','F21_beneficiario_clave','F21_beneficiario_valor','F21_especifiqueBeneficiario','F21_formaRecepcion','F21_montoMensualAproximado_valor','F21_montoMensualAproximado_moneda','F21_especifiqueBeneficio','F21_otorgante_tipoPersona','F21_otorgante_nombreRazonSocial','F21_otorgante_rfc',] ;

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF21TipoBeneficioClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoBeneficio($clave);

    $this->attributes['F21_tipoBeneficio_clave'] = $array->clave;
    $this->attributes['F21_tipoBeneficio_valor'] = $array->valor;
  }

  public function setF21EspecifiqueTipoAttribute($clave)
  {
    if($this->attributes['F21_tipoBeneficio_clave'] == "O")
    {
      $this->attributes['F21_especifiqueTipo'] = $clave;
    }
  }

  public function setF21SectorClaveAttribute($clave)
  {
    $array = $this->catalogo->sector($clave);

    $this->attributes['F21_sector_clave'] = $array->clave;
    $this->attributes['F21_sector_valor'] = $array->valor;
  }

  public function setF21EspecifiqueSectorAttribute($clave)
  {
    if($this->attributes['F21_tipoBeneficio_clave'] == "O")
    {
      $this->attributes['F21_especifiqueTipo'] = $clave;
    }
  }

  public function setF21BeneficiarioClaveAttribute($clave)
  {
    $array = $this->catalogo->beneficiarios($clave);

    $this->attributes['F21_beneficiario_clave'] = $array->clave;
    $this->attributes['F21_beneficiario_valor'] = $array->valor;
  }

  public function setF21EspecifiqueBeneficiarioAttribute($clave)
  {
    if($this->attributes['F21_beneficiario_clave'] == "OTRO")
    {
      $this->attributes['F21_especifiqueBeneficiario'] = $clave;
    }
  }


  public function setF21EspecifiqueBeneficioAttribute($clave)
  {
    if($this->attributes['F21_beneficiario_clave'] == "OTRO")
    {
      $this->attributes['F21_especifiqueBeneficio'] = $clave;
    }
  }

  public function setF21MontoMensualAproximadoValorAttribute($clave)
  {
    if($this->attributes['F21_formaRecepcion'] == "MONETARIO")
    {
      if(!empty($clave))
      {
        $valor = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);

        if(is_int($valor))
        {
          $this->attributes['F21_montoMensualAproximado_valor'] = $valor;
        }
        else
        {
          $this->attributes['F21_montoMensualAproximado_valor'] = 0;
        }
      }
      else
      {
        $this->attributes['F21_montoMensualAproximado_valor'] = null;
      }
    }
  }

  public function setF21MontoMensualAproximadoMonedaAttribute($clave)
  {
    if($this->attributes['F21_formaRecepcion'] == "MONETARIO")
    {
      if(!empty($clave))
      {
        $this->attributes['F21_montoMensualAproximado_moneda'] = $clave;
      }
      else
      {
        $this->attributes['F21_montoMensualAproximado_moneda'] = null;
      }
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
        $table->increments('F21_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F21_tipoOperacion')->nullable()->default(null);

        $table->string('F21_tipoBeneficio_clave')->nullable()->default(null);
        $table->string('F21_tipoBeneficio_valor')->nullable()->default(null);
        $table->string('F21_especifiqueTipo')->nullable()->default(null);

        $table->string('F21_sector_clave')->nullable()->default(null);
        $table->string('F21_sector_valor')->nullable()->default(null);
        $table->string('F21_especifiqueSector')->nullable()->default(null);

        $table->string('F21_beneficiario_clave')->nullable()->default(null);
        $table->string('F21_beneficiario_valor')->nullable()->default(null);
        $table->string('F21_especifiqueBeneficiario')->nullable()->default(null);

        $table->string('F21_formaRecepcion')->nullable()->default(null);
        $table->float('F21_montoMensualAproximado_valor',15,2)->nullable()->default(null);
        $table->string('F21_montoMensualAproximado_moneda',3)->nullable()->default(null);
        $table->string('F21_especifiqueBeneficio')->nullable()->default(null);

        $table->string('F21_otorgante_tipoPersona')->nullable()->default(null);
        $table->string('F21_otorgante_nombreRazonSocial')->nullable()->nullable()->default(null);
        $table->string('F21_otorgante_rfc')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
