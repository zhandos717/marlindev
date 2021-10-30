<?php
    include_once 'functions/main.php';
    include_once 'functions/authorization.php';
    if(!login($_POST['email'],$_POST['password'])){
        redirect_to('page_login');
    }
    redirect_to('users');