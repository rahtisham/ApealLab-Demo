<?php

namespace App\Http\Controllers;
use App\Mail\MailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmail()
    {
        $detail = [
            'title' => 'This is Email from AppealLab',
            'body' => 'This is for testing email.'
        ];
        Mail::to('ahtishamn676@gmail.com')->send(new MailNotification($detail));

    }
}
