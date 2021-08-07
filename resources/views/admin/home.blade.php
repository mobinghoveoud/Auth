@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin page') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welcome!') }}

                        <br><br>

                        <a href="{{ route('admin.users') }}" class="badge badge-pill">
                            <h5>Users List</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
