<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{ asset('logo/mdalogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <style>
        /* CSS */
        #editAccountModal {
            display: none;
            /* hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
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
            @if ($errors->any())
                <div id="errorBox" style="color:red;margin-bottom:10px;transition: opacity 0.5s ease;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div id="successBox" style="color:green;margin-bottom:10px;transition: opacity 0.5s ease;">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif

            <!-- DASHBOARD PAGE -->
            <div class="page active" id="page-dashboard">


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
                            <div class="sched-card-title">Registrar Office</div>
                            <span class="pill elem">Registrar</span>
                        </div>
                        <div class="count-big">{{ $GetTotalRegistrar ?? 0 }}</div>
                        <div class="count-label">Appointment Confirmed</div>

                    </div>
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Cashier Office</div>
                            <span class="pill jr">Cashier</span>
                        </div>
                        <div class="count-big">{{ $GetTotalCashier ?? 0 }}</div>
                        <div class="count-label">Appointment Confirmed</div>

                    </div>
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Guidance Councelor</div>
                            <span class="pill sr">Guidance</span>
                        </div>
                        <div class="count-big">{{ $GetTotalGuidance ?? 0 }}</div>
                        <div class="count-label">Appointment Confirmed</div>

                    </div>
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Junior High Principal</div>
                            <span class="pill sr">JHS</span>
                        </div>
                        <div class="count-big">{{ $GetTotalElem ?? 0 }}</div>
                        <div class="count-label">Appointment Confirmed</div>

                    </div>
                    <div class="sched-card">
                        <div class="sched-card-head">
                            <div class="sched-card-title">Senior High Principal</div>
                            <span class="pill sr">SHS</span>
                        </div>
                        <div class="count-big">{{ $GetTotalSr ?? 0 }}</div>
                        <div class="count-label">Appointment Confirmed</div>

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
                                <div class="stat-value">{{ $GetTotalRegistrarPending ?? 0 }}</div>
                                <div class="stat-label">Registrar Office</div>
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
                                <div class="stat-value">{{ $GetTotalCashierPending ?? 0 }}</div>
                                <div class="stat-label">Cashier Office</div>
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
                                <div class="stat-value">{{ $GetTotalGuidancePending ?? 0 }}</div>
                                <div class="stat-label">Guidance Councelor</div>
                            </div>
                            <div class="stat-icon amber"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">{{ $GetTotalAdmissionPending ?? 0 }}</div>
                                <div class="stat-label">Admission Office</div>
                            </div>
                            <div class="stat-icon amber"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">{{ $GetTotalSrPending ?? 0 }}</div>
                                <div class="stat-label">Senior High Principal</div>
                            </div>
                            <div class="stat-icon amber"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <div class="stat-value">{{ $GetTotalElemPending ?? 0 }}</div>
                                <div class="stat-label">Junior High Principal</div>
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
                    <div class="sec-title">All Appointments</div>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Reference #</th>
                                <th>Parent Name</th>
                                <th>Date & Time</th>
                                <th>Office</th>
                                <th>Reason</th>
                                <th>Additional Note</th>
                                <th>status</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($GetAllBookAppointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->reference_number }}</td>
                                    <td>{{ $appointment->parent_name }}</td>
                                    <td>{{ $appointment->appointment_date }} {{ $appointment->appointment_time }}</td>
                                    <td><span class="pill elem">

                                            @if (strtolower($appointment->role) == 'registrar')
                                                Registrar's Office
                                            @elseif(strtolower($appointment->role) == 'cashier')
                                                Cashier's Office
                                            @elseif(strtolower($appointment->role) == 'guidance')
                                                Guidance Counselor
                                            @elseif(strtolower($appointment->role) == 'elem')
                                                Elementary Principal's Office
                                            @elseif(strtolower($appointment->role) == 'sr')
                                                Senior High Principal's Office
                                            @elseif(strtolower($appointment->role) == 'none')
                                                Admission Office
                                            @endif

                                        </span></td>
                                    <td>{{ $appointment->purpose }}</td>
                                    <td>{{ $appointment->additional_note }}</td>
                                    <td>{{ $appointment->status }}</td>

                                </tr>
                            @endforeach

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

                    <form method="POST" action="{{ route('admin.createStaff') }}">
                        @csrf


                        <div class="form-grid">
                            <div class="form-field">
                                <label>First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="e.g. Maria"
                                    required>
                            </div>

                            <div class="form-field">
                                <label>Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="e.g. Santos"
                                    required>
                            </div>

                            <div class="form-field full">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Auto generated"
                                    readonly required>
                            </div>

                            <div class="form-field">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Min. 8 characters" required>
                            </div>

                            <div class="form-field">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Re-enter password"
                                    required>
                            </div>

                            <div class="form-field">
                                <label>Role / Position</label>
                                <select name="role" id="f-role" required>
                                    <option value="" disabled selected>— Select Role —</option>
                                    <option value="none">Admission Officer</option>
                                    <option value="registrar">Registrar</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="guidance">Guidance Counselor</option>
                                    <option value="elem">Elementary Principal</option>
                                    <option value="sr">Senior High Principal</option>
                                </select>
                            </div>

                            <div class="form-field">
                                <label>Department / Level</label>
                                <select name="department" id="f-level" required>
                                    <option value="" disabled selected>— Select Level —</option>
                                    <option value="elem">Elementary</option>
                                    <option value="jh">Junior High School</option>
                                    <option value="shs">Senior High School</option>
                                    <option value="all">All Levels</option>
                                </select>
                            </div>

                        </div>

                        <!-- Role info box -->
                        <div id="roleInfo"
                            style="margin-top:18px;padding:14px 16px;background:#f0f4fb;border-radius:10px;border-left:4px solid var(--navy);font-size:13px;color:#3a4a6b;display:none">
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-lg btn-outline" onclick="resetForm()">Clear</button>
                            <button type="submit" class="btn-lg btn-primary">Create Account</button>
                        </div>

                    </form>
                </div>

            </div>

            <!-- UPDATE ACCOUNT -->
            <!-- EDIT ACCOUNT MODAL -->
            <div class="modal" id="editAccountModal">
                <div class="modal-content"
                    style="max-width:500px; width:90%; margin:auto; border-radius:12px; overflow:hidden;">
                    <div class="form-card" style="padding:24px; background:#fff; border-radius:12px;">
                        <div class="form-title">Edit Staff Account</div>

                        <form id="editAccountForm" method="POST" action="">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" id="edit_id">

                            <div class="form-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                                <div class="form-field">
                                    <label>First Name</label>
                                    <input type="text" id="edit_first_name" name="first_name" required>
                                </div>

                                <div class="form-field">
                                    <label>Last Name</label>
                                    <input type="text" id="edit_last_name" name="last_name" required>
                                </div>

                                <div class="form-field" style="grid-column:1 / -1;">
                                    <label>Email Address</label>
                                    <input type="email" id="edit_email" name="email" required>
                                </div>

                                <div class="form-field">
                                    <label>Role / Position</label>
                                    <select name="role" id="edit_role" required>
                                        <option value="" disabled selected>— Select Role —</option>
                                        <option value="none">Admission Officer</option>
                                        <option value="registrar">Registrar</option>
                                        <option value="cashier">Cashier</option>
                                        <option value="guidance">Guidance Counselor</option>
                                        <option value="elem">Elementary Principal</option>
                                        <option value="sr">Senior High Principal</option>
                                    </select>
                                </div>

                                <div class="form-field">
                                    <label>Department / Level</label>
                                    <select name="department" id="edit_level" required>
                                        <option value="" disabled selected>— Select Level —</option>
                                        <option value="elem">Elementary</option>
                                        <option value="jh">Junior High School</option>
                                        <option value="shs">Senior High School</option>
                                        <option value="all">All Levels</option>
                                    </select>
                                </div>

                                <!-- password -->
                                <div class="form-field" style="grid-column:1 / -1;">
                                    <label>Password</label>
                                    <input type="password" id="edit_password" name="password">
                                </div>

                                <div class="form-field" style="grid-column:1 / -1;">
                                    <label>Confirm Password</label>
                                    <input type="password" id="edit_password_confirmation"
                                        name="password_confirmation">
                                </div>

                                <div class="form-field" style="grid-column:1 / -1;">
                                    <label>Status</label>
                                    <select name="status" id="edit_status" required>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-actions"
                                style="margin-top:24px; display:flex; justify-content:flex-end; gap:12px;">
                                <button type="button" class="btn-lg btn-outline"
                                    onclick="closeEditModal()">Cancel</button>
                                <button type="submit" class="btn-lg btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
            function editAccount(id) {
                // Find the account in your accounts array
                const account = accounts.find(a => a.id == id);
                if (!account) return;

                // Fill the modal inputs
                document.getElementById('edit_id').value = account.id;
                document.getElementById('edit_first_name').value = account.fname;
                document.getElementById('edit_last_name').value = account.lname;
                document.getElementById('edit_email').value = account.email;
                document.getElementById('edit_role').value = account.role;
                document.getElementById('edit_level').value = account.level;
                document.getElementById('edit_status').value = account.status;

                // Set the form action dynamically
                document.getElementById('editAccountForm').action = `/mda/admin/update-staff/${account.id}`; // adjust route

                // Show the modal
                document.getElementById('editAccountModal').style.display = 'flex';
            }

            function closeEditModal() {
                document.getElementById('editAccountModal').style.display = 'none';
            }
            document.getElementById("first_name").addEventListener("input", generateEmail);
            document.getElementById("last_name").addEventListener("input", generateEmail);

            function generateEmail() {

                let first = document.getElementById("first_name").value.trim().toLowerCase();
                let last = document.getElementById("last_name").value.trim().toLowerCase();

                if (first && last) {

                    let firstInitial = first.charAt(0);

                    let email = firstInitial + "." + last + "@mda.edu.ph";

                    document.getElementById("email").value = email;
                }
            }

            function resetForm() {
                // Clear text inputs
                document.getElementById('first_name').value = '';
                document.getElementById('last_name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';
                document.getElementById('confirm_password').value = '';

                // Reset selects
                document.getElementById('f-role').value = 'none';
                document.getElementById('f-level').value = 'none';

                // Hide role info box
                const roleBox = document.getElementById('roleInfo');
                if (roleBox) roleBox.style.display = 'none';
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {

                const errorBox = document.getElementById("errorBox");

                if (errorBox) {
                    setTimeout(() => {
                        errorBox.style.opacity = "0";

                        setTimeout(() => {
                            errorBox.style.display = "none";
                        }, 500);

                    }, 4000);
                }

                const successBox = document.getElementById("successBox");

                if (successBox) {
                    setTimeout(() => {
                        successBox.style.opacity = "0";

                        setTimeout(() => {
                            successBox.style.display = "none";
                        }, 500);

                    }, 4000);
                }

            });
        </script>

        <script>
            // ─── DATA STORE ─────────────────────────────────────────────
            let accounts = [
                @foreach ($GetStaffAccounts as $staff)
                    {
                        id: {{ $staff->id }},
                        fname: "{{ $staff->first_name }}",
                        lname: "{{ $staff->last_name }}",
                        email: "{{ $staff->email }}",
                        role: "{{ ucfirst($staff->role) }}",
                        level: "{{ $staff->department == 'all' ? 'All Levels' : strtoupper($staff->department) }}",
                        status: "Active"
                    },
                @endforeach
            ];

            let deleteTargetId = null;

            const roleColors = {
                'Registrar': 'role-registrar',
                'Cashier': 'role-cashier',
                'Guidance Counselor': 'role-guidance',
                'Elem Principal': 'role-elem',
                'Sr Principal': 'role-sr',
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

            // ─── RENDER ACCOUNTS ────────────────────────────────────────
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
                <!-- Edit Button -->
                <button 
                    class="icon-btn edit" 
                    title="Edit"
                    data-id="${a.id}"
                    onclick="editAccount(this.dataset.id)">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                    </svg>
                </button>
                    <button 
                        class="icon-btn del" 
                        title="Delete"
                        data-id="${a.id}"
                        onclick="askDelete(this.dataset.id)">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14H6L5 6"/>
                            <path d="M10 11v6"/>
                            <path d="M14 11v6"/>
                            <path d="M9 6V4h6v2"/>
                        </svg>
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

            // ─── DELETE ──────────────────────────────────────────────────
            function askDelete(id) {
                deleteTargetId = id;
                const a = accounts.find(x => x.id == id);
                document.getElementById('deleteModalSub').textContent =
                    `Delete account for ${a.fname} ${a.lname} (${a.role})? This cannot be undone.`;
                document.getElementById('deleteModal').classList.add('open');
            }

            function closeModal() {
                document.getElementById('deleteModal').classList.remove('open');
            }

            function confirmDelete() {
                if (!deleteTargetId) return;

                fetch(`/mda/admin/delete-staff/${deleteTargetId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // remove from JS array
                            accounts = accounts.filter(a => a.id != deleteTargetId);
                            closeModal();
                            renderAccounts();
                            showToast('🗑️ Account deleted.');
                        } else {
                            alert("Failed to delete account.");
                        }
                    })
                    .catch(err => console.error(err));
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

            document.addEventListener('DOMContentLoaded', () => {
                renderAccounts();
                renderDashRecent();

                // Role info box
                const roleSelect = document.getElementById('f-role');
                if (roleSelect) {
                    roleSelect.addEventListener('change', function() {
                        const box = document.getElementById('roleInfo');
                        if (this.value && roleDesc[this.value]) {
                            box.textContent = '🔑 Access: ' + roleDesc[this.value];
                            box.style.display = 'block';
                        } else {
                            box.style.display = 'none';
                        }
                    });
                }

                // Current date
                const curDate = document.getElementById('curDate');
                if (curDate) {
                    curDate.textContent = new Date().toLocaleDateString('en-PH', {
                        weekday: 'short',
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    });
                }
            });
        </script>
</body>

</html>
