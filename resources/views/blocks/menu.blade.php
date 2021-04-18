<ul>
@foreach ($menu as $page => $path)
    @if ($page == $activePage)
    <li>
        <a href="{{ $path }}" style="color: red">
            {{ $page }}
        </a>
    </li>
    @else
    <li>
        <a href="{{ $path }}">
           {{ $page }}
        </a>
    </li>
    @endif
@endforeach
</ul>

