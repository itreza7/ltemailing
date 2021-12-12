@component($template.'.message',['template' => $template, 'direction' => $direction, ])
@isset ($greeting)
# {{ $greeting }}
@endif

@foreach ($introLines ?? [] as $line)
@component($template.'.line')
{!! $line !!}
@endcomponent
@endforeach

@foreach ($actions ?? [] as $action)
@isset($action['url'], $action['color'])
@component($template.'.button', ['url' => $action['url'], 'color' => $action['color'] ?? 'primary'])
{{ $action['text'] }}
@endcomponent
@endif
@endforeach

@foreach ($outroLines ?? [] as $line)
@component($template.'.line')
{!! $line !!}
@endcomponent
@endforeach

@foreach ($actions ?? [] as $action)
@if(($action['footer-url'] ?? true) && isset($action['text'], $action['url']))
@component($template.'.subcopy')
{!! __('ltmailing::x.invalid_url', ['text' => $action['text'], 'link' => $action['url']]) !!}
@endcomponent
@endif
@endforeach
@endcomponent
