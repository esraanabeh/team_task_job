<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function __construct()
    {
    }

    public function getLogin()
    {
        if (Auth::Check()) {
            return redirect('admin');
        }
        return view('admin.home.login');
    }

    public function postLogin()
    {
        $inputs = Request()->all();

        $remember = FALSE;
        if (isset($inputs['remember'])) {
            $remember = TRUE;
        }
        if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']], true)) {
            $active = Auth::user()->active;
            if ($active == 'yes') {
              

                return redirect()->intended('admin');
            } else {
                Auth::logout();
                return back()->withInput()->withError(trans('admin.not_allow'));
            }
        } else {
            return back()->withInput()->withError(trans('admin.wrong_login'));
        }
    }
}
