<?php
include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$intIdCont = $id;
//
$arrData = [['value'=> $intIdCont,'tipo'=> 'NU']];
$query = "SELECT * FROM email_disenio WHERE ed_id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
//
$queryt1 = "SELECT * FROM email_textos WHERE et_ed_id = ? AND et_posicion = 1";
$rsContt1 = $objContenido->getOneContenido($link,$arrData,$queryt1);
$arrContt1 = $rsContt1->fetch(PDO::FETCH_BOTH);
//
$queryt2 = "SELECT * FROM email_textos WHERE et_ed_id = ?  AND et_posicion = 2";
$rsContt2 = $objContenido->getOneContenido($link,$arrData,$queryt2);
$arrContt2 = $rsContt2->fetch(PDO::FETCH_BOTH);
//
$queryt3 = "SELECT * FROM email_textos WHERE et_ed_id = ?  AND et_posicion = 3";
$rsContt3 = $objContenido->getOneContenido($link,$arrData,$queryt3);
$arrContt3 = $rsContt3->fetch(PDO::FETCH_BOTH);
//
$queryt4 = "SELECT * FROM email_textos WHERE et_ed_id = ?  AND et_posicion = 4";
$rsContt4 = $objContenido->getOneContenido($link,$arrData,$queryt4);
$arrContt4 = $rsContt4->fetch(PDO::FETCH_BOTH);
//
$queryt5 = "SELECT * FROM email_textos WHERE et_ed_id = ?  AND et_posicion = 5";
$rsContt5 = $objContenido->getOneContenido($link,$arrData,$queryt5);
$arrContt5 = $rsContt5->fetch(PDO::FETCH_BOTH);
$cuerpo = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html dir=\"ltr\" xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">

