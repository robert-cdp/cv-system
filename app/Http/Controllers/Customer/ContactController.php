<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\ContactRequest;
use App\Models\Customer\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request, string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();

        $customer->contacts()->create(
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'redirect' => route('customer.show', $customer->dpi),
        ]);
    }

    public function destroy(Contact $contact)
    {
        if ($contact->is_primary) {
            return response()->json([
                'success' => false,
                'message' => 'No puedes eliminar el contacto principal',
            ], 422);
        }

        $customer = $contact->customer;

        $contact->delete();

        return redirect()
            ->route('customer.show', $customer->dpi)
            ->with('success', 'Eliminado correctamente');
    }
}
