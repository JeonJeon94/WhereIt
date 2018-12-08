<?php $page='myinfo' ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.mypage.php");
   exit;
 }
}
?>
<?php $NEED_LOGIN = true; ?>

<?php include_once('./head.php') ?>
    <div class="main">
      <div class="mypage">
        <div class="mypage-top">
          <div style="font-size: 36px; font-family:'Noto Sans KR', sans-serif; color:#504f57;">
            <b>MY</b><br>
            페이지
          </div>
          <div class="my-list">
            <div class="favorite">
              <div class="favorite-text" onclick="location.href='./mypage.php'">
                즐겨찾기
              </div>
              <div class="margin"> </div>
            </div>
            <div class="user-info">
              <div class="user-info-text" onclick="location.href='./myinfo.php'">
                회원정보  
              </div>
              <div class="margin"> </div>
            </div>
            <div class="use-rule">
              <div class="use-rule-text" onclick="location.href='./userule.php'">
                이용약관
              </div>
              <div class="margin"> </div>
            </div>
          </div>
        </div>
        <div class="myinfo">
          <div style="display:flex; margin-bottom:100px">
            <div class="login-info">
              <div style="margin-right:200px;">
                <div class="user-mail">
                  <div style="margin:0px 250px 30px 0px; color:gray;">이메일</div>
                  <div id="login-email">
                  <?=$member[user_email]?>
                  </div>
                </div>
                <div class="user-id">
                  <div style="margin-right:250px; color:gray;">아이디</div>
                  <div id="login-id">
                  <?=$member[user_name]?>
                  </div>
                </div>
              </div>
            </div>
            <div class="logout">
              <div id="logout">로그아웃</div>
            </div>
          </div>
          <div class="edit-btn">
            <button id="edit">EDIT</button>
          </div>
        </div>
        <div class="edit-info">
          <form id="edit-form" method="post" action="user.update.php">
            <div class="edit-line">
              <div class=line-title>이메일</div>
              <div style="padding-left:20px; height:30px;"><?=$member[user_email]?></div>
            </div>
            <div class="edit-line">
              <div class=line-title>비밀번호</div>
              <input id="password_ck" type="password" name="password" placeholder="비밀번호를 입력해주세요." />
            </div>
            <div class="edit-line">
              <div class=line-title>비밀번호 변경</div>
              <input id="new_pw_ck" type="password" name="new_pw" placeholder="비밀번호를 입력해주세요.(8자 이상 입력해주세요)" />
            </div>
            <div class="edit-line">
              <div class=line-title>비밀번호 확인</div>
              <input id="new_pw2_ck" type="password" name="new_pw2" placeholder="비밀번호를 입력해주세요.(8자 이상 입력해주세요)" />
            </div>
            <div class="edit-line">
              <div class=line-title>닉네임</div>
              <input id="username" type="text" name="username" value="<?=$member[user_name]?>" />
            </div>
          </form>
          <div style="text-align:center;">
            <button id="save" onclick="$('form').submit()">SAVE</button>
            <button id="cancel" onclick="location.reload()">CANCEL</button>
          </div>
        </div>
      </div>
      <div class="modal-container">
        <div class="logout-box">
          <div style="padding-top:70px">
            로그아웃하시겠습니까?
          </div>
          <div class="answer">
            <div class="yes" onclick="location.href='logout.php'">
              예
            </div>
            <div class="no" onclick="location.href='myinfo.php'">
              아니오
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include_once('./footer.php') ?>