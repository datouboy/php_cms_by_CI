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
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>网站管理员配置</h5>
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
                        <form method="post" class="form-horizontal" action="<?=$siteurl;?>admin/site/admin_editpost/<?=$adminInfo['ID'];?>/">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名：</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled="" placeholder="" required="" value="<?=$adminInfo['Name'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Password" class="form-control" placeholder="如果不更改密码，则无需填写！"  minlength="3" maxlength="20"> <span class="help-block m-b-none" style="color:red">如果不更改密码，则无需填写！</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">管理权限：</label>
                                <div class="col-sm-10">
                                <?php foreach ($adminNav as $key => $value):?>
                                    <div class="funPowerBox">
                                        <label class="checkbox-inline"><input type="checkbox" name="FunPower[]" value="<?=$value['setup']['link'];?>"<?php if(in_array($value['setup']['link'], $adminInfo['FunPower'])){echo ' checked=""';}?>> <?=$value['setup']['title'];?>　　--> </label>
                                        <?php foreach ($value['nav'] as $key_s => $value_s):?>
                                        <?php if($value_s['power'] == 8):?>
                                            <label class="checkbox-inline"><input type="checkbox" name="FunPower[]" value="<?=$value_s['link'];?>"<?php if(in_array($value_s['link'], $adminInfo['FunPower'])){echo ' checked=""';}?>> <?=$value_s['title'];?></label>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                <?php endforeach;?>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">提交</button>
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
    <script type="text/javascript">
    $(document).ready(function(){
        $('.funPowerBox label.checkbox-inline:first-child input[type=checkbox]').click(function(){
            if($(this).is(':checked')){
                $(this).parent().parent().children('label').children('input[type=checkbox]').prop("checked",true);
            }else{
                $(this).parent().parent().children('label').children('input[type=checkbox]').prop("checked",false);
            }
        });
        $('.funPowerBox label.checkbox-inline:not(:first-child) input[type=checkbox]').click(function(){
            if($(this).is(':checked')){
                $(this).parent().parent().children('label:first-child').children('input[type=checkbox]').prop("checked",true);
            }else{
                var sCheckbox = $(this).parent().parent().children('label.checkbox-inline:not(:first-child)');
                var isOk = true;
                for(var i=0; i<$(sCheckbox).length; i++){
                    if($(sCheckbox[i]).children('input[type=checkbox]').is(':checked')){
                        isOk = false;
                    }
                    console.log($(sCheckbox[i]).children('input[type=checkbox]').is(':checked'));
                }
                if(isOk){
                    $(this).parent().parent().children('label').children('input[type=checkbox]').prop("checked",false);
                }
            }
        });
    });
    </script>
</body>
</html>