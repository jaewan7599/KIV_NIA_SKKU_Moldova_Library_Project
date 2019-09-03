<?php
    $db_user = "root";
    $db_pass = "1234";
    $db_type = "mysql";
    $db_host = "localhost";
    $db_name = "db_proj";
    $dsn = "$db_type:host=$db_host; dbname=$db_name; charset=utf8";
    
    try{
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $Exception) {
        die('Error '.$Exception->getMessage());
    }
    
    session_start();
    
    $cur_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $recheck_password = $_POST["recheck_password"];
    
    $sql = "select * from admin";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    $row = $stmh->fetch(PDO::FETCH_ASSOC);
    $real_password = $row['password'];
    
    if($recheck_password != $new_password)
    {
        echo "<script>alert('New password doesn't match with recheck password.');history.back();</script>";
        exit;
    }
    
    if(strcmp($real_password, $cur_password))
    {
        echo "<script>alert('Current password doesn't match.');history.back();</script>";
        exit;
    }
    
    $sql2 = "update admin set password = '$new_password'";
    $stmh2 = $pdo->prepare($sql2);
    $stmh2->execute();
    
    echo "<script>alert('The password is changed.');history.back();</script>";
    exit;

?>
