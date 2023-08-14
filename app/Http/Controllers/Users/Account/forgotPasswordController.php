<?php

namespace App\Http\Controllers\Users\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Config;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('users.page.account.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = Account::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'The provided email address does not exist.']);
        }

        $token = $this->generateToken();
        $user->verification_token = $token;
        $user->save();

        $resetLink = route('password.reset', ['token' => $token]);
    // Gửi email đến người dùng chứa liên kết đặt lại mật khẩu
    Mail::send('users.page.account.mail.verification-fogot', ['resetLink' => $resetLink], function (Message $message) use ($user) {
        $message->to($user->email)->subject('Reset Your Password');
    });

        return back()->with(['success' => 'Password reset link has been sent to your email.']);
    }

    public function showResetPasswordForm($token)
    {
        $user = Account::where('verification_token', $token)->first();


        return view('users.page.account.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Account::where('verification_token', $request->token)
            ->where('email', $request->email)
            ->first();


        $user->password = Hash::make($request->password);
        $user->account_update = Carbon::now();
        $user->save();

        return redirect()->route('get_login')->with(['success' => 'Your password has been reset successfully.']);
    }

    private function generateToken()
    {
        // Tạo token ngẫu nhiên
        // ...
        return 'generated_token';
    }
}
