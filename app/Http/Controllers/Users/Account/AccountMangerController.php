<?php

namespace App\Http\Controllers\Users\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountMangerController extends Controller
{
    public function show()
    {
        // Lấy ID của người dùng đã đăng nhập
        $userId = auth()->user()->account_id;

        // Lấy thông tin tài khoản từ bảng "accounts" dựa trên ID
        $user = Account::find($userId);

        return view('users.page.account.manager-account', compact('user'));
    }

    public function updateImage(Request $request)
    {

        // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay chưa
        if ($request->hasFile('image')) {
            // Lưu hình ảnh mới vào thư mục lưu trữ (ví dụ: public/uploads/users)
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/uploads/users', $imageName);
            // Cập nhật tên file hình ảnh trong cơ sở dữ liệu
            $user = Auth::user(); // Lấy thông tin người dùng đã xác thực
            $user->image = $imageName;
            $user->save();
        }

        return redirect()->route('account.show');
    }
}