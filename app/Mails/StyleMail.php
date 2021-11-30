<?php

namespace Larateam\Emailing\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class StyleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_template;
    public $mail_subject;
    public $mail_content;

    public function __construct($template, $subject, $content)
    {
        list($this->mail_template, $this->subject, $this->mail_content) = [$template, $subject, $content];
    }

    public function build()
    {
        list($template, $subject, $content) = [$this->mail_template, $this->mail_subject, $this->mail_content];
        $template = 'ltmailing::' . $template;
        return $this->markdown($template);
    }
}
