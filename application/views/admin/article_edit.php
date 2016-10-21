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

    <link href="<?=$siteurl;?>admin_file/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?=$siteurl;?>admin_file/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <script type="text/javascript">
        const siteUrl = '<?=$siteurl;?>';
    </script>
</head>
<script type="text/javascript">
function goSubmit(){
    $('#article_content').val($('.summernote').summernote('code'));
    $('#articleEdit').submit();
}
</script>
<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>文章内容编辑</h5>
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
                        <form id="articleEdit" method="post" class="form-horizontal" action="<?=$siteurl;?>admin/article/article_editpost/<?=$article_id;?>/">
                            <input id="article_content" type="hidden" name="article_content" value="">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">菜单名称：</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled="" placeholder="已被禁用" class="form-control" value="<?=$article['More_column']['column_title'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">浏览权限：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="article_power" value="1"<?php if($article['article_power']==1){echo ' checked=""';}?>>无限制</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="article_power" value="2"<?php if($article['article_power']==2){echo ' checked=""';}?>>会员可见</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">发布状态：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="article_show" value="1"<?php if($article['article_show']==1){echo ' checked=""';}?>>待发布</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="article_show" value="2"<?php if($article['article_show']==2){echo ' checked=""';}?>>已发布</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容编辑：</label>
                                <div class="col-sm-10">
                                    <div class="summernote"><?=$article['article_content'];?></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="button" onclick="goSubmit();">提交</button>
                                    <button class="btn btn-white" type="button" onclick="window.location='<?=$siteurl;?>admin/article/article_list/'">取消</button>
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
    <script src="<?=$siteurl;?>admin_file/js/plugins/summernote/summernote.min.js"></script>
    <script src="<?=$siteurl;?>admin_file/js/plugins/summernote/summernote-zh-CN.js"></script>
    <script>
        $(document).ready(function(){
            $(".summernote").summernote({
                lang:"zh-CN",
                height: 350,
                callbacks: {
                    onImageUpload: function(files) {
                        UpladFile(files[0]);
                    }
                }
            });
        });
        function UpladFile(file){
            var fileObj = file;
            var FileController = siteUrl+"admin/fileupload/img_uoload/file/?timeStamp=" + new Date().getTime();//图片上传接口
            var form = new FormData();
            form.append("author", "hooyes");
            form.append("file", fileObj);//文件对象
            var xhr = new XMLHttpRequest();
            xhr.open("post", FileController, true);
            xhr.onload = function () {
                var data = new Function("return" + xhr.responseText)();//获取返回值
                if(data.result){
                    $(".summernote").summernote('insertImage', data.img);
                }else{
                    alert(data.error.replace(/<[^>]+>/g,""));
                }
            };
            xhr.send(form);
        }
    </script>
</body>
</html>