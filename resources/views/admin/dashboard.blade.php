<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Greenfield Academy – Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --navy: #1d3577;
            --navy-d: #142455;
            --navy-l: #2a4a9f;
            --bg: #f0f4fb;
            --white: #fff;
            --border: #dde3f0;
            --text: #1a2540;
            --muted: #8a97b0;
            --light: #e8edf5;
            --green: #16a34a;
            --red: #dc2626;
            --amber: #d97706;
            --sky: #0369a1;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: var(--navy);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100
        }

        .sb-logo {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 12px
        }

        .sb-logo-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .sb-logo-icon svg {
            width: 22px;
            height: 22px
        }

        .sb-logo-text {
            font-size: 14px;
            font-weight: 800;
            color: #fff;
            line-height: 1.2
        }

        .sb-logo-sub {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.45);
            text-transform: uppercase;
            letter-spacing: 1px
        }

        .sb-nav {
            padding: 16px 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px
        }

        .sb-section {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.35);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 8px 8px 4px;
            margin-top: 8px
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.65);
            transition: all 0.15s;
            border: none;
            background: none;
            width: 100%;
            text-align: left
        }

        .nav-item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-weight: 600
        }

        .sb-footer {
            padding: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08)
        }

        .sb-user {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .sb-avatar {
            width: 34px;
            height: 34px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #fff
        }

        .sb-user-info {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.3
        }

        .sb-user-name {
            font-weight: 600;
            color: #fff;
            font-size: 13px
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50
        }

        .topbar-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--text)
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .badge-notif {
            background: var(--navy);
            color: #fff;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .content {
            padding: 28px;
            flex: 1
        }

        /* PAGE */
        .page {
            display: none
        }

        .page.active {
            display: block
        }

        /* CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px
        }

        .stat-card {
            background: var(--white);
            border-radius: 14px;
            padding: 20px;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .stat-icon svg {
            width: 20px;
            height: 20px
        }

        .stat-icon.blue {
            background: #eff6ff;
            color: var(--navy)
        }

        .stat-icon.green {
            background: #f0fdf4;
            color: var(--green)
        }

        .stat-icon.amber {
            background: #fffbeb;
            color: var(--amber)
        }

        .stat-icon.sky {
            background: #e0f2fe;
            color: var(--sky)
        }

        .stat-value {
            font-size: 26px;
            font-weight: 800;
            color: var(--text)
        }

        .stat-label {
            font-size: 12px;
            color: var(--muted);
            font-weight: 500
        }

        .stat-change {
            font-size: 11px;
            font-weight: 600
        }

        .stat-change.up {
            color: var(--green)
        }

        .stat-change.down {
            color: var(--red)
        }

        /* SECTION HEADER */
        .sec-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px
        }

        .sec-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text)
        }

        .btn-sm {
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.15s
        }

        .btn-primary {
            background: var(--navy);
            color: #fff
        }

        .btn-primary:hover {
            background: var(--navy-d)
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid var(--border);
            color: var(--text)
        }

        .btn-outline:hover {
            border-color: var(--navy);
            color: var(--navy)
        }

        /* TABLE */
        .table-wrap {
            background: var(--white);
            border-radius: 14px;
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 24px
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        thead {
            background: #f8fafd
        }

        th {
            padding: 12px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border)
        }

        td {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text);
            border-bottom: 1px solid #f0f4fb
        }

        tr:last-child td {
            border-bottom: none
        }

        tr:hover td {
            background: #fafbfe
        }

        .pill {
            display: inline-flex;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600
        }

        .pill.elem {
            background: #eff6ff;
            color: var(--navy)
        }

        .pill.jr {
            background: #f0fdf4;
            color: var(--green)
        }

        .pill.sr {
            background: #fffbeb;
            color: var(--amber)
        }

        .pill.active {
            background: #f0fdf4;
            color: var(--green)
        }

        .pill.inactive {
            background: #fef2f2;
            color: var(--red)
        }

        /* SCHEDULE GRID */
        .sched-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px
        }

        .sched-card {
            background: var(--white);
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 20px
        }

        .sched-card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px
        }

        .sched-card-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--text)
        }

        .count-big {
            font-size: 36px;
            font-weight: 800;
            color: var(--navy)
        }

        .count-label {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px
        }

        .progress-bar {
            height: 6px;
            background: var(--light);
            border-radius: 99px;
            margin-top: 12px;
            overflow: hidden
        }

        .progress-fill {
            height: 100%;
            border-radius: 99px;
            background: var(--navy);
            transition: width 0.4s
        }

        /* CREATE ACCOUNT FORM */
        .form-card {
            background: var(--white);
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 28px;
            margin-bottom: 24px
        }

        .form-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border)
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 6px
        }

        .form-field.full {
            grid-column: 1/-1
        }

        .form-field label {
            font-size: 12px;
            font-weight: 600;
            color: #3a4a6b
        }

        .form-field input,
        .form-field select {
            padding: 10px 14px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            color: var(--text);
            background: #f8fafd;
            outline: none;
            transition: all 0.15s
        }

        .form-field input:focus,
        .form-field select:focus {
            border-color: var(--navy);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(29, 53, 119, 0.08)
        }

        .form-field input::placeholder {
            color: #b0bdd4
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 22px;
            justify-content: flex-end
        }

        .btn-lg {
            padding: 11px 24px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all 0.15s
        }

        /* ACCOUNTS LIST */
        .account-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border-bottom: 1px solid #f0f4fb
        }

        .account-row:last-child {
            border-bottom: none
        }

        .acc-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0
        }

        .acc-info {
            flex: 1
        }

        .acc-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text)
        }

        .acc-email {
            font-size: 12px;
            color: var(--muted)
        }

        .acc-role {
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px
        }

        .role-registrar {
            background: #eff6ff;
            color: #1d4ed8
        }

        .role-cashier {
            background: #f0fdf4;
            color: #15803d
        }

        .role-guidance {
            background: #fdf4ff;
            color: #7e22ce
        }

        .role-elem {
            background: #fff7ed;
            color: #c2410c
        }

        .role-sr {
            background: #fef2f2;
            color: #b91c1c
        }

        .acc-actions {
            display: flex;
            gap: 6px
        }

        .icon-btn {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            border: 1.5px solid var(--border);
            background: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            transition: all 0.15s
        }

        .icon-btn:hover {
            border-color: var(--navy);
            color: var(--navy)
        }

        .icon-btn.del:hover {
            border-color: var(--red);
            color: var(--red)
        }

        /* MODAL */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            z-index: 200;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(3px)
        }

        .modal-overlay.open {
            display: flex
        }

        .modal {
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            width: 420px;
            max-width: 95vw;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            animation: fadeUp 0.2s ease both
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .modal-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 6px
        }

        .modal-sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 20px
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-end
        }

        /* TOAST */
        .toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--navy);
            color: #fff;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            z-index: 999;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            display: none;
            animation: slideIn 0.3s ease
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* RESPONSIVE */
        @media(max-width:900px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr
            }

            .sched-grid {
                grid-template-columns: 1fr 1fr
            }

            .form-grid {
                grid-template-columns: 1fr
            }
        }

        .logout-btn i {
            color: var(--red);
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <nav class="sidebar">
        <div class="sb-logo">
            <div class="sb-logo-icon">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width:50px;height:50px;">
            </div>
            <div>
                <div class="sb-logo-text">Mater Dei Academy</div>
                <div class="sb-logo-sub">Tagaytay Incorporated</div>
            </div>
        </div>

        <div class="sb-nav">
            <div class="sb-section">Main</div>
            <button class="nav-item active" onclick="showPage('dashboard',this)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="3" width="7" height="7" rx="1" />
                    <rect x="3" y="14" width="7" height="7" rx="1" />
                    <rect x="14" y="14" width="7" height="7" rx="1" />
                </svg>
                Dashboard
            </button>
            <button class="nav-item" onclick="showPage('schedules',this)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Schedules
            </button>
            <div class="sb-section">Management</div>
            <button class="nav-item" onclick="showPage('accounts',this)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                Staff Accounts
            </button>
            <button class="nav-item" onclick="showPage('create',this)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <line x1="19" y1="8" x2="19" y2="14" />
                    <line x1="22" y1="11" x2="16" y2="11" />
                </svg>
                Create Account
            </button>
        </div>

        <div class="sb-footer">
            <div class="sb-user" id="userDropdown">
                <div class="sb-avatar">{{ Auth::guard('admin')->user()->name[0] }}</div>
                <div class="sb-user-info">
                    <div class="sb-user-name">{{ Auth::guard('admin')->user()->name }}</div>
                    <div>{{ Auth::guard('admin')->user()->email }}</div>
                </div>
                <!-- Dropdown -->
                <div class="sb-logout-dropdown" id="logoutDropdown">
                    <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
                        @csrf
                        <button type="submit" class="sb-logout" id="logoutBtn">
                            <i class="bi bi-arrow-bar-left" style="font-size: 24px;"></i>
                            Logout
                        </button>
                    </form>
                </div>

                <script>
                    // Select the logout button
                    const logoutBtn = document.getElementById('logoutBtn');
                    const logoutForm = document.getElementById('logoutForm');

                    logoutBtn.addEventListener('click', function(e) {
                        e.preventDefault(); // prevent form from submitting immediately
                        const confirmed = confirm("Are you sure you want to logout?");
                        if (confirmed) {
                            logoutForm.submit();
                        }
                    });
                </script>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <div class="main">
        <div class="topbar">
            <div class="topbar-title" id="topbarTitle">Dashboard</div>
            <div class="topbar-right">
                <span style="font-size:12px;color:var(--muted)" id="curDate"></span>
                <div class="badge-notif">3</div>
            </div>
        </div>

        <div class="content">

            <!-- DASHBOARD PAGE -->
            <div class="page active" id="page-dashboard">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">1,248</div>
                                <div class="stat-label">Total Students</div>
                            </div>
                            <div class="stat-icon blue">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                        </div>
                        <div class="stat-change up">↑ 4.2% this month</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">86</div>
                                <div class="stat-label">Total Schedules</div>
                            </div>
                            <div class="stat-icon green">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </div>
                        </div>
                        <div class="stat-change up">↑ 2 new this week</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">54</div>
                                <div class="stat-label">Teaching Staff</div>
                            </div>
                            <div class="stat-icon amber">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                        </div>
                        <div class="stat-change up">↑ 1 new this month</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">12</div>
                                <div class="stat-label">Officer Accounts</div>
                            </div>
                            <div class="stat-icon sky">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                        </div>
                        <div class="stat-change down">— No change</div>
                    </div>
                </div>

                <!-- Schedule overview -->
                <div class="sec-header">
                    <div class="sec-title">Schedule Overview</div>
                    <button class="btn-sm btn-outline"
                        onclick="showPage('schedules', document.querySelector('[onclick*=schedules]'))">View
                        All</button>
                </div>
                <div class="sched-grid">
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Elementary</div>
                            <span class="pill elem">Elem</span>
                        </div>
                        <div class="count-big">34</div>
                        <div class="count-label">Active schedules</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:70%;background:#1d3577"></div>
                        </div>
                    </div>
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Junior High</div>
                            <span class="pill jr">JHS</span>
                        </div>
                        <div class="count-big">28</div>
                        <div class="count-label">Active schedules</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:56%;background:#16a34a"></div>
                        </div>
                    </div>
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Senior High</div>
                            <span class="pill sr">SHS</span>
                        </div>
                        <div class="count-big">24</div>
                        <div class="count-label">Active schedules</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:48%;background:#d97706"></div>
                        </div>
                    </div>
                </div>

                <!-- Recent staff -->
                <div class="sec-header">
                    <div class="sec-title">Recent Staff Accounts</div>
                    <button class="btn-sm btn-primary"
                        onclick="showPage('create', document.querySelector('[onclick*=create]'))">+ Create
                        Account</button>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Level</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="dashRecentBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- SCHEDULES PAGE -->
            <div class="page" id="page-schedules">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value" id="sc-total">86</div>
                                <div class="stat-label">Total Schedules</div>
                            </div>
                            <div class="stat-icon blue"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">34</div>
                                <div class="stat-label">Elementary</div>
                            </div>
                            <div class="stat-icon blue"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">28</div>
                                <div class="stat-label">Junior High</div>
                            </div>
                            <div class="stat-icon green"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">24</div>
                                <div class="stat-label">Senior High</div>
                            </div>
                            <div class="stat-icon amber"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></div>
                        </div>
                    </div>
                </div>

                <div class="sec-header">
                    <div class="sec-title">All Schedules</div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Level</th>
                                <th>Section</th>
                                <th>Days</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mathematics</td>
                                <td>Mr. Santos</td>
                                <td><span class="pill elem">Elem</span></td>
                                <td>Grade 5 – Rizal</td>
                                <td>Mon / Wed / Fri</td>
                                <td>7:30 – 8:30 AM</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>English</td>
                                <td>Ms. Reyes</td>
                                <td><span class="pill elem">Elem</span></td>
                                <td>Grade 4 – Mabini</td>
                                <td>Tue / Thu</td>
                                <td>8:30 – 10:00 AM</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Science</td>
                                <td>Mr. Cruz</td>
                                <td><span class="pill jr">JHS</span></td>
                                <td>Grade 7 – A</td>
                                <td>Mon / Wed / Fri</td>
                                <td>10:00 – 11:00 AM</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Filipino</td>
                                <td>Ms. Garcia</td>
                                <td><span class="pill jr">JHS</span></td>
                                <td>Grade 8 – B</td>
                                <td>Tue / Thu</td>
                                <td>1:00 – 2:30 PM</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>History</td>
                                <td>Mr. Dela Cruz</td>
                                <td><span class="pill sr">SHS</span></td>
                                <td>Grade 11 – STEM</td>
                                <td>Mon / Wed</td>
                                <td>2:30 – 4:00 PM</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Chemistry</td>
                                <td>Ms. Lopez</td>
                                <td><span class="pill sr">SHS</span></td>
                                <td>Grade 12 – STEM</td>
                                <td>Tue / Thu / Sat</td>
                                <td>7:30 – 9:00 AM</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>MAPEH</td>
                                <td>Mr. Torres</td>
                                <td><span class="pill elem">Elem</span></td>
                                <td>Grade 6 – Luna</td>
                                <td>Fri</td>
                                <td>9:00 – 11:00 AM</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>TLE</td>
                                <td>Ms. Mendoza</td>
                                <td><span class="pill jr">JHS</span></td>
                                <td>Grade 9 – C</td>
                                <td>Mon / Thu</td>
                                <td>3:00 – 4:30 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- STAFF ACCOUNTS PAGE -->
            <div class="page" id="page-accounts">
                <div class="sec-header">
                    <div class="sec-title">Officer Staff Accounts</div>
                    <button class="btn-sm btn-primary"
                        onclick="showPage('create', document.querySelector('[onclick*=create]'))">+ Create
                        Account</button>
                </div>
                <div class="table-wrap">
                    <div id="accountsList"></div>
                </div>
            </div>

            <!-- CREATE ACCOUNT PAGE -->
            <div class="page" id="page-create">
                <div class="form-card">
                    <div class="form-title">Create Officer Staff Account</div>
                    <div class="form-grid">
                        <div class="form-field">
                            <label>First Name</label>
                            <input type="text" id="f-fname" placeholder="e.g. Maria" />
                        </div>
                        <div class="form-field">
                            <label>Last Name</label>
                            <input type="text" id="f-lname" placeholder="e.g. Santos" />
                        </div>
                        <div class="form-field full">
                            <label>Email Address</label>
                            <input type="email" id="f-email" placeholder="e.g. m.santos@greenfield.edu" />
                        </div>
                        <div class="form-field">
                            <label>Password</label>
                            <input type="password" id="f-pw" placeholder="Min. 8 characters" />
                        </div>
                        <div class="form-field">
                            <label>Confirm Password</label>
                            <input type="password" id="f-pw2" placeholder="Re-enter password" />
                        </div>
                        <div class="form-field">
                            <label>Role / Position</label>
                            <select id="f-role">
                                <option value="">— Select Role —</option>
                                <option value="Registrar">Registrar</option>
                                <option value="Cashier">Cashier</option>
                                <option value="Guidance Counselor">Guidance Counselor</option>
                                <option value="Elem Principal">Elementary Principal</option>
                                <option value="Sr Principal">Senior High Principal</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>Department / Level</label>
                            <select id="f-level">
                                <option value="">— Select Level —</option>
                                <option value="Elementary">Elementary</option>
                                <option value="Junior High">Junior High School</option>
                                <option value="Senior High">Senior High School</option>
                                <option value="All Levels">All Levels</option>
                            </select>
                        </div>
                    </div>

                    <!-- Role info box -->
                    <div id="roleInfo"
                        style="margin-top:18px;padding:14px 16px;background:#f0f4fb;border-radius:10px;border-left:4px solid var(--navy);font-size:13px;color:#3a4a6b;display:none">
                    </div>

                    <div class="form-actions">
                        <button class="btn-lg btn-outline" onclick="resetForm()">Clear</button>
                        <button class="btn-lg btn-primary" onclick="createAccount()">Create Account</button>
                    </div>
                </div>

                <!-- Role Reference -->
                <div class="form-card">
                    <div class="form-title">Role Reference Guide</div>
                    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:12px">
                        <div style="padding:14px;background:#f8fafd;border-radius:10px;border:1px solid var(--border)">
                            <div style="font-size:12px;font-weight:700;color:#1d4ed8;margin-bottom:6px">📋 Registrar
                            </div>
                            <div style="font-size:12px;color:var(--muted)">Manages student records, enrollment, and
                                official documents.</div>
                        </div>
                        <div style="padding:14px;background:#f8fafd;border-radius:10px;border:1px solid var(--border)">
                            <div style="font-size:12px;font-weight:700;color:#15803d;margin-bottom:6px">💰 Cashier
                            </div>
                            <div style="font-size:12px;color:var(--muted)">Handles tuition fees, receipts, and
                                financial transactions.</div>
                        </div>
                        <div style="padding:14px;background:#f8fafd;border-radius:10px;border:1px solid var(--border)">
                            <div style="font-size:12px;font-weight:700;color:#7e22ce;margin-bottom:6px">🧠 Guidance
                                Counselor</div>
                            <div style="font-size:12px;color:var(--muted)">Provides student support, counseling, and
                                academic advising.</div>
                        </div>
                        <div style="padding:14px;background:#f8fafd;border-radius:10px;border:1px solid var(--border)">
                            <div style="font-size:12px;font-weight:700;color:#c2410c;margin-bottom:6px">🏫 Elem
                                Principal</div>
                            <div style="font-size:12px;color:var(--muted)">Oversees elementary school operations and
                                staff.</div>
                        </div>
                        <div style="padding:14px;background:#f8fafd;border-radius:10px;border:1px solid var(--border)">
                            <div style="font-size:12px;font-weight:700;color:#b91c1c;margin-bottom:6px">🎓 Sr Principal
                            </div>
                            <div style="font-size:12px;color:var(--muted)">Leads senior high school administration and
                                curriculum.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /content -->
    </div><!-- /main -->

    <!-- DELETE CONFIRM MODAL -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <div class="modal-title">Delete Account</div>
            <div class="modal-sub" id="deleteModalSub">Are you sure you want to delete this account? This action
                cannot be undone.</div>
            <div class="modal-actions">
                <button class="btn-lg btn-outline" onclick="closeModal()">Cancel</button>
                <button class="btn-lg" style="background:#dc2626;color:#fff"
                    onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>

    <div class="toast" id="toast"></div>

    <script>
        // ─── DATA STORE ─────────────────────────────────────────────
        let accounts = [{
                id: 1,
                fname: 'Ana',
                lname: 'Reyes',
                email: 'a.reyes@greenfield.edu',
                role: 'Registrar',
                level: 'All Levels',
                status: 'Active'
            },
            {
                id: 2,
                fname: 'Jose',
                lname: 'Bautista',
                email: 'j.bautista@greenfield.edu',
                role: 'Cashier',
                level: 'All Levels',
                status: 'Active'
            },
            {
                id: 3,
                fname: 'Clara',
                lname: 'Mendoza',
                email: 'c.mendoza@greenfield.edu',
                role: 'Guidance Counselor',
                level: 'Junior High',
                status: 'Active'
            },
            {
                id: 4,
                fname: 'Ricardo',
                lname: 'Santos',
                email: 'r.santos@greenfield.edu',
                role: 'Elem Principal',
                level: 'Elementary',
                status: 'Active'
            },
            {
                id: 5,
                fname: 'Elena',
                lname: 'Torres',
                email: 'e.torres@greenfield.edu',
                role: 'Sr Principal',
                level: 'Senior High',
                status: 'Inactive'
            },
        ];
        let nextId = 6;
        let deleteTargetId = null;

        const roleColors = {
            'Registrar': 'role-registrar',
            'Cashier': 'role-cashier',
            'Guidance Counselor': 'role-guidance',
            'Elem Principal': 'role-elem',
            'Sr Principal': 'role-sr',
        };

        const roleDesc = {
            'Registrar': 'Can manage student records, enrollment forms, and official documents.',
            'Cashier': 'Can access payment records, tuition fees, and issue receipts.',
            'Guidance Counselor': 'Can view student profiles, schedule counseling sessions, and file reports.',
            'Elem Principal': 'Has full access to elementary school data, schedules, and staff.',
            'Sr Principal': 'Has full access to senior high school data, schedules, and staff.',
        };

        // ─── NAVIGATION ─────────────────────────────────────────────
        function showPage(id, btn) {
            document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
            document.getElementById('page-' + id).classList.add('active');
            if (btn) btn.classList.add('active');
            const titles = {
                dashboard: 'Dashboard',
                schedules: 'Schedules',
                accounts: 'Staff Accounts',
                create: 'Create Account'
            };
            document.getElementById('topbarTitle').textContent = titles[id] || id;
            if (id === 'accounts') renderAccounts();
            if (id === 'dashboard') renderDashRecent();
        }

        // ─── RENDER ACCOUNTS LIST ────────────────────────────────────
        function renderAccounts() {
            const list = document.getElementById('accountsList');
            if (!accounts.length) {
                list.innerHTML =
                    '<div style="padding:32px;text-align:center;color:var(--muted);font-size:13px">No accounts yet.</div>';
                return;
            }
            list.innerHTML = accounts.map(a => `
    <div class="account-row">
      <div class="acc-avatar">${a.fname[0]}${a.lname[0]}</div>
      <div class="acc-info">
        <div class="acc-name">${a.fname} ${a.lname}</div>
        <div class="acc-email">${a.email}</div>
      </div>
      <span class="acc-role ${roleColors[a.role]||''}">${a.role}</span>
      <span style="font-size:11px;color:var(--muted);margin:0 12px;min-width:80px">${a.level}</span>
      <span class="pill ${a.status==='Active'?'active':'inactive'}">${a.status}</span>
      <div class="acc-actions">
        <button class="icon-btn del" title="Delete" onclick="askDelete(${a.id})">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
        </button>
      </div>
    </div>
  `).join('');
        }

        function renderDashRecent() {
            const tbody = document.getElementById('dashRecentBody');
            const recent = accounts.slice(-5).reverse();
            tbody.innerHTML = recent.map(a => `
    <tr>
      <td><strong>${a.fname} ${a.lname}</strong></td>
      <td>${a.email}</td>
      <td><span class="acc-role ${roleColors[a.role]||''}" style="padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600">${a.role}</span></td>
      <td>${a.level}</td>
      <td><span class="pill ${a.status==='Active'?'active':'inactive'}">${a.status}</span></td>
    </tr>
  `).join('');
        }

        // ─── CREATE ACCOUNT ──────────────────────────────────────────
        function createAccount() {
            const fname = document.getElementById('f-fname').value.trim();
            const lname = document.getElementById('f-lname').value.trim();
            const email = document.getElementById('f-email').value.trim();
            const pw = document.getElementById('f-pw').value;
            const pw2 = document.getElementById('f-pw2').value;
            const role = document.getElementById('f-role').value;
            const level = document.getElementById('f-level').value;

            if (!fname || !lname || !email || !pw || !role || !level) {
                showToast('⚠️ Please fill in all fields.');
                return;
            }
            if (pw !== pw2) {
                showToast('⚠️ Passwords do not match.');
                return;
            }
            if (pw.length < 8) {
                showToast('⚠️ Password must be at least 8 characters.');
                return;
            }
            if (accounts.find(a => a.email === email)) {
                showToast('⚠️ Email already exists.');
                return;
            }

            accounts.push({
                id: nextId++,
                fname,
                lname,
                email,
                role,
                level,
                status: 'Active'
            });
            resetForm();
            showToast('✅ Account created successfully!');
            // update stat
            document.querySelector('.stat-value:last-of-type');
        }

        function resetForm() {
            ['f-fname', 'f-lname', 'f-email', 'f-pw', 'f-pw2'].forEach(id => document.getElementById(id).value = '');
            document.getElementById('f-role').value = '';
            document.getElementById('f-level').value = '';
            document.getElementById('roleInfo').style.display = 'none';
        }

        // Role description hint
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('f-role').addEventListener('change', function() {
                const box = document.getElementById('roleInfo');
                if (this.value && roleDesc[this.value]) {
                    box.textContent = '🔑 Access: ' + roleDesc[this.value];
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
            renderDashRecent();
            // set date
            document.getElementById('curDate').textContent = new Date().toLocaleDateString('en-PH', {
                weekday: 'short',
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        });

        // ─── DELETE ──────────────────────────────────────────────────
        function askDelete(id) {
            deleteTargetId = id;
            const a = accounts.find(x => x.id === id);
            document.getElementById('deleteModalSub').textContent =
                `Delete account for ${a.fname} ${a.lname} (${a.role})? This cannot be undone.`;
            document.getElementById('deleteModal').classList.add('open');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.remove('open');
        }

        function confirmDelete() {
            accounts = accounts.filter(a => a.id !== deleteTargetId);
            closeModal();
            renderAccounts();
            showToast('🗑️ Account deleted.');
        }

        // ─── TOAST ───────────────────────────────────────────────────
        function showToast(msg) {
            const t = document.getElementById('toast');
            t.textContent = msg;
            t.style.display = 'block';
            setTimeout(() => {
                t.style.display = 'none';
            }, 3000);
        }
    </script>
</body>

</html>
