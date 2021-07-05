<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use App\Models\catalogo;


class declaracion_formato extends Model
{
  protected $table = 'declaracion_formato';

  protected $fillable = ['declaracion_id','formato_id','formato_slug'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla()
  {
    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->integer('declaracion_id')->unsigned()->default(null);
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->integer('formato_id');
        $table->string('formato_slug');
        $table->boolean('estatus')->default(0);
        $table->primary(['declaracion_id', 'formato_id']);
      });
    }
  }//function tablas/

}
