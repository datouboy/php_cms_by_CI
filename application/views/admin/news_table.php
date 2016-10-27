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
    //$('#articleEdit').submit();
    $('#submitGo').click();
}
function delcfm(id){
    if (confirm('确认删除？')) {
        window.location='<?=$siteurl;?>admin/article/news_del/'+id+'/';
    }
}
</script>
<body class="gray-bg">
    <div id="wrapperContent" class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12"> 
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">新闻列表</a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">发布新闻</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-sm-3 m-b-xs">
                                        <select class="input-sm form-control input-s-sm inline" id="goColumnID">
                                            <option value="no">按所属栏目检索</option>
                                            <option value="all">所有栏目</option>
                                            <?php foreach ($navArray as $key => $value):?>
                                            <option value="<?=$value['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?><?php if($value['ID'] == $urlInfo['column']){echo ' selected=""';};?>><?=$value['column_title'];?></option>
                                                <?php if($value['subMenu'] != false):?>
                                                <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
                                                <option value="<?=$value_s['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?><?php if($value_s['ID'] == $urlInfo['column']){echo ' selected=""';};?>>　　└ <?=$value_s['column_title'];?></option>
                                                    <?php if($value_s['subMenu'] != false):?>
                                                    <?php foreach ($value_s['subMenu'] as $key_ss => $value_ss):?>
                                                    <option value="<?=$value_ss['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?><?php if($value_ss['ID'] == $urlInfo['column']){echo ' selected=""';};?>>　　　　└ <?=$value_ss['column_title'];?></option>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 m-b-xs">
                                        <div data-toggle="buttons" class="btn-group">
                                            <label class="btn btn-sm btn-white<?php if($urlInfo['goMember'] == 'all'){echo ' active';}?>">
                                                <input type="radio" name="goMember" value="all">全部</label>
                                            <label class="btn btn-sm btn-white<?php if($urlInfo['goMember'] == 1){echo ' active';}?>">
                                                <input type="radio" name="goMember" value="1">无限制</label>
                                            <label class="btn btn-sm btn-white<?php if($urlInfo['goMember'] == 2){echo ' active';}?>">
                                                <input type="radio" name="goMember" value="2">仅会员</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 m-b-xs">
                                        <div data-toggle="buttons" class="btn-group">
                                            <label class="btn btn-sm btn-white<?php if($urlInfo['goShow'] == 'all'){echo ' active';}?>">
                                                <input type="radio" name="goShow" value="all">全部</label>
                                            <label class="btn btn-sm btn-white<?php if($urlInfo['goShow'] == 1){echo ' active';}?>">
                                                <input type="radio" name="goShow" value="1">待发布</label>
                                            <label class="btn btn-sm btn-white<?php if($urlInfo['goShow'] == 2){echo ' active';}?>">
                                                <input type="radio" name="goShow" value="2">已发布</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input id="searchText" type="text" placeholder="请输入关键词" class="input-sm form-control"> <span class="input-group-btn">
                                                <button id="searchMenu" type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                        </div>
                                    </div>
                                </div>
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
                                    $yesNo = array(
                                            1 => '是',
                                            2 => '否'
                                        );
                                    ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>新闻标题</th>
                                                <th>所属栏目</th>
                                                <th>模版</th>
                                                <th>焦点</th>
                                                <th>热点</th>
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
                                                <td><?=$item['Title'];?></td>
                                                <td><?=$item['More_column']['column_title'];?></td>
                                                <td><?=$item['Templet'];?></td>
                                                <td><?=$yesNo[$item['Focus']];?></td>
                                                <td><?=$yesNo[$item['Hot']];?></td>
                                                <td><?=$article_power[$item['Power']];?></td>
                                                <td><?=$article_show[$item['Showpage']];?></td>
                                                <td><?=date('Y-m-d H:i', $item['EditTime']);?></td>
                                                <td>
                                                    <a href="<?=$siteurl;?>admin/article/news_edit/<?=$item['ID'];?>/"><i class="fa fa-edit text-navy"></i></a>　
                                                    <a href="javascript:void(0);" onclick="delcfm(<?=$item['ID'];?>)"><i class="fa fa-trash-o text-navy"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <?=$pagefen;?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="ibox-content">
                                <form id="articleEdit" method="post" class="form-horizontal" action="<?=$siteurl;?>admin/article/news_addpost/">
                                    <input id="article_content" type="hidden" name="Article" value="">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">新闻标题：</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Title" class="form-control" placeholder="请输入文本" required="" minlength="3" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">新闻时间：</label>
                                        <div class="col-sm-10">
                                            <input class="form-control layer-date" name="NewsTime" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">所属栏目：</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="ColumnID" required>
                                                <option></option>
                                                <?php foreach ($navArray as $key => $value):?>
                                                <option value="<?=$value['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?>><?=$value['column_title'];?></option>
                                                    <?php if($value['subMenu'] != false):?>
                                                    <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
                                                    <option value="<?=$value_s['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?>>　　└ <?=$value_s['column_title'];?></option>
                                                        <?php if($value_s['subMenu'] != false):?>
                                                        <?php foreach ($value_s['subMenu'] as $key_ss => $value_ss):?>
                                                        <option value="<?=$value_ss['ID'];?>"<?php if($value['column_type'] != 2){echo ' disabled="disabled"';};?>>　　　　└ <?=$value_ss['column_title'];?></option>
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
                                            <div id="imgBox" style="display:none; padding-bottom:10px;"></div>
                                            <input id="PicUpLoad" type="file" class="form-control" name="picUpLoad">
                                            <input id="Pic" type="hidden" name="Pic" value=""> <span class="help-block m-b-none">图片尺寸：540/347，或同比例（系统会自动生成对应尺寸的图片）</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">焦点：</label>
                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Focus" value="1"> 是</label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Focus" value="2" checked=""> 否</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">热点：</label>
                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Hot" value="1"> 是</label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Hot" value="2" checked=""> 否</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">仅会员浏览：</label>
                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Power" value="2"> 是</label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Power" value="1" checked=""> 否</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">是否发布：</label>
                                        <div class="col-sm-10">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Showpage" value="2"> 是</label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="Showpage" value="1" checked=""> 否</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">模板选择：</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="Templet">
                                                <option value="index_about">index_about</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">内容简介：</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="Introduced" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">正文内容：</label>
                                        <div class="col-sm-10">
                                            <div class="summernote"></div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="button" onclick="goSubmit();">提交</button>
                                            <button class="btn btn-white" type="resert">取消</button>
                                            <button id="submitGo" class="btn btn-primary" type="submit" style="display:none;">提交</button>
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

            $('#goColumnID').change(function(){
                if($(this).val() != 'no'){
                    window.location = '<?=$siteurl;?>admin/article/news_list/'+$(this).val()+'/<?=$urlInfo['goMember'];?>/<?=$urlInfo['goShow'];?>/all/';
                }
            });

            $('input[name=goMember]').change(function(){
                window.location = '<?=$siteurl;?>admin/article/news_list/<?=$urlInfo['column'];?>/'+$(this).val()+'/<?=$urlInfo['goShow'];?>/<?=$urlInfo['searchText'];?>/';
            });

            $('input[name=goShow]').change(function(){
                window.location = '<?=$siteurl;?>admin/article/news_list/<?=$urlInfo['column'];?>/<?=$urlInfo['goMember'];?>/'+$(this).val()+'/<?=$urlInfo['searchText'];?>/';
            });

            $('#searchMenu').click(function(){
                window.location = '<?=$siteurl;?>admin/article/news_list/<?=$urlInfo['column'];?>/<?=$urlInfo['goMember'];?>/<?=$urlInfo['goShow'];?>/'+encodeURIComponent($('#searchText').val())+'/';
            });

            $('#PicUpLoad').change(function(){
                var fileObj = document.getElementById("PicUpLoad").files[0];
                listImgUplad(fileObj, 'PicUpLoad');
            });

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