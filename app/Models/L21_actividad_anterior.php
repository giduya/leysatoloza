<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class L21_actividad_anterior extends Model
{
  use HasFactory;

  protected $table="L21_actividad_anterior";

  protected $fillable = ['declaracion_id','fechaIngreso','fechaConclusion','remuneracionNeCaPu_valor','remuneracionNeCaPu_moneda','otrosIngTot_valor','otrosIngTot_moneda','actInd_remuneracionTo_valor','actInd_remuneracionTo_moneda','actInd_act_remuneracion_valor','actInd_act_remuneracion_moneda','actInd_act_nombreRazonSocial','actInd_act_tipoNegocio','actFin_remuneracionTo_valor','actFin_remuneracionTo_moneda','actFin_act_remuneracion_valor','actFin_act_remuneracion_moneda','actFin_act_tipoInstrumento_clave','actFin_act_tipoInstrumento_valor','servPro_remuneracionTo_valor','servPro_remuneracionTo_moneda','servPro_serv_remuneracion_valor','servPro_serv_remunercion_moneda','servPro_serv_tipoServicio','enjBien_remuneracionTo_valor','enjBien_remuneracionTo_moneda','enjBien_bien_remuneracion_valor','enjBien_bien_remuneracion_moneda','enjBien_bien_tipoBienEnajenado','otrIng_remuneracionTo_valor','otrIng_remuneracionTo_moneda','otrIng_ing_remuneracion_valor','otrIng_ing_remuneracion_moneda','otrIng_ing_tipoingreso','ingNAD_valor','ingNAD_moneda','ingNAPD_valor','ingNAPD_moneda','totalINA_valor','totalINA_moneda','aclaracionesObservaciones'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;


  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// CREO TABLA
  /////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('L21_declaraciones')->onDelete('cascade');
        $table->boolean('servidorPublicoAnioAnterior')->default(0);

        $table->date('fechaIngreso')->nullable()->default(null);
        $table->date('fechaConclusion')->nullable()->default(null);

        $table->float('remuneracionNeCaPu_valor',15,2)->nullable()->default(null);
        $table->string('remuneracionNeCaPu_moneda')->nullable()->default(null);

        $table->float('otrosIngTot_valor',15,2)->nullable()->default(null);
        $table->string('otrosIngTot_moneda')->nullable()->default(null);

        $table->float('actInd_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('actInd_remuneracionTo_moneda')->nullable()->default(null);

        $table->float('actInd_act_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('actInd_act_remuneracion_moneda')->nullable()->default(null);
        $table->string('actInd_act_nombreRazonSocial')->nullable()->default(null);
        $table->string('actInd_act_tipoNegocio')->nullable()->default(null);

        $table->float('actFin_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('actFin_remuneracionTo_moneda')->nullable()->default(null);

        $table->float('actFin_act_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('actFin_act_remuneracion_moneda')->nullable()->default(null);
        $table->string('actFin_act_tipoInstrumento_clave')->nullable()->default(null);
        $table->string('actFin_act_tipoInstrumento_valor')->nullable()->default(null);

        $table->float('servPro_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('servPro_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('servPro_serv_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('servPro_serv_remunercion_moneda')->nullable()->default(null);
        $table->string('servPro_serv_tipoServicio')->nullable()->default(null);

        $table->float('enjBien_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('enjBien_remuneracionTo_moneda')->nullable()->default(null);
        $table->float('enjBien_bien_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('enjBien_bien_remuneracion_moneda')->nullable()->default(null);
        $table->string('enjBien_bien_tipoBienEnajenado')->nullable()->default(null);

        $table->float('otrIng_remuneracionTo_valor',15,2)->nullable()->default(null);
        $table->string('otrIng_remuneracionTo_moneda')->nullable()->default(null);

        $table->float('otrIng_ing_remuneracion_valor',15,2)->nullable()->default(null);
        $table->string('otrIng_ing_remuneracion_moneda')->nullable()->default(null);
        $table->string('otrIng_ing_tipoingreso')->nullable()->default(null);

        $table->float('ingNAD_valor',15,2)->nullable()->default(null);
        $table->string('ingNAD_moneda')->nullable()->default(null);

        $table->float('ingNAPD_valor',15,2)->nullable()->default(null);
        $table->string('ingNAPD_moneda')->nullable()->default(null);

        $table->float('totalINA_valor',15,2)->nullable()->default(null);
        $table->string('totalINA_moneda')->nullable()->default(null);

        $table->mediumText('aclaracionesObservaciones')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
