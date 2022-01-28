<div>
    @if (session()->has('message'))
        {{ $slot }}
        <div class="card-panel greeb lighten2">{{ session()->get('message') }}</div>
    @elseif(session()->has('error'))
        <div class="card-panel red lighten2">{{ session()->get('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="card-panel red lighten2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
