<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;


class DeclaracionApiController extends Controller
{


  //
  public function index(){
      $response = ['codigo' => '0', 'mensaje' => "Aqui va el codigo de declaraciones."];
      return response($response, 200);
  }

  //
  public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = User::where('username', $request->username)->first();

        if ($user) {
            // 'Foucault99.-'
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('pA6Ycu74a18xe9xaijnJhxLfkXzOxE9YpWIhJiJ0');
                $expire_in = $token->token->expires_at;
                $token = $token->accessToken;
                $response = [
                        "codigo" => "0",
                        "mensaje" => "Usuario autenticado satisfactoriamente!",
                        "results" => array(
                            "token_type" => "Bearer",
                            "scope" => \Laravel\Passport\Passport::scopes(),
                            "expires_in" => $expire_in,
                            'access_token' => $token,
                            "refresh_token" => $expire_in
                        )
                    ];
                return response($response, 200);
            } else {
                $response = ["codigo" => "1", "mensaje" => "Error => Verifica tu usuario o contrasena!", "restuls" => []];
                return response($response, 422);
            }
        } else {
            $response = ["codigo" => "1", "mensaje" =>'Error => Usuario no existe!', "restuls" => []];
            return response($response, 422);
        }
    }

}
