<li class="nav-item {{ $open ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $open ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $label }}
            <i class="nav-arrow fas fa-chevron-right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
