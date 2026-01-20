<div class="table-responsive">
    <table class="table table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Principal</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->contacts as $contact)
                <tr>
                    <td>
                        <span class="badge bg-primary">
                            {{ ucfirst($contact->type) }}
                        </span>
                    </td>

                    <td>{{ $contact->value }}</td>

                    <td>
                        @if ($contact->is_primary)
                            <span class="badge bg-success">Sí</span>
                        @else
                            —
                        @endif
                    </td>

                    <td class="text-end">
                        <form method="POST" action="{{ route('customer.destroyContact', $contact) }}">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
