<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>School Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f0f4fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 20px;
            padding: 48px 44px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 4px 24px rgba(29, 53, 119, 0.10);
        }

        /* Logo */
        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 32px;
            gap: 12px;
        }

        .logo-icon {
            width: 72px;
            height: 72px;
            background: #1d3577;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 38px;
            height: 38px;
        }

        .school-name {
            font-size: 20px;
            font-weight: 700;
            color: #1d3577;
            text-align: center;
        }

        .school-sub {
            font-size: 13px;
            color: #8a97b0;
            text-align: center;
            margin-top: 2px;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: #e8edf5;
            margin-bottom: 28px;
        }

        .form-heading {
            font-size: 17px;
            font-weight: 700;
            color: #1a2540;
            margin-bottom: 6px;
        }

        .form-hint {
            font-size: 13px;
            color: #8a97b0;
            margin-bottom: 24px;
        }

        /* Fields */
        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #3a4a6b;
            margin-bottom: 7px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg.field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: #b0bdd4;
            pointer-events: none;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border: 1.5px solid #dde3f0;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: #1a2540;
            background: #f8fafd;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #1d3577;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(29, 53, 119, 0.08);
        }

        input::placeholder {
            color: #b0bdd4;
        }

        .eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #b0bdd4;
            display: flex;
            align-items: center;
            padding: 2px;
            transition: color 0.2s;
        }

        .eye-btn:hover {
            color: #1d3577;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            cursor: pointer;
            font-size: 13px;
            color: #5a6a8a;
        }

        .remember input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #1d3577;
            cursor: pointer;
        }

        .forgot {
            font-size: 13px;
            color: #1d3577;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 13px;
            background: #1d3577;
            border: none;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        .btn:hover {
            background: #162a5e;
        }

        .btn:active {
            transform: scale(0.99);
        }

        .footer {
            margin-top: 28px;
            text-align: center;
            font-size: 12px;
            color: #b0bdd4;
        }
    </style>
</head>

<body>

    <div class="card">
        <!-- Logo -->
        <div class="logo">
            <div class="logo-icon">
                <!-- School/graduation cap icon -->
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 100px; width: 100px;">
            </div>
            <div>
                <div class="school-name">Mater Dei Academy of Tagaytay Incorporated</div>
                <div class="school-sub">Admin Portal</div>
            </div>
        </div>

        <div class="divider"></div>



        <!-- Form -->
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            @if (session('error'))
                <div style="color:red; margin-bottom:10px;">
                    {{ session('error') }}
                </div>
            @endif
            <div class="field">
                <label for="email">Email Address</label>
                <div class="input-wrap">
                    <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                    <input type="email" id="email" name="email" placeholder="admin@school.edu"
                        autocomplete="email" />
                </div>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <input type="password" id="password" name="password" placeholder="••••••••"
                        autocomplete="current-password" />
                    <button class="eye-btn" type="button" onclick="togglePw()">
                        <svg id="eyeIco" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            width="16" height="16">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
            </div>
            <button class="btn" type="submit">Sign In</button>
        </form>

        <div class="row">

        </div>



        <div class="footer">© 2026 Mater Dei Academy of Tagaytay Incorporated · All rights reserved</div>
    </div>

    <script>
        function togglePw() {
            const input = document.getElementById('password');
            const ico = document.getElementById('eyeIco');
            if (input.type === 'password') {
                input.type = 'text';
                ico.innerHTML =
                    `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;
            } else {
                input.type = 'password';
                ico.innerHTML = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
            }
        }

        function handleLogin(btn) {
            btn.textContent = 'Signing in…';
            btn.disabled = true;
            setTimeout(() => {
                btn.textContent = 'Sign In';
                btn.disabled = false;
            }, 2000);
        }
    </script>
</body>

</html>
