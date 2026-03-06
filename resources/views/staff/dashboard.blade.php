<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar Dashboard — Mater Dei Academy</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@600;700&display=swap"
        rel="stylesheet" />
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --blue: #1d3577;
            --blue-dark: #152858;
            --blue-mid: #2a4a9e;
            --blue-soft: #eef1fb;
            --gold: #c9a84c;
            --gold-light: #f0d080;
            --green: #16a34a;
            --green-soft: #dcfce7;
            --amber: #d97706;
            --amber-soft: #fef3c7;
            --red: #dc2626;
            --red-soft: #fee2e2;
            --sky: #0284c7;
            --sky-soft: #e0f2fe;
            --text: #0f172a;
            --text-mid: #475569;
            --text-light: #94a3b8;
            --border: #e2e8f0;
            --bg: #f1f5f9;
            --white: #ffffff;
            --sidebar-w: 240px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-w);
            background: linear-gradient(180deg, var(--blue-dark) 0%, var(--blue) 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            box-shadow: 4px 0 24px rgba(15, 30, 80, 0.18);
        }

        .sidebar-logo {
            padding: 28px 22px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .logo-badge {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            box-shadow: 0 4px 16px rgba(201, 168, 76, 0.35);
        }

        .logo-badge svg {
            width: 24px;
            height: 24px;
            color: var(--blue-dark);
        }

        .logo-school {
            font-family: 'Cormorant Garamond', serif;
            font-size: 15px;
            color: #fff;
            line-height: 1.35;
            font-weight: 700;
        }

        .logo-dept {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-top: 3px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 18px 12px;
        }

        .nav-label {
            font-size: 9px;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.3);
            padding: 0 10px;
            margin: 16px 0 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.18s;
            margin-bottom: 2px;
            text-decoration: none;
        }

        .nav-item svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            font-weight: 600;
        }

        .nav-item.active svg {
            color: var(--gold-light);
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .staff-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .staff-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: var(--blue-dark);
            flex-shrink: 0;
        }

        .staff-name {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .staff-role {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.4);
        }

        /* MAIN */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.05);
        }

        .topbar-left h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--blue);
        }

        .topbar-left p {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 1px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .today-badge {
            background: var(--blue-soft);
            color: var(--blue);
            font-size: 12px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
        }

        .btn-new {
            display: flex;
            align-items: center;
            gap: 7px;
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 9px 18px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.18s, transform 0.12s, box-shadow 0.18s;
        }

        .btn-new:hover {
            background: var(--blue-mid);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(29, 53, 119, 0.28);
        }

        .btn-new svg {
            width: 15px;
            height: 15px;
        }

        /* CONTENT */
        .content {
            padding: 28px 32px;
            flex: 1;
        }

        /* STAT CARDS */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--white);
            border-radius: 14px;
            padding: 18px 20px;
            border: 1px solid var(--border);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            animation: fadeUp 0.5s ease both;
        }

        .stat-card:nth-child(1) {
            animation-delay: .05s
        }

        .stat-card:nth-child(2) {
            animation-delay: .1s
        }

        .stat-card:nth-child(3) {
            animation-delay: .15s
        }

        .stat-card:nth-child(4) {
            animation-delay: .2s
        }

        .stat-card:nth-child(5) {
            animation-delay: .25s
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

        .stat-label {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-light);
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
            line-height: 1;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 20px;
            height: 20px;
        }

        .ic-blue {
            background: var(--blue-soft);
            color: var(--blue);
        }

        .ic-green {
            background: var(--green-soft);
            color: var(--green);
        }

        .ic-amber {
            background: var(--amber-soft);
            color: var(--amber);
        }

        .ic-sky {
            background: var(--sky-soft);
            color: var(--sky);
        }

        .ic-red {
            background: var(--red-soft);
            color: var(--red);
        }

        /* TABS */
        .tabs-row {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 18px;
        }

        .tab-btn {
            padding: 8px 18px;
            border-radius: 8px;
            border: none;
            background: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.18s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .tab-btn .tab-count {
            font-size: 11px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            background: var(--border);
            color: var(--text-mid);
        }

        .tab-btn:hover {
            background: var(--white);
            color: var(--text);
        }

        .tab-btn.active {
            background: var(--blue);
            color: #fff;
            font-weight: 600;
        }

        .tab-btn.active .tab-count {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        /* TABLE CARD */
        .table-card {
            background: var(--white);
            border-radius: 14px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            animation: fadeUp 0.5s 0.2s ease both;
        }

        .card-header {
            padding: 16px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
        }

        .card-sub {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 2px;
        }

        .filter-row {
            padding: 12px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 180px;
        }

        .search-wrap svg {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: var(--text-light);
            pointer-events: none;
        }

        .filter-input {
            width: 100%;
            padding: 8px 12px 8px 34px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            color: var(--text);
            background: var(--bg);
            outline: none;
            transition: border-color 0.2s;
        }

        .filter-input:focus {
            border-color: var(--blue);
            background: #fff;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            color: var(--text);
            background: var(--bg);
            outline: none;
            cursor: pointer;
        }

        .filter-select:focus {
            border-color: var(--blue);
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: var(--bg);
        }

        thead th {
            padding: 10px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--text-light);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8faff;
        }

        td {
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text);
            vertical-align: middle;
        }

        .td-name {
            font-weight: 600;
        }

        .td-sub {
            font-size: 11px;
            color: var(--text-light);
            margin-top: 2px;
        }

        /* BADGES */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .badge-pending {
            background: var(--amber-soft);
            color: var(--amber);
        }

        .badge-pending .badge-dot {
            background: var(--amber);
        }

        .badge-confirmed {
            background: var(--blue-soft);
            color: var(--blue);
        }

        .badge-confirmed .badge-dot {
            background: var(--blue);
        }

        .badge-done {
            background: var(--green-soft);
            color: var(--green);
        }

        .badge-done .badge-dot {
            background: var(--green);
        }

        .badge-cancelled {
            background: var(--red-soft);
            color: var(--red);
        }

        .badge-cancelled .badge-dot {
            background: var(--red);
        }

        /* ACTION BUTTONS */
        .action-btns {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .act-btn {
            height: 30px;
            border-radius: 7px;
            border: 1px solid var(--border);
            background: var(--bg);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s;
            color: var(--text-mid);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 11px;
            font-weight: 600;
            gap: 4px;
            padding: 0 9px;
        }

        .act-btn svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
        }

        .act-btn:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .act-btn.view:hover {
            background: var(--blue-soft);
            color: var(--blue);
            border-color: var(--blue);
        }

        .act-btn.accept {
            background: var(--green-soft);
            color: var(--green);
            border-color: #bbf7d0;
        }

        .act-btn.accept:hover {
            background: var(--green);
            color: #fff;
            border-color: var(--green);
        }

        .act-btn.decline {
            background: var(--red-soft);
            color: var(--red);
            border-color: #fecaca;
        }

        .act-btn.decline:hover {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        .act-btn.done {
            background: var(--blue-soft);
            color: var(--blue);
            border-color: #c7d2fe;
        }

        .act-btn.done:hover {
            background: var(--blue);
            color: #fff;
            border-color: var(--blue);
        }

        .act-btn.del:hover {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        /* MODAL */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 20, 50, 0.5);
            z-index: 200;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(3px);
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal {
            background: var(--white);
            border-radius: 18px;
            width: 540px;
            max-width: calc(100vw - 32px);
            max-height: 92vh;
            overflow-y: auto;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.25);
            animation: modalIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.94) translateY(20px)
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0)
            }
        }

        .modal-header {
            padding: 20px 26px 16px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--blue);
        }

        .modal-close {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--bg);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-mid);
            transition: all 0.15s;
        }

        .modal-close:hover {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        .modal-close svg {
            width: 16px;
            height: 16px;
        }

        .modal-body {
            padding: 22px 26px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-field.full {
            grid-column: 1/-1;
        }

        .form-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--blue);
        }

        .form-input,
        .form-select,
        .form-textarea {
            padding: 10px 13px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            color: var(--text);
            background: var(--bg);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: var(--blue);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(29, 53, 119, 0.08);
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .modal-footer {
            padding: 14px 26px 22px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .btn-cancel {
            padding: 10px 20px;
            border-radius: 9px;
            border: 1.5px solid var(--border);
            background: var(--bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-mid);
            cursor: pointer;
            transition: all 0.15s;
        }

        .btn-cancel:hover {
            border-color: var(--text-mid);
        }

        .btn-accept {
            padding: 10px 20px;
            border-radius: 9px;
            border: none;
            background: var(--green);
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.18s;
        }

        .btn-accept:hover {
            background: #15803d;
            box-shadow: 0 6px 18px rgba(22, 163, 74, 0.3);
        }

        .btn-accept svg {
            width: 15px;
            height: 15px;
        }

        .btn-decline {
            padding: 10px 20px;
            border-radius: 9px;
            border: none;
            background: var(--red);
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.18s;
        }

        .btn-decline:hover {
            background: #b91c1c;
            box-shadow: 0 6px 18px rgba(220, 38, 38, 0.3);
        }

        .btn-decline svg {
            width: 15px;
            height: 15px;
        }

        .btn-save {
            padding: 10px 22px;
            border-radius: 9px;
            border: none;
            background: var(--blue);
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.18s, box-shadow 0.18s;
        }

        .btn-save:hover {
            background: var(--blue-mid);
            box-shadow: 0 6px 18px rgba(29, 53, 119, 0.28);
        }

        /* VIEW MODAL detail rows */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 18px;
        }

        .detail-item {}

        .detail-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
        }

        .detail-full {
            grid-column: 1/-1;
        }

        .detail-divider {
            grid-column: 1/-1;
            height: 1px;
            background: var(--border);
        }

        /* TOAST */
        .toast {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 999;
            background: var(--text);
            color: #fff;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            transform: translateY(80px);
            opacity: 0;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast.success {
            background: var(--green);
        }

        .toast.error {
            background: var(--red);
        }

        .toast svg {
            width: 16px;
            height: 16px;
        }

        /* Gold top strip */
        .gold-topstrip {
            height: 3px;
            background: linear-gradient(90deg, var(--blue-dark), var(--gold), var(--gold-light), var(--gold), var(--blue-dark));
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="gold-topstrip"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-badge">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                </svg>
            </div>
            <div class="logo-school">Mater Dei Academy<br>Tagaytay Inc.</div>
            <div class="logo-dept">Registrar's Office</div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>
            <a class="nav-item active" href="#">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                Dashboard
            </a>
            <a class="nav-item" href="#">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Appointments
            </a>
            <a class="nav-item" href="#">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                Students
            </a>
            <div class="nav-label">Reports</div>
            <a class="nav-item" href="#">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="18" y1="20" x2="18" y2="10" />
                    <line x1="12" y1="20" x2="12" y2="4" />
                    <line x1="6" y1="20" x2="6" y2="14" />
                </svg>
                Analytics
            </a>
            <a class="nav-item" href="#">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                </svg>
                Records
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="staff-info">
                <div class="staff-avatar">MS</div>
                <div>
                    <div class="staff-name">Maria Santos</div>
                    <div class="staff-role">Head Registrar</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <div class="topbar">
            <div class="topbar-left">
                <h1>Appointments Dashboard</h1>
                <p>Mater Dei Academy Tagaytay Incorporated — Registrar's Office</p>
            </div>
            <div class="topbar-right">
                <div class="today-badge" id="todayBadge">📅 ...</div>
                <button class="btn-new" onclick="openNewModal()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    New Appointment
                </button>
            </div>
        </div>

        <div class="content">

            <!-- STAT CARDS -->
            <div class="stat-grid">
                <div class="stat-card">
                    <div>
                        <div class="stat-label">Total</div>
                        <div class="stat-value" id="statTotal">0</div>
                    </div>
                    <div class="stat-icon ic-blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div>
                        <div class="stat-label">Pending</div>
                        <div class="stat-value" id="statPending">0</div>
                    </div>
                    <div class="stat-icon ic-amber">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div>
                        <div class="stat-label">Confirmed</div>
                        <div class="stat-value" id="statConfirmed">0</div>
                    </div>
                    <div class="stat-icon ic-sky">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div>
                        <div class="stat-label">Completed</div>
                        <div class="stat-value" id="statDone">0</div>
                    </div>
                    <div class="stat-icon ic-green">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div>
                        <div class="stat-label">Cancelled</div>
                        <div class="stat-value" id="statCancelled">0</div>
                    </div>
                    <div class="stat-icon ic-red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="15" y1="9" x2="9" y2="15" />
                            <line x1="9" y1="9" x2="15" y2="15" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- TABS -->
            <div class="tabs-row">
                <button class="tab-btn active" onclick="setTab('All',this)">All <span class="tab-count"
                        id="tc-All">0</span></button>
                <button class="tab-btn" onclick="setTab('Pending',this)">Pending <span class="tab-count"
                        id="tc-Pending">0</span></button>
                <button class="tab-btn" onclick="setTab('Confirmed',this)">Confirmed <span class="tab-count"
                        id="tc-Confirmed">0</span></button>
                <button class="tab-btn" onclick="setTab('Done',this)">Completed <span class="tab-count"
                        id="tc-Done">0</span></button>
                <button class="tab-btn" onclick="setTab('Cancelled',this)">Cancelled <span class="tab-count"
                        id="tc-Cancelled">0</span></button>
            </div>

            <!-- TABLE -->
            <div class="table-card">
                <div class="card-header">
                    <div>
                        <div class="card-title">Appointment Records</div>
                        <div class="card-sub" id="tableSubtitle">Showing all appointments</div>
                    </div>
                </div>
                <div class="filter-row">
                    <div class="search-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input class="filter-input" type="text" placeholder="Search by name, ID, or reason…"
                            oninput="setSearch(this.value)" />
                    </div>
                    <select class="filter-select" onchange="setOffice(this.value)">
                        <option value="">All Offices</option>
                        <option>Registrar</option>
                        <option>Accounting</option>
                        <option>Guidance</option>
                        <option>Principal</option>
                    </select>
                    <select class="filter-select" onchange="setDateSort(this.value)">
                        <option value="asc">Date: Earliest First</option>
                        <option value="desc">Date: Latest First</option>
                    </select>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Contact</th>
                                <th>Date & Time</th>
                                <th>Office</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- NEW APPOINTMENT MODAL -->
    <div class="modal-overlay" id="newModal" onclick="closeModalOutside(event,'newModal')">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-title">➕ New Appointment</div>
                <button class="modal-close" onclick="closeModal('newModal')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Full Name *</label>
                        <input class="form-input" type="text" id="fName" placeholder="e.g. Juan dela Cruz" />
                    </div>
                    <div class="form-field">
                        <label class="form-label">Contact Number</label>
                        <input class="form-input" type="text" id="fContact" placeholder="09XX-XXX-XXXX" />
                    </div>
                    <div class="form-field">
                        <label class="form-label">Appointment Date *</label>
                        <input class="form-input" type="date" id="fDate" />
                    </div>
                    <div class="form-field">
                        <label class="form-label">Appointment Time *</label>
                        <input class="form-input" type="time" id="fTime" />
                    </div>
                    <div class="form-field">
                        <label class="form-label">Office / Department *</label>
                        <select class="form-select" id="fOffice">
                            <option value="">Select office…</option>
                            <option>Registrar</option>
                            <option>Accounting</option>
                            <option>Guidance</option>
                            <option>Principal</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Initial Status</label>
                        <select class="form-select" id="fStatus">
                            <option value="Pending">Pending</option>
                            <option value="Confirmed">Confirmed</option>
                        </select>
                    </div>
                    <div class="form-field full">
                        <label class="form-label">Reason / Purpose *</label>
                        <textarea class="form-textarea" id="fReason"
                            placeholder="e.g. Request for Form 137, Enrollment concern, Good Moral Certificate…"></textarea>
                    </div>
                    <div class="form-field full">
                        <label class="form-label">Additional Notes</label>
                        <input class="form-input" type="text" id="fNotes"
                            placeholder="Optional notes for the registrar…" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal('newModal')">Cancel</button>
                <button class="btn-save" onclick="saveAppointment()">Save Appointment</button>
            </div>
        </div>
    </div>

    <!-- VIEW / ACCEPT / DECLINE MODAL -->
    <div class="modal-overlay" id="viewModal" onclick="closeModalOutside(event,'viewModal')">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-title">📋 Appointment Details</div>
                <button class="modal-close" onclick="closeModal('viewModal')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail-grid" id="viewContent"></div>
            </div>
            <div class="modal-footer" id="viewFooter"></div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toast">
        <svg id="toastIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12" />
        </svg>
        <span id="toastMsg">Done</span>
    </div>

    <script>
        // ── DATA ──
        const appointments = [{
                id: 'APT-001',
                name: 'Ana Reyes',
                contact: '09171234567',
                date: '2026-03-06',
                time: '08:00',
                office: 'Registrar',
                reason: 'Form 137 Request',
                notes: '',
                status: 'Done'
            },
            {
                id: 'APT-002',
                name: 'Marco dela Cruz',
                contact: '09281234567',
                date: '2026-03-06',
                time: '09:30',
                office: 'Accounting',
                reason: 'Enrollment Query',
                notes: 'Follow-up on tuition',
                status: 'Done'
            },
            {
                id: 'APT-003',
                name: 'Liza Mendoza',
                contact: '09351234567',
                date: '2026-03-06',
                time: '11:00',
                office: 'Registrar',
                reason: 'Transcript of Records',
                notes: '',
                status: 'Done'
            },
            {
                id: 'APT-004',
                name: 'Jose Santos',
                contact: '09461234567',
                date: '2026-03-06',
                time: '13:00',
                office: 'Registrar',
                reason: 'Good Moral Certificate',
                notes: 'For scholarship app',
                status: 'Confirmed'
            },
            {
                id: 'APT-005',
                name: 'Karen Bautista',
                contact: '09571234567',
                date: '2026-03-06',
                time: '14:30',
                office: 'Guidance',
                reason: 'Counseling Session',
                notes: '',
                status: 'Confirmed'
            },
            {
                id: 'APT-006',
                name: 'Ryan Flores',
                contact: '09681234567',
                date: '2026-03-06',
                time: '16:00',
                office: 'Principal',
                reason: 'Parent-Teacher Meeting',
                notes: 'Re: conduct issue',
                status: 'Pending'
            },
            {
                id: 'APT-007',
                name: 'Maria Garcia',
                contact: '09791234567',
                date: '2026-03-07',
                time: '09:00',
                office: 'Registrar',
                reason: 'Diploma Request',
                notes: '',
                status: 'Pending'
            },
            {
                id: 'APT-008',
                name: 'Pedro Villanueva',
                contact: '09801234567',
                date: '2026-03-07',
                time: '10:00',
                office: 'Accounting',
                reason: 'Tuition Fee Concern',
                notes: 'Payment plan request',
                status: 'Pending'
            },
            {
                id: 'APT-009',
                name: 'Rosa Aquino',
                contact: '09121234567',
                date: '2026-03-07',
                time: '14:00',
                office: 'Guidance',
                reason: 'Scholarship Application',
                notes: '',
                status: 'Confirmed'
            },
            {
                id: 'APT-010',
                name: 'Carlos Reyes',
                contact: '09231234567',
                date: '2026-03-05',
                time: '10:00',
                office: 'Registrar',
                reason: 'School Record Request',
                notes: '',
                status: 'Done'
            },
            {
                id: 'APT-011',
                name: 'Elena Torres',
                contact: '09341234567',
                date: '2026-03-05',
                time: '15:00',
                office: 'Principal',
                reason: 'Behavioral Concern',
                notes: '',
                status: 'Cancelled'
            },
            {
                id: 'APT-012',
                name: 'Miguel Lim',
                contact: '09451234567',
                date: '2026-03-08',
                time: '11:00',
                office: 'Registrar',
                reason: 'Authentication of Docs',
                notes: 'Bring originals',
                status: 'Pending'
            },
            {
                id: 'APT-013',
                name: 'Sofia Dela Vega',
                contact: '09561234567',
                date: '2026-03-08',
                time: '13:00',
                office: 'Guidance',
                reason: 'Mental Health Concern',
                notes: 'Referred by homeroom',
                status: 'Pending'
            },
            {
                id: 'APT-014',
                name: 'James Ong',
                contact: '09671234567',
                date: '2026-03-09',
                time: '09:30',
                office: 'Accounting',
                reason: 'Late Payment Concern',
                notes: '',
                status: 'Pending'
            },
        ];

        let idCounter = appointments.length;
        let activeTab = 'All',
            searchVal = '',
            officeVal = '',
            dateSort = 'asc';

        // ── HELPERS ──
        function fmtDate(d) {
            const dt = new Date(d + 'T00:00');
            return dt.toLocaleDateString('en-PH', {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }

        function fmtTime(t) {
            const [h, m] = t.split(':');
            const ap = +h >= 12 ? 'PM' : 'AM';
            return `${(+h%12)||12}:${m} ${ap}`;
        }

        function statusBadge(s) {
            const cls = {
                Pending: 'badge-pending',
                Confirmed: 'badge-confirmed',
                Done: 'badge-done',
                Cancelled: 'badge-cancelled'
            };
            return `<span class="badge ${cls[s]}"><span class="badge-dot"></span>${s}</span>`;
        }

        // ── STATS ──
        function updateStats() {
            document.getElementById('statTotal').textContent = appointments.length;
            document.getElementById('statPending').textContent = appointments.filter(a => a.status === 'Pending').length;
            document.getElementById('statConfirmed').textContent = appointments.filter(a => a.status === 'Confirmed')
            .length;
            document.getElementById('statDone').textContent = appointments.filter(a => a.status === 'Done').length;
            document.getElementById('statCancelled').textContent = appointments.filter(a => a.status === 'Cancelled')
            .length;
            ['All', 'Pending', 'Confirmed', 'Done', 'Cancelled'].forEach(k => {
                document.getElementById('tc-' + k).textContent = k === 'All' ? appointments.length : appointments
                    .filter(a => a.status === k).length;
            });
        }

        // ── FILTER & RENDER ──
        function getFiltered() {
            let data = [...appointments];
            if (activeTab !== 'All') data = data.filter(a => a.status === activeTab);
            if (searchVal) data = data.filter(a => a.name.toLowerCase().includes(searchVal) || a.id.toLowerCase().includes(
                searchVal) || a.reason.toLowerCase().includes(searchVal));
            if (officeVal) data = data.filter(a => a.office === officeVal);
            data.sort((a, b) => dateSort === 'asc' ? (a.date + a.time).localeCompare(b.date + b.time) : (b.date + b.time)
                .localeCompare(a.date + a.time));
            return data;
        }

        function renderTable() {
            const data = getFiltered();
            const tbody = document.getElementById('tableBody');
            document.getElementById('tableSubtitle').textContent =
                `Showing ${data.length} appointment${data.length!==1?'s':''}`;
            if (!data.length) {
                tbody.innerHTML =
                    `<tr><td colspan="8" style="text-align:center;padding:40px;color:var(--text-light)">No appointments found.</td></tr>`;
                return;
            }
            tbody.innerHTML = data.map(a => {
                const isPending = a.status === 'Pending';
                const isConfirmed = a.status === 'Confirmed';
                const actionBtns = `
        <div class="action-btns">
          <button class="act-btn view" title="View Details" onclick="openViewModal('${a.id}')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            View
          </button>
          ${isPending?`
              <button class="act-btn accept" title="Accept Appointment" onclick="acceptAppt('${a.id}')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                Accept
              </button>
              <button class="act-btn decline" title="Decline Appointment" onclick="declineAppt('${a.id}')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                Decline
              </button>`:''}
          ${isConfirmed?`
              <button class="act-btn done" title="Mark as Done" onclick="markDone('${a.id}')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Done
              </button>`:''}
          <button class="act-btn del" title="Delete" onclick="deleteAppt('${a.id}')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
          </button>
        </div>`;
                return `<tr>
        <td style="color:var(--text-light);font-size:11px;font-weight:600">${a.id}</td>
        <td><div class="td-name">${a.name}</div><div class="td-sub">${a.contact||'—'}</div></td>
        <td><div style="font-weight:600">${fmtDate(a.date)}</div><div class="td-sub">${fmtTime(a.time)}</div></td>
        <td>${a.office}</td>
        <td style="max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis" title="${a.reason}">${a.reason}</td>
        <td>${statusBadge(a.status)}</td>
        <td>${actionBtns}</td>
      </tr>`;
            }).join('');
            updateStats();
        }

        // ── FILTERS ──
        function setTab(tab, el) {
            activeTab = tab;
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            el.classList.add('active');
            renderTable();
        }

        function setSearch(v) {
            searchVal = v.toLowerCase();
            renderTable();
        }

        function setOffice(v) {
            officeVal = v;
            renderTable();
        }

        function setDateSort(v) {
            dateSort = v;
            renderTable();
        }

        // ── ACTIONS ──
        function acceptAppt(id) {
            const a = appointments.find(x => x.id === id);
            if (!a) return;
            a.status = 'Confirmed';
            renderTable();
            showToast('success', '✅ Appointment accepted and confirmed!');
        }

        function declineAppt(id) {
            const a = appointments.find(x => x.id === id);
            if (!a) return;
            if (!confirm(`Decline appointment for ${a.name}?`)) return;
            a.status = 'Cancelled';
            renderTable();
            showToast('error', '❌ Appointment declined.');
        }

        function markDone(id) {
            const a = appointments.find(x => x.id === id);
            if (!a) return;
            a.status = 'Done';
            renderTable();
            showToast('success', '✅ Appointment marked as completed!');
        }

        function deleteAppt(id) {
            const a = appointments.find(x => x.id === id);
            if (!a) return;
            if (!confirm(`Delete appointment for ${a.name}? This cannot be undone.`)) return;
            const idx = appointments.findIndex(x => x.id === id);
            appointments.splice(idx, 1);
            renderTable();
            showToast('error', '🗑 Appointment deleted.');
        }

        // ── VIEW MODAL ──
        function openViewModal(id) {
            const a = appointments.find(x => x.id === id);
            if (!a) return;
            document.getElementById('viewContent').innerHTML = `
      <div class="detail-item"><div class="detail-label">Appointment ID</div><div class="detail-value">${a.id}</div></div>
      <div class="detail-item"><div class="detail-label">Status</div><div class="detail-value">${statusBadge(a.status)}</div></div>
      <div class="detail-divider"></div>
      <div class="detail-item"><div class="detail-label">Full Name</div><div class="detail-value">${a.name}</div></div>
      <div class="detail-item"><div class="detail-label">Contact</div><div class="detail-value">${a.contact||'—'}</div></div>
      <div class="detail-item"><div class="detail-label">Date</div><div class="detail-value">${fmtDate(a.date)}</div></div>
      <div class="detail-item"><div class="detail-label">Time</div><div class="detail-value">${fmtTime(a.time)}</div></div>
      <div class="detail-item"><div class="detail-label">Office</div><div class="detail-value">${a.office}</div></div>
      <div class="detail-divider"></div>
      <div class="detail-item detail-full"><div class="detail-label">Reason / Purpose</div><div class="detail-value" style="font-weight:400;font-size:13px;line-height:1.6">${a.reason}</div></div>
      ${a.notes?`<div class="detail-item detail-full"><div class="detail-label">Notes</div><div class="detail-value" style="font-weight:400;font-size:13px;color:var(--text-mid)">${a.notes}</div></div>`:''}
    `;
            const footer = document.getElementById('viewFooter');
            footer.innerHTML = '';
            const cancelBtn = document.createElement('button');
            cancelBtn.className = 'btn-cancel';
            cancelBtn.textContent = 'Close';
            cancelBtn.onclick = () => closeModal('viewModal');
            footer.appendChild(cancelBtn);
            if (a.status === 'Pending') {
                const decBtn = document.createElement('button');
                decBtn.className = 'btn-decline';
                decBtn.innerHTML =
                    `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>Decline`;
                decBtn.onclick = () => {
                    closeModal('viewModal');
                    declineAppt(id);
                };
                footer.appendChild(decBtn);
                const accBtn = document.createElement('button');
                accBtn.className = 'btn-accept';
                accBtn.innerHTML =
                    `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Accept Appointment`;
                accBtn.onclick = () => {
                    closeModal('viewModal');
                    acceptAppt(id);
                };
                footer.appendChild(accBtn);
            }
            if (a.status === 'Confirmed') {
                const doneBtn = document.createElement('button');
                doneBtn.className = 'btn-accept';
                doneBtn.innerHTML =
                    `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Mark as Done`;
                doneBtn.onclick = () => {
                    closeModal('viewModal');
                    markDone(id);
                };
                footer.appendChild(doneBtn);
            }
            openModal('viewModal');
        }

        // ── NEW APPOINTMENT ──
        function openNewModal() {
            openModal('newModal');
        }

        function saveAppointment() {
            const name = document.getElementById('fName').value.trim();
            const contact = document.getElementById('fContact').value.trim();
            const date = document.getElementById('fDate').value;
            const time = document.getElementById('fTime').value;
            const office = document.getElementById('fOffice').value;
            const status = document.getElementById('fStatus').value;
            const reason = document.getElementById('fReason').value.trim();
            const notes = document.getElementById('fNotes').value.trim();
            if (!name || !date || !time || !office || !reason) {
                showToast('error', '⚠️ Please fill in all required fields.');
                return;
            }
            idCounter++;
            const newId = 'APT-' + String(idCounter).padStart(3, '0');
            appointments.unshift({
                id: newId,
                name,
                contact,
                date,
                time,
                office,
                reason,
                notes,
                status
            });
            renderTable();
            closeModal('newModal');
            ['fName', 'fContact', 'fDate', 'fTime', 'fReason', 'fNotes'].forEach(id => document.getElementById(id).value =
                '');
            document.getElementById('fOffice').value = '';
            document.getElementById('fStatus').value = 'Pending';
            showToast('success', `✅ Appointment for ${name} saved!`);
        }

        // ── MODAL UTILS ──
        function openModal(id) {
            document.getElementById(id).classList.add('open');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('open');
        }

        function closeModalOutside(e, id) {
            if (e.target === document.getElementById(id)) closeModal(id);
        }

        // ── TOAST ──
        let toastTimer;

        function showToast(type, msg) {
            const t = document.getElementById('toast');
            const icon = document.getElementById('toastIcon');
            t.className = 'toast ' + type;
            document.getElementById('toastMsg').textContent = msg;
            icon.innerHTML = type === 'success' ?
                '<polyline points="20 6 9 17 4 12"/>' :
                '<circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>';
            t.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
        }

        // ── INIT ──
        document.getElementById('todayBadge').textContent = '📅 ' + new Date().toLocaleDateString('en-PH', {
            weekday: 'short',
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });
        renderTable();
    </script>
</body>

</html>
