<li class="nav-item {{ $open ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $open ? 'active' : '' }}">
        
        <x-svg-icon name="{{ $icon }}" class="nav-icon me-2" />

        <p>
            {{ $label }}
            <x-svg-icon name="chevron-right" class="nav-arrow" />
        </p>
    </a>

    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
