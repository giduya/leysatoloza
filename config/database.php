<?php

use Illuminate\Support\Str;



/*
|--------------------------------------------------------------------------
| CPANEL SETTINGS
|--------------------------------------------------------------------------
*/
use App\Models\CpanelApi;

define("GOBMX",".declarapat.gob.mx");

define("CP_PREF","declarap_");

define("DB_USER",CP_PREF."user");

define("DOMINIO_PRIMARIO","declarapat.app");

$carpeta = "local";
/*
|--------------------------------------------------------------------------
| DETERMINO CARPETA
|--------------------------------------------------------------------------
*/

/*OBTENGO DOMINIO*/
if(isset($_SERVER['HTTP_HOST']) === TRUE) // if sirve para un host, else para shell
{
  $host_actual = $_SERVER['HTTP_HOST'];

  $averiguar_www   = substr($host_actual,0,4); //star // www.

  if($averiguar_www == 'www.')
  {
    $array_sin_www = explode('www.',$host_actual);
    $host_sin_www = $array_sin_www['1'];
  }
  else
  {
    $host_sin_www = $host_actual; //startup.ayuntamientodigital.gob.mx
  }
}
else
{
  $host_sin_www = "declarapat.local";
}
/*TERMINO DE OBTENER DOMINIO*/


/*OBTENGO SUBDOMINIO*/
$array_host_sin_www = explode('.',$host_sin_www,3);

if(count($array_host_sin_www) == 3)
{
  if($array_host_sin_www[2] != "local")
  {
    $cPanel = new CpanelApi();

    $dominios = $cPanel->uapi->DomainInfo->list_domains();
    $subdominios = $dominios->data->sub_domains;

    if(in_array($array_host_sin_www['0'].GOBMX,$subdominios))
    {
      $carpetas_prohibidas = array("autodiscover","cpanel","mail");

      if(!in_array($array_host_sin_www['0'],$carpetas_prohibidas))
      {
        $carpeta = $array_host_sin_www['0'];

        $dpt = $cPanel->uapi->Mysql->create_database(['name' => CP_PREF.$carpeta]);

        if($dpt->status == 1)
        {
          $pv = $cPanel->uapi->Mysql->set_privileges_on_database(['user' => DB_USER, 'database' => CP_PREF.$carpeta, 'privileges' => 'ALL']);
        }
      }
    }
  }//if($array_host_sin_www[3] == "local")
}// count($array_host_sin_www) == 3


define("CARPETA",$carpeta);



/*TERMINO DE SUBDOMINIO*/

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |ksCk,WXEJ;oQ
    */

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => 'declarapat_'.CARPETA,
            'username' => 'declarapat_user',
            'password' => 'O2(M8NED-E10',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

               // SECOND DATABASE CONFIGURATION

        'catalogos' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT_SECOND', '3306'),
            'database' => 'declarapat_catalogos',
            'username' => 'declarapat_user',
            'password' => 'O2(M8NED-E10',
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
