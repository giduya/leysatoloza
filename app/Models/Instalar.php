<?php namespace App\Models;


class Instalar
{

  public static function bd()
  {

    $modelo = new User;
    $modelo->tabla();

    if(User::where('username','=','user-api')->count() < 1)
    {
      $administrador = new User;

      $administrador->username   = "user-api";
      $administrador->homoclave  = "api";
      $administrador->rol        = "api";
      $administrador->nombre     = "ApiNombre";
      $password = str_random(12);
      $administrador->password   = $password;
      $administrador->unpassword = $password;
      $administrador->save();
    }

    if(User::where('username','=','contralor')->count() < 1)
    {
      $administrador = new User;

      $administrador->username   = "contralor";
      $administrador->homoclave  = "adm";
      $administrador->rol        = "admin";
      $administrador->nombre     = "Admin";
      $password = str_random(12);
      $administrador->password   = $password;
      $administrador->unpassword = $password;
      $administrador->save();
    }

    $modelo = new Config;
    $modelo->tabla();

    //01 datos generales
    //02 domicilio declarante
    $modelo = new declaracion;
    $modelo->tabla();

    $modelo = new declaracion_formato;
    $modelo->tabla();

    //03 datos curriculares
    $modelo = new L21_datos_curriculares;
    $modelo->tabla();

    //04
    $modelo = new L21_datos_empleo;
    $modelo->tabla();

    //05
    $modelo = new L21_experiencia_laboral;
    $modelo->tabla();

    //06 datos pareja

    //07
    $modelo = new L21_dependientes_economicos;
    $modelo->tabla();

    //08 ingresos
    //09 actividad anterior

    //10
    $modelo = new L21_bienes_inmuebles;
    $modelo->tabla();

    //11
    $modelo = new L21_vehiculos;
    $modelo->tabla();

    //12
    $modelo = new L21_bienes_muebles;
    $modelo->tabla();

    //13
    $modelo = new L21_cuentas_bancarias;
    $modelo->tabla();

    //14
    $modelo = new L21_adeudos_pasivos;
    $modelo->tabla();

    //15
    $modelo = new L21_prestamos_terceros;
    $modelo->tabla();

    //16
    $modelo = new L21_participaciones;
    $modelo->tabla();

    //17
    $modelo = new L21_decisiones;
    $modelo->tabla();

    //18
    $modelo = new L21_apoyos_publicos;
    $modelo->tabla();

    //19
    $modelo = new L21_representaciones;
    $modelo->tabla();

    //20
    $modelo = new L21_clientes;
    $modelo->tabla();

    //21
    $modelo = new L21_beneficios_privados;
    $modelo->tabla();

    //22
    $modelo = new L21_fideicomisos;
    $modelo->tabla();


    $modelo = new oauth_access_tokens;
    $modelo->tabla();

    $modelo = new oauth_auth_codes;
    $modelo->tabla();

    $modelo = new oauth_clients;
    $modelo->tabla();

    $modelo = new oauth_personal_access_clients;
    $modelo->tabla();

    $modelo = new oauth_refresh_tokens;
    $modelo->tabla();

    $client = oauth_clients::find(1);

    if(empty($client))
    {
      oauth_clients::create(['user_id' => 1, 'name' => 'api', 'secret' => '6dVpiBPr6SCgqGAdsdAn026q2hB9vGYgIgB0OK11', 'provider' => null, 'redirect' => '', 'personal_access_client' => 0, 'password_client' => 0, 'rovoked' => 0]);
    }

  }

}
