@php
    $bgColor = match($type) {
        'success' => 'lightgreen',
        'error' => 'lightcoral',
        default => 'lightyellow'
    };
@endphp

<div style="background-color: {{ $bgColor }}; padding: 10px; margin: 10px 0; border-radius: 5px;">
    {{ $message }}
</div>
