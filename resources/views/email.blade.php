@component($template.'.message',['template' => $template, 'direction' => $direction])
@isset ($greeting)
# {{ $greeting }}
@endif

@foreach ($introLines ?? [] as $line)
{{ $line }}
@endforeach

@foreach ($actions ?? [] as $action)
@component($template.'.button', ['url' => $action['url'], 'color' => $action['color'] ?? 'primary'])
{{ $action['text'] }}
@endcomponent
@endforeach

@foreach ($outroLines ?? [] as $line)
{{ $line }}
@endforeach

@foreach ($actions ?? [] as $action)
@component($template.'.subcopy')
{!! __('ltmailing::x.invalid_url', ['text' => $action['text'], 'link' => $action['url']]) !!}
@endcomponent
@endforeach

@endcomponent
