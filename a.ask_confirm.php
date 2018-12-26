<?php $page="ask"; ?>
<?php include_once('./a.head.php'); ?>
<?php
if(!empty($_GET['title'])){
  $id=$_GET['title'];

  $confirm = sql_one("SELECT * FROM ask WHERE id=$id");

}else{
  history_back();
}

?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="ask" onclick="location.href='./a.ask_list.php'">문의 관리</div>
      </div>
      <div class="contents">
        <div class="confirm_area">
          <div id="confirm_title"><?=$confirm[title]?></div>
          <div id="confirm_email"><?=$confirm[email]?></div>
          <div id="confirm_text"><?=$confirm[contents]?></div>
          <div id="confirm_btn" onclick="location.href='a.ask_reply.php?title=<?=$id?>'">회신하기</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>