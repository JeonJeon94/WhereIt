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
        <div class="reply_area">
          <form method='post' action="a.ask_success.php">
            <input id="reply_title" type="text" name="reply_title" />
            <input id="reply_email" type="text" name="reply_email" value="<?=$confirm[email]?>"/>
            <textarea id="reply_text" type="text" name="reply_text" ></textarea>
            <input type='hidden' name="reply_id" value="<?=$id?>" />
            <div id="reply_btn" onclick="$('form').submit()">발송하기</div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>