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
function delcfm(id,type){
    if(type == 1){
        var text = '确认删除？';
    }else if(type == 2){
        var text = '删除新闻栏目会自动删除此栏目下的新闻，确认删除？';
    }
    if (confirm(text)) {
        window.location='<?=$siteurl;?>admin/site/navigation_del/'+id+'/';
    }
}
</script>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">导航菜单列表</a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">新增菜单</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <form method="post" class="form-horizontal" action="<?=$siteurl;?>admin/site/navigation_orderpost/">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>菜单名称</th>
                                                    <th>链接名</th>
                                                    <th>模板</th>
                                                    <th>类型</th>
                                                    <th>排序</th>
                                                    <th>显示区域</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              $column_type_array = array(
                                                1 => '普通文章',
                                                2 => '新闻',
                                                3 => '活动'
                                              );
                                              $column_show_array = array(
                                                1 => '上',
                                                2 => '下'
                                              );
                                            ?>
                                            <?php foreach ($navArray as $key => $item):?>
                                                <tr>
                                                    <td><?=$item['ID'];?></td>
                                                    <td>
                                                        <?=$item['column_title'];?> 
                                                        <?php if($item['column_type'] == 1):?>
                                                            <span style="color:#999;">[<a href="<?=$siteurl;?>admin/article/article_edit/<?=$item['column_article_id'];?>/">编辑</a>]</span>
                                                        <?php elseif($item['column_type'] == 2):?>
                                                            <span style="color:red;">[<?=$item['newsNum'];?>篇新闻]</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td><?=$item['column_linktitle'];?></td>
                                                    <td><?=$item['column_templet'];?></td>
                                                    <td><?=$column_type_array[$item['column_type']];?></td>
                                                    <th><input style="width:30px; text-align:center" maxlength="2" type="text" name="column_order[]" value="<?=$item['column_order'];?>">
                                                        <input type="hidden" name="column_id[]" value="<?=$item['ID'];?>">
                                                    </th>
                                                    <th>
                                                        <?php
                                                        $item['column_show'] = json_decode($item['column_show']);
                                                        if(count($item['column_show']) > 0){
                                                            foreach ($item['column_show'] as $value) {
                                                                echo $column_show_array[$value];
                                                            }
                                                        }
                                                        ?>
                                                    </th>
                                                    <td>
                                                        <a href="<?=$siteurl;?>admin/site/navigation_edit/<?=$item['ID'];?>/"><i class="fa fa-edit text-navy"></i></a>　
                                                        <a href="javascript:void(0);" onclick="delcfm(<?=$item['ID'];?>,<?=$item['column_type'];?>)"><i class="fa fa-trash-o text-navy"></i></a>
                                                    </td>
                                                </tr>
                                                <?php if($item['subMenu'] != false):?>
                                                <?php foreach ($item['subMenu'] as $key_s => $item_s):?>
                                                    <tr>
                                                        <td><?=$item_s['ID'];?></td>
                                                        <td>　　└ <?=$item_s['column_title'];?> 
                                                            <?php if($item_s['column_type'] == 1):?>
                                                                <span style="color:#999;">[<a href="<?=$siteurl;?>admin/article/article_edit/<?=$item_s['column_article_id'];?>/">编辑</a>]</span>
                                                            <?php elseif($item_s['column_type'] == 2):?>
                                                                <span style="color:red;">[<?=$item_s['newsNum'];?>篇新闻]</span>
                                                            <?php endif;?>
                                                        </td>
                                                        <td><?=$item_s['column_linktitle'];?></td>
                                                        <td><?=$item_s['column_templet'];?></td>
                                                        <td><?=$column_type_array[$item_s['column_type']];?></td>
                                                        <th><input style="width:30px; text-align:center" maxlength="2" type="text" name="column_order[]" value="<?=$item_s['column_order'];?>">
                                                            <input type="hidden" name="column_id[]" value="<?=$item_s['ID'];?>">
                                                        </th>
                                                        <th>
                                                            <?php
                                                            $item_s['column_show'] = json_decode($item_s['column_show']);
                                                            if(count($item_s['column_show']) > 0){
                                                                foreach ($item_s['column_show'] as $value) {
                                                                    echo $column_show_array[$value];
                                                                }
                                                            }
                                                            ?>
                                                        </th>
                                                        <td>
                                                            <a href="<?=$siteurl;?>admin/site/navigation_edit/<?=$item_s['ID'];?>/"><i class="fa fa-edit text-navy"></i></a>　
                                                            <a href="javascript:void(0);" onclick="delcfm(<?=$item_s['ID'];?>,<?=$item_s['column_type'];?>)"><i class="fa fa-trash-o text-navy"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php if($item_s['subMenu'] != false):?>
                                                    <?php foreach ($item_s['subMenu'] as $key_ss => $item_ss):?>
                                                        <tr>
                                                            <td><?=$item_ss['ID'];?></td>
                                                            <td>　　　　└ <?=$item_ss['column_title'];?> 
                                                                <?php if($item_ss['column_type'] == 1):?>
                                                                    <span style="color:#999;">[<a href="<?=$siteurl;?>admin/article/article_edit/<?=$item_ss['column_article_id'];?>/">编辑</a>]</span>
                                                                <?php elseif($item_ss['column_type'] == 2):?>
                                                                    <span style="color:red;">[<?=$item_ss['newsNum'];?>篇新闻]</span>
                                                                <?php endif;?>
                                                            </td>
                                                            <td><?=$item_ss['column_linktitle'];?></td>
                                                            <td><?=$item_ss['column_templet'];?></td>
                                                            <td><?=$column_type_array[$item_ss['column_type']];?></td>
                                                            <th><input style="width:30px; text-align:center" maxlength="2" type="text" name="column_order[]" value="<?=$item_ss['column_order'];?>">
                                                                <input type="hidden" name="column_id[]" value="<?=$item_ss['ID'];?>">
                                                            </th>
                                                            <th>
                                                                <?php
                                                                $item_ss['column_show'] = json_decode($item_ss['column_show']);
                                                                if(count($item_ss['column_show']) > 0){
                                                                    foreach ($item_ss['column_show'] as $value) {
                                                                        echo $column_show_array[$value];
                                                                    }
                                                                }
                                                                ?>
                                                            </th>
                                                            <td>
                                                                <a href="<?=$siteurl;?>admin/site/navigation_edit/<?=$item_ss['ID'];?>/"><i class="fa fa-edit text-navy"></i></a>　
                                                                <a href="javascript:void(0);" onclick="delcfm(<?=$item_ss['ID'];?>,<?=$item_ss['column_type'];?>)"><i class="fa fa-trash-o text-navy"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <div class="col-sm-12" style="text-align:right;"><button type="submit" class="btn btn-w-m btn-info">排序</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?=$siteurl;?>admin/site/navigation_addpost/">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">菜单名称：</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="column_title" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">所属栏目：</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="column_parent">
                                                <option value="0">顶级栏目</option>
                                                <?php foreach ($navArray as $key => $value):?>
                                                <option value="<?=$value['ID'];?>"><?=$value['column_title'];?></option>
                                                    <?php if($value['subMenu'] != false):?>
                                                    <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
                                                    <option value="<?=$value_s['ID'];?>">　　└ <?=$value_s['column_title'];?></option>
                                                        <?php if($value_s['subMenu'] != false):?>
                                                        <?php foreach ($value_s['subMenu'] as $key_ss => $value_ss):?>
                                                        <option value="<?=$value_ss['ID'];?>">　　　　└ <?=$value_ss['column_title'];?></option>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">栏目类型：</label>
                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="column_type" value="1" required="">普通文章</label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="column_type" value="2" required="">新闻</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">链接名：</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="column_linktitle" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">模板选择：</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="column_templet">
                                                <option value="index_about">index_about (普通文章模板)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">显示区域：</label>
                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="column_show[]" value="1">上</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="column_show[]" value="2">下</label>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Title：</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="column_semtitle" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Keywords：</label>
                                        <div class="col-sm-10">
                                            <textarea name="column_keywords" class="form-control" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description：</label>
                                        <div class="col-sm-10">
                                            <textarea name="column_description" class="form-control" required=""></textarea>
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
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
</body>
</html>