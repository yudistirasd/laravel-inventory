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
     * redirect user sesuai dengan rolenya ketika berhasil login
     *
     * @var string
     */

    public function authenticated()
    {
      if(Auth::user()->role == 0){
        return redirect('/admin');
      }elseif(Auth::user()->role == 1){
        return redirect('/manager');
      }elseif (Auth::user()->role == 2) {
        return redirect('/gudang');
      }elseif (Auth::user()->role == 3) {
        return redirect('/suplier');
      }else{
        return abort(403);
      }
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
