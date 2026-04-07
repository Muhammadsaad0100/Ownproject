@extends('layouts.onboarding')

@section('content')

<div class="card shadow p-4">
    <h3 class="mb-3">Step 1: Basic Information</h3>

    <!-- Progress -->
    <div class="progress mb-4">
        <div class="progress-bar bg-primary" style="width: 33%"></div>
    </div>

    <!-- Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="/onboarding/step-1">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>

        <button class="btn btn-primary w-100">Next Step →</button>
    </form>
</div>

@endsection