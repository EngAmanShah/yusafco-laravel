<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // <-- Import the User model
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    
    public function approve(User $user)
    {
        // Set the 'is_approved' flag to true
        $user->is_approved = true;
        $user->save();

        return back()->with('success', 'تم اعتماد المزارع بنجاح.');
    }

    /**
     * Reject and delete a farmer's registration.
     */
    public function reject(User $user)
    {
        // Delete the user record completely
        $user->delete();

        // Redirect back to the admin dashboard with a success message
        return back()->with('success', 'تم رفض وحذف المزارع بنجاح.');
    }
}