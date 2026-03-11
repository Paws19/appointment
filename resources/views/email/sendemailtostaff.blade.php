<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment Request – Mater Dei Academy</title>
</head>

<body style="margin:0;padding:0;background-color:#e8edf8;font-family:'Segoe UI',Arial,sans-serif;color:#1a1f35;">

    <!-- OUTER WRAPPER -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#e8edf8;padding:36px 12px;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:620px;">

                    <!-- TOP GRADIENT BAR -->
                    <tr>
                        <td
                            style="height:5px;background:linear-gradient(90deg,#162960 0%,#254494 55%,#c9a84c 100%);border-radius:4px 4px 0 0;font-size:0;line-height:0;">
                            &nbsp;</td>
                    </tr>

                    <!-- CARD -->
                    <tr>
                        <td style="background:#ffffff;border-radius:0 0 16px 16px;overflow:hidden;">

                            <!-- ══ HEADER ══ -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="background-color:#1d3577;padding:36px 44px 32px;">

                                        <!-- Logo Row -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:22px;">
                                            <tr>
                                                <td width="72" valign="middle">
                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td
                                                                style="background:#ffffff;border-radius:12px;padding:5px;width:64px;height:64px;">
                                                                <img src="{{ $logoPath }}" alt="Mater Dei Academy"
                                                                    width="54" height="54"
                                                                    style="display:block;width:54px;height:54px;object-fit:contain;">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td valign="middle" style="padding-left:14px;">
                                                    <p
                                                        style="margin:0;font-family:Georgia,'Times New Roman',serif;color:#ffffff;font-size:15px;font-weight:700;line-height:1.4;">
                                                        Mater Dei Academy Tagaytay Incorporated</p>
                                                    <p
                                                        style="margin:4px 0 0;color:rgba(255,255,255,0.55);font-size:10.5px;line-height:1.55;">
                                                        J.P. Rizal Street, Kaybagal South, Tagaytay City, Cavite,
                                                        Philippines</p>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Divider -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:20px;">
                                            <tr>
                                                <td
                                                    style="height:1px;background-color:rgba(201,168,76,0.4);font-size:0;line-height:0;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>

                                        <!-- Title -->
                                        <p
                                            style="margin:0 0 6px;font-size:10px;font-weight:600;letter-spacing:2.5px;text-transform:uppercase;color:#e8c96e;">
                                            Parent Appointment Portal — Staff Notification</p>
                                        <p
                                            style="margin:0;font-family:Georgia,'Times New Roman',serif;color:#ffffff;font-size:26px;font-weight:700;line-height:1.25;">
                                            New Appointment<br>Request Received</p>

                                    </td>
                                </tr>
                            </table>

                            <!-- ══ ALERT BAR (GOLD / PENDING) ══ -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td
                                        style="background-color:#fffbef;border-top:1px solid #e8c96e;border-bottom:1px solid #e8c96e;padding:11px 44px;">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td valign="middle"
                                                    style="width:28px;height:28px;background-color:#c9a84c;border-radius:50%;text-align:center;font-size:13px;line-height:28px;">
                                                    🔔</td>
                                                <td valign="middle" style="padding-left:10px;">
                                                    <span
                                                        style="font-size:11.5px;font-weight:700;color:#7a5a00;letter-spacing:1.2px;text-transform:uppercase;">Action
                                                        Required</span>
                                                    <span style="font-size:11.5px;color:#a07800;"> — A parent is
                                                        requesting an appointment with your office</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- ══ BODY ══ -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="padding:36px 44px 32px;">

                                        <!-- Greeting -->
                                        <p
                                            style="margin:0 0 14px;font-family:Georgia,'Times New Roman',serif;font-size:21px;color:#1d3577;">
                                            Dear {{ $staffName ?? 'Sir/Miss' }},</p>
                                        <p style="margin:0 0 30px;font-size:14px;color:#4a5068;line-height:1.8;">
                                            This is an official notification from the <strong
                                                style="color:#1d3577;">Parent Appointment Portal</strong>.
                                            A parent has submitted an appointment request directed to your office.
                                            Please review the details below
                                            and take the appropriate action at your earliest convenience.
                                        </p>

                                        <!-- ── APPOINTMENT DETAILS CARD ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="background-color:#f4f7fd;border:1px solid #cdd8f0;border-radius:12px;margin-bottom:28px;overflow:hidden;">

                                            <!-- Card Header -->
                                            <tr>
                                                <td colspan="2" style="background-color:#1d3577;padding:13px 22px;">
                                                    <p
                                                        style="margin:0;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#e8c96e;">
                                                        📋 &nbsp;Appointment Details</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding:13px 22px 0;width:38%;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Reference Number
                                                </td>
                                                <td
                                                    style="padding:13px 22px 0;font-size:13.5px;color:#1a1f35;font-weight:600;vertical-align:top;">
                                                    {{ $appointment->reference_number }}
                                                </td>
                                            </tr>
                                            <!-- Row: Parent Name -->
                                            <tr>
                                                <td
                                                    style="padding:13px 22px 0;width:38%;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Parent Name
                                                </td>
                                                <td
                                                    style="padding:13px 22px 0;font-size:13.5px;color:#1a1f35;font-weight:600;vertical-align:top;">
                                                    {{ $appointment->parent_name }}
                                                </td>
                                            </tr>




                                            <!-- Row: Email -->
                                            <tr>
                                                <td
                                                    style="padding:10px 22px 0;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Email Address
                                                </td>
                                                <td
                                                    style="padding:10px 22px 0;font-size:13.5px;color:#1a1f35;vertical-align:top;">
                                                    <a href="mailto:{{ $appointment->email }}"
                                                        style="color:#1d3577;text-decoration:none;font-weight:500;">{{ $appointment->email }}</a>
                                                </td>
                                            </tr>

                                            <!-- Divider -->
                                            <tr>
                                                <td colspan="2" style="padding:14px 22px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                        border="0">
                                                        <tr>
                                                            <td
                                                                style="height:1px;background-color:#cdd8f0;font-size:0;">
                                                                &nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <!-- Row: Preferred Date -->
                                            <tr>
                                                <td
                                                    style="padding:14px 22px 0;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Preferred Date
                                                </td>
                                                <td style="padding:14px 22px 0;vertical-align:top;">
                                                    <span
                                                        style="display:inline-block;background-color:#1d3577;color:#ffffff;font-size:12px;font-weight:700;padding:4px 12px;border-radius:20px;">
                                                        📅
                                                        &nbsp;{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y') }}
                                                    </span>
                                                </td>
                                            </tr>

                                            <!-- Row: Preferred Time -->
                                            <tr>
                                                <td
                                                    style="padding:10px 22px 0;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Preferred Time
                                                </td>
                                                <td style="padding:10px 22px 0;vertical-align:top;">
                                                    <span
                                                        style="display:inline-block;background-color:#c9a84c;color:#162960;font-size:12px;font-weight:700;padding:4px 12px;border-radius:20px;">
                                                        🕐
                                                        &nbsp;{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}
                                                    </span>
                                                </td>
                                            </tr>

                                            <!-- Row: Office -->
                                            <tr>
                                                <td
                                                    style="padding:10px 22px 0;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Office Requested
                                                </td>
                                                <td
                                                    style="padding:10px 22px 0;font-size:13.5px;color:#1a1f35;vertical-align:top;">
                                                    @if ($appointment->role === 'cashier')
                                                        Cashier Office
                                                    @elseif($appointment->role === 'registrar')
                                                        Registrar's Office
                                                    @elseif($appointment->role === 'guidance')
                                                        Guidance Office
                                                    @elseif($appointment->role === 'none')
                                                        Admission Office
                                                    @elseif($appointment->role === 'elem')
                                                        Junior High Principal's Office
                                                    @elseif($appointment->role === 'sr')
                                                        Senior High Principal's Office
                                                    @else
                                                        {{ $appointment->role }}
                                                    @endif
                                                </td>
                                            </tr>

                                            <!-- Divider -->
                                            <tr>
                                                <td colspan="2" style="padding:14px 22px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                        border="0">
                                                        <tr>
                                                            <td
                                                                style="height:1px;background-color:#cdd8f0;font-size:0;">
                                                                &nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <!-- Row: Purpose / Concern -->
                                            <tr>
                                                <td
                                                    style="padding:14px 22px 20px;font-size:11.5px;font-weight:700;color:#1d3577;text-transform:uppercase;letter-spacing:0.6px;vertical-align:top;">
                                                    Purpose / Concern
                                                </td>
                                                <td
                                                    style="padding:14px 22px 20px;font-size:13px;color:#3a4460;line-height:1.75;vertical-align:top;">
                                                    {{ $appointment->purpose }}
                                                </td>
                                            </tr>

                                        </table>

                                        <!-- ── PROGRESS STEPS ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:28px;border:1px solid #dde4f0;border-radius:10px;overflow:hidden;">
                                            <tr>
                                                <!-- Step 1: Submitted — active (gold) -->
                                                <td width="33%" align="center"
                                                    style="background-color:#1e4d34;padding:14px 12px;border-right:1px solid #2a6b45;">
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                        style="margin:0 auto 7px;">
                                                        <tr>
                                                            <td
                                                                style="width:30px;height:30px;background-color:#3cb371;border-radius:50%;text-align:center;font-size:14px;font-weight:700;color:#ffffff;line-height:30px;">
                                                                ✓</td>
                                                        </tr>
                                                    </table>
                                                    <p
                                                        style="margin:0;font-size:10.5px;font-weight:700;color:#7eeaaa;letter-spacing:0.5px;">
                                                        Submitted</p>
                                                </td>

                                                <!-- Step 2: Under Review — CURRENT (gold highlight) -->
                                                <td width="33%" align="center"
                                                    style="background-color:#1d3577;padding:14px 12px;border-right:1px solid #2a4a8a;position:relative;">
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                        style="margin:0 auto 7px;">
                                                        <tr>
                                                            <td
                                                                style="width:30px;height:30px;background-color:#c9a84c;border-radius:50%;text-align:center;font-size:12px;font-weight:700;color:#162960;line-height:30px;">
                                                                2</td>
                                                        </tr>
                                                    </table>
                                                    <p
                                                        style="margin:0;font-size:10.5px;font-weight:700;color:#e8c96e;letter-spacing:0.5px;">
                                                        ▶ Under Review</p>
                                                </td>

                                                <!-- Step 3: Awaiting Confirmation — inactive -->
                                                <td width="33%" align="center"
                                                    style="background-color:#1d3577;padding:14px 12px;opacity:0.45;">
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                        style="margin:0 auto 7px;">
                                                        <tr>
                                                            <td
                                                                style="width:30px;height:30px;background-color:rgba(255,255,255,0.2);border-radius:50%;text-align:center;font-size:12px;font-weight:700;color:rgba(255,255,255,0.6);line-height:30px;">
                                                                3</td>
                                                        </tr>
                                                    </table>
                                                    <p
                                                        style="margin:0;font-size:10.5px;font-weight:600;color:rgba(255,255,255,0.55);">
                                                        Confirmed</p>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- ── INSTRUCTION BOX ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="background-color:#eef3fc;border:1px solid #cdd8f0;border-radius:12px;margin-bottom:28px;">
                                            <tr>
                                                <td width="66" valign="top" style="padding:20px 0 20px 22px;">
                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td
                                                                style="width:44px;height:44px;background-color:#1d3577;border-radius:50%;text-align:center;font-size:20px;line-height:44px;">
                                                                ⚡</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:20px 22px 20px 10px;" valign="top">
                                                    <p
                                                        style="margin:0 0 6px;font-size:13px;font-weight:700;color:#1d3577;">
                                                        Next Steps for Your Office</p>
                                                    <p style="margin:0;font-size:13px;color:#3a4460;line-height:1.75;">
                                                        Please log in to the <strong style="color:#1d3577;">Appointment
                                                            Management Portal</strong>
                                                        to review this request. You may <strong
                                                            style="color:#2d7d4f;">Confirm</strong> or
                                                        <strong style="color:#b94040;">Decline</strong> the
                                                        appointment request.
                                                        The parent will be notified automatically once you take action.
                                                        Kindly respond within <strong style="color:#1d3577;">24–48
                                                            hours</strong> of receiving this notification.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- DIVIDER -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin:24px 0;">
                                            <tr>
                                                <td style="height:1px;background-color:#dde4f0;font-size:0;">&nbsp;
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Closing -->
                                        <p style="margin:0 0 22px;font-size:13.5px;color:#4a5068;line-height:1.8;">
                                            If this appointment was submitted to your office by mistake, please
                                            coordinate with
                                            the administration so the request can be re-routed to the appropriate
                                            department.
                                            Thank you for your prompt attention to this matter.
                                        </p>

                                        <!-- Sign Off -->
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:4px;">
                                            <tr>
                                                <td
                                                    style="height:3px;width:44px;background-color:#c9a84c;border-radius:2px;font-size:0;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>
                                        <p style="margin:10px 0 0;font-size:14px;color:#4a5068;line-height:1.9;">
                                            With regards,<br>
                                            <strong style="color:#1d3577;">Mater Dei Academy Tagaytay
                                                Incorporated</strong><br>
                                            Parent Appointment Portal — Automated Notification System
                                        </p>

                                    </td>
                                </tr>
                            </table>

                            <!-- ══ FOOTER ══ -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="background-color:#162960;padding:28px 44px;text-align:center;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:16px;">
                                            <tr>
                                                <td
                                                    style="height:2px;background-color:rgba(201,168,76,0.45);font-size:0;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>
                                        <p
                                            style="margin:0 0 8px;font-family:Georgia,'Times New Roman',serif;font-size:14px;color:rgba(255,255,255,0.88);font-weight:700;">
                                            Mater Dei Academy Tagaytay Incorporated</p>
                                        <p
                                            style="margin:0;font-size:11.5px;color:rgba(255,255,255,0.48);line-height:1.9;">
                                            📍 J.P. Rizal Street, Kaybagal South, Tagaytay City, Cavite, Philippines<br>
                                            📞 {{ '(046) 483 3686' }} &nbsp;·&nbsp;
                                            ✉️ <a href="mailto:{{ $schoolEmail ?? 'infomdatagaytay@gmail.com' }}"
                                                style="color:#e8c96e;text-decoration:none;font-weight:500;">infomdatagaytay@gmail.com</a>
                                        </p>
                                        <p style="margin:14px 0 10px;font-size:16px;color:rgba(201,168,76,0.6);">· · ·
                                        </p>
                                        <p
                                            style="margin:0;font-size:10px;color:rgba(255,255,255,0.27);letter-spacing:0.4px;">
                                            This is an automated system message. Please do not reply directly to this
                                            email.</p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
