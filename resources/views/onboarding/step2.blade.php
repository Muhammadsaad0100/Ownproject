@extends('layouts.onboarding')

@section('content')
<div class="card shadow p-4">
    <h3 class="mb-3">Step 2: Education Details</h3>

    <form method="POST" action="/onboarding/step-2">
        @csrf
        <div class="mb-3">
            <label>Degree</label>
            <input type="text" name="degree" class="form-control">
        </div>

        <div class="mb-3">
            <label>Institute</label>
            <input type="text" name="institute" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Next Step →</button>
    </form>
</div>
@endsection