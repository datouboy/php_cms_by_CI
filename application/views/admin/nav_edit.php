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
                        <h5>编辑菜单</h5>
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
                        <form method="post" class="form-horizontal" action="<?=$siteurl;?>admin/site/navigation_editpost/<?=$column_id;?>/">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">菜单名称：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="column_title" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20" value="<?=$column_inof['column_title'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">所属栏目：</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="column_parent">
                                        <option value="0"<?php if($column_inof['column_parent']==0){echo '  selected=""';}?>>顶级栏目</option>
                                        <?php foreach ($navArray as $key => $value):?>
                                        <?php if($column_id != $value['ID']):?>
                                        <option value="<?=$value['ID'];?>"<?php if($column_inof['column_parent']==$value['ID']){echo '  selected=""';}?>><?=$value['column_title'];?></option>
                                            <?php if($value['subMenu'] != false):?>
                                            <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
                                            <?php if($column_id != $value_s['ID']):?>
                                            <option value="<?=$value_s['ID'];?>"<?php if($column_inof['column_parent']==$value_s['ID']){echo '  selected=""';}?>>　　└ <?=$value_s['column_title'];?></option>
                                                <?php if($value_s['subMenu'] != false):?>
                                                <?php foreach ($value_s['subMenu'] as $key_ss => $value_ss):?>
                                                <?php if($column_id != $value_ss['ID']):?>
                                                <option value="<?=$value_ss['ID'];?>"<?php if($column_inof['column_parent']==$value_ss['ID']){echo '  selected=""';}?>>　　　　└ <?=$value_ss['column_title'];?></option>
                                                <?php endif;?>
                                                <?php endforeach;?>
                                                <?php endif;?>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">栏目类型：</label>
                                <div class="col-sm-10">
                                    <?php
                                    $columnTypeArray = array(
                                        1 => '普通文章',
                                        2 => '新闻'
                                    );
                                    ?>
                                    <input type="text" class="form-control" disabled="" placeholder="" required="" value="<?=$columnTypeArray[$column_inof['column_type']];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">链接名：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="column_linktitle" class="form-control" placeholder="请输入文本"required="" minlength="3" maxlength="20" value="<?=$column_inof['column_linktitle'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">模板选择：</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="column_templet">
                                        <option value="index_about"<?php if($column_inof['column_templet']=='index_about'){echo '  selected=""';}?>>index_about (文章模板)</option>
                                        <option value="index_marketInfo"<?php if($column_inof['column_templet']=='index_marketInfo'){echo '  selected=""';}?>>index_about (新闻列表模板)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">显示区域：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="column_show[]" value="1"<?php if(strpos($column_inof['column_show'],'1')>0){echo ' checked=""';}?>> 上</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="column_show[]" value="2"<?php if(strpos($column_inof['column_show'],'2')>0){echo ' checked=""';}?>> 下</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Title：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="column_semtitle" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20" value="<?=$column_inof['column_semtitle'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keywords：</label>
                                <div class="col-sm-10">
                                    <textarea name="column_keywords" class="form-control" required=""><?=$column_inof['column_keywords'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description：</label>
                                <div class="col-sm-10">
                                    <textarea name="column_description" class="form-control" required=""><?=$column_inof['column_description'];?></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <button class="btn btn-white" type="button" onclick="window.location='<?=$siteurl;?>admin/site/navigation_list/'">取消</button>
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
</body>
</html>