<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrar Dashboard — Mater Dei Academy</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@600;700&display=swap"
        rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('logo/mdalogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/staffdashboard.css') }}" />

    {{-- Laravel Echo / Pusher scripts loaded via CDN (compatible with shared hosting like InfinityFree) --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <style>
        .modals {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
        }

        .modal-contents {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-actionss {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn-cancels {
            padding: 8px 15px;
            border: none;
            background: #ccc;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-deletes {
            padding: 8px 15px;
            border: none;
            background: #e74c3c;
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="gold-topstrip"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo" style="text-align:center; padding: 20px;">
            <div class="logo-badge" style="margin-bottom:10px;">
                <img src="{{ asset('img/logo.png') }}" alt="Logo"
                    style="width:80px; height:80px; object-fit:contain;">
            </div>
            <div class="logo-school" style="font-weight:bold; font-size:16px; line-height:1.2;">
                Mater Dei Academy<br>Tagaytay Inc.
            </div>
            <div class="logo-dept" style="font-size:14px; color:var(--text-mid); margin-top:5px;">
                {{ $GetRoleOffice ? ucfirst($GetRoleOffice) . ' Office' : '' }}
            </div>
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
        </nav>

        <div class="sidebar-footer" style="margin-top:auto; padding:15px; border-top:1px solid #eee;">
            @php
                $staff = auth()->guard('staff')->user();
            @endphp
            <div class="staff-info" style="display:flex; align-items:center; gap:10px;">
                <div class="staff-avatar"
                    style="width:40px; height:40px; border-radius:50%; background:#ccc; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:14px;">
                    {{ strtoupper(substr($staff->first_name, 0, 1) . substr($staff->last_name, 0, 1)) }}
                </div>
                <div>
                    <div class="staff-name" style="font-weight:600;">{{ $staff->first_name }} {{ $staff->last_name }}
                    </div>
                    <div class="staff-role" style="font-size:13px; color:var(--text-mid);">
                        {{ $GetRoleOffice ? ucfirst($GetRoleOffice) . ' Office' : '' }}
                    </div>
                </div>
            </div>
        </div>

        <!----logout button--->
        <form method="POST" action="{{ route('logoutStaff') }}" style="margin-top:20px;">
            @csrf
            <button type="submit" class="nav-item"
                style="width:100%; text-align:left; border:none; background:none; padding:10px 15px; display:flex; align-items:center; gap:10px; color:#f72828;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                </svg>
                Logout
            </button>
        </form>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <div class="topbar">
            <div class="topbar-left">
                <h1>Appointments Dashboard</h1>
                <p>Mater Dei Academy Tagaytay Incorporated
                    @if ($GetRoleOffice == 'registrar')
                        - Registrar's Office
                    @elseif ($GetRoleOffice == 'guidance')
                        - Guidance Office
                    @elseif ($GetRoleOffice == 'cashier')
                        - Cashier's Office
                    @elseif ($GetRoleOffice == 'none')
                        - Admission Office
                    @elseif ($GetRoleOffice == 'elem')
                        - Elementary Principal's Office
                    @elseif ($GetRoleOffice == 'sr')
                        - Senior High Principal's Office
                    @endif
                </p>
            </div>
            <div class="topbar-right">
                <div class="today-badge" id="todayBadge">📅 ...</div>
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
                        <div class="stat-value" id="statPending">{{ $GetTotalStatusPending }}</div>
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
                        <div class="stat-value" id="statConfirmed">{{ $GetTotalStatusConfirmed }}</div>
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
                        <div class="stat-value" id="statDone">{{ $GetTotalStatusDone }}</div>
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
                        <div class="stat-value" id="statCancelled">{{ $GetTotalStatusCancelled }}</div>
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
                <button class="tab-btn active" onclick="setTab('All',this)">
                    All
                    <span class="tab-count" id="tc-All">
                        {{ $GetUserBookAppointments->count() }}
                    </span>
                </button>
                <button class="tab-btn" onclick="setTab('pending',this)">
                    Pending
                    <span class="tab-count" id="tc-Pending">
                        {{ $GetTotalStatusPending }}
                    </span>
                </button>
                <button class="tab-btn" onclick="setTab('confirmed',this)">
                    Confirmed
                    <span class="tab-count" id="tc-Confirmed">
                        {{ $GetTotalStatusConfirmed }}
                    </span>
                </button>
                <button class="tab-btn" onclick="setTab('done',this)">
                    Completed
                    <span class="tab-count" id="tc-Done">
                        {{ $GetTotalStatusDone }}
                    </span>
                </button>
                <button class="tab-btn" onclick="setTab('cancelled',this)">
                    Cancelled
                    <span class="tab-count" id="tc-Cancelled">
                        {{ $GetTotalStatusCancelled }}
                    </span>
                </button>
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
                        <input class="filter-input" type="text" placeholder="Search by name, ID, or reason..."
                            oninput="setSearch(this.value)" />
                    </div>
                    <select class="filter-select" onchange="setDateSort(this.value)">
                        <option value="asc">Date: Earliest First</option>
                        <option value="desc">Date: Latest First</option>
                    </select>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Reference ID</th>
                                <th>Full Name</th>
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

    <!-- Delete Modal -->
    <div id="deleteModal" class="modals">
        <div class="modal-contents">
            <h3>Delete Appointment</h3>
            <p>Are you sure you want to delete this appointment?</p>
            <div class="modal-actionss">
                <button class="btn-cancels" onclick="closeDeleteModal()">Cancel</button>
                <button class="btn-deletes" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>

    @php
        $appointmentsJson = $GetUserBookAppointments
            ->map(function ($a) {
                return [
                    'id' => (string) $a->id,
                    'reference_number' => $a->reference_number,
                    'name' => $a->parent_name,
                    'email' => $a->email,
                    'date' => $a->appointment_date,
                    'time' => $a->appointment_time,
                    'purpose' => $a->purpose,
                    'additional_note' => $a->additional_note ?? '',
                    'office' => $a->role,
                    'status' => $a->status,
                ];
            })
            ->values();
    @endphp

    <script>
        // ── DATA ──
        const appointments = @json($appointmentsJson);

        // ── STATE ──
        let activeTab = 'All',
            searchVal = '',
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
            if (!t) return '—';
            const [h, m] = t.split(':');
            const ap = +h >= 12 ? 'PM' : 'AM';
            return `${(+h % 12) || 12}:${m} ${ap}`;
        }

        // FIX: All statuses are lowercase from DB — comparisons now use lowercase consistently
        function statusBadge(status) {
            switch (status) {
                case 'pending':
                    return `<span style="background:#ffc107;color:#000;padding:4px 10px;border-radius:6px;font-size:12px;">Pending</span>`;
                case 'confirmed':
                    return `<span style="background:#0d6efd;color:#fff;padding:4px 10px;border-radius:6px;font-size:12px;">Confirmed</span>`;
                case 'cancelled':
                    return `<span style="background:#dc3545;color:#fff;padding:4px 10px;border-radius:6px;font-size:12px;">Cancelled</span>`;
                case 'done':
                    return `<span style="background:#198754;color:#fff;padding:4px 10px;border-radius:6px;font-size:12px;">Done</span>`;
                default:
                    return `<span style="background:#6c757d;color:#fff;padding:4px 10px;border-radius:6px;font-size:12px;">${status}</span>`;
            }
        }

        function getOfficeName(role) {
            switch (role) {
                case 'registrar':
                    return "Registrar's Office";
                case 'guidance':
                    return "Guidance Office";
                case 'cashier':
                    return "Cashier's Office";
                case 'none':
                    return "Admission Office";
                case 'elem':
                    return "Elementary Principal's Office";
                case 'sr':
                    return "Senior High Principal's Office";
                default:
                    return role;
            }
        }

        // ── STATS & TAB COUNTS ──
        function updateStats() {
            const total = appointments.length;
            const pending = appointments.filter(a => a.status === 'pending').length;
            const confirmed = appointments.filter(a => a.status === 'confirmed').length;
            const done = appointments.filter(a => a.status === 'done').length;
            const cancelled = appointments.filter(a => a.status === 'cancelled').length;

            document.getElementById('statTotal').textContent = total;
            document.getElementById('statPending').textContent = pending;
            document.getElementById('statConfirmed').textContent = confirmed;
            document.getElementById('statDone').textContent = done;
            document.getElementById('statCancelled').textContent = cancelled;

            // FIX: Also update tab count badges dynamically
            document.getElementById('tc-All').textContent = total;
            document.getElementById('tc-Pending').textContent = pending;
            document.getElementById('tc-Confirmed').textContent = confirmed;
            document.getElementById('tc-Done').textContent = done;
            document.getElementById('tc-Cancelled').textContent = cancelled;
        }

        // ── FILTER & RENDER ──
        function getFiltered() {
            let data = [...appointments];

            if (activeTab !== 'All') {
                data = data.filter(a => a.status.toLowerCase() === activeTab.toLowerCase());
            }

            if (searchVal) {
                data = data.filter(a =>
                    a.name.toLowerCase().includes(searchVal) ||
                    (a.reference_number && a.reference_number.toLowerCase().includes(searchVal)) ||
                    a.purpose.toLowerCase().includes(searchVal)
                );
            }

            data.sort((a, b) =>
                dateSort === 'asc' ?
                (a.date + a.time).localeCompare(b.date + b.time) :
                (b.date + b.time).localeCompare(a.date + a.time)
            );

            return data;
        }

        function renderTable() {
            const data = getFiltered();
            const tbody = document.getElementById('tableBody');

            document.getElementById('tableSubtitle').textContent =
                `Showing ${data.length} appointment${data.length !== 1 ? 's' : ''}`;

            if (!data.length) {
                tbody.innerHTML =
                    `<tr><td colspan="7" style="text-align:center;padding:40px;color:var(--text-light)">No appointments found.</td></tr>`;
                updateStats();
                return;
            }

            tbody.innerHTML = data.map(a => {
                // FIX: lowercase comparison — was 'Pending'/'Confirmed' before (capital), now correct
                const isPending = a.status === 'Pending';
                const isConfirmed = a.status === 'Confirmed';

                const actionBtns = `
                    <div class="action-btns">
                        <button class="act-btn view" title="View Details" onclick="openViewModal('${a.id}')">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            View
                        </button>
                        ${isPending ? `
                                                <button class="act-btn accept" title="Accept Appointment" onclick="acceptAppt('${a.id}')">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                                    Accept
                                                </button>
                                                <button class="act-btn decline" title="Decline Appointment" onclick="declineAppt('${a.id}')">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                                    Decline
                                                </button>` : ''}
                        ${isConfirmed ? `
                                                <button class="act-btn done" title="Mark as Done" onclick="markDone('${a.id}')">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                                    Done
                                                </button>` : ''}
                        <button class="act-btn del" title="Delete" onclick="openDeleteModal('${a.id}')">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6"/>
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                            </svg>
                        </button>
                    </div>`;

                return `<tr>
                    <td style="color:var(--text-light);font-size:11px;font-weight:600">${a.reference_number}</td>
                    <td><div class="td-name">${a.name}</div><div class="td-sub">${a.email || '—'}</div></td>
                    <td><div style="font-weight:600">${fmtDate(a.date)}</div><div class="td-sub">${fmtTime(a.time)}</div></td>
                    <td>${getOfficeName(a.office)}</td>
                    <td style="max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis" title="${a.purpose}">${a.purpose}</td>
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

        function setDateSort(v) {
            dateSort = v;
            renderTable();
        }

        // ── DELETE MODAL ──
        let deleteId = null;

        function openDeleteModal(id) {
            deleteId = id;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function confirmDelete() {
            if (deleteId) {
                deleteAppointment(deleteId);
                closeDeleteModal();
            }
        }

        // ── ACTIONS ──
        function getCsrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        function acceptAppt(id) {
            fetch(`/mda/staff/update-status-confirmed/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrf()
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const a = appointments.find(x => x.id === id);
                        if (a) {
                            a.status = 'confirmed';
                            renderTable();
                            showToast('success', 'Appointment accepted!');
                        }
                    } else {
                        showToast('error', '❌ Failed to accept appointment.');
                    }
                })
                .catch(() => showToast('error', '❌ Network error. Please try again.'));
        }

        function declineAppt(id) {
            fetch(`/mda/staff/update-status-cancelled/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrf()
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const a = appointments.find(x => x.id === id);
                        if (a) {
                            a.status = 'cancelled';
                            renderTable();
                            showToast('success', 'Appointment declined!');
                        }
                    } else {
                        showToast('error', '❌ Failed to decline appointment.');
                    }
                })
                .catch(() => showToast('error', '❌ Network error. Please try again.'));
        }

        function markDone(id) {
            fetch(`/mda/staff/update-status-done/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrf()
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const a = appointments.find(x => x.id === id);
                        if (a) {
                            a.status = 'done';
                            renderTable();
                            showToast('success', 'Appointment marked as done!');
                        }
                    } else {
                        showToast('error', '❌ Failed to update appointment status.');
                    }
                })
                .catch(() => showToast('error', '❌ Network error. Please try again.'));
        }

        function deleteAppointment(id) {
            fetch(`/mda/staff/delete-appointment/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrf()
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const index = appointments.findIndex(x => x.id === id);
                        if (index !== -1) {
                            appointments.splice(index, 1);
                            renderTable();
                            showToast('success', 'Appointment deleted!');
                        }
                    } else {
                        showToast('error', '❌ Failed to delete appointment.');
                    }
                })
                .catch(() => showToast('error', '❌ Network error. Please try again.'));
        }

        // ── VIEW MODAL ──
        function openViewModal(id) {
            const a = appointments.find(x => x.id === id);
            if (!a) return;

            document.getElementById('viewContent').innerHTML = `
                <div class="detail-item"><div class="detail-label">Appointment ID</div><div class="detail-value">${a.reference_number}</div></div>
                <div class="detail-item"><div class="detail-label">Status</div><div class="detail-value">${statusBadge(a.status)}</div></div>
                <div class="detail-divider"></div>
                <div class="detail-item"><div class="detail-label">Full Name</div><div class="detail-value">${a.name}</div></div>
                <div class="detail-item"><div class="detail-label">Contact</div><div class="detail-value">${a.email || '—'}</div></div>
                <div class="detail-item"><div class="detail-label">Date</div><div class="detail-value">${fmtDate(a.date)}</div></div>
                <div class="detail-item"><div class="detail-label">Time</div><div class="detail-value">${fmtTime(a.time)}</div></div>
                <div class="detail-item"><div class="detail-label">Office</div><div class="detail-value">${getOfficeName(a.office)}</div></div>
                <div class="detail-divider"></div>
                <div class="detail-item detail-full"><div class="detail-label">Reason / Purpose</div><div class="detail-value" style="font-weight:400;font-size:13px;line-height:1.6">${a.purpose}</div></div>
                ${a.additional_note ? `<div class="detail-item detail-full"><div class="detail-label">Notes</div><div class="detail-value" style="font-weight:400;font-size:13px;color:var(--text-mid)">${a.additional_note}</div></div>` : ''}
            `;

            const footer = document.getElementById('viewFooter');
            footer.innerHTML = '';

            const cancelBtn = document.createElement('button');
            cancelBtn.className = 'btn-cancel';
            cancelBtn.textContent = 'Close';
            cancelBtn.onclick = () => closeModal('viewModal');
            footer.appendChild(cancelBtn);

            if (a.status === 'pending') {
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

            if (a.status === 'confirmed') {
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

    {{--
        FIX: Laravel Echo via CDN (no ES module import needed — compatible with InfinityFree shared hosting).
        The Pusher JS SDK is already loaded via CDN in <head>.
        laravel-echo is loaded below via CDN as a UMD bundle.
    --}}
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.3/dist/echo.umd.js"></script>
    <script>
        // FIX: Use config() instead of env() for keys in Blade — env() can return null in production
        const STAFF_ROLE = "{{ $GetRoleOffice }}";

        try {
            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: '{{ config('broadcasting.connections.pusher.key') }}',
                cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
                forceTLS: true
            });

            window.Echo.private(`appointments.${STAFF_ROLE}`)
                .listen('NewAppointment', (e) => {
                    if (e.appointment) {
                        // Ensure id is string to match existing data
                        e.appointment.id = String(e.appointment.id);
                        appointments.push(e.appointment);
                        renderTable();
                        showToast('success', '📌 New appointment received!');
                    }
                });
        } catch (err) {
            console.warn('Pusher/Echo could not initialize:', err);
        }
    </script>
</body>

</html>
