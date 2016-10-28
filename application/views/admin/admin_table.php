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
    <link href="<?=$siteurl;?>admin_file/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/animate.min.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>
<script language="javascript" type="text/javascript">
function delcfm(id){
    if (confirm('确认删除？')) {
        window.location='<?=$siteurl;?>admin/site/admin_del/'+id+'/';
    }
}
</script>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">管理员列表</a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">添加管理员</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>用户名</th>
                                                <th>注册时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($adminArray as $key => $item):?>
                                            <tr>
                                                <td><?=$item['ID'];?></td>
                                                <td><?=$item['Name'];?></td>
                                                <td><?=date('Y-m-d H:i:s', $item['RegTime']);?></td>
                                                <td>
                                                    <a href="<?=$siteurl;?>admin/site/admin_edit/<?=$item['ID'];?>/"><i class="fa fa-edit text-navy"></i></a>　
                                                    <a href="javascript:void(0);" onclick="delcfm(<?=$item['ID'];?>)"><i class="fa fa-trash-o text-navy"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?=$siteurl;?>admin/site/admin_addpost/">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">用户名：</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Name" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">密码：</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Password" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">管理权限：</label>
                                        <div class="col-sm-10">
                                        <?php foreach ($adminNav as $key => $value):?>
                                            <div class="funPowerBox">
                                                <label class="checkbox-inline"><input type="checkbox" name="FunPower[]" value="<?=$value['setup']['link'];?>" data-class="<?=$value['setup']['link'];?>" data-first="yes"> <?=$value['setup']['title'];?>　　--> </label>
                                                <?php foreach ($value['nav'] as $key_s => $value_s):?>
                                                <?php if($value_s['power'] == 8):?>
                                                    <label class="checkbox-inline"><input type="checkbox" name="FunPower[]" value="<?=$value_s['link'];?>" data-class="<?=$value['setup']['link'];?>" data-first="no"> <?=$value_s['title'];?></label>
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
        </div>
    </div>
    <script src="<?=$siteurl;?>admin_file/js/jquery.min.js?v=2.1.4"></script>
    <script src="<?=$siteurl;?>admin_file/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="<?=$siteurl;?>admin_file/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=$siteurl;?>admin_file/js/content.min.js?v=1.0.0"></script>
    <script src="<?=$siteurl;?>admin_file/js/plugins/iCheck/icheck.min.js"></script>
    <script src="<?=$siteurl;?>admin_file/js/demo/peity-demo.min.js"></script>
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