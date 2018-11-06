<?php $page="asking"; ?>

<?php include_once('./head.php') ?>
    <div class="main">
      <div class="ask-main">
        <div class="send-help">
          <div class="help-title">
            <div style="font-weight:bold;">궁금한 게</div>
            <div>있으신가요?</div>
          </div>
          <div class="help">
            우측의 빈칸을 작성해주시면<br>
            빠르게 확인하도록 하겠습니다.
          </div>
          <div class="admin-adress">
            서울특별시 강남구<br>
            테헤란로 13길 38
          </div>
          <div class="admin-phone">
            Tel.1388-0127
          </div>
          <div class="admin-e-mail">
            E-mail. billfishwork@gmail.com
          </div>
        </div>
        <div class="support">
          <form class="asking-form" method='post' action='./asking.php'>
            <div style="display:flex; flex-direction:column;" >
              <input id="title" type="text" name="title" placeholder="제목" maxlength="50" />
              <input id="e_mail" type="text" name="e_mail" placeholder="이메일" maxlength="50" />
              <textarea id="contents" type="text" name="contents"></textarea>
            </div>
            <input id="send" type="button" value="SEND">
          </form>
        </div>
        <div id="notice">
          <div style="padding: 80px 0px 40px 0px;">
            문의 내용이 전달되었습니다.
          </div>
          <div>
            <button id="home" onclick="location.href='./index.php'">HOME</button>
          </div>
        </div>
      </div>
    </div>
<?php include_once('./footer.php') ?>