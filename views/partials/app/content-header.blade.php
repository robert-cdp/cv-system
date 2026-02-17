<div class="app-content-header bg-white border-bottom mb-4">
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                @hasSection('title-icon')
                    <div class="icon-circle bg-primary text-white">
                        <svg class="icon-page-meta">
                            <use href="{{ asset('panel/plugins/icons/bootstrap-icons.svg') }}#@yield('title-icon')"></use>
                        </svg>
                    </div>
                @endif

                <div>
                    <h3 class="mb-0 fw-semibold">@yield('title')</h3>
                    @hasSection('title-sub')
                        <small class="text-muted">@yield('title-sub')</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
