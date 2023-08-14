<?php
// app/Http/Controllers/Admin/PaymentController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10; // Số lượng item trên mỗi trang
        $currentPage = $request->get('page', 1); // Trang hiện tại, mặc định là trang 1

        $payments = Payment::skip(($currentPage - 1) * $perPage)
            ->take($perPage)
            ->get();

        $totalPayments = Payment::count();

        $lastPage = ceil($totalPayments / $perPage);

        return view('admin.page.payment_page.index', compact('payments', 'currentPage', 'lastPage'));
    }

public function destroy(Payment $payment)
    {
        $account = $payment->account; // Lấy tài khoản liên quan đến thanh toán

        // Xóa thanh toán
        $payment->delete();

        return redirect()->route('accounts.show', $account->account_id)
            ->with('success', 'Payment deleted successfully');
    }
}
