@component($template.'.layout', ['direction' => $direction])

@slot('header')
@component($template.'.header', ['url' => url('')])
{!! config('mail.header-logo')[__('ltmailing::x.lang')] !!}
@endcomponent
@endslot

{{ $slot }}

@isset($subcopy)
@slot('subcopy')
@component($template.'.subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

@slot('footer')
@component($template.'.footer')
{!! __('ltmailing::x.copyright', ['site_title' => config('mail.site-title')[__('ltmailing::x.lang')]]) !!}
@endcomponent
@endslot

@endcomponent
