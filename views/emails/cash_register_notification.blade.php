<h2 style="margin-bottom:10px;">
    Caja {{ $action === 'open' ? 'Abierta' : 'Cerrada' }}
</h2>

<p style="color:#555;">
    Usuario: <strong>{{ $cashRegister->user->name }}</strong><br>
    Apertura: {{ $cashRegister->opened_at->format('d/m/Y h:i A') }}<br>

    @if ($cashRegister->closed_at)
        Cierre: {{ $cashRegister->closed_at->format('d/m/Y h:i A') }}
    @endif
</p>

<hr>

<h3>Resumen</h3>

<table width="100%" cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
    <tr>
        <td>Monto inicial</td>
        <td align="right">Q {{ number_format($cashRegister->opening_amount, 2) }}</td>
    </tr>
    <tr>
        <td>Ventas</td>
        <td align="right">Q {{ number_format($totalSales, 2) }}</td>
    </tr>
    <tr>
        <td>Ingresos</td>
        <td align="right">Q {{ number_format($totalIncome, 2) }}</td>
    </tr>
    <tr>
        <td>Egresos</td>
        <td align="right">Q {{ number_format(abs($totalExpense), 2) }}</td>
    </tr>
    <tr style="font-weight:bold; border-top:1px solid #000;">
        <td>Esperado</td>
        <td align="right">Q {{ number_format($expected, 2) }}</td>
    </tr>

    @if ($cashRegister->closing_amount !== null)
        <tr>
            <td>Real en caja</td>
            <td align="right">Q {{ number_format($cashRegister->closing_amount, 2) }}</td>
        </tr>
        <tr style="font-weight:bold;">
            <td>Diferencia</td>
            <td align="right">
                Q {{ number_format($difference, 2) }}
            </td>
        </tr>
    @endif
</table>
