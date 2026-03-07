<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>School Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('logo/mdalogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
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
                    <input type="email" id="email" name="email" placeholder="admin@school.edu.ph"
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
