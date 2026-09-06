@php
    $type = session()->has('success') ? 'success'
    : (session()->has('error') ? 'error'
    : 'warning');

    $message = session()->get($type);

    $style = match ($type) {
        'success' => 'bg-green-100 border-2 border-green-500',
        'error' => 'bg-red-100 border-2 border-red-500',
        'warning' => 'bg-yellow-100 border-2 border-yellow-500',
        default => '',
    };
@endphp
@if (session()->has('success') || session()->has('error') || session()->has('warning'))
    <div id="toast" class="absolute top-22 right-20 {{ $style }} p-3 mb-4 flex gap-2 items-center">
        <x-dynamic-component :component="'icons.' . $type" class="mt-4" />
     
        <p>
            {{ $message }}
        </p>
    </div>

  
@endif