<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Auth\AuthenticationException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    protected function unauthenticated($request, AuthenticationException $exception)
    {
      if ($request->expectsJson())
      {
        $msg = [
          'resError' => [
            'required' => [
              "code" => "401",
              "message" => "No autenticado ó codigo de autenticación no valido. "
            ]
          ]
        ];

        return response()->json($msg, 401);
      }

      $guard = array_get($exception->guards(),0);

      switch ($guard)
      {
        default:
          $login = 'login';
        break;
      }

      if($guard != "api")
      {
        return redirect()->guest(route($login));
      }
      else
      {
        return response(['code'=> "01","message" => "Sesión caducada."], 401);
      }

    }
}
