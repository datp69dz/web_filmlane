@extends('admin.layout.app')

@section('content')
<div style="margin: 0px 25px; padding-top: 20px; background-color: #fff">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->account_id }}</td>
                    <td>
                        @if($account->image)
                            <img style="width:60px; height:60px" src="{{ asset('storage/' . $account->image) }}" alt="Account Image">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->email }}</td>
                    <td>
                        <a href="{{ route('accounts.show', $account->account_id) }}" class="btn btn-info">View</a>
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

    <!-- Hiển thị liên kết phân trang -->
    <div class="pagination">
        @if ($currentPage > 1)
            <a href="{{ route('accounts.index', ['page' => $currentPage - 1]) }}">Previous</a>
        @endif

        @for ($i = 1; $i <= $lastPage; $i++)
            @if ($i == $currentPage)
                <span>{{ $i }}</span>
            @else
                <a href="{{ route('accounts.index', ['page' => $i]) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($currentPage < $lastPage)
            <a href="{{ route('accounts.index', ['page' => $currentPage + 1]) }}">Next</a>
        @endif
    </div>
    <style>
        .pagination {
            margin-top: 20px;
            padding-right:25px;
            padding-bottom:15px;
            display: flex;
            justify-content: right;
            align-items: right;
        }
    
        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 6px 12px;
            border: 1px solid #ddd;
            margin: 0 4px;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
        }
    
        .pagination a:hover {
            background-color: #f4f4f4;
        }
    
        .pagination span.current {
            background-color: #007bff;
            color: #fff;
        }
    
        .pagination .disabled {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
    
</div>
@endsection
