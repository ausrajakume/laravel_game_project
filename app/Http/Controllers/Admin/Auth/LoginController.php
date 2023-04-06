<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\AdminAuthenticateRequest;

class LoginController extends Controller
{
    /**
     * Shows client login form
     * @return View
     */
    public function login(): View
    {
        return view('admin.auth.login_form');
    }

    /**
     * Handle an authentication attempt.
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(AdminAuthenticateRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->safe()->all())) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
