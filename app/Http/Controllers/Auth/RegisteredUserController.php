<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

      

       Auth::login($user);
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
if ($user->role_id == 1) {

    return redirect()->route('admin.dashboard');
}

return redirect()->intended(route('home'));
    }
}
