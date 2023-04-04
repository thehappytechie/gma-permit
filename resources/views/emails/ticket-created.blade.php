<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <title>License Notice</title>
    <meta property="og:title" content="Email template" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <style type="text/css">
        a {
            text-decoration: underline;
            color: inherit;
            font-weight: normal;
            color: #3a8fe9;
            cursor: pointer !important;
        }

        h2 {
            font-size: 25px;
            font-weight: 900;
        }

        p {
            font-weight: 100;
        }

        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 600px;
            background-color: white;
        }

        .subtle-link {
            font-size: 11px;
            letter-spacing: 1px;
            color: #a3abb3;
        }

    </style>
</head>

<body bgcolor="#F5F8FA" style="
            width: 100%;
            margin: auto 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #33475b;
            word-break: break-word;">
    <div id="email">s
        <table role="presentation" width="100%">
            <tr>
                <td bgcolor="#fff" align="center" style="color: white">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="70px" align="middle" />
                </td>
            </tr>
        </table>
        <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 10px 30px 30px 60px">
            <tr>
                <td>
                    <h2>New Ticket Created</h2>
                    <p style="margin-top: 40px;line-height:1;">
                        <strong>TITLE:</strong> {{ $ticket->title }} <br>
                        <strong> CREATED BY:</strong> {{ $ticket->user->name }} <br>
                        <strong> COMMENT:</strong> {{ $ticket->comment }} <br>
                    </p>
                </td>
            </tr>
        </table>

        <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 50px">
            <tr>
                <td align="center" style="font-size:12px;padding: 30px 30px">
                    Need help?</a>
                    <a href="mailto:info@ghanamaritime.org"> info@ghanamaritime.org</a> |
                    <a href="tel:+233302663506"> +233 3026 63506</a>
                </td>
            </tr>
        </table>

        <table role="presentation" bgcolor="#F5F8FA" width="100%">
            <tr>
                <td align="left" style="padding: 30px 30px">
                    <p class="subtle-link">
                        &copy Ghana Maritime Authority {{ date('Y') }}. All
                        Rights Reserved
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
