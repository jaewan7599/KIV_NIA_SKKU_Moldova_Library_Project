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
    
    $sid = $_POST["student_id"];
    
    if($_SESSION["sname"] == ""){
        $sname = $_POST["student_name"];
    }
    
    else{
        $sname = $_SESSION["sname"];
    }
    
    if($_SESSION["gender"] == ""){
        $gender = $_POST["student_gender"];
    }
    
    else{
        $gender = $_SESSION["gender"];
    }
    
    if($_SESSION["birth"] == ""){
        $birth = $_POST["student_birth"];
    }
    
    else{
        $birth = $_SESSION["birth"];
    }
    
    if($_SESSION["email"] == ""){
        $email = $_POST["student_email"];
    }
    
    else{
        $email = $_SESSION["email"];
    }
    
    if($_SESSION["phone"] == ""){
        $phone = $_POST["student_phone"];
    }
    
    else{
        $phone = $_SESSION["phone"];
    }
    
    if($gender != "Male" && $gender != "Female" && $gender != 0 && $gender != 1)
    {
        echo "<script>alert('You should fill correct gender type.');history.back();</script>";
        exit;
    }
    
    if($gender=="male" || $gender==0){
        $gender = 0;
    }
    
    else{
        $gender = 1;
    }
    
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birth))
    {
        echo "<script>alert('You should fill correct birth format.');history.back();</script>";
        exit;
    }
    
    $sql = "update student set name = '$sname', gender = $gender, birth = '$birth', email = '$email', phone = '$phone' where sid = $sid";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    
    echo "<script>alert('The student information is changed.');history.back();</script>";
    exit;

?>
