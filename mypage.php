<?php $page='mypage' ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.favorite.php");
   exit;
 }
}
?>
<?php $NEED_LOGIN = true; ?>
<?php include_once('./head.php'); ?>
<?php

$shop_count = sql_one("SELECT count(shopId) FROM favorit WHERE user_id = '$member[id]'");

$shop_list = sql_select("SELECT shopId FROM favorit WHERE user_id = '$member[id]'");
?>

    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="mypage">
        <div class="mypage-top">
          <div style="font-size: 36px; color:#504f57; font-family: 'Noto Sans KR', sans-serif;">
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
        <div class="favorite-list">
        <?php if($shop_count['count(shopId)']=='0'){ ?>
          <div class="list-line">
            <div style="margin:0 auto">
              <h2>즐겨찾기 된 상점이 없습니다.</h2>
            </div>
          </div>
        <?php }else{ ?>
          <div class="list-line">
          </div>
        <?php } ?>
        </div>
      </div>
    </div>

<script>
  $(document).ready(function(){
    var L_array = <?php echo json_encode($shop_list); ?>;
    L_array.forEach(
      function aa(value){
        api_shop_detail(value.shopId,function(data){
          var slot_template = _.template($("#store-slot").html());
          var row = data.payload
          try{
            $(".list-line").append( slot_template(row) )
          }catch(err){}  
        })
      })
  })
</script>

<script id="store-slot" type="text/template">
  <div class="store-list">
    <div class="img-container" onclick="location.href='./detail.php?id=<%=_id%>'">
      <img alt="food-img" src="<%=imgs[0].link%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
    <div style="padding:5px 5px; display:flex; width:232px;">
      <div class="store-name"><%=Name%></div>
      <div class="views">2.40K</div>
    </div>
    <div style="display:flex;">
      <div class="keyword">
        <div><%=collect_region%></div>
      </div>
      <div class="keyword">
        <div><%=category[0]%></div>
      </div>
    </div>
  </div>
</script>

<?php include_once('./footer.php') ?>