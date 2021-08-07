@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users List') }}</div>

                    <div class="card-body">
                        @if(session('approve'))
                            <div class="alert alert-success">{{ session('approve') }}</div>
                        @endif

                        @if(session('delete'))
                            <div class="alert alert-danger">{{ session('delete') }}</div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Approve</th>
                                <th>Delete User</th>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        <u class="{{ $user->admin ? "btn-outline-success" : "btn-outline-danger" }}">
                                            {{ $user->admin ? "Yes" : "No" }}
                                        </u>
                                    </td>
                                    <td>
                                        <a class="btn {{ $user->approve ? "btn-outline-success" : "btn-outline-danger" }}"
                                           href="{{ route('admin.user.approve',['id' => $user->id]) }}">
                                            {{ $user->approve ? "Yes" : "No" }}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.user.delete',['id' => $user->id]) }}"
                                              method="POST">
                                            <input class="btn btn-outline-warninglt" type="submit" value="Delete"/>

                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{ $users->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
