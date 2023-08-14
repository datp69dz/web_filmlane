<?php

namespace App\Http\Controllers\Users\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account; // Update the model import statement
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\AccountVerificationEmail;

class registerController extends Controller
{
    //
    public function get_register()
    {
        return view('users.page.account.register');
        
    }

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:accounts',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $account = new Account();
        $account->account_id = $request->input('account_id');
        $account->username = $request->input('username');
        $account->email = $request->input('email');
        $account->password = bcrypt($request->input('password'));
        $account->account_date = now();
        $account->account_update = now();
        $account->status = '1';// 0 - bi khoa , 1 - chua kich hoat , 2- duoc kich hoat 
        
        $token = Str::random(32);
        $account->verification_token = $token;
        $account->save();
        
        // Send the verification email
        $emailData = [
            'user' => $account,
            'token' => $token,
        ];
        
        $result = Mail::to($account->email)->send(new AccountVerificationEmail($emailData));

        if ($result !== false) {
            // Email sent successfully
            return view('users.page.account.verification');
            
        } else {
            // Email sending failed
            // Add your logic here
            return redirect()->route('get_register')->with('error', 'Failed to send verification email.');
        }
    }
}
