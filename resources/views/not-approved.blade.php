@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Not Approved') }}</div>

                    <div class="card-body">
                        @cannot('approve',auth()->user())
                            {{ __("You need approval from admin!") }}
                        @else
                            <script>window.location = "{{ route('home') }}";</script>
                        @endcannot
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
