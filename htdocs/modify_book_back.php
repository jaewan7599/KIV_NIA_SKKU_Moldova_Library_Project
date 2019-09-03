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
    
    $bid = $_POST["cur_book_id"];
    
    if($_SESSION["title"] == ""){
        $title = $_POST["cur_title"];
    }
    
    else{
        $title = $_SESSION["title"];
    }
    
    if($_SESSION["publisher"] == ""){
        $publisher = $_POST["cur_publisher"];
    }
    
    else{
        $publisher = $_SESSION["publisher"];
    }
    
    if($_SESSION["author"] == ""){
        $author = $_POST["cur_author"];
    }
    
    else{
        $author = $_SESSION["author"];
    }
    
    $returned = $_POST["cur_returned"];
    
    $sql = "update book set title = '$title', returned = $returned, author = '$author', publisher = '$publisher' where bid = $bid";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    
    echo "<script>alert('The book information is changed.');history.back();</script>";
    exit;

?>
