<a href="#" class="nav-link" data-bs-toggle="dropdown">
    <div class="d-flex align-items-center">

        <x-svg-icon name="person" class="me-2" />

        <div class="ms-1 d-none d-md-block d-flex align-items-center">
            <div class="fw-semibold">{{ auth()->user()->name }}</div>
        </div>
    </div>
</a>
