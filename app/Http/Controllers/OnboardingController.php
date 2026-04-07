<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    // Step 1
    public function step1()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        return view('onboarding.step1', compact('employee'));
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $employee = Employee::where('email', Auth::user()->email)->first();
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'current_step' => 2
        ]);

        return redirect('/onboarding/step-2');
    }

    // Step 2
    public function step2()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();

        if ($employee->current_step < 2) {
            return redirect('/onboarding/step-1');
        }

        return view('onboarding.step2', compact('employee'));
    }

    public function storeStep2(Request $request)
    {
        $request->validate([
            'degree' => 'required',
            'institute' => 'required',
        ]);

        $employee = Employee::where('email', Auth::user()->email)->first();

        Education::create([
            'employee_id' => $employee->id,
            'degree' => $request->degree,
            'institute' => $request->institute,
        ]);

        $employee->update(['current_step' => 3]);

        return redirect('/onboarding/step-3');
    }

    // Step 3
    public function step3()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();

        if ($employee->current_step < 3) {
            return redirect('/onboarding/step-2');
        }

        return view('onboarding.step3', compact('employee'));
    }

    public function storeStep3(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'position' => 'required',
        ]);

        $employee = Employee::where('email', Auth::user()->email)->first();

        Experience::create([
            'employee_id' => $employee->id,
            'company' => $request->company,
            'position' => $request->position,
        ]);

        $employee->update([
            'is_completed' => 1,
            'current_step' => 3
        ]);

        return redirect('/dashboard')->with('success', 'Onboarding Complete!');
    }
}