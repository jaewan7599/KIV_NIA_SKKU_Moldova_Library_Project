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
    
   if(!isset($_POST['user_id']) || !isset($_POST['user_pw']))
       exit;
    $id = $_POST['user_id'];
    $pw = $_POST['user_pw'];
        
    try{
        $sql = "SELECT * FROM admin WHERE username = :id and password like :pw";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':id', $id, PDO::PARAM_STR);
        $stmh->bindValue(':pw', $pw, PDO::PARAM_STR);
        $stmh->execute();
        $count = $stmh->rowCount();
        
        if($count < 1)
        {
            echo "<script>alert('Invalid ID or Password');history.back();</script>";
            exit;
        }
        
        $row = $stmh->fetch(PDO::FETCH_ASSOC);
        $name = $row['name'];
                
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;

        $_SESSION['login'] = 1;
        header("location: main.php?login=1");
    } catch (Exception $ex) {

    }

?>
