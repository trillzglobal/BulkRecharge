<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new LoginController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $credentials = $this->validate(request(['email', 'password']), config('rules.login'));
        $token = auth('api')->attempt($credentials);

        if (! $token = auth('api')->attempt($credentials)) {
            return expired('Invalid login credentials', null);
        }


        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $logout = auth()->logout();
        return success('Successfully logged out', $logout);
    }



    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function tokenStatus(Request $request)
    {
        return response()->json(["status"=>"success", "userid"=> $request->user()->id], 200);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        

        return success('Logged in successfully', [
            'user'=>auth('api')->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function profile()
    {
        return response()->json(["status"=>"success",
            "user"=>$this->authUser()
        ], 200);
    }
}
