<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectAfterLogout = '/login';
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function authenticated()
    {
      if(Auth::user()->isAdmin() == 1) return redirect('/admin');
      return redirect('/home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
      return 'username';
    }

}
