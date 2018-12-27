<?php $page="ranking-theme"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.rank.php");
   exit;
 }
}
?>
<?php include_once("./head.php") ?>
<?php

if(!empty($_GET['tag'])){
  $g_tag = $_GET['tag'];
  $rank = sql_one("SELECT * FROM rank WHERE tag='$g_tag' ");
  $g_tag2 = $rank[tag];
  $theme = $rank[theme];
  $id = $rank[id];

  $rank = sql_one("SELECT * FROM rank WHERE NOT id='$id' AND NOT tag = '$g_tag2'");
  $g_tag = $rank;
}else{
  $rank= sql_select("SELECT * FROM rank");
  $theme = $rank[0][theme];
  $g_tag2 = $rank[0][tag];
  $id = $rank[0][id];
  $rank= sql_select("SELECT * FROM rank WHERE NOT id = '$id' AND NOT tag = '$g_tag2'");
  $g_tag = $rank;
}

?>

    <div class="main">
      <div class="title">
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
        </div>
        <div class="theme" onclick="location.href='./rank.php'">
          <b><?=$theme?></b><br>핫플레이스
          <div class="margin"></div>
        </div>
        <div class="thismonth" onclick="location.href='./rank-thismonth.php'">
          이 달의<br><b>핫플레이스</b>
        </div>
      </div>
      <div class="insta">
        <div class="insta-container">
          <div class="insta-tag">
            <div style="flex:0 1 auto;">
              <div class="insta-list">
                <div class="insta-text-h" style="padding-top:3px;"><a href="">#<?=$g_tag2?></a></div>
                <?php foreach ($g_tag as $info) {?>
                <div class="insta-text" style="display:none; padding:3px 0;"><a href="rank.php?tag=<?=$info[tag]?>">#<?=$info[tag]?></a></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="insta-btn">
            <img id="in-down_bt" src="./images/rank_down.png" />
            <img id="in-up_bt" src="./images/rank_up.png" />
          </div>
        </div> 
      </div>      
      <div class="rank-area">
        <div class="ranking5">
          
        </div>
        <div class="ranking10">
          
        </div>
      </div>
    </div>

<script>
  if('<?=$g_tag2?>'=='피자'){
    var store_name = ['계동피자','대장장이화덕피자','피자네버슬립스','옥인피자','리골레토시카고피자','매덕스피자','팔로피자','피자오','보니스피자펍','피자무쪼'];
  }else if('<?=$g_tag2?>'=='와인'){
    var store_name = ['먼데이블루스','세컨라운드','심퍼티쿠시','서촌블루스','둘세이수아베','우아시스','몽리와인바','순라길비비','루나씨엘로','블루브릿지'];
  }

  
  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('rank-slot');
    var rank_templete = _.template($("#rank-slot").html());
    
    function load(i){
      api_search_data(store_name[i],function(res){
        data = res
        var row = data.payload[0]
        row.no = i+1 < 10 ? "0"+(i+1) : i+1
        $(".ranking5").append(rank_templete(row))
        if(i >= 4) return ;
        load(i+1);
      })
    }
    load(0);

    function load2(i){
      api_search_data(store_name[i],function(res){
        data = res
        var row = data.payload[0]
        row.no = i+1 < 10 ? "0"+(i+1) : i+1
        $(".ranking10").append(rank_templete(row))
        if(i >= 9) return ;
        load2(i+1);
      })
    }
    load2(5);
  });



</script>

<script id="rank-slot" type="text/template">
  <div class="ranking-store" style="display:flex;">
    <div class="rank-num"><%=no%></div>
    <div class="store-img" onclick="location.href='detail.php?id=<%=_id%>'">
      <img src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
    <div style="display:flex; flex-direction:column; padding-left: 10px; padding-bottom: 5px;">
      <div class="name" onclick="location.href='detail.php?id=<%=_id%>'" >
        <%=Name%>
      </div>
      <div class="flex">
        <div class="keyword">
          <div class="chile-flex-1;"><%=collect_region%></div>
        </div>
        <div class="keyword">
          <div class="chile-flex-1;"><%=category[0]%></div>
        </div>
      </div>
    </div>
  </div>
</script>

<?php include_once("./footer.php") ?>