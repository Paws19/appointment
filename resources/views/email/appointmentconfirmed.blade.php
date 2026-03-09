<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Request Received – Mater Dei Academy</title>
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
                                            Parent Appointment Portal</p>
                                        <p
                                            style="margin:0;font-family:Georgia,'Times New Roman',serif;color:#ffffff;font-size:26px;font-weight:700;line-height:1.25;">
                                            Appointment Request<br>Successfully Confirmed</p>

                                    </td>
                                </tr>
                            </table>

                            <!-- ══ CONFIRMED BAR (GREEN) ══ -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td
                                        style="background-color:#f0faf4;border-top:1px solid #a8d5b8;border-bottom:1px solid #a8d5b8;padding:11px 44px;">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td valign="middle"
                                                    style="width:28px;height:28px;background-color:#2d7d4f;border-radius:50%;text-align:center;font-size:13px;line-height:28px;">
                                                    ✅</td>
                                                <td valign="middle" style="padding-left:10px;">
                                                    <span
                                                        style="font-size:11.5px;font-weight:700;color:#1a6638;letter-spacing:1.2px;text-transform:uppercase;">Confirmed</span>
                                                    <span style="font-size:11.5px;color:#2d7d4f;"> — Please you may now
                                                        go to your appointment</span>
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
                                            We are delighted to inform you that your appointment has been <strong
                                                style="color:#2d7d4f;">officially confirmed</strong>
                                            . by our @if ($appointment->role === 'cashier')
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
                                            @endif. We look forward to meeting with you and are
                                            committed to making your visit as smooth and productive as possible.
                                            Please make sure to arrive on time and bring any necessary documents related
                                            to the purpose of your appointment.
                                        </p>

                                        <!-- ── PROGRESS STEPS ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="margin-bottom:32px;border:1px solid #dde4f0;border-radius:10px;overflow:hidden;">
                                            <tr>
                                                <!-- Step 1: Submitted — active (gold) -->
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

                                                <!-- Step 2: Under Review — active (gold) -->
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

                                                <!-- Step 3: Confirmed — GREEN highlight -->
                                                <td width="33%" align="center"
                                                    style="background-color:#1e4d34;padding:14px 12px;">
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
                                                        Confirmed</p>
                                                </td>
                                            </tr>
                                        </table>



                                        <!-- ── INFO BOX ── -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                            style="background-color:#eef3fc;border:1px solid #cdd8f0;border-radius:12px;margin-bottom:28px;">
                                            <tr>
                                                <td width="66" valign="top" style="padding:20px 0 20px 22px;">
                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td
                                                                style="width:44px;height:44px;background-color:#1d3577;border-radius:50%;text-align:center;font-size:20px;line-height:44px;">
                                                                📋</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:20px 22px 20px 10px;" valign="top">
                                                    <p
                                                        style="margin:0 0 6px;font-size:13px;font-weight:700;color:#1d3577;">
                                                        What to Prepare for Your Visit</p>
                                                    <p style="margin:0;font-size:13px;color:#3a4460;line-height:1.75;">
                                                        Your appointment is now set. Please arrive at the
                                                        <strong style="color:#1d3577;">
                                                            @if ($appointment->role === 'cashier')
                                                                Cashier Office
                                                            @elseif($appointment->role === 'registrar')
                                                                Registrar's Office
                                                            @elseif($appointment->role === 'guidance')
                                                                Guidance Office
                                                            @elseif($appointment->role === 'none')
                                                                Guidance Office
                                                            @elseif($appointment->role === 'elem')
                                                                Elementary Principal's Office
                                                            @elseif($appointment->role === 'sr')
                                                                Senior High Principal's Office
                                                            @else
                                                                {{ $appointment->role }}
                                                            @endif
                                                        </strong>
                                                        on your scheduled date and time. Kindly bring a
                                                        <strong style="color:#1d3577;">valid ID</strong> and any
                                                        relevant documents or forms related to your concern. If you need
                                                        to reschedule or cancel, please contact us at least
                                                        <strong style="color:#1d3577;">24 hours in advance</strong>
                                                        so we can accommodate other parents accordingly.
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
                                            If you did not submit this appointment request or believe this message was
                                            sent to you in error,
                                            please disregard this email and contact our administration office
                                            immediately for assistance.
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
                                            With warm regards,<br>
                                            <strong style="color:#1d3577;">Mater Dei Academy Tagaytay
                                                Incorporated</strong><br>
                                            @if ($appointment->role === 'cashier')
                                                Cashier Office
                                            @elseif($appointment->role === 'registrar')
                                                Registrar's Office
                                            @elseif($appointment->role === 'guidance')
                                                Guidance Office
                                            @elseif($appointment->role === 'none')
                                                Guidance Office
                                            @elseif($appointment->role === 'elem')
                                                Elementary Principal's Office
                                            @elseif($appointment->role === 'sr')
                                                Senior High Principal's Office
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
