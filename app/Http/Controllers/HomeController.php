<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContent; // <-- Make sure to import the model!

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all site content and turn it into a simple key->value array
        $site_content = SiteContent::pluck('content_value', 'section_key');
        
        // Pass the data to the welcome view
        return view('welcome', [
            'site_content' => $site_content
        ]);
    }

public function about() { return view('about'); }
public function services() { return view('services'); }
public function contact() { return view('contact'); }
}