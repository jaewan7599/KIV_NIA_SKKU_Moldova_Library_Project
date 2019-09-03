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
    
   if($_POST["requested_title"] == "" || $_POST['requested_publisher'] == "" || $_POST['requested_author'] == "")
   {
        echo "<script>alert('You should fill whole contents of a book.');history.back();</script>";
        exit;
   }
   
    $sql = "select * from book";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    $count = $stmh->rowCount();
   
    $id = $count + 1;
    $title = $_POST["requested_title"];
    $publisher = $_POST['requested_publisher'];
    $author = $_POST['requested_author'];
    
    $sql2 = "insert into book (bid, title, author, returned, publisher) values ($id, '$title', '$author', 1, '$publisher')";
    $stmh2 = $pdo->prepare($sql2);
    $stmh2->execute();
    
    echo "<script>alert('The book information is added.');history.back();</script>";
    exit;

?>
