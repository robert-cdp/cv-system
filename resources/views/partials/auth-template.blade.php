<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg" style="max-width: 900px; width: 100%; border-radius: 1rem;">
        <div class="row g-0">
            <div class="col-lg-5 d-flex align-items-center justify-content-center bg-primary text-white"
                style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem;">
                <div class="text-center p-4">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo de la empresa" class="img-fluid mb-3"
                        style="max-height: 150px;">
                    <h2 class="fw-bold">{{ config('app.name') }}</h2>
                    <p class="small">Una experiencia diferente, conectando nuestra gente.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body p-5">
                    <h3 class="mb-4 text-center">@yield('title')</h3>
                    <p class="small text-center">@yield('sub-title')</p>
                    @yield('auth-content')
                </div>
            </div>
        </div>
    </div>
</div>
