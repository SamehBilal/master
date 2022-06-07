@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-large text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <div class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <span class="badge badge-pill badge-danger">x</span> <span>{{ $error }}</span><br>
            @endforeach
        </div>
    </div>
@endif
