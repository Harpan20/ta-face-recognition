<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\APIController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $api = new APIController();
        $response = $api->login($username, $password);

        if (isset($response->error)) {
            return Redirect::back()->with('error', 'Username atau Password Salah');
        } else {
            session([
                'token' => $response->token,
                'user_type' => 'customer',
                'user_id' => $response->data->id,
                'user_name' => $response->data->fullname,
            ]);
            return redirect('/customer/tabungan');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/customer/login');
    }
}
