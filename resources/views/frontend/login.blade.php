<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>CodePen - Random Login Form</title>

    <style>
        @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

        body{
            margin: 0;
            padding: 0;
            background: #fff;

            color: #fff;
            font-family: Arial;
            font-size: 12px;
        }

        .body{
            position: absolute;
            top: -50px;
            left: -20px;
            right: -60px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url(http://maicheviet.com/wp-content/uploads/2018/05/Thiet-ke-va-thi-cong-mai-che-tai-dai-hoc-thang-long-ha-noi-maicheviet-12.jpg);
            background-size: cover;
            -webkit-filter: blur(3px);
            z-index: 0;
        }

        .grad{
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
            z-index: 1;
            opacity: 0.7;
        }

        .header{
            position: absolute;
            top: calc(50% - 35px);
            left: calc(50% - 255px);
            z-index: 2;
        }

        .header div{
            float: left;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 35px;
            font-weight: 200;
        }

        .header div span{
            color: #5379fa !important;
        }

        .login{
            position: absolute;
            top: calc(50% - 75px);
            left: calc(50% - 50px);
            height: 150px;
            width: 350px;
            padding: 10px;
            z-index: 2;
        }

        .login input[type=text]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
        }

        .login input[type=password]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
        }

        .login input[type=button]{
            width: 260px;
            height: 35px;
            background: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            border-radius: 2px;
            color: #a18d6c;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 6px;
            margin-top: 10px;
        }

        .login input[type=button]:hover{
            opacity: 0.8;
        }

        .login input[type=button]:active{
            opacity: 0.6;
        }

        .login input[type=text]:focus{
            outline: none;
            border: 1px solid rgba(255,255,255,0.9);
        }

        .login input[type=password]:focus{
            outline: none;
            border: 1px solid rgba(255,255,255,0.9);
        }

        .login input[type=button]:focus{
            outline: none;
        }

        ::-webkit-input-placeholder{
            color: rgba(255,255,255,0.6);
        }

        ::-moz-input-placeholder{
            color: rgba(255,255,255,0.6);
        }
    </style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">
        <form class="form-login" action="{{route('backend.dashboard')}}">
            <h2 class="form-login-heading">Welcome TLU</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="User ID" autofocus>
                <br>
                <input type="password" class="form-control" placeholder="Password">
                <label class="checkbox" style="margin-left: 20px;">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
                </label>
                <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                <hr>
                {{--<div class="login-social-link centered">
                    <p>or you can sign in via your social network</p>
                    <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                    <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                </div>
                <div class="registration">
                    Don't have an account yet?<br/>
                    <a class="" href="#">
                        Create an account
                    </a>
                </div>--}}
            </div>
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </form>
    </div>

<div class="body"></div>
<div class="grad"></div>
<div class="header">
    <div>Login<span>TLU</span></div>
</div>
<br>
<div class="login">
    <input type="text" placeholder="username" name="user"><br>
    <input type="password" placeholder="password" name="password"><br>
    <input type="button" value="Login">
</div>

<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>
