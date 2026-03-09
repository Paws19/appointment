<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Cancelled – Mater Dei Academy</title>
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
                                                                <img src="{{ $logo }}" alt="Mater Dei Academy"
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
                                            Parent Appointment Portal</p>
                                        <p
                                            style="margin:0;font-family:Georgia,'Times New Roman',serif;color:#ffffff;font-size:26px;font-weight:700;line-height:1.25;">
                                            Appointment Request<br>Has Been Cancelled</p>

                                    </td>
                                </tr>
                            </table>

                            <!-- ══ CANCELLED BAR (RED) ══ -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td
                                        style="background-color:#fff5f5;border-top:1px solid #f5b8b8;border-bottom:1px solid #f5b8b8;padding:11px 44px;">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td valign="middle"
                                                    style="width:28px;height:28px;background-color:#c0392b;border-radius:50%;text-align:center;font-size:13px;line-height:28px;">
                                                    ❌</td>
                                                <td valign="middle" style="padding-left:10px;">
                                                    <span
                                                        style="font-size:11.5px;font-weight:700;color:#a93226;letter-spacing:1.2px;text-transform:uppercase;">Cancelled</span>
                                                    <span style="font-size:11.5px;color:#c0392b;"> — Your appointment
                                                        has been cancelled by the {{ $appointment->role }}</span>
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
                                            Dear Parent {{ $appointment->parent_name }},</p>
                                        <p style="margin:0 0 30px;font-size:14px;color:#4a5068;line-height:1.8;">
                                            We regret to inform you that your appointment request has been
                                            <strong style="color:#c0392b;">cancelled</strong> by our @if ($appointment->role === 'cashier')
                                                Cashier Staff
                                            @elseif($appointment->role === 'registrar')
                                                Registrar's Staff
                                            @elseif($appointment->role === 'guidance')
                                                Guidance Staff
                                            @elseif($appointment->role === 'none')
                                                Guidance Staff
                                            @elseif($appointment->role === 'elem')
                                                Elementary Principal's Staff
                                            @elseif($appointment->role === 'sr')
                                                Senior High Principal's Staff
                                            @else
                                                {{ $appointment->role }}
                                            @endif
                                            office. We sincerely apologize for any inconvenience this may have caused.
                                            We understand how valuable your time is, and we want to assure you that
                                            we are still here to assist you with any concerns regarding your child's
                                            enrollment or academic matters.
                                        </p>

                                        <!-- ── PROGRESS STEPS ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:32px;border:1px solid #dde4f0;border-radius:10px;overflow:hidden;">
                                            <tr>
                                                <!-- Step 1: Submitted — done (gold) -->
                                                <td width="33%" align="center"
                                                    style="background-color:#1d3577;padding:14px 12px;border-right:1px solid #2a4a8a;">
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                        style="margin:0 auto 7px;">
                                                        <tr>
                                                            <td
                                                                style="width:30px;height:30px;background-color:#c9a84c;border-radius:50%;text-align:center;font-size:12px;font-weight:700;color:#162960;line-height:30px;">
                                                                1</td>
                                                        </tr>
                                                    </table>
                                                    <p
                                                        style="margin:0;font-size:10.5px;font-weight:600;color:rgba(255,255,255,0.85);">
                                                        Submitted</p>
                                                </td>

                                                <!-- Step 2: Under Review — done (gold) -->
                                                <td width="33%" align="center"
                                                    style="background-color:#1d3577;padding:14px 12px;border-right:1px solid #2a4a8a;">
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                        style="margin:0 auto 7px;">
                                                        <tr>
                                                            <td
                                                                style="width:30px;height:30px;background-color:#c9a84c;border-radius:50%;text-align:center;font-size:12px;font-weight:700;color:#162960;line-height:30px;">
                                                                2</td>
                                                        </tr>
                                                    </table>
                                                    <p
                                                        style="margin:0;font-size:10.5px;font-weight:600;color:rgba(255,255,255,0.85);">
                                                        Under Review</p>
                                                </td>

                                                <!-- Step 3: Cancelled — RED -->
                                                <td width="33%" align="center"
                                                    style="background-color:#4a1010;padding:14px 12px;">
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                        style="margin:0 auto 7px;">
                                                        <tr>
                                                            <td
                                                                style="width:30px;height:30px;background-color:#c0392b;border-radius:50%;text-align:center;font-size:14px;font-weight:700;color:#ffffff;line-height:30px;">
                                                                ✕</td>
                                                        </tr>
                                                    </table>
                                                    <p
                                                        style="margin:0;font-size:10.5px;font-weight:700;color:#f5a0a0;letter-spacing:0.5px;">
                                                        Cancelled</p>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- ── INFO BOX ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="background-color:#fff5f5;border:1px solid #f5c6c6;border-radius:12px;margin-bottom:28px;">
                                            <tr>
                                                <td width="66" valign="top" style="padding:20px 0 20px 22px;">
                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td
                                                                style="width:44px;height:44px;background-color:#c0392b;border-radius:50%;text-align:center;font-size:20px;line-height:44px;">
                                                                🔁</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:20px 22px 20px 10px;" valign="top">
                                                    <p
                                                        style="margin:0 0 6px;font-size:13px;font-weight:700;color:#a93226;">
                                                        Would You Like to Reschedule?</p>
                                                    <p style="margin:0;font-size:13px;color:#3a4460;line-height:1.75;">
                                                        We encourage you to submit a new appointment request at your
                                                        earliest convenience. You may visit our
                                                        <strong style="color:#1d3577;">Parent Appointment
                                                            Portal</strong>
                                                        to select a new date and time. Alternatively, you may reach us
                                                        directly at the school office or send us an email and our staff
                                                        will be happy to assist you in scheduling a new appointment.
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
                                            If you believe this cancellation was made in error or you have further
                                            questions, please do not hesitate to contact our administration office
                                            directly. We are always ready to assist you and address your concerns
                                            at the soonest possible time.
                                        </p>

                                        <!-- Sign Off -->
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:4px;">
                                            <tr>
                                                <td
                                                    style="height:3px;width:44px;background-color:#1d3577;border-radius:2px;font-size:0;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>
                                        <p style="margin:10px 0 0;font-size:14px;color:#4a5068;line-height:1.9;">
                                            With sincere apologies,<br>
                                            <strong style="color:#1d3577;">Mater Dei Academy Tagaytay
                                                Incorporated</strong><br>
                                            @if ($appointment->role === 'cashier')
                                                Cashier Staff
                                            @elseif($appointment->role === 'registrar')
                                                Registrar's Staff
                                            @elseif($appointment->role === 'guidance')
                                                Guidance Staff
                                            @elseif($appointment->role === 'none')
                                                Guidance Staff
                                            @elseif($appointment->role === 'elem')
                                                Elementary Principal's Staff
                                            @elseif($appointment->role === 'sr')
                                                Senior High Principal's Staff
                                            @else
                                                {{ $appointment->role }}
                                            @endif
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
