<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function dashboard()
    {
        $userCount = User::where('status', 1)->count();
        $departmentsCount = Department::count();
        return view('dashboard', compact('userCount', 'departmentsCount'));
    }

public function index()
{
    
    $users = User::select('id', 'name', 'email', 'date_of_joining')
                 
                 ->where('status', 1)
                 ->get();

    return view('users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $user = new User(); 
    return view('users.create', compact('user'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'date_of_joining' => 'required|date',
        
    ]);

    // Create user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'date_of_joining' => $request->date_of_joining,

        'status' => 1, // default active
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $user = User::find($id);
    return view('users.edit', compact('user'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:6|confirmed',
            'date_of_joining' => 'required|date',
            
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'date_of_joining' => $request->date_of_joining,
           
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
