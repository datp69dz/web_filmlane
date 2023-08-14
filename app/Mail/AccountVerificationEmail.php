<?php
namespace App\Mail;

use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $account;

    /**pojn
     * Create a new message instance.
     *
     * @param  Account  $account
     * @return void
     */
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Verification')
                    ->view('users.page.account.mail.account-verification');
    }
}
