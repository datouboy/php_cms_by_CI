<?php
$addUrl = array(
    1 => 'view/article/',
    2 => 'news/showlist/',
    3 => 'events/showlist/',
  );
?>
<?php foreach ($topNavArray as $key => $value):?>
<li>
  <a href="<?=$siteurl;?><?=$addUrl[$value['column_type']];?><?=$value['column_linktitle'];?>"><?=$value['column_title'];?></a>
    <?php if($value['subMenu'] != false):?>
    <ul class="dropdown-menu">
      <?php foreach ($value['subMenu'] as $key_s => $value_s):?>
      <li><a href="<?=$siteurl;?><?=$addUrl[$value_s['column_type']];?><?=$value_s['column_linktitle'];?>"><?=$value_s['column_title'];?></a></li>
      <?php endforeach;?>
    </ul>
    <?php endif;?>
</li>
<?php endforeach;?>