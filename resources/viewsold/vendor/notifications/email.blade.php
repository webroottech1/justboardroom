@component('mail::message')
<div dir="ltr">
<title>Just Boardrooms</title>
<table width="700" align="left" cellpadding="0" cellspacing="0" style="background-color:#ffffff; margin-top:15px; margin-left:15px; margin-bottom:50px; border: 1px solid #79796A; border-collapse: collapse;">
<tbody>
<tr bgcolor="#FFFFFF">
<td width="700" align="left" valign="top">
<img src="{{ asset('/Images/email-banner.jpg')}}" alt="Just Boardrooms" width="700" height="130" style="display: block;" data-unique-identifier=""></td>
</tr>
<tr>
<td width="700" align="left" valign="top">
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td width="20" align="left" valign="top">&nbsp;</td>
<td width="640" align="left" valign="top" style="font-size: 13px; line-height: 22px; font-family: Verdana, Geneva, sans-serif; color:#000000;">
<p style="padding: 20px;">
<br/>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
    @if ($level === 'error')
    # @lang('Whoops!')
    @else
    # @lang('Hello!')
    @endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'orange';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Wishing you many successes'),<br>
Just Boardrooms
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
<br/>
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#79796A">
<table width="700" border="0" align="left" cellpadding="0" cellspacing="0">
<tbody>
<tr height="50">
<td width="20"></td>
<td width="660" align="center" valign="top"><br>
<span style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff;">© 2021
<a href="http://jbwp.ttldev.net" style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff;">Just Boardrooms</a> </span></td>
<td width="20"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
@endslot
@endisset
@endcomponent
