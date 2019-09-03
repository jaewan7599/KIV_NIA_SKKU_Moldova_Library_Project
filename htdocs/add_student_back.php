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
    
   if($_POST["requested_student_name"] == "" || $_POST['student_gender'] == "" || $_POST['student_phone'] == "" || $_POST["student_email"] == "" || $_POST["student_birth"] == "")
   {
        echo "<script>alert('You should fill whole contents of a student.');history.back();</script>";
        exit;
   }
   
    $sql = "select * from student";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    $count = $stmh->rowCount();
   
    $id = $count + 1;
    $name = $_POST['requested_student_name'];
    $temp_gender = $_POST['student_gender'];
    if($temp_gender != "male" && $temp_gender != "female")
    {
        echo "<script>alert('You should fill correct gender type.');history.back();</script>";
        exit;
    }
    
    if($temp_gender=="male"){
        $gender = 0;
    }
    else{
        $gender = 1;
    }
    
    $phone = $_POST["student_phone"];
    
    $birth = $_POST["student_birth"];
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birth))
    {
        echo "<script>alert('You should fill correct birth format.');history.back();</script>";
        exit;
    }
    
    $email = $_POST["student_email"];
    
    $sql2 = "insert into student (sid, name, gender, birth, email, phone) values ($id, '$name', $gender, '$birth', '$email', '$phone')";
    $stmh2 = $pdo->prepare($sql2);
    $stmh2->execute();
    
    echo "<script>alert('The student information is added.');history.back();</script>";
    exit;

?>
