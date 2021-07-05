<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class oauth_access_tokens extends Model
{
  protected $table = 'oauth_access_tokens';

  protected $primaryKey = 'id';

  public $incrementing = false;

  protected $keyType = 'string';

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA CONFIG
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
      \Schema::create($this->table, function (Blueprint $table) {
        $table->string('id',100)->nullable()->default(null);
        $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
        $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
        $table->string('name')->nullable()->default(null);
        $table->text('scopes')->nullable()->default(null);
        $table->tinyInteger('revoked',4)->unsigned();
        $table->timestamps();
        $table->datetime('expires_at')->nullable()->default(null);
      });
		}//if schema table usuarios exist
  }

}
