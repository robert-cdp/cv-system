<div class="p-3 bg-gradient-primary text-white">
    <div class="d-flex align-items-center">
        <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3"
             style="width: 48px; height: 48px;">
             
            <x-svg-icon name="person" class="fs-4" />

        </div>
        <div>
            <h6 class="mb-0 fw-bold">{{ auth()->user()->name }}</h6>
            <small>{{ auth()->user()->email }}</small>
        </div>
    </div>
</div>
