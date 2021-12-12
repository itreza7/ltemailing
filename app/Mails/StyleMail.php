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

    public $data;

    /**
     * @param $data
     */

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return StyleMail
     */

    public function build()
    {
        $data = $this->data;
        $template = $data['template'] ?? config('mail.lt-mailing-theme', 'style-1');
        $data['template'] = 'ltmailing::' . $template;
        $data['direction'] = __('ltmailing::x.dir');
        $html_contents = view('ltmailing::email', $data)->render();
        $css_contents = file_get_contents(__DIR__ . '/../../resources/views/' . $template . '/style.css');
        $html_inlined = (new HtmlString((new CssToInlineStyles)->convert($html_contents, $css_contents)))->toHtml();
        return $this->html($html_inlined);
    }
}
