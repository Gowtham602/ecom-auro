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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = auth()->user();
        $user = auth()->user();

if (session()->has('pending_cart')) {

    $pending = session('pending_cart');

    $cart = Cart::firstOrNew([
        'user_id' => $user->id,
        'product_id' => $pending['product_id'],
    ]);

    $cart->quantity += $pending['quantity'];

    $cart->save();

    $url = $pending['url'];

    session()->forget('pending_cart');

    return redirect($url);
}

        if ($user->role->slug == 'admin') {
    
            return redirect()->route('admin.dashboard');
        }
    
        return redirect()->route('home');
        // return redirect()->intended(route('home'));
        // return redirect()->intended(route('dashboard', absolute: false));
        
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
