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
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新闻编辑</h5>
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
                        <form id="articleEdit" method="post" class="form-horizontal" action="<?=$siteurl;?>admin/article/news_editpost/<?=$news_id;?>/">
                            <input id="article_content" type="hidden" name="Article" value="">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">新闻标题：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Title" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20" value="<?=$news_info['Title'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">新闻时间：</label>
                                <div class="col-sm-10">
                                    <input class="form-control layer-date" name="NewsTime" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="<?=date("Y-m-d H:i:s", $news_info['NewsTime']);?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">所属栏目：</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="ColumnID" required>
                                        <?php foreach ($navArray as $key => $value):?>
                                        <option value="<?=$value['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?><?php if($value['ID'] == $news_info['ID']){echo ' selected=""';};?>><?=$value['column_title'];?></option>
                                            <?php if($value['subMenu'] != false):?>
                                            <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
                                            <option value="<?=$value_s['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?><?php if($value_s['ID'] == $news_info['ID']){echo ' selected=""';};?>>　　└ <?=$value_s['column_title'];?></option>
                                                <?php if($value_s['subMenu'] != false):?>
                                                <?php foreach ($value_s['subMenu'] as $key_ss => $value_ss):?>
                                                <option value="<?=$value_ss['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?><?php if($value_ss['ID'] == $news_info['ID']){echo ' selected=""';};?>>　　　　└ <?=$value_ss['column_title'];?></option>
                                                <?php endforeach;?>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </select> <span class="help-block m-b-none">说明：只可以选择新闻类型的栏目</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">封面图：</label>
                                <div class="col-sm-10">
                                    <div id="imgBox" style="padding-bottom:10px;">
                                        <img src="<?=$siteurl;?>images/admin_upload/<?=$news_info['Pic'];?>">
                                    </div>
                                    <input id="PicUpLoad" type="file" class="form-control" name="picUpLoad">
                                    <input id="Pic" type="hidden" name="Pic" value="<?=$news_info['Pic'];?>"> <span class="help-block m-b-none">图片尺寸：540/347，或同比例（系统会自动生成对应尺寸的图片）</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">焦点：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Focus" value="1"<?php if($news_info['Focus']==1){echo ' checked=""';}?>> 是</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Focus" value="2"<?php if($news_info['Focus']==2){echo ' checked=""';}?>> 否</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">热点：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Hot" value="1"<?php if($news_info['Hot']==1){echo ' checked=""';}?>> 是</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Hot" value="2"<?php if($news_info['Hot']==2){echo ' checked=""';}?>> 否</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">仅会员浏览：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Power" value="2"<?php if($news_info['Power']==2){echo ' checked=""';}?>> 是</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Power" value="1"<?php if($news_info['Power']==1){echo ' checked=""';}?>> 否</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否发布：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Showpage" value="2"<?php if($news_info['Showpage']==2){echo ' checked=""';}?>> 是</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="Showpage" value="1"<?php if($news_info['Showpage']==1){echo ' checked=""';}?>> 否</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">模板选择：</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="Templet">
                                        <option value="index_about"<?php if($news_info['Templet']=='index_about'){echo ' selected=""';}?>>index_about</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容简介：</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="Introduced" required><?=$news_info['Introduced'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">正文内容：</label>
                                <div class="col-sm-10">
                                    <div class="summernote"><?=$news_info['Article'];?></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="button" onclick="goSubmit();">提交</button>
                                    <button class="btn btn-white" type="button" onclick="window.location='<?=$siteurl;?>admin/article/news_list/'">取消</button>
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
    <script src="<?=$siteurl;?>admin_file/js/plugins/layer/laydate/laydate.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $("#wrapperContent").removeClass("animated");
                $("#wrapperContent").removeClass("fadeInRight");
            },1000);

            $('#PicUpLoad').change(function(){
                var fileObj = document.getElementById("PicUpLoad").files[0];
                listImgUplad(fileObj, 'PicUpLoad');
            });

            $(".summernote").summernote({
                lang:"zh-CN",
                height: 350,
                onImageUpload: function(files, editor, $editable) {
                    UpladFile(files[0], editor, $editable);
                }
            });
        });
        function UpladFile(file, editor, $editable){
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
                    editor.insertImage($editable, data.img);
                }else{
                    alert(data.error.replace(/<[^>]+>/g,""));
                }
            };
            xhr.send(form);
        }
        function listImgUplad(file, inputName){
            var fileObj = file;
            var FileController = siteUrl+"admin/fileupload/img_uoload_newslist/"+inputName+"/?timeStamp=" + new Date().getTime();//图片上传接口
            var form = new FormData();
            form.append("author", "hooyes");
            form.append(inputName, fileObj);//文件对象
            var xhr = new XMLHttpRequest();
            xhr.open("post", FileController, true);
            xhr.onload = function () {
                var data = new Function("return" + xhr.responseText)();//获取返回值
                if(data.result){
                    $('#Pic').val(data.url);
                    $('#imgBox').html('<img src="'+siteUrl+'images/admin_upload/'+data.url+'">').show();
                }else{
                    alert(data.error.replace(/<[^>]+>/g,""));
                }
            };
            xhr.send(form);
        }
    </script>
</body>
</html>