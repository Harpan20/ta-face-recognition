<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\BiznetHelper;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('pages.login');
        }
    }

    public function proseslogin(Request $request)
    {
        $login = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('notif', 'Username atau Password salah');
        }
    }

    public function prosesloginTry(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('notif', 'Username atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function loginWithFaceIndex()
    {
        return view('pages.login-with-face');
    }

    public function loginWithFaceCheck(Request $request)
    {


        // $username = $request->username;
        // $image = str_replace("data:image/png:base64,", "", $username = $request->image);
        $image = str_replace("data:image/png:base64,", "", $request->image);
        $response = BiznetHelper::identifyface($image);
        $error = "-";
        Log::info($response);
        if (isset($response['risetai']['return'][0]['user_name'])) {
            // $role = explode("-", $response['risetai']['return'][0]['user_id'])[0];
            // $api_username = str_replace($role . "-", "", $response['risetai']['return'][0]['user_id']);

            if ($response['risetai']['status'] == 200) {
                // $user = User::where('username', 'multipilar')->first();
                $user = User::where('username', $response['risetai']['return'][0]['user_id'])->first();

                if ($user) {
                    Auth::login($user);
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard');
                } else {
                    return back()->with('notif', 'Pengguna tidak dikenal');
                }
            } else {
                return back()->with('notif', 'Pengguna tidak dikenal');
            }
        }
    }
}
