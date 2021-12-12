<?php

namespace Larateam\Mailing\Facades;

use Larateam\Mailing\Mails\LTMailable;
use Larateam\Mailing\Mails\StyleMail;
use Larateam\Mailing\Mails\StyleMailShouldQueue;

class LTMail
{
    public $subject = [];
    public $attributes = [];
    public $rendered = null;
    public $is_queue = false;

    public function make_queue(): LTMail
    {
        $this->is_queue = true;
        return $this;
    }

    public function greeting($greeting): LTMail
    {
        $this->attributes['greeting'] = $greeting;
        return $this;
    }

    public function line($line): LTMail
    {
        if(isset($this->attributes['actions'])){
            $this->attributes['outroLines'][] = $line;
        }
        else{
            $this->attributes['introLines'][] = $line;
        }
        return $this;
    }

    public function action($text, $url, $color = 'primary', $add_to_footer = true): LTMail
    {
        $this->attributes['actions'][] = [
            'text' => $text,
            'url' => $url,
            'color' => $color,
            'footer-url' => $add_to_footer
        ];
        return $this;
    }

    public function template($template): LTMail
    {
        $this->attributes['template'] = $template;
        return $this;
    }

    public function render() : LTMailable
    {
        if($this->is_queue){
            $rendered = (new StyleMailShouldQueue($this->attributes));
        }
        else{
            $rendered = (new StyleMail($this->attributes));
        }

        return $rendered;
    }

}
