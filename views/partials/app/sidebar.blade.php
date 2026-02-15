        <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="/" class="brand-link" target="_blank">
                    <span class="brand-text fw-light">{{ config('app.name') }}</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    @include('partials.sidebar.menu')
                </nav>
            </div>
        </aside>