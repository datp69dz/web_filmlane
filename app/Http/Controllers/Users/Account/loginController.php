<?php

namespace App\Http\Controllers\Users\Account;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function get_login()
    {
        return view('users.page.account.login');
    }
    public function post_login(Request $request)
{
    // Kiểm tra dữ liệu nhập vào
    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('get_login')->withErrors($validator)->withInput();
    }

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Xác thực thành công
        $user = Auth::user();
        $request->session()->put('user', $user);
        return redirect()->route('home')->with('success', 'Login successful!');
    } else {
        // Xác thực thất bại
        return redirect()->route('get_login')->withErrors(['login' => 'Email account or password is wrong, please re-enter']);
    }
    
}
}