<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1\" name=\"viewport\">
    <meta name=\"x-apple-disable-message-reformatting\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta content=\"telephone=no\" name=\"format-detection\">
    <title></title>
    <!--[if (mso 16)]>
    <style type=\"text/css\">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
    <!--[if !mso]><!-- -->
    <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i\" rel=\"stylesheet\">
    <!--<![endif]-->

    <style>
      
        #outlook a {
            padding: 0;
        }

        .es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
        }

        body {
            width: 100%;
            font-family: arial, 'helvetica neue', helvetica, sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse;
            border-spacing: 0px;
        }

        table td,
        body,
        .es-wrapper {
            padding: 0;
            Margin: 0;
        }

        .es-content,
        .es-header,
        .es-footer {
            table-layout: fixed !important;
            width: 100%;
        }

        img {
            display: block;
            border: 0;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p,
        hr {
            Margin: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            Margin: 0;
            line-height: 120%;
            mso-line-height-rule: exactly;
            font-family: arial, 'helvetica neue', helvetica, sans-serif;
        }

        p,
        ul li,
        ol li,
        a {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            mso-line-height-rule: exactly;
        }

        .es-left {
            float: left;
        }

        .es-right {
            float: right;
        }

        .es-p5 {
            padding: 5px;
        }

        .es-p5t {
            padding-top: 5px;
        }

        .es-p5b {
            padding-bottom: 5px;
        }

        .es-p5l {
            padding-left: 5px;
        }

        .es-p5r {
            padding-right: 5px;
        }

        .es-p10 {
            padding: 10px;
        }

        .es-p10t {
            padding-top: 10px;
        }

        .es-p10b {
            padding-bottom: 10px;
        }

        .es-p10l {
            padding-left: 10px;
        }

        .es-p10r {
            padding-right: 10px;
        }

        .es-p15 {
            padding: 15px;
        }

        .es-p15t {
            padding-top: 15px;
        }

        .es-p15b {
            padding-bottom: 15px;
        }

        .es-p15l {
            padding-left: 15px;
        }

        .es-p15r {
            padding-right: 15px;
        }

        .es-p20 {
            padding: 20px;
        }

        .es-p20t {
            padding-top: 20px;
        }

        .es-p20b {
            padding-bottom: 20px;
        }

        .es-p20l {
            padding-left: 20px;
        }

        .es-p20r {
            padding-right: 20px;
        }

        .es-p25 {
            padding: 25px;
        }

        .es-p25t {
            padding-top: 25px;
        }

        .es-p25b {
            padding-bottom: 25px;
        }

        .es-p25l {
            padding-left: 25px;
        }

        .es-p25r {
            padding-right: 25px;
        }

        .es-p30 {
            padding: 30px;
        }

        .es-p30t {
            padding-top: 30px;
        }

        .es-p30b {
            padding-bottom: 30px;
        }

        .es-p30l {
            padding-left: 30px;
        }

        .es-p30r {
            padding-right: 30px;
        }

        .es-p35 {
            padding: 35px;
        }

        .es-p35t {
            padding-top: 35px;
        }

        .es-p35b {
            padding-bottom: 35px;
        }

        .es-p35l {
            padding-left: 35px;
        }

        .es-p35r {
            padding-right: 35px;
        }

        .es-p40 {
            padding: 40px;
        }

        .es-p40t {
            padding-top: 40px;
        }

        .es-p40b {
            padding-bottom: 40px;
        }

        .es-p40l {
            padding-left: 40px;
        }

        .es-p40r {
            padding-right: 40px;
        }

        .es-menu td {
            border: 0;
        }

        .es-menu td a img {
            display: inline-block !important;
            vertical-align: middle;
        }


        s {
            text-decoration: line-through;
        }

        p,
        ul li,
        ol li {
            font-family: arial, 'helvetica neue', helvetica, sans-serif;
            line-height: 150%;
        }

        ul li,
        ol li {
            Margin-bottom: 15px;
            margin-left: 0;
        }

        a {
            text-decoration: underline;
        }

        .es-menu td a {
            text-decoration: none;
            display: block;
            font-family: arial, 'helvetica neue', helvetica, sans-serif;
        }

        .es-wrapper {
            width: 100%;
            height: 100%;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-wrapper-color,
        .es-wrapper {
            background-color: #fafafa;
        }

        .es-header {
            background-color: transparent;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-header-body {
            background-color: transparent;
        }

        .es-header-body p,
        .es-header-body ul li,
        .es-header-body ol li {
            color: #333333;
            font-size: 14px;
        }

        .es-header-body a {
            color: #666666;
            font-size: 14px;
        }

        .es-content-body {
            background-color: #ffffff;
        }

        .es-content-body p,
        .es-content-body ul li,
        .es-content-body ol li {
            color: #333333;
            font-size: 14px;
        }

        .es-content-body a {
            color: #5c68e2;
            font-size: 14px;
        }

        .es-footer {
            background-color: transparent;
            background-repeat: repeat;
            background-position: center top;
        }

        .es-footer-body {
            background-color: transparent;
        }

        .es-footer-body p,
        .es-footer-body ul li,
        .es-footer-body ol li {
            color: #333333;
            font-size: 12px;
        }

        .es-footer-body a {
            color: #333333;
            font-size: 12px;
        }

        .es-infoblock,
        .es-infoblock p,
        .es-infoblock ul li,
        .es-infoblock ol li {
            line-height: 120%;
            font-size: 12px;
            color: #cccccc;
        }

        .es-infoblock a {
            font-size: 12px;
            color: #cccccc;
        }

        h1 {
            font-size: 46px;
            font-style: normal;
            font-weight: bold;
            color: #333333;
        }

        h2 {
            font-size: 26px;
            font-style: normal;
            font-weight: bold;
            color: #333333;
        }

        h3 {
            font-size: 20px;
            font-style: normal;
            font-weight: bold;
            color: #333333;
        }

        .es-header-body h1 a,
        .es-content-body h1 a,
        .es-footer-body h1 a {
            font-size: 46px;
        }

        .es-header-body h2 a,
        .es-content-body h2 a,
        .es-footer-body h2 a {
            font-size: 26px;
        }

        .es-header-body h3 a,
        .es-content-body h3 a,
        .es-footer-body h3 a {
            font-size: 20px;
        }

        a.es-button,
        button.es-button {
            padding: 10px 30px 10px 30px;
            display: inline-block;
            background: #5c68e2;
            border-radius: 5px;
            font-size: 20px;
            font-family: arial, 'helvetica neue', helvetica, sans-serif;
            font-weight: normal;
            font-style: normal;
            line-height: 120%;
            color: #ffffff;
            text-decoration: none;
            width: auto;
            text-align: center;
            mso-padding-alt: 0;
            mso-border-alt: 10px solid #5c68e2;
        }

        .es-button-border {
            border-style: solid solid solid solid;
            border-color: #2cb543 #2cb543 #2cb543 #2cb543;
            background: #5c68e2;
            border-width: 0px 0px 0px 0px;
            display: inline-block;
            border-radius: 5px;
            width: auto;
        }

        @media only screen and (max-width: 600px) {

            p,
            ul li,
            ol li,
            a {
                line-height: 150% !important;
            }

            h1,
            h2,
            h3,
            h1 a,
            h2 a,
            h3 a {
                line-height: 120% !important;
            }

            h1 {
                font-size: 32px !important;
                text-align: left;
            }

            h2 {
                font-size: 26px !important;
                text-align: left;
            }

            h3 {
                font-size: 20px !important;
                text-align: left;
            }

            .es-header-body h1 a,
            .es-content-body h1 a,
            .es-footer-body h1 a {
                font-size: 32px !important;
                text-align: left;
            }

            .es-header-body h2 a,
            .es-content-body h2 a,
            .es-footer-body h2 a {
                font-size: 26px !important;
                text-align: left;
            }

            .es-header-body h3 a,
            .es-content-body h3 a,
            .es-footer-body h3 a {
                font-size: 20px !important;
                text-align: left;
            }

            .es-menu td a {
                font-size: 12px !important;
            }

            .es-header-body p,
            .es-header-body ul li,
            .es-header-body ol li,
            .es-header-body a {
                font-size: 14px !important;
            }

            .es-content-body p,
            .es-content-body ul li,
            .es-content-body ol li,
            .es-content-body a {
                font-size: 14px !important;
            }

            .es-footer-body p,
            .es-footer-body ul li,
            .es-footer-body ol li,
            .es-footer-body a {
                font-size: 14px !important;
            }

            .es-infoblock p,
            .es-infoblock ul li,
            .es-infoblock ol li,
            .es-infoblock a {
                font-size: 12px !important;
            }

            *[class=\"gmail-fix\"] {
                display: none !important;
            }

            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3 {
                text-align: center !important;
            }

            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3 {
                text-align: right !important;
            }

            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3 {
                text-align: left !important;
            }

            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
                display: inline !important;
            }

            .es-button-border {
                display: inline-block !important;
            }

            a.es-button,
            button.es-button {
                font-size: 20px !important;
                display: inline-block !important;
            }

            .es-adaptive table,
            .es-left,
            .es-right {
                width: 100% !important;
            }

            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
                width: 100% !important;
                max-width: 600px !important;
            }

            .es-adapt-td {
                display: block !important;
                width: 100% !important;
            }

            .adapt-img {
                width: 100% !important;
                height: auto !important;
            }

            .es-m-p0 {
                padding: 0 !important;
            }

            .es-m-p0r {
                padding-right: 0 !important;
            }

            .es-m-p0l {
                padding-left: 0 !important;
            }

            .es-m-p0t {
                padding-top: 0 !important;
            }

            .es-m-p0b {
                padding-bottom: 0 !important;
            }

            .es-m-p20b {
                padding-bottom: 20px !important;
            }

            .es-mobile-hidden,
            .es-hidden {
                display: none !important;
            }

            tr.es-desk-hidden,
            td.es-desk-hidden,
            table.es-desk-hidden {
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                line-height: inherit !important;
            }

            tr.es-desk-hidden {
                display: table-row !important;
            }

            table.es-desk-hidden {
                display: table !important;
            }

            td.es-desk-menu-hidden {
                display: table-cell !important;
            }

            .es-menu td {
                width: 1% !important;
            }

            table.es-table-not-adapt,
            .esd-block-html table {
                width: auto !important;
            }

            table.es-social {
                display: inline-block !important;
            }

            table.es-social td {
                display: inline-block !important;
            }

            .es-m-p5 {
                padding: 5px !important;
            }

            .es-m-p5t {
                padding-top: 5px !important;
            }

            .es-m-p5b {
                padding-bottom: 5px !important;
            }

            .es-m-p5r {
                padding-right: 5px !important;
            }

            .es-m-p5l {
                padding-left: 5px !important;
            }

            .es-m-p10 {
                padding: 10px !important;
            }

            .es-m-p10t {
                padding-top: 10px !important;
            }

            .es-m-p10b {
                padding-bottom: 10px !important;
            }

            .es-m-p10r {
                padding-right: 10px !important;
            }

            .es-m-p10l {
                padding-left: 10px !important;
            }

            .es-m-p15 {
                padding: 15px !important;
            }

            .es-m-p15t {
                padding-top: 15px !important;
            }

            .es-m-p15b {
                padding-bottom: 15px !important;
            }

            .es-m-p15r {
                padding-right: 15px !important;
            }

            .es-m-p15l {
                padding-left: 15px !important;
            }

            .es-m-p20 {
                padding: 20px !important;
            }

            .es-m-p20t {
                padding-top: 20px !important;
            }

            .es-m-p20r {
                padding-right: 20px !important;
            }

            .es-m-p20l {
                padding-left: 20px !important;
            }

            .es-m-p25 {
                padding: 25px !important;
            }

            .es-m-p25t {
                padding-top: 25px !important;
            }

            .es-m-p25b {
                padding-bottom: 25px !important;
            }

            .es-m-p25r {
                padding-right: 25px !important;
            }

            .es-m-p25l {
                padding-left: 25px !important;
            }

            .es-m-p30 {
                padding: 30px !important;
            }

            .es-m-p30t {
                padding-top: 30px !important;
            }

            .es-m-p30b {
                padding-bottom: 30px !important;
            }

            .es-m-p30r {
                padding-right: 30px !important;
            }

            .es-m-p30l {
                padding-left: 30px !important;
            }

            .es-m-p35 {
                padding: 35px !important;
            }

            .es-m-p35t {
                padding-top: 35px !important;
            }

            .es-m-p35b {
                padding-bottom: 35px !important;
            }

            .es-m-p35r {
                padding-right: 35px !important;
            }

            .es-m-p35l {
                padding-left: 35px !important;
            }

            .es-m-p40 {
                padding: 40px !important;
            }

            .es-m-p40t {
                padding-top: 40px !important;
            }

            .es-m-p40b {
                padding-bottom: 40px !important;
            }

            .es-m-p40r {
                padding-right: 40px !important;
            }

            .es-m-p40l {
                padding-left: 40px !important;
            }

            button.es-button {
                width: 100%;
            }

            .es-desk-hidden {
                display: table-row !important;
                width: auto !important;
                overflow: visible !important;
                max-height: inherit !important;
            }

            .h-auto {
                height: auto !important;
            }
        }

        input,
        textarea {
            box-sizing: border-box;
            resize: vertical;
            -webkit-appearance: none;
        }

        form button {
            cursor: pointer;
            border: 0;
        }

        .es-p-default {
            padding-top: 30px;
            padding-right: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
        }

        .es-p-all-default {
            padding: 30px;
        }
    </style>

</head>

<body>
    <div dir=\"ltr\" class=\"es-wrapper-color\">
        <!--[if gte mso 9]>
			<v:background xmlns:v=\"urn:schemas-microsoft-com:vml\" fill=\"t\">
				<v:fill type=\"tile\" color=\"#fafafa\"></v:fill>
			</v:background>
		<![endif]-->
        <table class=\"es-wrapper\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
            <tbody>
                <tr>
                    <td class=\"esd-email-paddings\" valign=\"top\">
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-header esd-header-popover\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe esd-synchronizable-module\" align=\"center\" bgcolor=\"#f4efe9\" style=\"background-color: #f4efe9;\">
                                        <table bgcolor=\"#ffffff\" class=\"es-header-body\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border-left:10px solid transparent;border-right:10px solid transparent;border-top:10px solid transparent;border-bottom:10px solid transparent;\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure es-p10t es-p10b es-p20r es-p20l\" align=\"left\">
                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"540\" class=\"es-m-p0r esd-container-frame\" valign=\"top\" align=\"center\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"center\" class=\"esd-block-image\" style=\"font-size: 0px;\"><a target=\"_blank\"><img src=\"https://mtewab.stripocdn.email/content/guids/CABINET_6ed83e81f53aa9d05a80b49e8a80eaa187c04589e2a8a071ce6411d5f4ffeed4/images/logo.png\" alt=\"Logo\" style=\"display: block; font-size: 12px;\" width=\"200\" title=\"Logo\"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-content\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe\" align=\"center\" bgcolor=\"#5a6c60\" style=\"background-color: #5a6c60;\">
                                        <table bgcolor=\"#ffffff\" class=\"es-content-body\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"background-color: #ffffff;\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure es-p20t es-p20r es-p20l\" align=\"left\" bgcolor=\"#5a6c60\" style=\"background-color: #5a6c60;\">
                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"560\" class=\"esd-container-frame\" align=\"center\" valign=\"top\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"center\" class=\"esd-block-text es-p5b\">
                                                                                        <h2 style=\"color: #e9dfd4; line-height: 120%; font-size: 35px;\">".$arrCont["ed_titulo"]."</h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align=\"center\" class=\"esd-block-image es-p10t\" style=\"font-size: 0px;\"><a target=\"_blank\"><img class=\"adapt-img\" src=\""._CONST_DOMINIO_."/assets/imgmail/".$arrCont["ed_imagen"]."\" style=\"display: block;\" width=\"560\"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-header\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe\" align=\"center\" bgcolor=\"#e9dfd4\" style=\"background-color: #e9dfd4;\">
                                        <table bgcolor=\"#ffffff\" class=\"es-header-body\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"background-color: #ffffff;\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure\" align=\"left\">
                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"600\" class=\"esd-container-frame\" align=\"center\" valign=\"top\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#e9dfd4\" style=\"background-color: #e9dfd4;\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"left\" class=\"esd-block-text es-p30\">".
                                                                                        html_entity_decode($arrContt1["et_texto"])."
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-content\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe\" align=\"center\" bgcolor=\"#e9dfd4\" style=\"background-color: #e9dfd4;\">
                                        <table class=\"es-content-body\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#e9dfd4\" align=\"center\" style=\"background-color: #e9dfd4;\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure es-p25b es-p20r es-p20l\" style=\"background-color: transparent;\" bgcolor=\"transparent\" align=\"left\">
                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=\"esd-container-frame\" width=\"560\" valign=\"top\" align=\"center\">
                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-top: 2px solid #ef7c41;\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class=\"esd-block-text es-m-txt-c es-p20t es-p10b\" align=\"left\">
                                                                                        <h2 style=\"color: #ef7c41; font-family: 'open sans', 'helvetica neue', helvetica, arial, sans-serif; font-size: 16px; text-align: center;\"><strong>KEY DETAILS</strong></h2>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class=\"esd-structure es-p30b es-p30r es-p20l\" align=\"left\">
                                                        <!--[if mso]><table width=\"550\" cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"244\" valign=\"top\"><![endif]-->
                                                        <table class=\"es-left\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=\"es-m-p0r es-m-p20b esd-container-frame\" width=\"244\" align=\"center\">
                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class=\"esd-block-image es-p15b es-m-txt-c\" align=\"left\" style=\"font-size: 0px;\"><a target=\"_blank\"><img src=\"https://mtewab.stripocdn.email/content/guids/CABINET_6ed83e81f53aa9d05a80b49e8a80eaa187c04589e2a8a071ce6411d5f4ffeed4/images/icocalendario.png\" alt style=\"display: block;\" width=\"28\"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class=\"esd-block-text es-m-txt-c es-p10b\" align=\"left\">".html_entity_decode($arrContt2["et_texto"])."
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width=\"20\"></td><td width=\"286\" valign=\"top\"><![endif]-->
                                                        <table class=\"es-right\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=\"esd-container-frame\" width=\"286\" align=\"center\">
                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class=\"esd-block-image es-p15b es-m-txt-c\" align=\"left\" style=\"font-size: 0px;\"><a target=\"_blank\"><img src=\"https://mtewab.stripocdn.email/content/guids/CABINET_6ed83e81f53aa9d05a80b49e8a80eaa187c04589e2a8a071ce6411d5f4ffeed4/images/iconoreloj_hxU.png\" alt style=\"display: block;\" width=\"30\"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class=\"esd-block-text es-m-txt-c es-p10b\" align=\"left\">".html_entity_decode($arrContt3["et_texto"])."
                                                                                    </td>
                                                                                </tr>
                                                                               
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class=\"esd-structure es-p20b es-p30r es-p30l\" align=\"left\">
                                                        <!--[if mso]><table width=\"540\" cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"238\" valign=\"top\"><![endif]-->
                                                        <table class=\"es-left\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=\"es-m-p0r es-m-p20b esd-container-frame\" width=\"238\" align=\"center\">
                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class=\"esd-block-image es-p15b es-m-txt-c\" align=\"left\" style=\"font-size: 0px;\"><a target=\"_blank\"><img src=\"https://mtewab.stripocdn.email/content/guids/CABINET_6ed83e81f53aa9d05a80b49e8a80eaa187c04589e2a8a071ce6411d5f4ffeed4/images/icocalendario.png\" alt style=\"display: block;\" width=\"28\"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class=\"esd-block-text es-m-txt-c es-p10b\" align=\"left\">". html_entity_decode($arrContt4["et_texto"])."
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width=\"20\"></td><td width=\"282\" valign=\"top\"><![endif]-->
                                                        <table class=\"es-right\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=\"esd-container-frame\" width=\"282\" align=\"center\">
                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class=\"esd-block-image es-p15b es-m-txt-c\" align=\"left\" style=\"font-size: 0px;\"><a target=\"_blank\"><img src=\"https://mtewab.stripocdn.email/content/guids/CABINET_6ed83e81f53aa9d05a80b49e8a80eaa187c04589e2a8a071ce6411d5f4ffeed4/images/iconoreloj_hxU.png\" alt style=\"display: block;\" width=\"30\"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class=\"esd-block-text es-m-txt-c es-p10b\" align=\"left\">". html_entity_decode($arrContt5["et_texto"])."
                                                                                    </td>
                                                                                </tr>
                                                                              
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class=\"esd-structure es-p20t es-p20r es-p20l\" style=\"background-color: transparent;\" bgcolor=\"transparent\" align=\"left\">
                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
                                                            <tbody>
                                                                <tr>
                                                                    <td class=\"esd-container-frame\" width=\"560\" valign=\"top\" align=\"center\">
                                                                        <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-bottom: 2px solid #ef7c41;\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class=\"esd-block-text es-m-txt-c es-p25b\" align=\"center\" esd-links-color=\"#ef7c41\">
                                                                                        <p style=\"color: #ef7c41; font-family: 'open sans', 'helvetica neue', helvetica, arial, sans-serif; font-size: 15px;\"><strong><a target=\"_blank\" style=\"font-family: 'open sans', 'helvetica neue', helvetica, arial, sans-serif; font-size: 15px; color: #ef7c41;\" href=\"http://argentinatophunts.com/\">BOOK NOW</a></strong></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-header\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe\" align=\"center\" bgcolor=\"#e9dfd4\" style=\"background-color: #e9dfd4;\">
                                        <table bgcolor=\"#ffffff\" class=\"es-header-body\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"background-color: #ffffff;\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure\" align=\"left\">
                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"600\" class=\"esd-container-frame\" align=\"center\" valign=\"top\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#e9dfd4\" style=\"background-color: #e9dfd4;\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"left\" class=\"esd-block-text es-p30\">
                                                                                        <p style=\"color: #384f40; font-family: arial, 'helvetica neue', helvetica, sans-serif;\">Best wishes,<br><strong>Argentina Top Hunts</strong><br type=\"_moz\"></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-footer\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe esd-synchronizable-module\" align=\"center\" bgcolor=\"#f4efe9\" style=\"background-color: #f4efe9;\">
                                        <table class=\"es-footer-body\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"640\" style=\"background-color: #f4efe9;\" bgcolor=\"#f4efe9\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure es-p30\" align=\"left\">
                                                        <!--[if mso]><table width=\"540\" cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"280\" valign=\"top\"><![endif]-->
                                                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-left\" align=\"left\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"280\" class=\"es-m-p20b esd-container-frame\" align=\"left\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"left\" class=\"esd-block-image\" style=\"font-size: 0px;\"><a target=\"_blank\"><img class=\"adapt-img\" src=\"https://mtewab.stripocdn.email/content/guids/CABINET_6ed83e81f53aa9d05a80b49e8a80eaa187c04589e2a8a071ce6411d5f4ffeed4/images/logoffoter.png\" alt style=\"display: block;\" width=\"126\"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width=\"20\"></td><td width=\"280\" valign=\"top\"><![endif]-->
                                                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-right\" align=\"right\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"280\" align=\"left\" class=\"esd-container-frame\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"right\" class=\"esd-block-text es-p5t\" esd-links-color=\"#5a6b60\" esd-links-underline=\"none\">
                                                                                        <p><a target=\"_blank\" href=\"mailto:info@argentinatophunts.com\" style=\"color: #5a6b60; text-decoration: none;\">info@argentinatophunts.com</a></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class=\"esd-structure\" align=\"left\">
                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"600\" class=\"esd-container-frame\" align=\"center\" valign=\"top\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-bottom: 2px solid #cbccc4;\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"left\" class=\"esd-block-text\">
                                                                                        <p style=\"font-size: 9px; color: #f4efe9;\">Text</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-footer esd-footer-popover\" align=\"center\">
                            <tbody>
                                <tr>
                                    <td class=\"esd-stripe esd-synchronizable-module\" align=\"center\" bgcolor=\"#f4efe9\" style=\"background-color: #f4efe9;\">
                                        <table class=\"es-footer-body\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"640\" style=\"background-color: #f4efe9;\" bgcolor=\"#f4efe9\">
                                            <tbody>
                                                <tr>
                                                    <td class=\"esd-structure es-p30\" align=\"left\">
                                                        <!--[if mso]><table width=\"540\" cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"280\" valign=\"top\"><![endif]-->
                                                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-left\" align=\"left\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"280\" class=\"es-m-p20b esd-container-frame\" align=\"left\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"center\" class=\"esd-block-text\">
                                                                                        <p style=\"color: #000000; font-size: 11px;\">© 2023 ATH</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width=\"20\"></td><td width=\"280\" valign=\"top\"><![endif]-->
                                                        <table cellpadding=\"0\" cellspacing=\"0\" class=\"es-right\" align=\"right\">
                                                            <tbody>
                                                                <tr>
                                                                    <td width=\"280\" align=\"left\" class=\"esd-container-frame\">
                                                                        <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align=\"center\" class=\"esd-block-text\" esd-links-color=\"#000000\" esd-links-underline=\"none\">
                                                                                        <p style=\"font-size: 10px; color: #000000;\"><a target=\"_blank\" style=\"font-size: 10px; color: #000000; text-decoration: none;\" href=\"https://unr.edu.ar\">Update</a> | <a target=\"_blank\" style=\"font-size: 10px; color: #000000; text-decoration: none;\" href=\"https://unr.edu.ar\">Unsubscribe</a><br type=\"_moz\"></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>";

?>