<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class oauth_personal_access_clients extends Model
{
  protected $table = 'oauth_personal_access_clients';

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA CONFIG
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
      \Schema::create($this->table, function (Blueprint $table) {
        $table->id();
        $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
        $table->timestamps();
      });
		}//if schema table usuarios exist
  }

}
