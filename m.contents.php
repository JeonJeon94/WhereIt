<?php $page = "contents" ?>
<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="contents-center">
      <div class="contents">
        <div class="contents-title">
          이용 약관
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
        <div class="contents-title">
            개인정보 이용 약관
        </div>
        <div class="box">
          <div class="contents-box">
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
<?php include_once("./m.footer.php") ?>