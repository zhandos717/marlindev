<?php
    include_once 'functions/main.php';
    include_once 'functions/login.php';
    if(!login($_POST['email'],$_POST['password'])){
        redirect_to('page_login');
    }
    redirect_to('users');