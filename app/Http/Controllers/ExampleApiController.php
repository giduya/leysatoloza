<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ExampleApiController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function users()
  {
    $response = ['codigo' => '0', 'mensaje' => "Aqui va el codigo de declaraciones."];
    return response($response, 200);
  }


}
