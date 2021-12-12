<?php

namespace Larateam\Mailing\Facades;

use Illuminate\Support\Facades\Mail;
use Larateam\Mailing\Mails\StyleMail;
use Larateam\Mailing\Mails\StyleMailShouldQueue;

class LTMail
{
    public $subject = [];
    public $attributes = [];
    public $rendered = null;
    public $is_queue = false;

    public function __construct()
    {

    }

    public function makeQueueable(): LTMail
    {
        $this->is_queue = true;
        return $this;
    }

    public function setSubject($string): LTMail
    {
        $this->attributes['subject'] = $string;
        return $this;
    }

    public function setGreeting($string): LTMail
    {
        $this->attributes['greeting'] = $string;
        return $this;
    }

    public function addIntro($string): LTMail
    {
        $this->attributes['introLines'][] = $string;
        return $this;
    }

    public function addAction($text, $url, $color = 'primary'): LTMail
    {
        $this->attributes['actions'][] = [
            'text' => $text,
            'url' => $url,
            'color' => $color,
        ];
        return $this;
    }

    public function addOutro($string): LTMail
    {
        $this->attributes['outroLines'][] = $string;
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
        if(!is_null($this->rendered)){
            try {
                Mail::send($this->rendered);
                return true;
            }catch (\Exception $exception){

            }
        }
        return false;
    }

}
