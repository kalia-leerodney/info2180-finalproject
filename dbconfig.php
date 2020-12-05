<?php
    $host = 'localhost';
    $dbname = 'BugIssueDB';
    $username = 'BUGadmin';
    $password = 'BUGpass'; 
    $q=filter_input(INPUT_GET,"q",FILTER_SANITIZE_STRING);
    $all=filter_input(INPUT_GET,"all",FILTER_SANITIZE_STRING);

