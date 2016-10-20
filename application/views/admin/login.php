<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.zi-han.net/theme/hplus/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?=$siteInfo['Title'];?> 后台</title>
    <meta name="keywords" content="<?=$siteInfo['Keywords'];?>" />
    <meta name="description" content="<?=$siteInfo['Description'];?>" />
    <link href="<?=$siteurl;?>admin_file/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/animate.min.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/style.min.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/login.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <div class="logopanel m-b">
                        <h1>[ EasyCMS ]</h1>
                    </div>
                    <div class="m-b"></div>
                    <h4>欢迎使用 <strong>EasyCMS管理后台</strong></h4>
                    <ul class="m-b">
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 后台响应式布局</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 兼容各主流浏览器</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 完善的售后服务</li>
                    </ul>
                    <!-- <strong>还没有账号？ <a href="#">立即注册&raquo;</a></strong> -->
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post" action="<?=$siteurl;?>admin/root/loginfun/">
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录到EasyCMS管理后台</p>
                    <input type="text" class="form-control uname" placeholder="用户名" name="user_name" />
                    <input type="password" class="form-control pword m-b" placeholder="密码" name="user_password" />
                    <a href="#">忘记密码了？</a>
                    <button class="btn btn-success btn-block">登录</button>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2016 All Rights SinoContact
            </div>
        </div>
    </div>
</body>
</html>
