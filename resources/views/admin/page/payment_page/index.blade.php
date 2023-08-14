{{-- resources/views/admin/page/payment_page/index.blade.php --}}

@extends('admin.layout.app')

@section('content')

<div style="margin: padding-top: 20px; background-color: #fff;margin:0 26px" >


    <table class="table">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Ãccount Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Update</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ 1+1 }}</td>
                    <td>{{ $payment->payment_id }}</td>
                    <td>{{ $payment->account->username }}</td>
                    <td>{{ $payment->account_money }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->payment_update }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>
                        <form action="{{ route('payments.destroy', $payment->payment_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        @if ($currentPage > 1)
            <a href="{{ route('payments.index', ['page' => $currentPage - 1]) }}">Previous</a>
        @endif

        @for ($i = 1; $i <= $lastPage; $i++)
            @if ($i == $currentPage)
                <span>{{ $i }}</span>
            @else
                <a href="{{ route('payments.index', ['page' => $i]) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($currentPage < $lastPage)
            <a href="{{ route('payments.index', ['page' => $currentPage + 1]) }}">Next</a>
        @endif
    </div>
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

@endsection
