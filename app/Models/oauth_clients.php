<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class oauth_clients extends Model
{
  protected $table = 'oauth_clients';

  protected $fillable = ['user_id','name','secret','provider','redirect','personal_access_client','password_client','revoked'];

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA CONFIG
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
      \Schema::create($this->table, function (Blueprint $table) {
        $table->id();
        $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
        $table->string('name')->nullable()->default(null);
        $table->string('secret')->nullable()->default(null);
        $table->string('provider')->nullable()->default(null);
        $table->text('redirect')->nullable()->default(null);
        $table->tinyInteger('personal_access_client')->nullable()->default(null);
        $table->tinyInteger('password_client')->nullable()->default(null);
        $table->tinyInteger('revoked')->unsigned()->default(0);
        $table->timestamps();
      });
		}//if schema table usuarios exist
  }

}
