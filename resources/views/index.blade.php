<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mater Dei Academy of Tagaytay</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,700;1,600&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo/mdalogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">

</head>

<body>

    <!-- ─── NAVBAR ─── -->
    <nav>
        <div class="nav-brand">
            <div class="nav-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 60px; width: 60px;">
            </div>
            <div class="nav-name">Mater Dei Academy of Tagaytay Incorporated</div>
        </div>
        <div class="nav-links">
            <button class="nav-link"
                onclick="document.getElementById('appt-list').scrollIntoView({behavior:'smooth'})">View
                Appointments</button>
            <button class="nav-link"
                onclick="document.getElementById('offices').scrollIntoView({behavior:'smooth'})">Offices</button>
            <button class="nav-link cta"
                onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">📅 Book Now</button>
        </div>
    </nav>

    <!-- ─── HERO ─── -->
    <section class="hero" id="book">
        <div class="hero-grid"></div>
        <div class="hero-inner">

            <!-- COPY -->
            <div class="hero-copy">
                <div class="hero-badge">
                    <span></span> Online Appointment System
                </div>
                <h1 class="hero-title">
                    Schedule Your<br><em>School Visit</em><br>with Ease
                </h1>
                <p class="hero-desc">
                    Book an appointment with any school office — quickly and conveniently. No need to wait in line. Fill
                    out the form and we'll confirm your schedule.
                </p>
                <div class="hero-info">
                    <div class="info-row">
                        <div class="ic">🕐</div>
                        Office hours: Monday – Friday, 8:00 AM – 3:00 PM
                    </div>
                    <div class="info-row">
                        <div class="ic">📍</div>
                        Visit any of our 6 school offices
                    </div>
                    <div class="info-row">
                        <div class="ic">✅</div>
                        Appointments confirmed within 24 hours
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <div class="hero-form-wrap">
                <div class="form-card">
                    <div class="form-card-head">
                        <div class="fch-icon">📝</div>
                        <div>
                            <div class="fch-title">Book an Appointment</div>
                            <div class="fch-sub">Fill in all required fields below</div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="fg">
                            <label class="fl">Parent / Guardian Name <span>*</span></label>
                            <input id="inp-name" class="fi" type="text" placeholder="e.g. Maria Santos"
                                autocomplete="off">
                        </div>
                        <div class="fg">
                            <label class="fl">Appointment Date <span>*</span></label>
                            <input id="inp-date" class="fi" type="date">
                        </div>
                        <div class="fg">
                            <label class="fl">Reason for Visit <span>*</span></label>
                            <textarea id="inp-reason" class="fi" placeholder="Briefly describe your concern…"></textarea>
                        </div>
                        <div class="fg">
                            <label class="fl">Select Office <span>*</span></label>
                            <div class="og" id="og">
                                <button class="op" data-val="Registrar" onclick="pick(this)">
                                    <div class="oi">📋</div>Registrar
                                </button>
                                <button class="op" data-val="Cashier" onclick="pick(this)">
                                    <div class="oi">💳</div>Cashier
                                </button>
                                <button class="op" data-val="Guidance" onclick="pick(this)">
                                    <div class="oi">🧭</div>Guidance
                                </button>
                                <button class="op" data-val="Admission" onclick="pick(this)">
                                    <div class="oi">📝</div>Admission
                                </button>
                                <button class="op" data-val="Elem Principal" onclick="pick(this)">
                                    <div class="oi">🎒</div>Elem Principal
                                </button>
                                <button class="op" data-val="Senior Principal" onclick="pick(this)">
                                    <div class="oi">🎓</div>Sr. Principal
                                </button>
                            </div>
                        </div>
                        <button class="btn-submit" onclick="submit()">
                            <span>📅</span> Confirm Appointment
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ─── OFFICES STRIP ─── -->
    <div class="offices-strip" id="offices">
        <div class="os-inner">
            <div class="os-label">Available School Offices</div>
            <div class="os-chips">
                <div class="os-chip">📋 Registrar</div>
                <div class="os-chip">💳 Cashier</div>
                <div class="os-chip">🧭 Guidance Counselor</div>
                <div class="os-chip">📝 Admission Office</div>
                <div class="os-chip">🎒 Elementary Principal</div>
                <div class="os-chip">🎓 Senior High Principal</div>
            </div>
        </div>
    </div>

    <!-- ─── APPOINTMENTS LIST ─── -->
    <div class="appt-section" id="appt-list">
        <div class="sec-header">
            <div>
                <div class="sec-title">Scheduled Appointments</div>
                <div class="sec-sub" id="tbl-count">No appointments yet</div>
            </div>
            <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;">
                <div class="stats-mini">
                    <div class="smc">
                        <div class="sv" id="s-total">0</div>
                        <div class="sl">Total</div>
                    </div>
                    <div class="smc">
                        <div class="sv" id="s-pending">0</div>
                        <div class="sl">Pending</div>
                    </div>
                    <div class="smc">
                        <div class="sv" id="s-conf">0</div>
                        <div class="sl">Confirmed</div>
                    </div>
                </div>
                <div class="search-bar">
                    <span style="color:var(--muted);font-size:.9rem">🔍</span>
                    <input type="text" id="si" placeholder="Search name or office…"
                        oninput="renderTable(this.value)">
                </div>
            </div>
        </div>

        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Office</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
            <div id="empty" class="empty">
                <div class="ei">📭</div>
                <div class="et">No appointments yet</div>
                <div class="es">Use the form above to schedule your first visit.</div>
            </div>
        </div>
    </div>

    <!-- ─── FOOTER ─── -->
    <footer>
        <center>
            <div class="fl2" style="text-align: center;">© 2026 Mater Dei Academy of Tagaytay Incorporated. All
                rights reserved.</div>
        </center>

    </footer>

    <div class="toast" id="toast"></div>

    <script>
        let appts = [];
        let selOffice = '';
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('inp-date').value = today;
        document.getElementById('inp-date').min = today;

        function pick(btn) {
            document.querySelectorAll('.op').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            selOffice = btn.dataset.val;
        }

        function obClass(o) {
            const m = {
                'Registrar': 'registrar',
                'Cashier': 'cashier',
                'Guidance': 'guidance',
                'Admission': 'admission',
                'Elem Principal': 'elem',
                'Senior Principal': 'senior'
            };
            return 'ob ob-' + (m[o] || 'registrar');
        }

        function fmtDate(d) {
            if (!d) return '—';
            return new Date(d + 'T00:00:00').toLocaleDateString('en-PH', {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }

        function esc(s) {
            return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        function updateStats() {
            const t = appts.length,
                p = appts.filter(a => a.s === 'Pending').length,
                c = appts.filter(a => a.s === 'Confirmed').length;
            document.getElementById('s-total').textContent = t;
            document.getElementById('s-pending').textContent = p;
            document.getElementById('s-conf').textContent = c;
            document.getElementById('tbl-count').textContent = t ? t + ' appointment' + (t !== 1 ? 's' : '') :
                'No appointments yet';
        }

        function renderTable(f = '') {
            const q = f.toLowerCase();
            const rows = appts.filter(a => a.n.toLowerCase().includes(q) || a.o.toLowerCase().includes(q) || a.r
                .toLowerCase().includes(q));
            const tb = document.getElementById('tbody');
            const em = document.getElementById('empty');
            if (!rows.length) {
                tb.innerHTML = '';
                em.style.display = '';
                return;
            }
            em.style.display = 'none';
            tb.innerHTML = rows.map((a, i) => `
    <tr>
      <td style="color:var(--muted);font-size:.76rem;font-weight:700">${i+1}</td>
      <td><div class="tn">${esc(a.n)}</div></td>
      <td><div class="tr2" title="${esc(a.r)}">${esc(a.r)}</div></td>
      <td><span class="${obClass(a.o)}"><span class="d"></span>${a.o}</span></td>
      <td><div class="td2">${fmtDate(a.d)}</div></td>
      <td><span class="sb ${a.s==='Confirmed'?'sb-c':'sb-p'}">${a.s==='Confirmed'?'✓ Confirmed':'⏳ Pending'}</span></td>
      <td>
        <button class="tb" onclick="toggle('${a.id}')">Confirm</button>
        <button class="tb del" onclick="del('${a.id}')">Delete</button>
      </td>
    </tr>`).join('');
            updateStats();
        }

        function submit() {
            const n = document.getElementById('inp-name').value.trim();
            const d = document.getElementById('inp-date').value;
            const r = document.getElementById('inp-reason').value.trim();
            let ok = true;
            ['inp-name', 'inp-date', 'inp-reason'].forEach(id => document.getElementById(id).classList.remove('err'));
            if (!n) {
                document.getElementById('inp-name').classList.add('err');
                ok = false;
            }
            if (!d) {
                document.getElementById('inp-date').classList.add('err');
                ok = false;
            }
            if (!r) {
                document.getElementById('inp-reason').classList.add('err');
                ok = false;
            }
            if (!selOffice) {
                const g = document.getElementById('og');
                g.style.outline = '2px solid var(--red)';
                g.style.borderRadius = '10px';
                setTimeout(() => g.style.outline = '', 1200);
                ok = false;
            }
            if (!ok) {
                showToast('⚠️ Please fill in all required fields.', true);
                return;
            }
            appts.unshift({
                id: Date.now() + '',
                n,
                d,
                r,
                o: selOffice,
                s: 'Pending'
            });
            // reset
            document.getElementById('inp-name').value = '';
            document.getElementById('inp-date').value = today;
            document.getElementById('inp-reason').value = '';
            document.querySelectorAll('.op').forEach(b => b.classList.remove('active'));
            selOffice = '';
            renderTable(document.getElementById('si').value);
            updateStats();
            showToast('✅ Appointment booked! Scroll down to view.');
            setTimeout(() => document.getElementById('appt-list').scrollIntoView({
                behavior: 'smooth'
            }), 600);
        }

        function toggle(id) {
            const a = appts.find(x => x.id === id);
            if (a) {
                a.s = a.s === 'Confirmed' ? 'Pending' : 'Confirmed';
                renderTable(document.getElementById('si').value);
                updateStats();
                showToast('Status updated to ' + a.s);
            }
        }

        function del(id) {
            appts = appts.filter(x => x.id !== id);
            renderTable(document.getElementById('si').value);
            updateStats();
            showToast('Appointment removed.');
        }

        function showToast(msg, warn) {
            const t = document.getElementById('toast');
            t.textContent = msg;
            t.style.borderLeftColor = warn ? 'var(--amber)' : 'var(--accent)';
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), 3200);
        }

        renderTable();
        updateStats();
    </script>
</body>

</html>
