<li class="nav-item">
    <a href="{{ route($route) }}" class="nav-link {{ $active ? 'active' : '' }}">
        
        <x-svg-icon name="{{ $icon }}" class="nav-icon me-2" />

        <p>{{ $label }}</p>
    </a>
</li>
