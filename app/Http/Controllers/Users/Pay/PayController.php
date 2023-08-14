<?php

namespace App\Http\Controllers\Users\Pay;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Payment;

class PayController extends Controller
{
    public function getpay()
    {
        return view('users/page/pay/pays');

    }
    public function display()
    {
        return view('users/page/pay/display');

    }
    public function postpay(Request $request)
    {

        if (!Auth::check()) {
            // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('pay.index')->with('error', 'Please login to continue ');
        }



        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_TmnCode = "9V8AHBUI"; //Website ID in VNPAY System
        $vnp_HashSecret = "TWGINPSOYKRXCHSFNVJWIMKIIORPVFNZ"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/display";
        $vnp_apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));



        $vnp_TxnRef = rand(00, 99999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = 'usd';
        $vnp_BankCode = '';
        $vnp_IpAddr = request()->ip();
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $vnp_Bill_Mobile = request()->input('txt_billing_mobile');
        $vnp_Bill_Email = request()->input('txt_billing_email');
        $fullName = trim(request()->input('txt_billing_fullname'));
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = request()->input('txt_inv_addr1');
        $vnp_Bill_City = request()->input('txt_bill_city');
        $vnp_Bill_Country = request()->input('txt_bill_country');
        $vnp_Bill_State = request()->input('txt_bill_state');
        // Invoice
        $vnp_Inv_Phone = request()->input('txt_inv_mobile');
        $vnp_Inv_Email = request()->input('txt_inv_email');
        $vnp_Inv_Customer = request()->input('txt_inv_customer');
        $vnp_Inv_Address = request()->input('txt_inv_addr1');
        $vnp_Inv_Company = request()->input('txt_inv_company');
        $vnp_Inv_Taxcode = request()->input('txt_inv_taxcode');
        $vnp_Inv_Type = request()->input('cbo_inv_type');

        // Tạo mảng dữ liệu đầu vào
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "USD",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        if (isset($_POST['redirect'])) {
            return redirect($vnp_Url);
        } else {
            $returnData = [
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            ];
            return Response::json($returnData);

        }





    }
}