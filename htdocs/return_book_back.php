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
    
    $bid = $_POST['bid'];
    
    $returned = 1;
    
    $sql = "delete from borrow_list where bid = $bid";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    
    $sql = "update book set returned = $returned where bid = $bid";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    
    echo "<script>alert('The book is returned.');history.back();</script>";
    exit;
?>
