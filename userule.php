<?php $page='userule' ?>
<?php 
// include_once('./rule.php');

$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.contents.php");
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
        <div class="contents-center">
          <div class="contents">
            <div class="flex" style="align-items:center;">
              <div style="font-size:20px; flex:1; text-align:left; margin-bottom:20px;">
                이용 약관
              </div>
            </div>
            <div class="box">
              <div class="contents-box">
              <?php 
                $arr = file('./text/use.txt', FILE_TEXT); 
                foreach($arr as $v){ 
                    echo $v."<br/>";
                }
              ?>
              </div>
            </div>
          </div>
          <div class="contents">
            <div class="flex" style="align-items:center;">
              <div style="font-size:20px; flex:1; text-align:left; margin-bottom:20px;">
                개인정보 이용 약관
              </div>
            </div>
            <div class="box">
              <div class="contents-box" style="margin-bottom:100px;">
              <?php 
                $arr = file('./text/secret.txt', FILE_TEXT); 
                foreach($arr as $v){ 
                    echo $v."<br/>";
                }
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include_once('./footer.php') ?>