<li class="nav-item">
    <a href="{{ route($route) }}" class="nav-link {{ $active ? 'active' : '' }}">
        <i class="{{ $icon }} nav-icon"></i>
        <p>{{ $label }}</p>
    </a>
</li>
