<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Account Activation</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #212529;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: 1px solid #e9ecef;
            text-align: center;
        }
        .btn {
            display: inline-block;
            background-color: #0d6efd;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            margin: 25px 0;
        }
        .text-muted {
            color: #6c757d;
            font-size: 13px;
            margin-top: 30px;
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="card">
        <h2 style="margin-top: 0; color: #212529;">Welcome to Busly!</h2>

        <p style="text-align: left;">Hi {{ $user->first_name }},</p>

        <p style="text-align: left;">
            Thank you for signing up. Please activate your account by clicking the button below:
        </p>

        <a href="{{ route('register.activate', ['token' => $user->activation_code]) }}" class="btn">
            Activate Account
        </a>

        <p class="text-muted">
            If you did not create an account, no further action is required.
        </p>
    </div>
</div>
</body>
</html>
