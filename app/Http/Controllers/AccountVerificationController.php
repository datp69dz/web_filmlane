<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\AccountVerificationEmail;

class AccountVerificationController extends Controller
{
    public function verify(Request $request, $token)
    {
        // Find the account with the corresponding verification token
        $account = Account::where('verification_token', $token)->first();

        if ($account) {
            // Update the account status
            $account->status = '2'; // Set the status to '2' for activated
            $account->save();

            // Redirect to the home page or a successful confirmation page
            return redirect()->route('get_login')->with('success', 'Email address verified successfully! Please log in again!');
        }

        // Redirect to the error page or an unsuccessful confirmation page
        return redirect()->route('get_login')->with('error', 'Invalid verification token.');
    }
}
