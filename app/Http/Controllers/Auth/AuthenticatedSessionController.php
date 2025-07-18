<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
  public function store(Request $request): RedirectResponse
{
    $request->authenticate();

    // --- ADD THIS APPROVAL CHECK ---
    if (! Auth::user()->is_approved && Auth::user()->role !== 'admin') {
        $userEmail = Auth::user()->email;
        Auth::logout(); // Log the unapproved user out
        return back()->withErrors([
            'email' => 'حسابك قيد المراجعة. سيتم تفعيله بعد موافقة المشرف.',
        ])->withInput(['email' => $userEmail]);
    }
    // --- END OF APPROVAL CHECK ---

    $request->session()->regenerate();

    return redirect()->intended(route('dashboard', absolute: false));
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
