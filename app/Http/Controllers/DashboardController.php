<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $employee = Employee::where('email', $user->email)->first();

        if (!$employee || !$employee->is_completed) {
            // redirect to current onboarding step
            $step = $employee->current_step ?? 1;
            return redirect("/onboarding/step-$step");
        }

        return view('dashboard', compact('user', 'employee'));
    }
}