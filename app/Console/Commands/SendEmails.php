<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\EmailsStack;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mails = EmailsStack::getAllMail()->get();

        foreach ($mails as $mail) {
            // Send email
            Mail::send([], [], function ($message) use ($mail) {

                $message->from(env('MAIL_FROM'), env('MAIL_NAME'));
                $message->subject($mail->subject);
                $message->to($mail->mail_to);
                $message->setBody($mail->content, 'text/html', 'utf-8');
            });
            // Check email send success or false
            if (!Mail::failures())
            {
                Log::info(json_encode(Mail::failures()));
                $mail->sent = 1;
                $mail->save();
            };
        }
    }
}
