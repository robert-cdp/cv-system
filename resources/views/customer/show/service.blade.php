<div class="card card-primary card-outline mb-4">
    <div class="card-header p-2">
        <strong>Servicios del cliente</strong>
    </div>

    <div class="card-body">
        @foreach ($customer->services as $service)
            @include('customer.show.service-tramite')
        @endforeach
    </div>
</div>
