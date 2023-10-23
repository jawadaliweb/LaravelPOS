<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;

class purchaseControllar extends Controller
{
    public function AddForm() {
        $suppliers = Supplier::get();
        $products = Product::get();
        return view('backend.purchase.view_purchase', compact('suppliers','products'));
    }

    public function AddPurchase(Request $request)
    {
        // Create a new purchase record
    $purchase = new Purchase([
        'supplier_id' => $request->supplier_id,
        'date' => $request->date,
        'total_quantity' => array_sum($request->total_quantity),
        'total_price' => 0,
    ]);

    $purchase->save();
    $total_price = 0;
    // Loop through product data and create stock records
    foreach ($request->product_id as $index => $productId) {
        $stock = new Stock([
            'product_id' => $productId,
            'purchase_id' => $purchase->id,
            'quantity' => $request->total_quantity[$index],
            'price' => $request->price[$index],
            'discount' => $request->discount[$index] ?? 0,
            'total_price' => ($request->total_quantity[$index] * $request->price[$index]) - ($request->discount[$index] ?? 0),
        ]);
        $total_price += ($request->total_quantity[$index] * $request->price[$index]) - ($request->discount[$index] ?? 0);

        $stock->save();
    }

    $purchase->total_price = $total_price;
    $purchase->save();

    return redirect()->back()->with('success', 'Products Purchased Successfully');
}
}
