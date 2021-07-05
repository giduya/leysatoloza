<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Blade::directive('money', function ($number) {
        return "<?php
                      if(is_numeric($number))
                      {
                        echo number_format($number, 0, '.', ',');
                      }
                ?>";
      });


      Blade::directive('dMy', function($fecha){
        return "<?php
          if($fecha)
          {
            echo \Date::parse($fecha)->format('d-M-y');
          }
        ?>"; //12-dic-17
      });



      Schema::defaultstringLength(65);

      view()->share('tabindex', 0);


      try
  		{
        $config = \App\Models\Config::first();
        view()->share('config', $config);
  		}
  		catch(\Illuminate\Database\QueryException $e)
  		{
        \App\Models\Instalar::bd();

        $config = \App\Models\Config::first();
        view()->share('config', $config);
      }

    }

}
