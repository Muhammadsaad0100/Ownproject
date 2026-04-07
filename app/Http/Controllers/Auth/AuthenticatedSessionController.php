<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // 🔹 Ensure employee record exists
        $employee = Employee::firstOrCreate(
            ['email' => $user->email],
            ['name' => $user->name ?? $user->email, 'current_step' => 1]
        );

        // 🔹 Redirect to correct onboarding step
        if (!$employee->is_completed) {
            switch ($employee->current_step) {
                case 1: return redirect('/onboarding/step-1');
                case 2: return redirect('/onboarding/step-2');
                case 3: return redirect('/onboarding/step-3');
            }
        }

        return redirect('/dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}