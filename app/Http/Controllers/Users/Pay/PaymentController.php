<?php

namespace App\Http\Controllers\Users\Pay;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function process(){
        return view('pay');
        
    }
    public function processPayment(Request $request )
    {
        

        
        $data = [
            'amount' => $request->amount,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        $response = Http::post('https://sandbox.viettel.vn/PaymentV4/payments', $data);

        if ($response->successful()) {
            // Xử lý thanh toán thành công
            return redirect()->back()->with('success', 'Thanh toán thành công');
        } else {
            // Xử lý thanh toán thất bại
            return redirect()->back()->with('error', 'Thanh toán thấtbại, vui lòng thử lại sau.');
        }
    }
    
    public function success(Request $request)
    {
        // Lấy thông tin của đơn hàng từ session
        $order = session('order');
    
        // Kiểm tra mã đơn hàng và số tiền thanh toán
        if ($request->vpc_TxnResponseCode == '0' && $request->vpc_Amount == $order->amount) {
            // Thanh toán thành công
            // Cập nhật trạng thái thanh toán của đơn hàng trong cơ sở dữ liệu
            $order->status = 'paid';
            $order->save();
    
            // Hiển thị thông tin đơn hàng cho khách hàng
            return view('payment.success', compact('order'));
        } else {
            // Xử lý thanh toán thất bại
            return redirect()->back()->with('error', 'Thanh toán thất bại, vui lòng thử lại sau.');
        }
    }
}    
