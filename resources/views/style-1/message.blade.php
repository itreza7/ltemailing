@component($template.'.layout', ['direction' => $direction])

@slot('header')
@component($template.'.header', ['url' => url('')])
{!! __('ltmailing::x.header-logo') !!}
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
{!! __('ltmailing::x.copyright', ['site_title' => __('ltmailing::x.site-title')]) !!}
@endcomponent
@endslot

@endcomponent
