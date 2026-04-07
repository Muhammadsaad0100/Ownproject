@extends('layouts.app')

@section('content')

<div class="nxl-container">
    <div class="nxl-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h5>Create Employee</h5>
            </div>
        </div>

        <!-- FORM CARD -->
        <div class="card">
            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    @include('users.include.form')

                   
                       <div class="d-flex justify-content-end gap-2">
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
                    

                </form>

            </div>
        </div>

    </div>
</div>

@endsection