<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_experiencia_laboral extends Model
{
  use HasFactory;

  protected $table="L21_experiencia_laboral";

  protected $fillable = ['declaracion_id','F5_tipoOperacion','F5_ambitoSector_clave','F5_ambitoSector_valor','F5_nivelOrdenGobierno','F5_ambitoPublico','F5_nombreEnte','F5_rfc','F5_sector_clave','F5_sector_valor','F5_area','F5_empleoCargoComision','F5_funcionPrincipal','F5_fechaIngreso','F5_fechaEgreso','F5_ubicacion'];

  protected $nullable = [];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setF5AmbitoSectorClaveAttribute($clave)
  {
    $array = $this->catalogo->ambitosector($clave);

    $this->attributes['F5_ambitoSector_clave'] = $array->clave;
    $this->attributes['F5_ambitoSector_valor'] = $array->valor;
  }

  public function setF5SectorClaveAttribute($clave)
  {
    if(!empty($clave))
    {
      $array = $this->catalogo->sector($clave);

      $this->attributes['F5_sector_clave'] = $array->clave;
      $this->attributes['F5_sector_valor'] = $array->valor;
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
        $table->increments('F5_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F5_tipoOperacion')->nullable()->default(null);
        $table->string('F5_ambitoSector_clave')->nullable()->default(null);
        $table->string('F5_ambitoSector_valor')->nullable()->default(null);
        $table->string('F5_nivelOrdenGobierno')->nullable()->default(null);
        $table->string('F5_ambitoPublico')->nullable()->default(null);
        $table->string('F5_nombreEnte')->nullable()->default(null);
        $table->string('F5_rfc',13)->nullable()->default(null);
        $table->string('F5_sector_clave')->nullable()->default(null);
        $table->string('F5_sector_valor')->nullable()->default(null);
        $table->string('F5_area')->nullable()->default(null);
        $table->string('F5_empleoCargoComision')->nullable()->default(null);
        $table->string('F5_funcionPrincipal')->nullable()->default(null);
        $table->date('F5_fechaIngreso')->nullable()->default(null);
        $table->date('F5_fechaEgreso')->nullable()->default(null);
        $table->string('F5_ubicacion')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
