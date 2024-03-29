<html>
    <?php
        session_start();
        $login = 0;
        $service = 0;
    ?>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <title>Login Page</title>
        
        <style>
            body{
                margin:0;
                color:#6a6f8c;
                background:#c8c8c8;
                font:600 16px/18px 'Open Sans',sans-serif;
            }

            *,:after,:before{
                box-sizing:border-box
            }

            .clearfix:after,.clearfix:before{
                content:'';
                display:table
            }

            .clearfix:after{
                clear:both;
                display:block
            }

            a{
                color:inherit;
                text-decoration:none
            }

            .login-wrap{
                    width:100%;
                    margin:auto;
                    max-width:525px;
                    min-height:400px;
                    position:relative;
                    box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
            }

            .login-html{
                    width:100%;
                    height:100%;
                    position:absolute;
                    padding:90px 70px 50px 70px;
                    background:rgba(40,57,101,.9);
            }

            .login-html .sign-in-htm{
                    top:0;
                    left:0;
                    right:0;
                    bottom:0;
                    position:absolute;
                    transition:all .4s linear;
            }

            .login-html .sign-in,
            .login-form .group .check{
                    display: none;
            }

            .login-html .tab,
            .login-form .group .label,
            .login-form .group .button{
                    text-transform:uppercase;
            }

            .login-html .tab{
                    font-size:22px;
                    margin-right:15px;
                    padding-bottom:5px;
                    margin:0 15px 10px 0;
                    display:inline-block;
                    border-bottom:2px solid transparent;
            }

            .login-html .sign-in:checked + .tab{
                    color:#fff;
                    border-color:#1161ee;
            }

            .login-form{
                    min-height:345px;
                    position:relative;
                    perspective:1000px;
                    transform-style:preserve-3d;
            }

            .login-form .group{
                    margin-bottom:15px;
            }

            .login-form .group .label,
            .login-form .group .input,
            .login-form .group .button{
                    width:100%;
                    color:#fff;
                    display:block;
            }

            .login-form .group .input,
            .login-form .group .button{
                    border:none;
                    padding:15px 20px;
                    border-radius:25px;
                    background:rgba(255,255,255,.1);
            }

            .login-form .group input[data-type="password"]{
                    text-security:circle;
                    -webkit-text-security:circle;
            }

            .login-form .group .label{
                    color:#aaa;
                    font-size:12px;
            }

            .login-form .group .button{
                    background:#1161ee;
            }

            .login-form .group label .icon{
                    width:15px;
                    height:15px;
                    border-radius:2px;
                    position:relative;
                    display:inline-block;
                    background:rgba(255,255,255,.1);
            }
        </style>
    </head>
    
    <body>
        <form method='post' action='/login_ok.php'>
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                
                <label for="tab" class="tab">
                    Sign In for Admin
                </label>
                
                <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label class="label">Username</label>
                            <input type="text" name="user_id" class="input">
                        </div>

                        <div class="group">
                            <label class="label">Password</label>
                            <input type="password" class="input" name="user_pw" data-type="password">
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="Sign In" action="/login_ok.php">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>