<!-- resources/views/movies/index.blade.php -->
@extends('admin.layout.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Bootstrap Table with Header - Light -->
<a href="{{ route('admin-accounts.create') }}" class="btn btn-primary">Thêm tài khoản</a>
<div class="card">
  <h5 class="card-header">Manager movies</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Ngày tạo</th>
          <th>Ngày cập nhật</th>
          <th>Thao tác</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        @foreach ($adminAccounts as $adminAccount)

        <tr>
          <td>{{ $adminAccount->username }}</td>
                        <td>{{ $adminAccount->email }}</td>
                        <td>{{ $adminAccount->admin_date }}</td>
                        <td>{{ $adminAccount->admin_update }}</td>
                        <td>
                        <a href="{{ route('admin-accounts.show', $adminAccount->admin_id) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('admin-accounts.edit', $adminAccount->admin_id) }}" class="btn btn-warning">Chỉnh sửa</a>
                        <form action="{{ route('admin-accounts.destroy', $adminAccount->admin_id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa</button>
                        </form>
                     </td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="buy-now">
    <a
      href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
      target="_blank"
      class="btn btn-danger btn-buy-now"
      >Create New Movie</a
    >
  </div></div>

@endsection
