<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\Gate;
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
    //it redirects to here when login success
    // protected $redirectTo = '/success';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Gate::allows('isAdmin')) {
                    return redirect('/admin');
                }
                if (Gate::allows('isUser')) {
                    return redirect('/profile');
                }
            } else {
                return back()->withErrors(['email' => 'Invalid email or password.'])->withInput($request->only('email'));
            }
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput($request->only('email'));
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

}
