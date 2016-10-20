<div class="header navbar-default">
  <div class="three_menu_bar">
      <div class="container">
          <ul class="list-inline text-right top-menu">
              <li><a href="#">市场研究</a></li>            
              <li><a href="#">产业技术标准</a></li>
              <li><a href="#">倡议行动</a></li>
            </ul>
        </div>
    </div>
    <div class="nav_bar" id="navbar">
      <div class="container">
          <a href="<?=$siteurl;?>"><img src="<?=$siteurl;?>images/logo.png" /></a>
            <ul class="main_nav" id="menu_box_pc">
                <?php include(dirname(__FILE__).'/'."page_top_nav.php")?>
            </ul>
            <button type="button" id="menu_btn" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="main_nav ph" id="menu_box_ph">
              <?php include(dirname(__FILE__).'/'."page_top_nav.php")?>
            </ul>
        </div>
    </div>
</div>