<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log; // For debugging

class SiteContentController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $key The section_key from the URL
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $key)
    {
        $type = $request->input('type');
        $newValue = null;

        // --- Logic for handling TEXT data ---
        if ($type === 'text') {
            $request->validate([
                'value' => 'nullable|string', // Allow empty text
            ]);
            // For text, the value is simply the input from the form.
            $newValue = $request->input('value');
        } 
        
        // --- Logic for handling IMAGE or VIDEO uploads ---
        elseif ($type === 'image' || $type === 'video') {
            // First, validate that a file was actually uploaded.
            $request->validate([
                'value' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp,mp4|max:10240', // max 10MB
            ]);

            // Check if the file exists in the request
            if ($request->hasFile('value')) {
                $file = $request->file('value');

                // Find the old record to delete the old file
                $oldContent = SiteContent::where('section_key', $key)->first();
                if ($oldContent && $oldContent->content_value) {
                    // Check if the old file exists in storage and delete it
                    if (Storage::disk('public')->exists($oldContent->content_value)) {
                        Storage::disk('public')->delete($oldContent->content_value);
                    }
                }

                // Store the new file in 'storage/app/public/site'
                // The store() method returns the path of the new file
                $path = $file->store('site', 'public');
                
                // The new value to be saved in the database is the file path.
                $newValue = $path;
            } else {
                // If for some reason no file was uploaded, redirect back with an error.
                return back()->with('error', 'No file was uploaded.');
            }
        } 
        
        // --- If the type is unknown, do nothing and redirect back ---
        else {
            return back()->with('error', 'Invalid content type specified.');
        }

        // --- Save the new value to the database ---
        // This command finds a row where 'section_key' matches $key,
        // or creates a new one if it doesn't exist.
        // Then it updates the 'content_value' with our $newValue.
        SiteContent::updateOrCreate(
            ['section_key' => $key],
            ['content_value' => $newValue]
        );

        // --- Clear cache to ensure changes are visible immediately ---
        Artisan::call('cache:clear');
        Artisan::call('view:clear');

        // --- Redirect back to the previous page with a success message ---
        return back()->with('success', 'Content updated successfully!');
    }
}