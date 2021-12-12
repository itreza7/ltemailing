<?php

namespace Larateam\Mailing\Mails;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class LTMailable extends Mailable
{
    public function show(): LTMailable
    {
        return $this;
    }

    public function sendMail(): bool
    {
        try {
            Mail::send($this);
            return true;
        }
        catch (\Exception $exception){
            return false;
        }
    }

}
