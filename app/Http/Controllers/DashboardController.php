<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard()
    {
        $userCount = User::where('status', 1)->count();
        $departmentsCount = Department::count();
        return view('dashboard', compact('userCount', 'departmentsCount'));
    }
}
