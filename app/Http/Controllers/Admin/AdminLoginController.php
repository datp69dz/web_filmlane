<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.page.logins.login');
    }

    public function login(Request $request)
{
    // Kiểm tra dữ liệu nhập vào
    $validator = Validator::make($request->all(), [
        'admin_username' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('admin.login')->withErrors($validator)->withInput();
    }

    $credentials = $request->only('admin_username', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        // Xác thực thành công
        return redirect()->intended('/admin/index'); // Thay đổi đường dẫn đích
    } else {
        // Xác thực thất bại
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }
}

public function logout(Request $request)
{
    Auth::guard('admin')->logout(); // Đăng xuất người dùng

    $request->session()->invalidate(); // Huỷ bỏ session

    return redirect()->route('admin.login'); // Điều hướng về trang đăng nhập
}




}
