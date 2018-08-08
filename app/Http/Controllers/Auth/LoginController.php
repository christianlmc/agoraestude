<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Http\Controllers\WPPasswordHash;
use App\WpUsuario;
use App\User;
use Hash;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
	{
		if(Auth::user()->admin){
	    	return '/admin/home';
		}
	    else{
	    	return '/home';
	    }
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    private function wp_hash_password($password) {
        $wp_hasher;

        if (empty($wp_hasher)) {
            // By default, use the portable hash from phpass
            $wp_hasher = new WPPasswordHash(8, true);
        }

        return $wp_hasher->HashPassword( trim( $password ) );
    }


    private function wp_check_password($password, $hash) {
        $wp_hasher;

        if (empty($wp_hasher)) {
            $wp_hasher = new WPPasswordHash(8, true);
        }
        $check = $wp_hasher->CheckPassword($password, $hash);
        return $check;
    }

    public function login(Request $request)
    {
        $usuario_wp = WpUsuario::where('email', $request->email)->first();

        if(!$usuario_wp || !$this->wp_check_password($request->password, $usuario_wp->password)){
            return $this->sendFailedLoginResponse($request);
        }
        else{
            $request->password = Hash::make($request->password);

            User::updateOrCreate(
                ['email' => $usuario_wp->email],
                [
                    'id' => $usuario_wp->id,
                    'nome' => $usuario_wp->nome,
                    'password' => $request->password
                ]
            );

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
