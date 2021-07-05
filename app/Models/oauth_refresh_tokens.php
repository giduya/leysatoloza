<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class oauth_refresh_tokens extends Model
{
  protected $table = 'oauth_refresh_tokens';
  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA CONFIG
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
      \Schema::create($this->table, function (Blueprint $table) {
        $table->string('id',100);
        $table->string('access_token_id')->nullable()->default(null);
        $table->tinyInteger('revoked')->nullable()->default(null);
        $table->datetime('expires_at')->nullable(null);
      });
		}//if schema table usuarios exist
  }

}
