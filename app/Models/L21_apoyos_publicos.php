<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_apoyos_publicos extends Model
{
  use HasFactory;

  protected $table="L21_apoyos_publicos";

  protected $fillable = ['declaracion_id','F18_tipoOperacion','F18_beneficiarioPrograma_clave','F18_beneficiarioPrograma_valor','F18_especifiqueBeneficiario','F18_tipoApoyo_clave','F18_tipoApoyo_valor','F18_especifiqueApoyo','F18_nombrePrograma','F18_formaRecepcion','F18_montoApoyoMensual_valor','F18_montoApoyoMensual_moneda','F18_especifiqueEspecie','F18_nivelOrdenGobierno','F18_institucionOtorgante',];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF18BeneficiarioProgramaClaveAttribute($clave)
  {
    $array = $this->catalogo->beneficiarios($clave);

    $this->attributes['F18_beneficiarioPrograma_clave'] = $array->clave;
    $this->attributes['F18_beneficiarioPrograma_valor'] = $array->valor;
  }

  public function setF18EspecifiqueBeneficiarioAttribute($clave)
  {
    if($this->attributes['F18_beneficiarioPrograma_clave'] == "OTRO")
    {
      $this->attributes['F18_especifiqueBeneficiario'] = $clave;
    }
  }

  public function setF18TipoApoyoClaveAttribute($clave)
  {
    $array = $this->catalogo->tipoApoyo($clave);

    $this->attributes['F18_tipoApoyo_clave'] = $array->clave;
    $this->attributes['F18_tipoApoyo_valor'] = $array->valor;
  }

  public function setF18EspecifiqueApoyoAttribute($clave)
  {
    if($this->attributes['F18_tipoApoyo_clave'] == "OTRO")
    {
      $this->attributes['F18_especifiqueApoyo'] = $clave;
    }
  }

  public function setF18NivelOrdenGobiernoAttribute($clave)
  {
    $array = $this->catalogo->nivelOrdenGobierno($clave);

    $this->attributes['F18_nivelOrdenGobierno'] = $array->clave;
  }

  public function setF18EspecifiqueEspecieAttribute($clave)
  {
    if($this->attributes['F18_formaRecepcion'] == "ESPECIE")
    {
      $this->attributes['F18_especifiqueEspecie'] = $clave;
    }
  }

  public function setF18MontoApoyoMensualValorAttribute($clave)
  {
    if($this->attributes['F18_formaRecepcion'] == "MONETARIO")
    {
      if(!empty($clave))
      {
        $valor = (int) filter_var($clave, FILTER_SANITIZE_NUMBER_INT);

        if(is_int($valor))
        {
          $this->attributes['F18_montoApoyoMensual_valor'] = $valor;
        }
        else
        {
          $this->attributes['F18_montoApoyoMensual_valor'] = 0;
        }
      }
      else
      {
        $this->attributes['F18_montoApoyoMensual_valor'] = null;
      }
    }
  }

  public function setF18MontoApoyoMensualMonedaAttribute($clave)
  {
    if($this->attributes['F18_formaRecepcion'] == "MONETARIO")
    {
      if(!empty($clave))
      {
        $this->attributes['F18_montoApoyoMensual_moneda'] = $clave;
      }
      else
      {
        $this->attributes['F18_montoApoyoMensual_moneda'] = null;
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
        $table->increments('F18_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');

        $table->string('F18_tipoOperacion')->nullable()->default(null);
        $table->string('F18_beneficiarioPrograma_clave')->nullable()->default(null);
        $table->string('F18_beneficiarioPrograma_valor')->nullable()->default(null);
        $table->string('F18_especifiqueBeneficiario')->nullable()->default(null);
        $table->string('F18_tipoApoyo_clave')->nullable()->default(null);
        $table->string('F18_tipoApoyo_valor')->nullable()->default(null);
        $table->string('F18_especifiqueApoyo')->nullable()->default(null);
        $table->string('F18_nombrePrograma')->nullable()->default(null);
        $table->string('F18_formaRecepcion')->nullable()->default(null);
        $table->float('F18_montoApoyoMensual_valor',15,2)->nullable()->default(null);
        $table->string('F18_montoApoyoMensual_moneda')->nullable()->default(null);
        $table->string('F18_especifiqueEspecie')->nullable()->default(null);
        $table->string('F18_nivelOrdenGobierno')->nullable()->default(null);
        $table->string('F18_institucionOtorgante')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
