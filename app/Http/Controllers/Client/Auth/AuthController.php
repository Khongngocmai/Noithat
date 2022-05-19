<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('client.auth.login');
    }

    public function showRegister() {
        return view('client.auth.register');
    }

    /**
     * Register account
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if($request->password === $request->repassword) {
            User::create([
                'hoten' => $request->name,
                'email' => $request->email,
                'matkhau' => Hash::make($request->password),
                'gioitinh' => $request->sex,
                'sdt' => $request->phone,
            ]);
            return redirect()->route('auth.show.login')->with('success', 'Đăng ký thành công');
        }else {
            return redirect()->back()->with('invalid', 'Mật khẩu không trùng khớp');
        }
    }

    /**
     * Login account
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $result = Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
            if ($result) {
                if (Auth::user()->tinhtrang == 0) {
                    return redirect()->back()->withInput()->with('invalid', 'Tài khoản đã bị khóa, vui lòng liên hệ quản trị viên (số điện thoại ở phần giới thiệu)');
                }
                return redirect()->route('client.home');
            } else {
                return redirect()->back()->withInput()->with('invalid', 'Email/Mật khẩu không đúng');
            }
        } catch (\Throwable $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.show.login')->with('success', 'Đăng xuất thành công');
    }

    public function changeAccount()
    {
        $user = User::find(Auth::user()->id_nguoidung);
        return view('client.auth.change_account', compact('user'));
    }

    public function postChangeAccount(Request $request)
    {
        $user = Auth::user();
        $user->hoten = $request->name;
        $user->gioitinh = $request->sex;
        $user->sdt = $request->phone;
        $user->save();
        return redirect()->back()->with('success','Cập nhật thành công');
    }
}
