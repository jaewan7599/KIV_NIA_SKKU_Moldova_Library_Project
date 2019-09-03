<!DOCTYPE html>
<html>
    <?php
        session_start();
        
        if(!isset($_SESSION['login']))
        {
            echo "<script>alert('You should sign-in, First');</script>";
            echo("<script>location.replace('index.php');</script>");
            exit;
        }
        
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
    ?>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main Page</title>
        <style media ="screen">
            a:link{
                color: green;
                text-decoration: none;
            }
            
            a:-webkit-any-link{
                color: -webkit-link;
                cursor: pointer;
            }
            
            div{
                display: block;
            }
            
            a:visited{
                color: black;
                text-decoration: none;
            }
            
            .header{
                background: #fff;
                z-index: 100;
                overflow: hidden;
                border-bottom: 1px solid #d1d8e4;
            }
            
            .header_logo{
                height: 45px;
                position: relative;
                margin: 0 auto;
                width: 1080px;
            }
            
            .header_box{
                height: 90px;
                position: relative;
                margin: 0 auto;
                width: 1080px;
            }
            
            .header_search{
                height: 30px;
                position: relative;
                margin: 0 auto;
                width: 1080px;
            }
            
            .header_search_block{
                height: 60px;
                position: relative;
                margin: 0 auto;
                width: 1080px;
                margin-bottom: 40px;
            }
            
            .header_section_navbar{
                position: relative;
                z-index: 100;
                height: 46px;
                border-top: 1px solid #f1f3f6;
            }
            
            .header_area_nav{
                position: relative;
                margin: 0 auto;
                width: 1080px;
                zoom: 1;
            }
            
            .header_area_nav .an_l{
                position: relative;
                float: left;
                padding-top: 4px;
                padding-left: 4px;
                zoom: 1;
            }
            
            .header_area_nav .an_item{
                position: relative;
                display: block;
                float: left;
                padding-left: 14px;
            }
            
            .header_area_nav .an_txt{
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                overflow: hidden;
                text-align: center;
                white-space: nowrap;
            }
            
            .container{
                margin: 0 auto;
                padding: 8px 10px 0;
                width: 1080px;
                height: 550px;
                text-align: left;
                zoom: 1;
            }
            
            .column_left{
                padding-left: 13px;
                float: left;
                width: 727px;
                height: 140px;
                background: #fff;
            }
            
            .column_right{
                position: relative;
                float: right;
                width: 332px;
                height: 140px;
                background: #fff;
            }
            
            .column_book{
                padding-left: 13px;
                float: left;
                width: 523px;
                height: 160px;
                background: #fff;
                margin-top: 8px;
                overflow: hidden;
            }
            
            .column_student{
                padding-left: 13px;
                margin-top: 8px;
                position: relative;
                float: right;
                width: 523px;
                height: 160px;
                background: #fff;
            }
            
            .content_block{
                padding-left: 25px;
                font-size: 16px;
            }
            
            .description_block{
                position: relative;
                float: left;
                padding-left: 13px;
                padding-right: 13px;
                margin-top: 8px;
                width: 1054px;
                height: 230px;
                background: #fff;
            }
            
            .section_footer{
                margin-top: 8px;
                border-top: 1px solid #e3e7ee;
                background: #fff;
                text-align: left;
            }
            
            .notice{
                position: relative;
                border-bottom: 1px solid #f1f3f6;
            }
            
            .area_notice{
                position: relative;
                margin: 0 auto;
                padding-top: 16px;
                width: 1080px;
                height: 108px;
                zoom: 1;
            }
            
            .area_notice .an_tit{
                float: left;
                margin-right: 13px;
            }
            
            .area_logo{
                position: relative;
                display: inline;
            }
            
            .copyright{
                position: relative;
                z-index: 10;
                float: right;
                margin-top: 25px;
                padding-left: 23px;
                height: 50px;
                display: inline;
                font-weight: bold;
                text-align: right;
                margin-right: 15px;
            }
            
            
            
            ol, ul{
                list-style: none;
            }
            
            ul{
                display: block;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                padding-inline-start: 40px;
            }
            
            li{
                display: list-item;
                text-align: -webkit-match-parent;
            }
            
            body{
                background: #f2f4f7;
                height: 100%;
                font-size: 16px;
                font-family: "Open Sans", sans-serif;
                display: block;
                position: relative;
                overflow: hidden;
                min-width: 1100px;
            }
            
            .logout_box{
                color:#444;
                float: right;
                border: 1px solid #e5e8ef;
                padding: 0 5px;
                height: 25px;
                line-height: 23px;
                text-decoration: none!important;
                margin-right: 13px;
            }
            
            .myinfo_box{
                color:#444;
                float: left;
                border: 1px solid #e5e8ef;
                padding: 0 5px;
                height: 25px;
                line-height: 23px;
                text-decoration: none!important;
                margin-right: 13px;
            }
            
            .search{
                float: left;
                position: relative;
                width: 50px;
                height: 51px;
                margin-left: -2px;
                border: 5px solid #03cf5d;
                background-color: #fff;
                cursor: pointer;
            }
            
            input::-webkit-input-placeholder{
                font-size: 20px;
            }
            
            input::-ms-input-placeholder{
                font-size: 20px;
            }
            
            button{
                -webkit-writing-mode: horizontal-tb!important;
                text-rendering: auto;
                color: buttontext;
                letter-spacing: normal;
                word-spacing: normal;
                text-transform: none;
                display: inline-block;
                text-align: center;
                align-items: flex-start;
                box-sizing: border-box;
                margin: 0em;
            }
            
            body{
                height: 100%;
                position: relative;
                min-width: 1100px;
                overflow: auto;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="header_logo">
                <h1>
                    <center>
                        <a href="main.php">
                            Library of
                            <span style="color: red;"> Liceul Teoretic Magdacesti </span>
                        </a>
                    </center>
                </h1>
            </div>
            
            <div class="header_box">
            <img src="Moldova.png" height="80" width="160" style="float: left; margin-right: 20px;">
            
            <div class="header_search">
                <h2>
                    Get book information from Library
                </h2>
            </div>
            
            <div class="header_search_block">
                <form method='get' action='borrow_book.php'>
                    <input type='text' name='book_name' style="width: 500px; height:45px; border: 2px solid #03cf5d; background-color: #fff; float: left;" tabindex='1' placeholder="Fill out with book title"/>
                    <button type="submit" class="search">
                        <img src="search_icon.jpg" alt="">
                    </button>
                </form>
            </div>
            
            </div>
            
            <div class="header_section_navbar">
                <div class="header_area_nav">
                    <ul class="an_l">
                        <li class="an_item">
                            <a href="borrow_book.php">
                                <span class="an_txt" style="width: 180px; font-weight: bold; color: green;">
                                    Borrow book
                                </span>
                            </a>
                        </li>
                        <li class="an_item">
                            <a href="return_book.php">
                                <span class="an_txt" style="width: 180px; font-weight: bold; color: green;">
                                    Return book
                                </span>
                            </a>
                        </li>
                        <li class="an_item">
                            <a href="add_student.php">
                                <span class="an_txt" style="width: 180px; font-weight: bold; color: red;">
                                    Add Student Information
                                </span>
                            </a>
                        </li>
                        
                        <li class="an_item">
                            <a href="modify_student.php">
                                <span class="an_txt" style="width: 180px; font-weight: bold; color: red;">
                                    Modify Student Information
                                </span>
                            </a>
                        </li>
                        <li class="an_item">
                            <a href="add_book.php">
                                <span class="an_txt" style="width: 180px; font-weight: bold; color: blue;">
                                    Add Book Information
                                </span>
                            </a>
                        </li>
                        <li class="an_item">
                            <a href="modify_book.php">
                                <span class="an_txt" style="width: 180px; font-weight: bold; color: blue;">
                                    Modify Book Information
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?php
            $sql = "select * from student";
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            $student_count = $stmh->rowCount();
            
            $sql = "select * from book";
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            $book_count = $stmh->rowCount();
            
            $sql = "select * from borrow_list";
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            $borrow_count = $stmh->rowCount();
        ?>
        
        <div class="container">
            <div class="column_left">
                <h2>
                    Current State of Library
                </h2>
                <div class="content_block">
                    <li>
                        Total number of student: <?=htmlspecialchars($student_count)?>
                    </li>
                    <li>
                        Total number of book: <?=htmlspecialchars($book_count)?>
                    </li>
                    <li>
                        Total number of borrowed book: <?=htmlspecialchars($borrow_count)?>
                    </li>
                </div>
            </div>
            <div class="column_right">
                <span>
                    <h4 style="padding-left: 13px;">
                        Welcome, <?=htmlspecialchars($_SESSION['user_id'])?>!
                    </h4>
                </span>
                
                <a href="logout.php" class="logout_box">
                    <span> Logout </span>
                </a>
                
                <a href="modify_info.php" class="logout_box">
                    <span> My Info </span>
                </a>
            </div>
            
            <div class="column_book">
                <h2>
                    Book Menu
                </h2>
                <div class="content_block">
                    <li>
                        Borrow/Search
                    </li>
                    <li>
                        Return Book
                    </li>
                    <li>
                        Add Book
                    </li>
                    <li>
                        Modify Book
                    </li>
                </div>
            </div>
            
            <div class="column_student">
                <h2>
                    Student Menu
                </h2>
                <div class="content_block">
                    <li>
                        Add Student Information
                    </li>
                    <li>
                        Modify Student Information
                    </li>
                </div>
            </div>
            
            <div class="description_block">
                <h2>
                    Readme
                </h2>
                <p>
                    &nbsp;&nbsp;These implementations are for educational supports. You can modify all of our works by what you want and need.
                    Our works are based on PHP, MySQL. So, if you want to run and modify, then you should install MySQL, PHP, IDE for PHP.
                    I note the detail processes of installation at installation.docs. You can reference it.
                    <br>
                    &nbsp;&nbsp;You need additional devices to use our works, barcode reader, barcode printer. Barcode needs to identify each book, and
                    to make barcode, you need barcode printer. Barcode reader is just a additional device. You don't need it, but if you 
                    don't have barcode reader, you have to type whole barcode number to use our library system.
                    <br>
                    &nbsp;&nbsp;These implementations are Copyright by Jaewan, the student of Sungkyunkwan University, the volunteer of National Information Society Agency, Korea IT Volunteers.
                    You can modify our codes, but please notice its copyright.
                </p>
            </div>
        </div>
        
        <div class="section_footer">
            <div class="notice">
                <div class="area_notice">
                    <div class="copyright">
                        Copyright Jaewan, Datamining Lab, SKKU
                        <br>
                        All Rights Reserved
                    </div>
                    <div class="area_logo">
                        <img src="Korea.png" height="90" width="150" style="margin-right: 12px;">
                        <img src="SKKU.jpg" height="90" width="90" style="margin-right: 12px;">
                        <img src="KIV.png" height="90" width="230" style="margin-right: 12px;">
                        <img src="NIA.jpg" height="90" width="160" style="margin-right: 12px;">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>