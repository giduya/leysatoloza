<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
  public function validate_token(Request $request)
  {
    if($request->method() != "POST")
    {
      exit;
    }

    if($request->hasHeader('client_id') && $request->hasHeader('client_secret'))
    {
      $validator = Validator::make($request->all(),
      [
        'username' => 'required',
        'password' => 'required',
      ]);

      if($validator->fails())
      {
        return response(['errors'=> $validator->errors()->all()], 422);
      }

      $client_id = $request->header('client_id');
      $client_secret = $request->header('client_secret');
    }
    else
    {
      $validator = Validator::make($request->all(),
      [
        'client_id' => 'required',
        'client_secret' => 'required',
        'username' => 'required',
        'password' => 'required',
      ]);

      if($validator->fails())
      {
        return response(['errors'=> $validator->errors()->all()], 422);
      }

      $client_id = $request->client_id;
      $client_secret = $request->client_secret;
    }


    if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
    {
      $client = \Laravel\Passport\Client::where('id', $client_id)->first();

      if(empty($client))
      {
        return response()->json(['message' => 'clien id no existe'], 404);
      }

      $request->request->add([
        'grant_type' => 'password',
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'scope' => null,
        'username' => $request->username,
        'password' => $request->password,
      ]);

      $proxy = Request::create('oauth/token', 'POST');

      $tokens = \Route::dispatch($proxy);

      $response = (array) $tokens->getContent();

      $data = json_decode($response[0]);

      $json['token_type'] =  $data->token_type;

      $json['access_token'] = $data->access_token;

      $json['expires_in'] = now()->addHours(1);

      $json['scope'] = '*';

      $json['refresh_token'] = $data->refresh_token;

      $json['refresh_token_expires_in'] = now()->addHours(1)->addMinutes(10);

      return response()->json($json, 200);
    }
    else
    {
      return response()->json(['message' => 'Correo o contraseñas incorrectos'], 404);
    }
  }//validate_token



  public function login(Request $request)
  {
    $validator = Validator::make($request->all(),
    [
      'username' => 'required',
      'password' => 'required',
    ]);

    if($validator->fails())
    {
      return response(['errors'=> $validator->errors()->all()], 422);
    }

    if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
    {
        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => null,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $proxy = Request::create('oauth/token', 'POST');

        $tokens = \Route::dispatch($proxy);

        $response = (array) $tokens->getContent();

        $data = json_decode($response[0]);

        $json['token_type'] =  $data->token_type;

        $json['access_token'] = $data->access_token;

        $json['expires_in'] = now()->addHours(1);

        $json['scope'] = '*';

        $json['refresh_token'] = $data->refresh_token;

        $json['refresh_token_expires_in'] = now()->addHours(1)->addMinutes(10);

        return response()->json($json, 200);
    }
    else
    {
      return response()->json(['message' => 'Correo o contraseñas incorrectos'], 404);
    }
  }

  public function userRefreshToken(Request $request)
    {
        $client = \DB::table('oauth_clients')
            ->where('password_client', 1)
            ->first();

        $data = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => ''
        ];
        $request = Request::create('/oauth/token', 'POST', $data);
        $content = json_decode(app()->handle($request)->getContent());

        return response()->json([
            'error' => false,
            'data' => [
                'meta' => [
                    'token' => $content->access_token,
                    'refresh_token' => $content->refresh_token,
                    'type' => 'Bearer'
                ]
            ]
        ], 200);
    }

    public function user()
    {
        return Auth::user();
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }

    //
    public function logout(Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
