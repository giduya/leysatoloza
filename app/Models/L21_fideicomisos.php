<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_fideicomisos extends Model
{
  use HasFactory;

  protected $table="L21_fideicomisos";

  protected $fillable = ['declaracion_id','F22_tipoOperacion','F22_tipoRelacion','F22_tipoFideicomiso','F22_tipoParticipacion','F22_rfcFideicomiso','F22_fideicomitente_tipoPersona','F22_fideicomitente_nombreRazonSocial','F22_fideicomitente_rfc','F22_fiduciario_nombreRazonSocial','F22_fiduciario_rfc','F22_fideicomisario_tipoPersona','F22_fideicomisario_nombreRazonSocial','F22_fideicomisario_rfc','F22_sector_clave','F22_sector_valor','F22_especifiqueSector','F22_extranjero'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF22TipoParticipacionAttribute($clave)
  {
    $array = $this->catalogo->tipoParticipacionFideicomiso($clave);

    $this->attributes['F22_tipoParticipacion'] = $array->clave;
    $this->attributes['F22_tipoParticipacion_valor'] = $array->valor;
  }

  public function setF22SectorClaveAttribute($clave)
  {
    $array = $this->catalogo->sector($clave);

    $this->attributes['F22_sector_clave'] = $array->clave;
    $this->attributes['F22_sector_valor'] = $array->valor;
  }

  public function setF22EspecifiqueSectorAttribute($clave)
  {
    if($this->F22_sector_clave != "OTRO")
    {
      $this->attributes['F22_especifiqueSector'] = null;
    }
    else
    {
      $this->attributes['F22_especifiqueSector'] = $clave;
    }
  }

  public function setF22FiduciarioNombreRazonSocialAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDUCIARIO")
    {
      $this->attributes['F22_fiduciario_nombreRazonSocial'] = $clave;
    }
    else
    {
      $this->attributes['F22_fiduciario_nombreRazonSocial'] = null;
    }
  }

  public function setF22FiduciarioRfcAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDUCIARIO")
    {
      $this->attributes['F22_fiduciario_rfc'] = $clave;
    }
    else
    {
      $this->attributes['F22_fiduciario_rfc'] = null;
    }
  }

  public function setF22FideicomitenteTipoPersonaAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDEICOMITENTE")
    {
      $this->attributes['F22_fideicomitente_tipoPersona'] = $clave;
    }
    else
    {
      $this->attributes['F22_fideicomitente_tipoPersona'] = null;
    }
  }

  public function setF22FideicomitenteNombreRazonSocialAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDEICOMITENTE")
    {
      $this->attributes['F22_fideicomitente_nombreRazonSocial'] = $clave;
    }
    else
    {
      $this->attributes['F22_fideicomitente_nombreRazonSocial'] = null;
    }
  }

  public function setF22FideicomitenteRfcAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDEICOMITENTE")
    {
      $this->attributes['F22_fideicomitente_rfc'] = $clave;
    }
    else
    {
      $this->attributes['F22_fideicomitente_rfc'] = null;
    }
  }

  public function setF22FideicomisarioTipoPersonaAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDEICOMISARIO")
    {
      $this->attributes['F22_fideicomisario_tipoPersona'] = $clave;
    }
    else
    {
      $this->attributes['F22_fideicomisario_tipoPersona'] = null;
    }
  }

  public function setF22FideicomisarioNombreRazonSocialAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDEICOMISARIO")
    {
      $this->attributes['F22_fideicomisario_nombreRazonSocial'] = $clave;
    }
    else
    {
      $this->attributes['F22_fideicomisario_nombreRazonSocial'] = null;
    }
  }

  public function setF22FideicomisarioRfcAttribute($clave)
  {
    if($this->attributes['F22_tipoParticipacion'] == "FIDEICOMISARIO")
    {
      $this->attributes['F22_fideicomisario_rfc'] = $clave;
    }
    else
    {
      $this->attributes['F22_fideicomisario_rfc'] = null;
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
        /*DECLARACION*/
        $table->increments('F22_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F22_tipoOperacion')->nullable()->default(null);
        /*QUIEN SE RELACIONA*/
        $table->string('F22_tipoRelacion')->nullable()->default(null);
        $table->string('F22_tipoParticipacion')->nullable()->default(null);

        /*DATOS DEL FIDEICOMISO*/
        $table->string('F22_tipoFideicomiso')->nullable()->default(null);
        $table->string('F22_rfcFideicomiso')->nullable()->default(null);
        $table->string('F22_tipoParticipacion_valor')->nullable()->default(null);

        $table->string('F22_sector_clave')->nullable()->default(null);
        $table->string('F22_sector_valor')->nullable()->default(null);

        $table->string('F22_especifiqueSector')->nullable()->default(null);

        /*FIDEICOMITENTE*/
        $table->string('F22_fideicomitente_tipoPersona')->nullable()->default(null);
        $table->string('F22_fideicomitente_nombreRazonSocial')->nullable()->default(null);
        $table->string('F22_fideicomitente_rfc')->nullable()->default(null);

        /*FIDUCIARIO*/
        $table->string('F22_fiduciario_nombreRazonSocial')->nullable()->default(null);
        $table->string('F22_fiduciario_rfc')->nullable()->default(null);

        /*FIDEICOMISARIO*/
        $table->string('F22_fideicomisario_tipoPersona')->nullable()->default(null);
        $table->string('F22_fideicomisario_nombreRazonSocial')->nullable()->default(null);
        $table->string('F22_fideicomisario_rfc')->nullable()->default(null);



        $table->string('F22_extranjero')->nullable()->default(null);
/*
        $sql = "
                CREATE VIEW L21_declaracionview AS
                SELECT *
                FROM L21_declaraciones
                LEFT JOIN L21_datos_curriculares      ON L21_declaraciones.id = L21_datos_curriculares.declaracion_id
          ";

        \DB::statement($sql);
*/
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
