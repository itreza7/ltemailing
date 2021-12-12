<?php

namespace Larateam\Emailing\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\HtmlString;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class StyleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_subject;
    public $mail_data;

    /**
     * @param $subject
     * @param $data
     */

    public function __construct($subject, $data)
    {
        list($this->subject, $this->mail_data) = [$subject, $data];
        list($this->subject, $this->mail_data) = [$subject, $data];
    }

    /**
     * @return StyleMail
     */

    public function build()
    {
        list($subject, $mail_data) = [$this->mail_subject, $this->mail_data];
        $template = $mail_data['template'] ?? config('mail.lt-mailing-theme', 'style-1');
        $mail_data['template'] = 'ltmailing::' . $template;
        $mail_data['direction'] = __('ltmailing::x.dir');
        $html_contents = view('ltmailing::email', $mail_data)->render();
        $css_contents = file_get_contents(__DIR__ . '/../../resources/views/' . $template . '/style.css');
        $html_inlined = (new HtmlString((new CssToInlineStyles)->convert($html_contents, $css_contents)))->toHtml();
        return $this->html($html_inlined)->subject($subject);
    }
}
