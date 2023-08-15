@props(['messages'])

@if ($messages)
    <div class="box" style="position: absolute; width:100%; top:0">
        <div class="text-sm text-red-600 space-y-1">
            {{ $message }}
        </div>
    </div>
    {{-- <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li></li>
        @endforeach
    </ul> --}}
@endif
