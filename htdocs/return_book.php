<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
        ?>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Book</title>
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
                height: auto;
                min-height: 550px;
                text-align: left;
                zoom: 1;
            }
            
            .column_search{
                padding-left: 13px;
                float: left;
                width: 727px;
                height: 140px;
                background: #fff;
            }
            
            .column_quick_search{
                padding-left: 5px;
                float: left;
                width: 1080px;
                height: 65px;
                background: #fff;
                display: block;
            }
            
            .column_book_search{
                padding-left: 13px;
                float: left;
                width: 1080px;
                height: 130px;
                background: #fff;
                margin-top: 8px;
                display: block;
                padding-bottom: 10px;
            }
            
            .borrow_box{
                padding-left: 5px;
                width: 1080px;
                height: 100%;
                background: #fff;
                display: block;
                padding-bottom: 10px;
            }
            
            .search_result{
                padding-left: 5px;
                width: 1080px;
                height: 100%;
                background: #fff;
                padding-bottom: 20px;
                display: block;
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

            .search-form .group{
                    margin-bottom:15px;
            }
            
            .search-form .group .label,
            .search-form .group .input{
                    width: 180px;
            }

            .search-form .group .input,
            .search-form .group .button{
                    border: 1px solid black;
                    padding: 12px 20px;
                    border-radius: 10px;
            }

            .search-form .group .button{
                    background:#1161ee;
            }
        </style>
    </head>
    
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
        
        if(empty($_REQUEST["book_id"]))
        {
            $book_id = "";
            $book_id_search_key = "%";
        }
        
        else
        {
            $book_id = $_REQUEST["book_id"];
            $book_id_search_key = '%'.$book_id.'%';
        }
        
        if(empty($_REQUEST["book_name"]))
        {
            $book_name = "";
            $book_name_search_key = "%";
        }
        
        else
        {
            $book_name = $_REQUEST["book_name"];
            $book_name_search_key = '%'.$book_name.'%';
        }
        
        if(empty($_REQUEST["student_id"]))
        {
            $student_id = 0;
        }
        
        else
        {
            $student_id = $_REQUEST["student_id"];
        }
    ?>

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
        
        <div class="container">
            <h2 style="color: green;">
                    Lended Book Search
            </h2>
            
            <div class="column_quick_search">
                <div class="search-form" style="background: #3ec5f1; border-radius: 10px;">
                    <div class="group" style="padding-top: 10px;">
                        <form method='get' action=''>
                            <span style="margin-right: 18px; color: #000080; padding-left: 15px; font-weight: bold;"> Quick Search(Book ID) </span>
                            <input type="text" name="book_id" class="input" style="margin-right: 15px; margin-bottom: 12px; width: 400px;">
                            <input type="submit" class="button" value="Search" action="" style="margin-right: 12px;">
                            <span style="color: red; font-size: 15px;"> *Scan the barcord of the book </span>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="column_book_search" style="padding-left: 0px;">
                <img src="Folder.jpg" style="float: left; margin-right: 15px; margin-top: 10px; margin-left: 10px;">
                <h3 style="color: #41E4BC; font-size: 20px;"> Book Information </h3>
                <form method='get' action=''>
                    <div class="search-form" style="margin-left: 70px; ">
                        <div class="group">
                            <label class="label" style="margin-right: 10px;">Book title</label>
                            <input type="text" name="book_name" class="input" style="margin-right: 50px; margin-bottom: 25px;width: 600px;">
                            <input type="submit" class="button" value="Search" action="">
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="column_book_search" style="padding-left: 0px;">
                <img src="Folder.jpg" style="float: left; margin-right: 15px; margin-top: 10px; margin-left: 10px;">
                <h3 style="color: orange; font-size: 20px;"> Student Information </h3>
                <form method='get' action=''>
                    <div class="search-form" style="margin-left: 70px; ">
                        <div class="group">
                            <label class="label" style="margin-right: 10px;">Student ID</label>
                            <input type="text" name="student_id" class="input" style="margin-right: 50px; margin-bottom: 25px;width: 600px;">
                            <input type="submit" class="button" value="Search" action="">
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="search_result">
                <span style="font-size: 20px; font-weight: bold; padding-left: 10px;">
                    Search Result
                </span>
                
                <?php                  
                    if($student_id == 0)
                    {
                        $sql = "select * from book B, borrow_list R where B.title like :book_name and B.bid like :book_id and B.bid = R.bid";
                        $stmh = $pdo->prepare($sql);
                        $stmh->bindValue(':book_name', $book_name_search_key, PDO::PARAM_STR);
                        $stmh->bindValue(':book_id', $book_id_search_key, PDO::PARAM_STR);
                        $stmh->execute();
                    }
                    
                    else
                    {
                        $sql = "select * from book B, borrow_list R, student S where B.title like :book_name and B.bid like :book_id and B.bid = R.bid and R.sid = :student_id and R.sid = S.sid";
                        $stmh = $pdo->prepare($sql);
                        $stmh->bindValue(':book_name', $book_name_search_key, PDO::PARAM_STR);
                        $stmh->bindValue(':book_id', $book_id_search_key, PDO::PARAM_STR);
                        $stmh->bindValue(':student_id', $student_id, PDO::PARAM_STR);
                        $stmh->execute();
                    }
                    
                    $count = $stmh->rowCount();

                    if($count<1){
                ?>
                
                    <span> : No results were viewed. </span>
                
                <?php
                    }
                    else{
                ?>
                
                    <span> : <?=htmlspecialchars($count)?> </span>
                    <br>
                
                <?php
                    }
                ?>
                <table width="1040" border="1" cellspacing="0" cellpadding="8" style="margin: 0 auto; margin-top: 12px;">
                    <tbody>
                        <tr>
                            <th>
                                Book ID
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Author
                            </th>
                            <th>
                                Loaner ID
                            </th>
                            <th>
                                Loaner name
                            </th>
                            <th>
                                Return
                            </th>
                        </tr>
                        <?php
                        while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                        ?>

                        <tr>
                            <td align="left" width="90" style="word-break:break-all"><?=htmlspecialchars($row['bid'])?></td>

                            <td width="250" style="word-break: break-all;"><?=htmlspecialchars($row['title'])?></td>

                            <td align="center" width="150" style="word-break: break-all"><?=htmlspecialchars($row['author'])?></td>

                            <?php
                                $temp_bid = $row['bid'];
                                $sql2 = "select sid from borrow_list where bid like $temp_bid";
                                $stmh2 = $pdo->prepare($sql2);
                                $stmh2->execute();
                                $temp_row = $stmh2->fetch(PDO::FETCH_ASSOC);
                                
                                $temp_sid = $temp_row['sid'];
                                $sql3 = "select name from student where sid = $temp_sid";
                                $stmh3 = $pdo->prepare($sql3);
                                $stmh3->execute();
                                $temp_row2 = $stmh3->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <td width="100"> <?=htmlspecialchars($temp_row['sid'])?> </td>
                            <td> <?=htmlspecialchars($temp_row2['name'])?> </td>
                            
                            <td align="center" style="word-break: break-all">
                                <form name="lend" method="post" action="return_book_back.php" style="margin: 0 auto; ">
                                    <div style="text-align: center">
                                        <input type="hidden" name="bid" value=<?=htmlspecialchars($row['bid'])?>>
                                    </div>
                                    <input type="submit" value="Return">
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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