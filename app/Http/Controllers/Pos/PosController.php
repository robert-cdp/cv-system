<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Cash\CashMovement;
use App\Models\Cash\CashRegister;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Sales\Sale;
use App\Models\Sales\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pos.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $cashRegister = CashRegister::where('user_id', auth()->id())
            ->whereNull('closed_at')
            ->firstOrFail();

        DB::transaction(function () use ($request, $cashRegister) {

            $total = 0;

            // calcular total
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                $total += $product->price * $item['quantity'];
            }

            // crear venta
            $sale = Sale::create([
                'user_id' => auth()->id(),
                'cash_register_id' => $cashRegister->id,
                'total' => $total,
            ]);

            // items
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);

                $subtotal = $product->price * $item['quantity'];

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                // descontar stock
                $product->decrement('stock', $item['quantity']);
            }

            // movimiento de caja
            CashMovement::create([
                'cash_register_id' => $cashRegister->id,
                'type' => 'sale',
                'amount' => $total,
                'description' => 'Venta #' . $sale->id,
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Venta realizada correctamente'
        ]);
    }
}
