<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerDashboardController extends Controller
{
    public function index()
    {
        $requests = Auth::user()->serviceRequests()->latest()->get();
        return view('farmer.dashboard', compact('requests'));
    }

    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'service_type' => ['required', 'string', 'max:255'],
            'product_name' => ['required', 'string', 'max:255'], // We are already validating it
            'quantity_kg' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string'],
        ]);

        Auth::user()->serviceRequests()->create([
            'service_type' => $validated['service_type'],
            'product_name' => $validated['product_name'], // <-- The corrected line
            'quantity_kg' => $validated['quantity_kg'],
            'notes' => $validated['notes'],
            'status' => 'Pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'تم إرسال طلبك بنجاح!');
    }
}