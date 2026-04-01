@extends('layouts.app')

@section('title', __('User Detail'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('User') }}</h3>
                <p class="text-subtitle text-muted">{{ __('Detail user information.') }}</p>
            </div>

            <x-breadcrumb>
                <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('User') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Detail') }}</li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">{{ $user->name }}</h5>

                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Email') }}</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Date of Joining') }}</th>
                                <td>{{ $user->date_of_joining->format('Y-m-d') }}</td>
                            </tr>
                        </table>

                        <div class="text-center mt-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection