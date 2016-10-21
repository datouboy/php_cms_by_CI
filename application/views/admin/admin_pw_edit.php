<?php
$pName = $this->uri->segment(1, 0);
$cName = $this->uri->segment(2, 0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$siteInfo['Title'];?> 后台</title>
    <meta name="keywords" content="<?=$siteInfo['Keywords'];?>" />
    <meta name="description" content="<?=$siteInfo['Description'];?>" />
    <link rel="shortcut icon" href="favicon.ico">
    <link href="<?=$siteurl;?>admin_file/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/animate.min.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script type="text/javascript">
        const siteUrl = '<?=$siteurl;?>';
    </script>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>密码修改 （修改成功后会跳转至登陆页重新登陆）</h5>
                        <!-- <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div> -->
                    </div>
                    <div class="ibox-content">
                        <form id="pwpost" method="post" class="form-horizontal" action="<?=$siteurl;?>admin/site/admin_edit_pwpost/">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">原密码：</label>
                                <div class="col-sm-10">
                                    <input type="password" name="oldPassword" class="form-control" required="" minlength="6" maxlength="20" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">新密码：</label>
                                <div class="col-sm-10">
                                    <input type="password" name="newPassword" class="form-control" required="" minlength="6" maxlength="20" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">重复新密码：</label>
                                <div class="col-sm-10">
                                    <input type="password" name="reNewPassword" class="form-control" required="" minlength="6" maxlength="20" value="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button id="buttonSubmit" class="btn btn-primary" type="button">提交</button>
                                    <button class="btn btn-white" type="reset">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=$siteurl;?>admin_file/js/jquery.min.js?v=2.1.4"></script>
    <script src="<?=$siteurl;?>admin_file/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="<?=$siteurl;?>admin_file/js/content.min.js?v=1.0.0"></script>
    <script src="<?=$siteurl;?>admin_file/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#buttonSubmit').click(function(){
            if($('input[name=oldPassword]').val() != '' && $('input[name=newPassword]').val() != '' && $('input[name=reNewPassword]').val() != ''){
                $.ajax({
                    type: "POST",
                    url: siteUrl+"/admin/site/checked_admin_pw/?timeStamp=" + new Date().getTime(),
                    data: {'oldPassword':$('input[name=oldPassword]').val()},
                    dataType: "json",
                    timeout: 20000,//20秒
                    beforeSend: function(){
                    },
                    success: function(msg){
                        if(msg.result){
                            if($('input[name=oldPassword]').val() == $('input[name=oldPassword]').val()){
                                $('#pwpost').submit();
                            }else{
                                swal({
                                    title:"警告！",
                                    text:"两次密码填写的不一样！"
                                });
                            }
                        }else{
                            swal({
                                title:"警告！",
                                text:"原密码错误！"
                            });
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        alert('ajax通信出错');
                    }
                });
            }else{
                swal({
                    title:"警告！",
                    text:"表单未填写完整！"
                });
            }
        })
    });
    </script>
</body>
</html>