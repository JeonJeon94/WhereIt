<?php $page="edit-pw"; ?>
<?php include_once("./m.head.php") ?>
<?php
$pw_id=$_GET['id'];
$state=$_GET['state'];
?>
  <div class="main">
    <?php if($state != 'true') {?>
    <div class="edit-center">
      <div style="font-size:22px; margin-bottom:10px;">
        <b>비밀번호를</b><br>
        재설정해주세요.
      </div>
      <div style="margin-bottom:40px; font-size:14px;">
        새롭게 사용하실<br> 비밀번호를 입력해주세요.
      </div>
      <div class="edit-form">
        <form method="post" action="m.edit_pw_post.php?id=<?php echo $pw_id; ?>">
          <div style="display:flex; flex-direction:column; align-items:center; padding-bottom: 20px">
            <input id="new_pw" name="new_pw" type="password" placeholder="비밀번호" />
            <input id="new_pw2" name="new_pw2" type="password" placeholder="비밀번호 확인" />
          </div>
        </form>
        <div>
          <button id="new-btn" onclick="$('form').submit()">SEND</button>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($state == 'true'){ ?>
    <div class="notice">
      <div style="padding-top:30px; padding-bottom:40px; font-size:25px;">
        비밀번호가<br><b>변경되었습니다.</b>
      </div>
      <div>
        <button id="home" onclick="location.href='m.index.php'">HOME</button>
      </div>
    </div>
    <?php } ?>
  </div>
<?php include_once("./m.footer.php"); ?>