<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vnpay_php/assets/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('vnpay_php/assets/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('vnpay_php/assets/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    <?php
    use App\Models\Payment;
    use Illuminate\Support\Facades\Mail;
    $vnp_TmnCode = '9V8AHBUI'; //Website ID in VNPAY System
    $vnp_HashSecret = 'TWGINPSOYKRXCHSFNVJWIMKIIORPVFNZ'; //Secret key
    $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
    $vnp_Returnurl = 'http://localhost/vnpay_php/vnpay_return.php';
    $vnp_apiUrl = 'http://sandbox.vnpayment.vn/merchant_webapi/merchant.html';
    //Config input format
    //Expire
    $startTime = date('YmdHis');
    $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
    $vnp_SecureHash = request()->get('vnp_SecureHash');
    $inputData = [];
    foreach (request()->all() as $key => $value) {
        if (substr($key, 0, 4) == 'vnp_') {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = '';
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . '=' . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . '=' . urlencode($value);
            $i = 1;
        }
    }
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    
    // Build the form data
    $formData = [
        'vnp_Version' => '2',
        'vnp_TmnCode' => $vnp_TmnCode,
        'vnp_Amount' => $_GET['vnp_Amount'],
        'vnp_Command' => 'pay',
        'vnp_CreateDate' => $startTime,
        'vnp_CurrCode' => 'VND',
        'vnp_IpAddr' => $_SERVER['REMOTE_ADDR'],
        'vnp_Locale' => 'vn',
        'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
        'vnp_ReturnUrl' => $vnp_Returnurl,
        'vnp_TxnRef' => $_GET['vnp_TxnRef'],
        'vnp_Merchant' => '',
        'vnp_TxnType' => 'pay',
        'vnp_Version' => '2.0.0',
        'vnp_BankCode' => $_GET['vnp_BankCode'],
        'vnp_ExpireDate' => $expire,
    ];
    
    ksort($formData);
    $i = 0;
    $hashData = '';
    foreach ($formData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . '=' . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . '=' . urlencode($value);
            $i = 1;
        }
    }
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    
    // Add secure hash to the form data
    $formData['vnp_SecureHashType'] = 'SHA512';
    $formData['vnp_SecureHash'] = $secureHash;
    
    // Build the form HTML
    $formHtml = '<form method="post" action="' . $vnp_Url . '">';
    foreach ($formData as $key => $value) {
        $formHtml .= '<input type="hidden" name="' . $key . '" value="' . $value . '">';
    }
    $formHtml .= '<input type="submit" value="Thanh toán">';
    $formHtml .= '</form>';
    
    // Display the form HTML
    echo $formHtml;
    //Build URL for redirect
    $vnp_Url .= '?' . $hashData . '&vnp_SecureHashType=SHA512&vnp_SecureHash=' . $secureHash;


    ?>

    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label><?php echo $_GET['vnp_TxnRef']; ?></label>
            </div>
            <div class="form-group">
                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount']; ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo']; ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode']; ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo $_GET['vnp_PayDate']; ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        echo "<span style='color:blue'>GD Thanh cong</span>";
                        // Save payment information to the payments table
                        $payment = new Payment();
                        $payment->account_id = Auth::id();
                        $payment->account_money = $_GET['vnp_Amount'];
                        $payment->payment_date = now();
                        $payment->payment_update = now();
                        $payment->trading_code = $_GET['vnp_TransactionNo']; // Call the function to generate the trading code
                    
                        $payment->status = 1;
                    
                        $payment->save();

                        
                        Mail::send('mail', [], function ($message) {
                            $message->to('datp012055@gmail.com', 'Recipient Name')
                                    ->subject('Notification: Successful Payment - Premium Account Upgrade');
                        });
                        
                        
                
                        return "Email sent successfully";
                    } else {
                        echo "<span style='color:red'>GD Khong thanh cong</span>";
                        // Save payment information to the payments table
                        $payment = new Payment();
                        $payment->account_id = Auth::id();
                        $payment->account_money = $_GET['vnp_Amount'];
                        $payment->payment_date = now();
                        $payment->payment_update = now();
                        $payment->trading_code = '12'; // Call the function to generate the trading code
                    
                        $payment->status = 2;
                        $payment->save();
                    }
                    
                    ?>
                </label>
            </div>
            <div class="form-group">
                <a href="<?php echo $vnp_Url; ?>" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>

</html>
