<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\config;


class ConfigController extends Controller
{



  public function __construct()
  {
    $this->middleware('auth');
  }





  public function config(Request $request)
  {

    if($request->method() == "GET" )
    {
      return view('inicio_'.\Auth::user()->rol);
    }



    if($request->method() == "POST" )
    {
      $config = config::find(1);
      $config->ente   = $request->input('ente');
      $config->nivel  = $request->input('nivel');
      $config->ambito = $request->input('ambito');
      $config->save();

      return \Redirect::back();
    }

  }


}
