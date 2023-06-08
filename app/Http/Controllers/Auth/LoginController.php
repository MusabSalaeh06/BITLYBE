<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function logout(Request $request)
    {
        //member::where('remember_token', 'EZrkJ7Pph5BWNbbFmBw1KoGc5R7i5uYggbyySlq77HTzKrOjicRlERLqPtPv')->update(array('remember_token' => null));
        //$member = member::find(1);
        //dd($member);
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'ออกจากระบบเรียบร้อย');
    }
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
    }
    public function login(Request $request)
    {
        $customMessage = [
            "email.required" => "กรุณาระบุอีเมลมาด้วยน่ะครับ",
            "password.required" => "กรุณาระบุรหัสผ่านมาด้วยน่ะครับ",
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], $customMessage);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'error' => $errors->first(),
                ], 400
            );
        }
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin_page')->with('success', 'เข้าสู่ระบบเรียบร้อย');
        } else {
            return redirect()->route('login')->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง!');
        }
    }
}
