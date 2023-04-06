<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\AdminRegisterRequest;

class RegistrationController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     * @param Request $request
     *
     * @return bool
     */
    protected function register(AdminRegisterRequest $request): RedirectResponse
    {
        $user = new User($request->safe()->all());

        if ($user->save()) {
            return redirect()->route('admin.auth.login')->with('messages', [Str::ucfirst(__('app.registration_successful')), Str::ucfirst(__('app.please_login'))]);
        }

        return redirect()->back()->withErrors([Str::ucfirst(__('app.registration_unsuccessful'))]);
    }

    /**
     * Shows client registration form
     * @return View
     */
    protected function registration(): View
    {
        return view('admin.auth.registration_form');
    }
}
