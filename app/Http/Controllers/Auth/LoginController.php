<?php

namespace App\Http\Controllers\Auth;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    protected $redirectTo="/admin";
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        $office = session()->get("AuthUser");

        if($office){
            return redirect()->route("admin-dashboard");
        }


        return view('auth.login');
    }


    public function login(Request $request)
    {
   
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        // Your custom authentication logic here

        if (auth()->attempt($request->only($this->username(), 'password'), $request->filled('remember'))) {
            // Authentication passed
            return redirect()->route("super-admin");
        }

        $office= Office::where("email",$request->email)->first();

        if( $office && Hash::check($request->password, $office->password) ){

            $request->session()->put('AuthUser', $office);
            return redirect()->route("admin-dashboard");
        }


        // Authentication failed
        return $this->sendFailedLoginResponse($request);
    }



    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->remove('AuthUser');

        $request->session()->flush();
        
        return redirect($this->redirectTo);
    }
}
