<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_datos_curriculares extends Model
{
  use HasFactory;

  protected $table = "L21_datos_curriculares";

  protected $fillable = ['declaracion_id','F3_tipoOperacion','escolaridadNivel','F3_institucionEducativa_nombre','F3_institucionEducativa_ubicacion','F3_carreraAreaConocimiento','F3_estatus','F3_documentoObtenido','F3_fechaObtencion'];

  protected $nullable = [];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setescolaridadNivelAttribute($nivel)
  {
    $array = $this->catalogo->nivel($nivel);

    $this->attributes['escolaridadNivel'] = $array->clave;
    $this->attributes['F3_nivel_valor'] = $array->valor;
  }


  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// CREO TABLA
  /////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->increments('F3_id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->string('F3_tipoOperacion')->nullable()->default(null);
        $table->string('escolaridadNivel',3)->nullable()->default(null);
        $table->string('F3_nivel_valor')->nullable()->default(null);
        $table->string('F3_carreraAreaConocimiento',50)->nullable()->default(null);
        $table->string('F3_institucionEducativa_ubicacion',2)->nullable()->default(null);
        $table->string('F3_institucionEducativa_nombre')->nullable()->default(null);
        $table->string('F3_estatus',15)->nullable()->default(null);
        $table->string('F3_documentoObtenido',30)->nullable()->default(null);
        $table->date('F3_fechaObtencion')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
