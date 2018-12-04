<?php $page="edit-pw"; ?>
<?php include_once('./head.php') ?>
<?php
$pw_id=$_GET['id'];
$state=$_GET['state'];
?>
    <div class="main">
      <div class="edit-center">
        <div style="font-size:36px; margin-bottom:30px;">
          <b>비밀번호를</b><br>
          재설정해주세요.
        </div>
        <div style="margin-bottom:75px; font-size:18px;">
          새롭게 사용하실 비밀번호를 입력해주세요.
        </div>
        <div class="edit-form">
          <form method=post action="edit_pw_post.php?id=<?php echo $pw_id; ?>">
            <div style="display:flex; flex-direction:column; align-items:center;">
              <input id="new_pw" name="new_pw" type="password" placeholder="비밀번호를 입력해주세요." />
              <input id="new_pw2" name="new_pw2" type="password" placeholder="비밀번호를 재입력해주세요." />
            </div>
          </form>
          <div>
            <button id="new-btn" onclick="$('form').submit()">CONFIRM</button>
          </div>
        </div>
        <?php if($state == 'true'){ ?>        
        <div class="modal-container">
          <div class="notice">
            <div style="padding-top:70px; padding-bottom:40px; ">
              비밀번호가<br><b>변경되었습니다.</b>
            </div>
            <div>
              <button id="home" onclick="location.href='./index.php'">HOME</button>
            </div>
          </div>
        </div>
        <?php  } ?>
      </div>
    </div>
<?php include_once('./footer.php') ?>