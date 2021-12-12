<?php

namespace Larateam\Mailing\Facades;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
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

    public function greeting($string): LTMail
    {
        $this->attributes['greeting'] = $string;
        return $this;
    }

    public function line($string): LTMail
    {
        if(isset($this->attributes['actions'])){
            $this->attributes['outroLines'][] = $string;
        }
        else{
            $this->attributes['introLines'][] = $string;
        }
        return $this;
    }

    public function action($text, $url, $color = 'primary'): LTMail
    {
        $this->attributes['actions'][] = [
            'text' => $text,
            'url' => $url,
            'color' => $color,
        ];
        return $this;
    }

    public function render(): LTMail
    {
        if($this->is_queue){
            $this->rendered = (new StyleMailShouldQueue($this->attributes));
        }
        else{
            $this->rendered = (new StyleMail($this->attributes));
        }
        return $this;
    }

    public function send(): bool
    {
        if(is_null($this->rendered)){
            $this->render();
        }
        try {
            Mail::send($this->rendered);
            return true;
        }catch (\Exception $exception){
        }
        return false;
    }

}
