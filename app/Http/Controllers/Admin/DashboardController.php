<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
   {
    // Fetch all necessary data just once
    $requests = \App\Models\ServiceRequest::with('user')->latest()->get();
    $messages = \App\Models\Message::latest()->get();
    $farmers = \App\Models\User::where('role', 'farmer')->latest()->get();
    
    // Calculate stats from the data we already fetched
    $pendingRequestsCount = $requests->where('status', 'Pending')->count();
    $totalMessagesCount = $messages->count();
    $totalFarmersCount = $farmers->count();
    
    // Pass all variables to the view in a single, correct compact() call
    return view('admin.dashboard', compact(
        'requests', 
        'messages',
        'farmers',
        'pendingRequestsCount',
        'totalMessagesCount',
        'totalFarmersCount'
    ));
}
}
