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

    private $template;
    private $subject;
    private $content;

    public function __construct($template, $subject, $content)
    {
        list($this->template, $this->subject, $this->content) = [$template, $subject, $content];
    }

    public function build()
    {
        list($template, $subject, $content) = [$this->template, $this->subject, $this->content];

        return $this->view('admincp::mails.reset-password');
    }
}
