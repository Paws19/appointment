<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Staff Login — Mater Dei Academy</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/stafflogin.css') }}" />
</head>

<body>

    <!-- LEFT PANEL -->
    <div class="left-panel">
        <div class="geo-circle-1"></div>
        <div class="geo-circle-2"></div>
        <div class="geo-circle-3"></div>
        <div class="geo-line"></div>

        <div class="left-top">
            <div class="crest">
                <img src="{{ asset('img/logo.png') }}" alt="MDA Crest">
            </div>

            <div class="school-full-name">
                Mater Dei Academy<br>Tagaytay Incorporated
            </div>

            <div class="school-tagline">
                Excellence · Faith · Service
            </div>
        </div>

        <div class="left-middle">
            <span class="quote-mark">"</span>
            <div class="quote-text">
                Life isn’t about finding yourself. Life is about creating yourself </div>
            <div class="quote-author">
                — George Bernard Shaw
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
        <div class="form-card">
            <div class="form-header">
                <div class="form-title">Staff Sign In</div>
                <div class="form-subtitle">Enter your credentials to continue</div>
            </div>
            <div class="accent-line"></div>

            <div class="field">
                <label for="empid">Email</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <input type="text" id="empid" placeholder="e.g. r.c@mda.edu.ph" />
                </div>
            </div>

            <div class="field">
                <label for="pass">Password</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <input type="password" id="pass" placeholder="Enter your password" />
                    <button class="eye-btn" onclick="togglePw()" aria-label="Show/hide password">
                        <svg id="eyeShow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        <svg id="eyeHide" style="display:none" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                            <line x1="1" y1="1" x2="23" y2="23" />
                        </svg>
                    </button>
                </div>
            </div>



            <button class="btn-signin" id="signInBtn" onclick="doLogin()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" y1="12" x2="3" y2="12" />
                </svg>
                Sign In
            </button>

            <div class="secure-note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
                <span>Secure · Authorized personnel only</span>
            </div>
        </div>

        <div class="gold-strip"></div>
    </div>

    <script>
        function togglePw() {
            const pw = document.getElementById('pass');
            const show = document.getElementById('eyeShow');
            const hide = document.getElementById('eyeHide');
            if (pw.type === 'password') {
                pw.type = 'text';
                show.style.display = 'none';
                hide.style.display = 'block';
            } else {
                pw.type = 'password';
                show.style.display = 'block';
                hide.style.display = 'none';
            }
        }

        function doLogin() {
            const id = document.getElementById('empid').value.trim();
            const pw = document.getElementById('pass').value.trim();
            const btn = document.getElementById('signInBtn');

            if (!id || !pw) {
                btn.style.background = 'linear-gradient(135deg,#b91c1c,#dc2626)';
                btn.innerHTML =
                    `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg> Please fill in all fields`;
                setTimeout(() => {
                    btn.style.background = '';
                    btn.innerHTML =
                        `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg> Sign In`;
                }, 2200);
                return;
            }

            btn.disabled = true;
            btn.innerHTML =
                `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px;animation:spin 0.8s linear infinite"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg> Signing in…`;

            setTimeout(() => {
                btn.style.background = 'linear-gradient(135deg,#166534,#16a34a)';
                btn.innerHTML =
                    `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:17px;height:17px"><polyline points="20 6 9 17 4 12"/></svg> Welcome!`;
            }, 1600);
        }
    </script>
</body>

</html>
