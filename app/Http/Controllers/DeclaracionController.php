<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\formatoRequest;
use App\Http\Requests\subformatoRequest;

use App\Models\declaracion;
use App\Models\L21_DeclaracionView;
use App\Models\catalogo;


class DeclaracionController extends Controller
{



  public function __construct()
  {
    $this->middleware('auth');
  }





  public function declaracion(Request $request)
  {

    if($request->method() == "GET" )
    {
      if(\Auth::user()->es_admin != true)
      {
        $declaraciones = declaracion::where('username','=',\Auth::user()->username)->get();

        $pendientes = declaracion::where('username','=',\Auth::user()->username)->where('estatus','=','Pendiente')
                                                                                ->count();

        return view('inicio_'.\Auth::user()->rol)->with('declaraciones',$declaraciones)
                                                 ->with('pendientes',$pendientes);
      }
    }



    if($request->method() == "POST" )
    {

      try
      {
        $declaracion = declaracion::create(['tipo' => $request->input('tipo'), 'username' => \Auth::user()->username]);

        $declaracion->crear_formatos();

        if(is_null($declaracion))
        {
          \Session::flash('danger', 'Los datos no se guardaron');
        }
        else
        {
          return \Redirect::to('declaracion/'.$declaracion->id)->with('success', 'La declaración se ha iniciado.');

          \Session::flash('success', 'Los datos se guardaron correctamente');

          return \Redirect::url();
        }
      }
      catch (\Exception $e)
      {
        //none
      }

      return \Redirect::back();
    }

  }





  public function formato(formatoRequest $request)
  {
    $declaracion = declaracion::where('id','=',$request->route()->declaracion_id)->where('username','=',\Auth::user()->username)
                                                                                 ->first();

    if(!is_null($declaracion))
    {

      if(!is_null($declaracion->catalogo->existe_formato($declaracion->ley,$request->route()->formato_slug)))
      {


        if($request->method() == "GET")
        {
          $declaracion->modelo = "\App\Models\\".$declaracion->ley."_".$request->route()->formato_slug;

          return view($declaracion->ley."_".$declaracion->vista($request->route()->formato_slug))->with('declaracion',$declaracion);
        }



        if($request->method() == "POST")
        {
          $declaracion->update($request->except(['_token']));

          \App\Models\declaracion_formato::where('declaracion_id',$declaracion->id)->where('formato_slug',$request->route()->formato_slug)
                                                                                   ->update(['estatus' => 1]);

          return \Redirect::to('declaracion/'.$declaracion->id."/".$declaracion->vista());
        }//PUT



      }//is_isset
      else
      {
        return \Redirect::to('declaracion/'.$declaracion->id."/".$declaracion->vista($request->route()->formato_slug));
      }
    }//ISNULL DECLARACION

    return \Redirect::to('declaracion');
  }//FORMATO





  public function borrar($id)
  {
    $declaracion = declaracion::where('username','=',\Auth::user()->username)->where('id','=',$id)
                                                                             ->first();


    if($declaracion->firmada == false)
    {
      $declaracion->delete();
    }

    return \Redirect::to('inicio');
  }





  public function subformato(subformatoRequest $request)
  {

    $declaracion = declaracion::where('id','=',$request->route()->declaracion_id)->where('username','=',\Auth::user()->username)
                                                                                 ->first();

    if(!is_null($declaracion->catalogo->existe_formato($declaracion->ley,$request->route()->formato_slug)))
    {
      $modelo = "\App\Models\\".$declaracion->ley."_".$request->route()->formato_slug;


      if($request->method() == "GET")
      {
        return view($declaracion->ley."_".$request->route()->formato_slug."_datos")->with('declaracion',$declaracion);
      }


      if($request->method() == "POST")
      {
        $request['declaracion_id'] = $declaracion->id;

        $modelo::create($request->except('_token'));

        return \Redirect::to('declaracion/'.$declaracion->id.'/'.$request->route()->formato_slug);
      }

    }

    return \Redirect::to('declaracion');
  }//subformato




  public function catalogo(Request $request,$nombre_catalogo,$a = null,$b = null,$c = null)
  {
    $catalogo = new catalogo;

    switch($nombre_catalogo)
    {
      case "getAlcaldias";
        return response()->json($catalogo->inegiAlcaldias($a));
      break;
      case "getLocalidades";
        return response()->json($catalogo->inegiLocalidades($a,$b));
      break;
      case "getCP";
        return response()->json($catalogo->inegiCP($a,$b,$c));
      break;
    }
  }


}
