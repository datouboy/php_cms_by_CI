<?php
$addUrl = array(
    1 => 'view/article/',
    2 => 'news/showlist/',
    3 => 'events/showlist/',
  );
?>
<footer class="footer">
    <div class="container">
        <div class="footer_box">
            <img src="<?=$siteurl;?>images/logo_inverse.png" />
        </div>
        <?php foreach ($topNavArray as $key => $value):?>
        <div class="footer_box">
            <ul class="footer_menu">
                <li>
                    <a href="<?=$siteurl;?><?=$addUrl[$value['column_type']];?><?=$value['column_linktitle'];?>"><?=$value['column_title'];?></a>
                    <?php if($value['subMenu'] != false):?>
                        <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
                        <li><a href="<?=$siteurl;?><?=$addUrl[$value_s['column_type']];?><?=$value_s['column_linktitle'];?>"><?=$value_s['column_title'];?></a></li>
                        <?php endforeach;?>
                    <?php endif;?>
                </li>
            </ul>
        </div>
        <?php endforeach;?>
        <div class="row clear text-right">
            <ul class="list_inline">
                <li>
                    <a id="wx_share"><img src="<?=$siteurl;?>images/weixin.jpg" /></a>
                    <div class="wx_qr">
                        <p>关注SEMI 微信公众号</p>
                        <img src="<?=$siteurl;?>images/qr.jpg" />
                    </div>
                </li>
                <li><a href="https://www.linkedin.com/company/semi-showcase-page" target="_blank"><img src="<?=$siteurl;?>images/in.jpg" /></a></li>
            </ul>
        </div>
        <div class="text-center copyright">
            <p>Copyright SEMI 2016. All Rights Reserved.</p>
        </div>
        <div class="text-center gov">
            <a href="http://www.miibeian.gov.cn/" target="_blank">沪ICP备06022522号</a>
            <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31011502000679" ><img src="<?=$siteurl;?>images/ghs.png">沪公网安备31011502000679号</a>
            <script src='http://w.cnzz.com/c.php?id=30010020&amp;l=2' language='JavaScript' charset='gb2312'></script>
        </div>
    </div>
</footer>
</body>
</html>