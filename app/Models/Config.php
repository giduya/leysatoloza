<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class Config extends Model
{
  use HasFactory;

  protected $table="configuracion";

  protected $fillable = ['ente'];

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
        $table->id();
        $table->string('ente')->nullable()->default(null);
        $table->string('estado',2)->nullable()->default(null);
        $table->string('nivel')->nullable()->default(null);
        $table->string('ambito')->nullable()->default(null);
        $table->tinyInteger('inicial')->nullable()->default(null);
        $table->date('modificacion')->nullable()->default(null);
        $table->tinyInteger('final')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });

      \DB::table($this->table)->insert(['ente' => 'Nombre del Ente']);
    }//if schema table usuarios exist
    else
    {
      if(!\Schema::hasColumn($this->table,'id'))
      {
        \Schema::table($this->table, function($table) {
          $table->id();
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN ente VARCHAR(50) AFTER id");
      }

      if(!\Schema::hasColumn($this->table,'nivel'))
      {
        \Schema::table($this->table, function($table) {
          $table->string('nivel')->nullable()->default(null);
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN nivel VARCHAR(50) AFTER id");
      }

      if(!\Schema::hasColumn($this->table,'estado'))
      {
        \Schema::table($this->table, function($table) {
          $table->string('estado',2)->nullable()->default(null);
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN estado VARCHAR(50) AFTER nivel");
      }

      if(!\Schema::hasColumn($this->table,'ambito'))
      {
        \Schema::table($this->table, function($table) {
          $table->string('ambito')->nullable()->default(null);
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN ambito VARCHAR(50) AFTER estado");
      }

      if(!\Schema::hasColumn($this->table,'inicial'))
      {
        \Schema::table($this->table, function($table) {
          $table->tinyInteger('inicial')->nullable()->default(null);
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN inicial VARCHAR(50) AFTER ambito");
      }

      if(!\Schema::hasColumn($this->table,'modificacion'))
      {
        \Schema::table($this->table, function($table) {
          $table->date('modificacion')->nullable()->default(null);
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN modificacion VARCHAR(50) AFTER inicial");
      }

      if(!\Schema::hasColumn($this->table,'conclusion'))
      {
        \Schema::table($this->table, function($table) {
          $table->tinyInteger('conclusion')->nullable()->default(null);
        });

        \DB::statement("ALTER TABLE configuracion MODIFY COLUMN conclusion VARCHAR(50) AFTER modificacion");
      }
    }//ELSE
  }

}
