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
    
    $sid = $_POST['request_student_id'];
    $bid = $_POST['request_book_id'];
    
    $returned = 0;
    $timestamp = time();
    
    $sql = "select * from borrow_list where bid = $bid";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    $count = $stmh->rowCount();
    
    $sql2 = "select * from student where sid = $sid";
    $stmh2 = $pdo->prepare($sql2);
    $stmh2->execute();
    $count2 = $stmh2->rowCount();
    
    if($count2 < 1)
    {
        echo "<script>alert('Check the student id. It doesn't exist.');history.back();</script>";
        exit;
    }
    
    if($count > 0)
    {
        echo "<script>alert('The book is already borrowed');history.back();</script>";
        exit;
    }
    
    else
    {
        $sql = "insert into borrow_list (sid, bid, timestamp) values ($sid, $bid, $timestamp)";
        $stmh = $pdo->prepare($sql);
        $stmh->execute();

        $sql = "update book set returned = $returned where bid = $bid";
        $stmh = $pdo->prepare($sql);
        $stmh->execute(); 
    }
    
    echo "<script>alert('The book is lended.');history.back();</script>";
    exit;

?>
