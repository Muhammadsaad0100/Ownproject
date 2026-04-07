@extends('layouts.onboarding')

@section('content')
<div class="card shadow p-4">
    <h3 class="mb-3">Step 3: Experience Details</h3>

    <form method="POST" action="/onboarding/step-3">
        @csrf
        <div class="mb-3">
            <label>Company</label>
            <input type="text" name="company" class="form-control">
        </div>

        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Finish →</button>
    </form>
</div>
@endsection