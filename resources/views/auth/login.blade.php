<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        /* Base Styling & Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            /* Vignette effect matching the gradient backdrop of your image */
            background: radial-gradient(circle, #25cdd4 0%, #0d7075 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 16px;
        }

        .card {
            background-color: #ffffff;
            padding: 50px 40px;
            border-radius: 24px; /* More rounded borders matching your visual */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            font-size: 36px;
            font-weight: 800;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            margin-bottom: 24px;
        }

        input {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #000000;
            border-radius: 14px; /* Distinct rounded pill look from image */
            font-size: 16px;
            color: #374151;
            outline: none;
            transition: border-color 0.2s;
        }

        input::placeholder {
            color: #cbcbcb; /* Subtle placeholder gray */
        }

        input:focus {
            border-color: #129EA4;
        }

        .forgot-password-container {
            text-align: left;
            padding-left: 10px;
            margin-top: -12px;
            margin-bottom: 30px;
        }

        .forgot-password {
            font-size: 13px;
            color: #cbcbcb;
            text-decoration: none;
        }

        .forgot-password:hover {
            color: #a3a3a3;
            text-decoration: underline;
        }

        button {
            width: 100%;
            background-color: #129EA4;
            color: #ffffff;
            font-weight: bold;
            padding: 14px 16px;
            border: none;
            border-radius: 4px; /* Noticeably sharper square button layout */
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #0f858a;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Log In</h2>

        <!-- Form action leaves blank for now since it does not need to process yet -->
        <form onsubmit="event.preventDefault();">
            
            <!-- Username/Email Field -->
            <div class="input-group">
                <input type="text" name="username" placeholder="Username">
            </div>

            <!-- Password Field -->
            <div class="input-group">
                <input type="password" name="password" placeholder="Password">
            </div>

            <!-- Forgot Password Helper Text -->
            <div class="forgot-password-container">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <!-- Action Button -->
            <button type="submit">Log In</button>
            
        </form>
    </div>

</body>
</html>
