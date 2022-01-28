<?php

namespace App\Http\Controllers\Auth;
use Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:business_owner')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }



    public function username(){
        return 'username';
    }

    public function utype(){
        return 'utype';
    }
    // route('logout')
    // Auth::logout()
    public function showBusinessOwnerLoginForm()
    {
        session(['utype' => 'business']);
        error_log(Auth::user());
        return view('auth.login', ['utype' => session()->get('utype')]);
    }

    public function businessOwnerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('business_owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended(route('site.index'));
        }

        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
    }

    public function showCustomerLoginForm()
    {
        session(['utype' => 'customer']);
        return view('auth.login', ['utype' => session()->get('utype')]);
    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'email|required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended(route('main'));
        }

        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
    }



}
