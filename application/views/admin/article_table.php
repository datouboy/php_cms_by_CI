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
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>文章内容列表</h5>
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
                        <div class="table-responsive">
                            <?php
                            $article_power = array(
                                    1 => '无限制',
                                    2 => '会员可见'
                                );
                            $article_show = array(
                                    1 => '待发布',
                                    2 => '已发布'
                                );
                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>文章标题栏目</th>
                                        <th>浏览权限</th>
                                        <th>发布状态</th>
                                        <th>最后编辑时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($articleArray as $key => $item):?>
                                    <tr>
                                        <td><?=$item['ID'];?></td>
                                        <td><?=$item['More_column']['column_title'];?></td>
                                        <td><?=$article_power[$item['article_power']];?></td>
                                        <td><?=$article_show[$item['article_show']];?></td>
                                        <td><?=date('Y-m-d H:i', $item['article_time']);?></td>
                                        <td>
                                            <a href="<?=$siteurl;?>admin/article/article_edit/<?=$item['ID'];?>/"><i class="fa fa-edit text-navy"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <?=$pagefen;?>
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