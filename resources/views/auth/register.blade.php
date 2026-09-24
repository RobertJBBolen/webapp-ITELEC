<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Modern, offline styling replacing Tailwind */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #129EA4;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: min-content;
            height: 100vh;
            padding: 16px;
        }

        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 4px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 550px;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            font-weight: 800;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 32px;
        }

        .error-box {
            margin-bottom: 16px;
            text-align: left;
            padding: 12px;
            background-color: #fee2e2;
            color: #b91c1c;
            font-size: 14px;
            border-radius: 4px;
        }
        .error-box ul { list-style-type: none; }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .name-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 480px) {
            .name-row { grid-template-columns: 1fr; }
        }

        input {
            width: 100%;
            padding: 10px 16px;
            border: 2px solid #000000;
            border-radius: 8px;
            font-size: 16px;
            color: #374151;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #129EA4;
        }

        button {
            width: 100%;
            background-color: #129EA4;
            color: #ffffff;
            font-weight: bold;
            padding: 12px 16px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #0f858a;
        }

        .footer-text {
            font-size: 12px;
            color: #9ca3af;
            line-height: 1.6;
            padding: 0 16px;
        }

        .footer-text a {
            color: #9ca3af;
            text-decoration: underline;
        }
        .footer-text a:hover { color: #4b5563; }

        .login-link-container {
            margin-top: 12px;
        }

        .login-link {
            font-size: 14px;
            font-weight: bold;
            color: #000000;
            text-decoration: none;
        }
        .login-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Sign In</h2>

        @if ($errors && $errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf 

            <div class="name-row">
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
            </div>

            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>

            <div>
                <input type="password" name="password" placeholder="Password">
            </div>

            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm password">
            </div>

            <button type="submit">Create account</button>

            <p class="footer-text">
                Signing up for an account means you agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>.
            </p>

            <div class="login-link-container">
                <a href="#" class="login-link">Have an account? Log in here</a>
            </div>
        </form>
    </div>

</body>
</html>
