<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest; // <-- Import the model
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Update the status of a specific service request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceRequest  $serviceRequest // The model is automatically injected by Laravel
     * @return \Illuminate\Http\RedirectResponse
     */
 public function updateStatus(Request $request, $id)
{
    // 1. Manually find the service request by its ID.
    // If it's not found, it will throw a 404 error, which is good.
    $serviceRequest = ServiceRequest::findOrFail($id);

    // 2. Validate the incoming data
    $validated = $request->validate([
        'new_status' => ['required', 'string', 'in:Pending,In Progress,Completed'],
    ]);

    // 3. Update the status on the model we found
    $serviceRequest->status = $validated['new_status'];
    $serviceRequest->save();

    // 4. Redirect back with a success message
    return back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
}
    /**
     * Remove the specified resource from storage.
     * This is for the delete button, let's add it too.
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
        
        return back()->with('success', 'تم حذف الطلب بنجاح.');
    }
}