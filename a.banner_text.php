<?php $page="banner"; ?>
<?php include_once('./a.head.php'); ?>
<?php

$h = sql_one("SELECT search_h FROM banner_text WHERE id=1");
$hh = $h['search_h'];

$b = sql_one("SELECT search_b FROM banner_text WHERE id=2");
$bb = $b['search_b'];

?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="b_text" onclick="location.href='./a.banner_text.php'">검색창</div>
        <div class="b_file" onclick="location.href='./a.banner_file.php'">메인배너</div>
      </div>
      <div class="contents">
        <div class="text_h">검색창 가이드 문구</div>
        <div>
          <form class="banner_guide" method=get action="a.banner_h.php">
            <div style="width: 100px;">Header</div>
            <input id="h_text" name="search_h" placeholder="<?=$hh?>" />
            <input id="h_btn" type="submit" value="적용"/>
          </form>
          <form class="m_banner" method=get action="a.banner_m.php">
            <div style="width: 100px;">Main</div>
            <input id="m_text" name="search_b" placeholder="<?=$bb?>" />
            <input id="m_btn" type="submit" value="적용"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>