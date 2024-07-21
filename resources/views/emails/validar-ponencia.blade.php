<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style media="all" type="text/css">
        /* -------------------------------------
    GLOBAL RESETS
------------------------------------- */

        body {
            font-family: "Roboto", Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 16px;
            line-height: 1.3;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }

        table td {
            font-family: "Roboto", Helvetica, sans-serif;
            font-size: 16px;
            vertical-align: top;
        }

        /* -------------------------------------
    BODY & CONTAINER
------------------------------------- */

        body {
            background-color: #f4f5f6;
            margin: 0;
            padding: 0;
        }

        .body {
            background-color: #f4f5f6;
            width: 100%;
        }

        .container {
            margin: 0 auto !important;
            max-width: 600px;
            padding: 0;
            padding-top: 24px;
            width: 600px;
        }

        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 600px;
            padding: 0;
        }

        /* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */

        .main {
            background: #ffffff;
            border: 1px solid #eaebed;
            border-radius: 10px;
            width: 97%;
            margin: 10px
        }

        .wrapper {
            box-sizing: border-box;
            padding: 24px;
        }

        .footer {
            clear: both;
            padding-top: 24px;
            text-align: center;
            width: 100%;
        }

        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #9a9ea6;
            font-size: 16px;
            text-align: center;
        }

        /* -------------------------------------
    TYPOGRAPHY
------------------------------------- */

        p {
            font-family: "Roboto", Helvetica, sans-serif;
            font-size: 16px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 16px;
        }

        a {
            color: #002b68;
            text-decoration: underline;
        }

        /* -------------------------------------
    BUTTONS
------------------------------------- */

        .btn {
            box-sizing: border-box;
            min-width: 100% !important;
            width: 100%;
        }

        .btn>tbody>tr>td {
            padding-bottom: 16px;
        }

        .btn table {
            width: auto;
        }

        .btn table td {
            background-color: #ffffff;
            border-radius: 4px;
            text-align: center;
        }

        .btn a {
            background-color: #ffffff;
            border: solid 2px #002b68;
            border-radius: 4px;
            box-sizing: border-box;
            color: #002b68;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            margin: 0;
            padding: 12px 24px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-primary table td {
            background-color: #002b68;
        }

        .btn-primary a {
            background-color: #002b68;
            border-color: #002b68;
            color: #ffffff;
        }

        @media all {
            .btn-primary table td:hover {
                background-color: #001f42 !important;
            }

            .btn-primary a:hover {
                background-color: #001f42 !important;
                border-color: #001f42 !important;
            }
        }

        /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */

        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .text-link {
            color: #002b68 !important;
            text-decoration: underline !important;
        }

        .clear {
            clear: both;
        }

        .mt0 {
            margin-top: 0;
        }

        .mb0 {
            margin-bottom: 0;
        }

        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
        }

        .powered-by a {
            text-decoration: none;
        }

        /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */

        @media only screen and (max-width: 640px) {

            .main p,
            .main td,
            .main span {
                font-size: 16px !important;
            }

            .wrapper {
                padding: 8px !important;
            }

            .content {
                padding: 0 !important;
            }

            .container {
                padding: 0 !important;
                padding-top: 8px !important;
                width: 100% !important;
            }

            .main {
                border-left-width: 0 !important;
                border-right-width: 0 !important;
            }

            .btn table {
                max-width: 100% !important;
                width: 100% !important;
            }

            .btn a {
                font-size: 16px !important;
                max-width: 100% !important;
                width: 100% !important;
            }
        }

        /* -------------------------------------
    PRESERVE THESE STYLES IN THE HEAD
------------------------------------- */

        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }
        }
    </style>
</head>

<body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">

                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader">This is preheader text. Some clients will show this text as a
                        preview.</span>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                                <table>
                                    <tr>
                                        <td style="width: 20%;  text-align: center; vertical-align: middle">
                                            <img style="width: 100%; min-width: 100px; border-radius: 100%"
                                                src="https://scontent.ftru2-3.fna.fbcdn.net/v/t39.30808-6/451057785_122105863490402144_2218013326672881796_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEpw38xxvWSAc9V1gW4ydXWFSomA7m9lG8VKiYDub2Ub6hc7qlGymKb4YaN3eH5G8GJs-JSqoDpvc5yITlRPkGY&_nc_ohc=-pbQp9alKfgQ7kNvgGzU7O3&_nc_ht=scontent.ftru2-3.fna&oh=00_AYAlXoCUXKdwv3s_h-ZFNgdQfWjgQuOLxbxgJb5kcEQZJw&oe=66A2631A"
                                                alt="Logo">
                                        </td>
                                        <td style="text-align: center; vertical-align: middle">
                                            <span>
                                                <h2 style="margin: 0; font-size: 50px">UNASAM</h2>
                                                VICERRECTORADO DE INVESTIGACIÓN
                                            </span>
                                        </td>
                                    </tr>
                                </table>

                                <h1 style="text-align: center">¡PONENCIA VALIDADA!</h1>
                                <p>Después de revisar la información que usted presento, hemos decidido aceptarlo en el
                                    <span style="font-weight: 700">I Congreso Internacional de Investigación Universidad
                                        Nacional Santiago Antúnez de Mayolo</span>.</p>
                                <p>Es por eso que necesitamos que suba el comprobante de pago de su inscripción al
                                    siguiente enlace.</p>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                    class="btn btn-primary">
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <table role="presentation" border="0" cellpadding="0"
                                                    cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="{{$enlace}}" target="_blank">SUBIR
                                                                    COMPROBANTE</a> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Si tiene dudas, puede comunicarse con nostros.</p>
                                <p>Esperamos su respuesta.</p>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                    </table>

                    <!-- START FOOTER -->
                    <div class="footer">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-block">
                                    <span class="apple-link">VICERRECTORADO DE INVESTIGACIÓN</span>
                                    <br> <span style="font-weight: 700; padding-bottom: 30px">UNASAM</span>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>

</html>
