<!-- resources/views/movies/index.blade.php -->
@extends('admin.layout.app')
@section('content')
<!-- resources/views/admins/index.blade.php -->

@extends('layouts.app')

@section('content')
<!-- resources/views/accounts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Account List</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Create Account</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->account_id }}</td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->email }}</td>
                    <td>
                        <a href="{{ route('accounts.show', $account->account_id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('accounts.edit', $account->account_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('accounts.destroy', $account->account_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@endsection
