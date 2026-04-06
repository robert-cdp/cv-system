<h2>Caja {{ $action === 'open' ? 'Abierta' : 'Cerrada' }}</h2>

<p>
    Usuario: {{ $cashRegister->user->name }} <br>
    Monto apertura: ${{ number_format($cashRegister->opening_amount, 2) }} <br>
    @if($cashRegister->closed_at)
        Monto cierre: ${{ number_format($cashRegister->closing_amount, 2) }} <br>
    @endif
    Apertura: {{ $cashRegister->opened_at->format('d/m/Y h:i A') }} <br>
    @if($cashRegister->closed_at)
        Cierre: {{ $cashRegister->closed_at->format('d/m/Y h:i A') }} <br>
    @endif
</p>