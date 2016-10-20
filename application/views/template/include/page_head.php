<?php
$pName = $this->uri->segment(1, 0);
$cName = $this->uri->segment(2, 0);
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php if(isset($columnSeo)){echo $columnSeo['column_semtitle'];}else{echo $siteInfo['Title'];}?></title>
  <meta name="keywords" content="<?php if(isset($columnSeo)){echo $columnSeo['column_keywords'];}else{echo $siteInfo['Keywords'];}?>" />
  <meta name="description" content="<?php if(isset($columnSeo)){echo $columnSeo['column_description'];}else{echo $siteInfo['Description'];}?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Cache-Control" content="no-cache"/> 
  <meta http-equiv="Cache-Control" content="max-age=0"/>
  <meta name="HandheldFriendly" content="true" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?=$siteurl;?>css/swiper-3.3.1.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=$siteurl;?>css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?=$siteurl;?>css/common.css?v=<?php echo filemtime(dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/css/common.css");?>" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
    const siteUrl = "<?=$siteurl;?>";
  </script>
  <script language="javascript" type="text/javascript" src="http://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>
  <script language="javascript" type="text/javascript" src="<?=$siteurl;?>js/common.js"></script>
  <script language="javascript" type="text/javascript" src="<?=$siteurl;?>js/swiper-3.3.1.jquery.min.js"></script>
</head>
<body>