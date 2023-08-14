@extends('admin.layout.app')

@section('content')
<div  class="container">
    <div style="background-color:#fff "class="row">
        <h1 class="mt-4 mb-4" style="font-size:20px">Account Details : {{$account->username}}</h1>
        <div class="col-md-3">
            <img style="max-width: 100%;" src="{{ asset('storage/' . $account->image) }}" alt="Account Image">
        </div>
        <div class="col-md-9">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $account->account_id }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $account->username }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $account->email }}</td>
                </tr>
                <tr>
                    <th>Account Date</th>
                    <td>{{ $account->account_date }}</td>
                </tr>
                <tr>
                    <th>Account Update</th>
                    <td>{{ $account->account_update }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $account->status }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between">
                <form style="padding-bottom:23px" action="{{ route('accounts.destroy', $account->account_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
