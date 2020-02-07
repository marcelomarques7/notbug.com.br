<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/config';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request){
        $tries = $request->session()->get('login_tries', 0);

        //EXEMPLO PARA PEGAR FRASE DO TRADUTOR NO CONTROLER
        //$frase = __('messages.test');
        //echo "FRASE: ".$frase;

        return view('login',[
            'tries' => $tries
        ]);
    }

    public function authenticate(Request $request){
        $creds = $request->only(['email', 'password']);

        //DESTROIR SESSION
        //$request->session()->forget('login_tries');

        if(Auth::attempt($creds)){
            $request->session()->put('login_tries', 0);
            return redirect()->route('config.index');            
        } else {
            $tries = intval($request->session()->get('login_tries', 0));
            //$tries++; /*MELHOR COMO ESTA ABAIXO, ECONOMIZA CODIGO*/
            $request->session()->put('login_tries', ++$tries);

            return redirect()->route('login')
            ->with('warning', 'E-mail e/ou senha inválidos');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
