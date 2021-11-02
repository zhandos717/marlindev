<?php
    include_once 'functions/main.php';
    unset($_SESSION['user']);
    redirect_to('page_login');