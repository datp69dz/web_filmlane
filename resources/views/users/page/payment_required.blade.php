<!DOCTYPE html>
<html>
<head>
    <title>Payment Required</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .payment-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Payment Required</h1>
        <p>You need to <a href="{{ route('get_login') }}">log in</a> and make a payment to watch this movie.</p>
    </div>
</body>
</html>