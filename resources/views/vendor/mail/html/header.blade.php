<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="{{ asset('img/logo.png') }}" alt="logo" width="75">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
