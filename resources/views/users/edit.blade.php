@extends('layouts.app')

@section('content')

<div class="nxl-container">
    <div class="nxl-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h5>Employee Edit</h5>
            </div>
        </div>

        <!-- FORM -->
        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('users.include.form')

                   <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-light">
                    Back
                    </a>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
                </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection